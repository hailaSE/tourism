<?php

namespace App\Http\Controllers;

use App\Models\User_Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\UserTrip as UserTripResource;
use Validator;

class UserTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'user_id'=>'required',
            'trip_id'=>'required',

        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $userTrip = User_Trip::create($input);
        return $this->sendResponse(new UserTripResource($userTrip),'userTrip create succsessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Trip  $user_Trip
     * @return \Illuminate\Http\Response
     */
    public function show(User_Trip $user_Trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Trip  $user_Trip
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Trip $user_Trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Trip  $user_Trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Trip $user_Trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Trip  $user_Trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Trip $user_Trip)
    {
        //
    }
}
