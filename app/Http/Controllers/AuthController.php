<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
         'name'=>'required',
         'email'=>'required|email',
         'password'=>'required',
         'c_password'=>'required|same:password',
        ]);
        if($validator->fails())
        {
            return $this->sendError('please validator error',$validator->errors());
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('hailasenno')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success,'user registered successfully');
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user=Auth::user();
            $succes['token']=$user->createToken('hailasenno')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success,'user login successfully');

        }
        else
        {
            return $this->sendError('Unauthorised ',[
                'error','Unauthorised']);


        }
    }
}
