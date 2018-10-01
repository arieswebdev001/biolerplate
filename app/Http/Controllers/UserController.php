<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Ixudra\Curl\Facades\Curl;
use App\User;
use App\MembershipType;
use App\Config;
use Hash;
use DB;

class UserController extends Controller{
    function getUser(Request $request){
        $user = User::leftJoin('user_levels', 'users.level', '=', 'user_levels.id')->where('users.id', Auth::user()->id)->select('users.*', 'level_data', 'level_name')->get()->first();
        if(isset($user->id)){
            return response()->json(["user" => $user ,
                                    "configs" => Config::get()->toArray(),
                                    "app_name"=>config('app.name')]);
        }
        return response()->json(["message"=>"User Not found", "error"=>"user_not_found"], 404);
    }

    function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        if ($validator->fails())
            return response()->json(['error'=>'validation_error', 'message'=>$validator->errors()->all()], 400);


        $response = Curl::to(config('app.url') . '/oauth/token')
            ->withData( [
                'grant_type' => 'password',
                'client_id' => config('app.passport_client_id'),
                'client_secret' => config('app.passport_client_secret'),
                'username' => $request->input('email'),
                'password' => $request->input('password'),
                'scope' => '',
            ])
            ->asJson()
            ->returnResponseObject()
            ->post();

        return response()->json($response->content, $response->status > 300? 400:200);
    }
}
