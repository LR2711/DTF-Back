<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // $plainPassword = $request->password;
        // $password = bcrypt($request->password);
        // $request->request->add(['password' => $password]);

        // // create the user account 
        // $created = User::create($request->all());
        // $request->request->add(['password' => $plainPassword]);
        // // login now..
        // return $this->login($request);

        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->pssword = $request->post('pssword');
        $user->weight = $request->post('weight');
        $user->height = $request->post('height');
        $user->planType = $request->post('planType');
        $user->goal = $request->post('goal');

        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Fail',
        ]);
    }
    public function login(Request $request)
    {
        $input = $request->only('email', 'pssword');
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
    }
    public function logout(Request $request)
    {
        //     if (!User::checkToken($request)) {
        //         return response()->json([
        //             'message' => 'Token is required',
        //             'success' => false,
        //         ], 422);
        //     }

        //     try {
        //         JWTAuth::invalidate(JWTAuth::parseToken($request->token));
        //         return response()->json([
        //             'success' => true,
        //             'message' => 'User logged out successfully'
        //         ]);
        //     } catch (JWTException $exception) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Sorry, the user cannot be logged out'
        //         ], 500);
        //     }
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Successfully logged out');
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
        $user = User::find($id);

        if (!$user) {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un usuario con ese código.'])],404);
        }

        $name=$request->input('name');
        $email=$request->input('email');
        $pssword=$request->input('pssword');
        $weight=$request->input('weight');
        $height=$request->input('height');
        $planType=$request->input('planType');
        $goal=$request->input('goal');

        if ($request->method() === 'PATCH')
        {
            $bandera = false;
            
            if ($name)
            {
                $user->name = $name;
                $bandera=true;
            }

            if ($email)
            {
                $user->email = $email;
                $bandera=true;
            }


            if ($pssword)
            {
                $user->pssword = $pssword;
                $bandera=true;
            }

            if ($weight)
            {
                $user->weight = $weight;
                $bandera=true;
            }
            if ($height)
            {
                $user->height = $height;
                $bandera=true;
            }

            if ($planType)
            {
                $user->planType = $planType;
                $bandera=true;
            }

            if ($goal)
            {
                $user->goal = $goal;
                $bandera=true;
            }

            if ($bandera)
            {
                // Almacenamos en la base de datos el registro.
                $user->save();
                return response()->json(['status'=>'ok','data'=>$user], 200);
            }
            else
            {
                // Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
                // Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
                return response()->json(['errors'=>array(['code'=>304,'message'=>'No se ha modificado ningún dato de user.'])],304);
            }
        }

    }
}
