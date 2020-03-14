<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Validator;
use Socialite;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticationController extends Controller {
  public function logout() {
    $message = '';
    $success = false;
    try {
      JWTAuth::invalidate();
      $success = true;
      $message = 'Logged out successfully';
      return response()->json([
        'success' => $success,
        'message' => $message,
      ], 200);
    } catch(JWTException $e) {
      $success = true;
      $message = $e->getMessage();
      return response()->json([
        'success' => $success,
        'message' => $message,
      ], 500);
    }
  }

  public function register(Request $request) {
    $errors = '';
    $message = '';
    $success = false;

    $rules = [
      'name' => 'required|string|max:255|min:3',
      'email' => 'required|string|max:255|email|unique:users',
      'password' => 'required|min:6',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json([
        'errors' => $errors,
        'success' => $success,
      ], 400);
    }

    try {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->roles = json_encode(['student']);
      $user->save();

      $token = JWTAuth::fromUser($user);

      // TODO: Add email verification

      $cookie = json_encode([
        'token' => $token,
        'token_type' => 'bearer',
      ]);

      $exp = Carbon::now()->addDay()->getTimestamp();

      $message = 'Registration successful';
      $success = true;

      return response([
        'message' => $message,
        'success' => $success,
        ], 200)->cookie('jwt', $cookie, $exp, '/', null, null, true);

    } catch(\Exception $e) {
      $message = $e->getMessage();
      $errors = 'Failed to register user. Something went wrong';
      return response()->json([
        'success' => $success,
        'errors' => $errors,
        'message' => $message,
        'trace' => $e->getTrace(),
      ], 500);
    }

  }

  /**
   * @param Request $request
   * @return JsonResponse
   **/
  public function authenticateUser(Request $request)
  {
    $errors = '';
    $message = '';
    $success = false;

    $rules = [
      'email' => 'required|string|max:255|email',
      'password' => 'required|min:6',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json([
        'errors' => $errors,
        'success' => $success,
      ], 400);
    }

    try {
      try {
        $token = JWTAuth::attempt($request->only('email', 'password'));
        if (! $token) {
          $errors = 'Invalid Email/Password';
          return response()->json([
            'errors' => $errors,
            'success' => $success,
          ], 400);
        }
      } catch(JWTException $e) {
        $errors = 'Failed to create token';
        $message = $e->getMessage();
        return response()->json([
          'errors' => $errors,
          'message' => $message,
          'success' => $success,
        ], 500);
      }

      $cookie = json_encode([
        'token' => $token,
        'token_type' => 'bearer',
      ]);

      $exp = Carbon::now()->addDay()->getTimestamp();

      $success = true;
      $message = 'Logged in successfully';

      return response([
        'message' => $message,
        'success' => $success,
        ], 200)->cookie('jwt', $cookie, $exp, '/', null, null, true);

    } catch(\Exception $e) {
      $errors = 'Login failed';
      $message = $e->getMessage();
      return response()->json([
        'errors' => $errors,
        'message' => $message,
        'success' => $success,
      ], 500);
    }
  }

    /**
   * Redirect the user to the Auth Provider authentication page.
   *
   */
  public function redirectToProvider($auth_provider)
  {
    return Socialite::driver($auth_provider)->redirect();
  }

  /**
   * Obtain the user information from Auth Provider.
   *
   * @return JsonResponse
   */
  public function handleProviderCallback($auth_provider)
  {
    $provider_user = Socialite::driver($auth_provider)->stateless()->user();

    // Authenticate user if user already exists else register user
    $userFromDB = User::where('email', $provider_user->getEmail())->first();
    $userFromToken = JWT::authenticate();
    // if ($userFromDB->diffKeys($userFromToken)->isEmpty()) { // ---> Full collection comparison
    if ($userFromDB->email === $userFromToken->email) {
      $success = true;
      $message = 'Logged in successfully';

      return response()->json([
        'message' => $message,
        'success' => $success,
      ], 200);
    }
    try {
      $user = new User();

      $user->name = $provider_user->getName();
      $user->email = $provider_user->getEmail();
      $user->roles = json_encode(['student']);
      $user->save();

      try {
        $token = JWTAuth::fromUser($user);
      } catch(JWTException $e) {
        $errors = 'Failed to create token';
        $message = $e->getMessage();
        return response()->json([
          'errors' => $errors,
          'message' => $message,
          'success' => $success,
        ], 500);
      }

      $cookie = json_encode([
        'token' => $token,
        'token_type' => 'bearer',
      ]);

      $exp = Carbon::now()->addDay()->getTimestamp();

      $message = 'Registration successful';
      $success = true;

      return response([
        'message' => $message,
        'success' => $success,
        ], 200)->cookie('jwt', $cookie, $exp, '/', null, null, true);

    } catch(\Exception $e) {
      $message = $e->getMessage();
      $errors = 'Failed to register user. Something went wrong';
      return response()->json([
        'status' => $status,
        'errors' => $errors,
        'message' => $message,
        'trace' => $e->getTrace(),
      ], 500);
    }
  }
}