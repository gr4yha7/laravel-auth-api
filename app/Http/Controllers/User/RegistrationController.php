<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Hash;
// use Mail;
use Validator;
use Socialite;
use JWTAuth;

class RegistrationController extends Controller {
  /**
   * @param Request $request
   * @return JsonResponse
   **/
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

      $message = 'Registration successful';
      $success = true;
      return response()->json([
        'message' => $message,
        'success' => $success,
        'token' => $token,
      ], 201);

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
    return $provider_user->token;
    // try {
    //   $user = new User();

    //   $user->name = $provider_user->getName();
    //   $user->email = $provider_user->getEmail();
    //   $user->roles = json_encode(['student']);
    //   $user->save();

    //   $message = 'Registration successful';
    //   $success = true;
    //   return response()->json([
    //     'message' => $message,
    //     'status' => $status,
    //   ], 201);

    // } catch(\Exception $e) {
    //   $message = $e->getMessage();
    //   $errors = 'Failed to register user. Something went wrong';
    //   return response()->json([
    //     'status' => $status,
    //     'errors' => $errors,
    //     'message' => $message,
    //     'trace' => $e->getTrace(),
    //   ], 500);
    // }
  }
}