<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $variableJson = null;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email'  => 'required|email|unique:users|max:50',
            'password' => 'required|max:270',
            'weight' => 'required|numeric|between:1.0,999.99',
            'height' => 'required|numeric|between:1.0,999.99',
            'planType' => 'required|in:GRATUITO,PAGO',
            'goal' => 'required|in:MANTENERSE,BAJAR_PESO,AUMENTAR_MASA'
        ]);

        if ($validator->fails()) {
            $variableJson = response()->json([
                'success' => false,
                'message' => 'Error',
                'validator' => $validator->errors()
            ]);
        } else {
            $user = new User();
            $user->name = $request->post('name');
            $user->email = $request->post('email');
            $user->password = Hash::make($request->post('password'));
            $user->weight = $request->post('weight');
            $user->height = $request->post('height');
            $user->planType = $request->post('planType');
            $user->goal = $request->post('goal');

            if ($user->save()) {
                $variableJson = response()->json([
                    'success' => true,
                    'message' => 'Success',
                ]);
            } else {
                $variableJson = response()->json([
                    'success' => false,
                    'message' => 'Fail',
                ]);
            }
        }

        return $variableJson;
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        // get the user 
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user
        ]);

        //OTRA OPCIÓN
        // if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        //     $user = Auth::user();
        //     $success['token'] = $user->createToken('appToken')->accessToken;
        //     //After successfull authentication, notice how I return json parameters
        //     return response()->json([
        //         'success' => true,
        //         'token' => $success,
        //         'user' => $user
        //     ]);
        // } else {
        //     //if authentication is unsuccessfull, notice how I return json parameters
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Invalid Email or Password',
        //     ], 401);
        // }

        //OTRA OPCIÓN
        // $credentials = request(['email', 'password']);

        // if (! $token = auth()->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        // ]);

        // $credentials = $request->only('email', 'password');
        // try {
        //     if (! $token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['error' => 'invalid_credentials'], 400);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'could_not_create_token'], 500);
        // }
        // return response()->json(compact('token'));
    }
    public function logout(Request $request)
    {
            if (!User::checkToken($request)) {
                return response()->json([
                    'message' => 'Token is required',
                    'success' => false,
                ], 422);
            }

            try {
                JWTAuth::invalidate(JWTAuth::parseToken($request->token));
                return response()->json([
                    'success' => true,
                    'message' => 'User logged out successfully'
                ]);
            } catch (JWTException $exception) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, the user cannot be logged out'
                ], 500);
            }
        // Auth::user()->tokens->each(function ($token, $key) {
        //     $token->delete();
        // });

        // return response()->json('Successfully logged out');
    }

    public function getCurrentUser(Request $request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        // add isProfileUpdated....
        $isProfileUpdated = false;
        if ($user->isPicUpdated == 1 && $user->isEmailUpdated) {
            $isProfileUpdated = true;
        }
        $user->isProfileUpdated = $isProfileUpdated;

        return $user;
    }


    public function update(Request $request, $id)
    {
        // $user = User::find($id);
        $user = User::getCurrentUser($request);

        if (!$user) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un usuario con ese código.'])], 404);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $pssword = $request->input('pssword');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $planType = $request->input('planType');
        $goal = $request->input('goal');

        if ($request->method() === 'PATCH') {
            $bandera = false;

            if ($name) {
                $user->name = $name;
                $bandera = true;
            }

            if ($email) {
                $user->email = $email;
                $bandera = true;
            }


            if ($pssword) {
                $user->pssword = $pssword;
                $bandera = true;
            }

            if ($weight) {
                $user->weight = $weight;
                $bandera = true;
            }
            if ($height) {
                $user->height = $height;
                $bandera = true;
            }

            if ($planType) {
                $user->planType = $planType;
                $bandera = true;
            }

            if ($goal) {
                $user->goal = $goal;
                $bandera = true;
            }

            if ($bandera) {
                // Almacenamos en la base de datos el registro.
                $user->save();
                return response()->json(['status' => 'ok', 'data' => $user], 200);
            } else {
                // Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
                // Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
                return response()->json(['errors' => array(['code' => 304, 'message' => 'No se ha modificado ningún dato de user.'])], 304);
            }
        }
    }
}
