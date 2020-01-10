<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Socialite;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller {
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
      $token = JWTAuth::attempt($request->only('email', 'password'));
      if (! $token) {
        $errors = 'Invalid Email/Password';
        return response()->json([
          'errors' => $errors,
          'success' => $success,
        ], 400);
      }

      $cookie = json_encode([
        'token' => $token,
        'token_type' => 'bearer',
      ]);

      $now = Carbon::now();
      $exp = $now->addDay()->getTimestamp();

      $success = true;
      $message = 'Logged in successfully';

      return response([
        'message' => $message,
        'success' => $success,
        ], 200)->cookie('jwt', $cookie, $exp, '/', null, null, true);

    } catch(JWTException $e) {
      $errors = 'Failed to create token';
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
   * @return JsonResponse
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
    return $provider_user->getId();
  }
}