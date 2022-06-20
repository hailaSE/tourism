<?php

namespace App\Http\Controllers;

use App\Models\Tourist_Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Trip as TouristGuideResource;
use Validator;

class TouristGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $touristGuides = TouristGuide::all();
        return $this->sendResponse(TouristGuideResource::collection($touristGuides),'touristGuides retrieved succsessfully');

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'name'=>'required',
            'phoneNumber'=>'required',
            'evaluation'=>'required',

        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $touristGuide = TouristGuide::create($input);
        return $this->sendResponse(new TouristGuideResource($touristGuide),'TouristGuide create succsessfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourist_Guide  $tourist_Guide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $touristGuide = TouristGuide::find($id);
        if(is_null( $touristGuide ))
        {
            return $this->sendError('touristGuide not found');

        }
        return $this->sendResponse(new TouristGuideResource($touristGuide),'touristGuide found succsessfully');
    }


    public function update(Request $request, Tourist_Guide $tourist_Guide)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'name'=>'required',
            'evaluation'=>'required',
            'phoneNumber'=>'required',

        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $touristGuide->name = $input['name'];
        $touristGuide->evaluation = $input['evaluation'];
        $touristGuide->phoneNumber = $input['phoneNumber'];

        $trip->save();
        return $this->sendResponse(new TouristGuideResource($touristGuide),'touristGuide updated succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourist_Guide  $tourist_Guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourist_Guide $tourist_Guide)
    {
        $touristGuide->delete();
        return $this->sendResponse(new TouristGuideResource($trip),'touristGuide deleted succsessfully');
    }
}
