<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BaseController extends BaseController
{
    public function sendResponse($result,$message)
    {
        $response = [
      'success'=>true,
      'data'=>$result,
      'message'=>$message
        ];
        return response()->json($response,200);
    }
    public function sendError($error,$errorMessage=[],$code=404)
    {
        $response = [
       'success'=>false,
       'message'=>$error,
        ];
        if(!empty($errorMessage))
        {
            $response['data']=$errorMessage;
        }
        return response()->json($response,$code);
    }
}
