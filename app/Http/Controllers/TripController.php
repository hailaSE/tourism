<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Trip as TripResource;
use App\Http\Resources\TouristGuide as TouristGuideResource;



class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        return $this->sendResponse(TripResource::collection($trips),'trips retrieved succsessfully');
    }
    public function touristGuide($id1,$id2)//outer join ??
    {
    }
    public function tripsFrom($governorate_id)
    {
        $trips = Trip::where('governorate_id',$id)->get();
        return $this->sendResponse(TripResource::collection($trips),'trips retrieved succsessfully');
    }
    public function numOfGroupTrips()//عدد الرحل الحماعسة مو مضمون
    {
        $trips = Trip::where('offer_id','Group');
        $num = count($trips);
        return $this->sendResponse(TripResource::collection($num),'trips retrieved succsessfully');
    }
    public function tripsWithOffers()
    {
        $trips = Trip::whereNotNull('offer_id');
        return $this->sendResponse(TripResource::collection($trips),'trips retrieved succsessfully');
    }
    public function tripCost($id)
    {
        $cost = Trip::find($id)->value('cost');
        return $this->sendResponse(TripResource::collection($cost),'cost retrieved succsessfully');
    }
    public function priceAfterOffer()
    {
        $costs = Trip::whereNotNull('offer_id')->value('cost_after_offer');
        return $this->sendResponse(TripResource::collection($costs),'costs retrieved succsessfully');
    }
    public function tripDetail($id)
    {
        $detail = Trip::find($id)->value('detail');
        return $this->sendResponse(TripResource::collection($detail),'detail retrieved succsessfully');
    }
    public function tripDate($id)
    {
        $date = Trip::find($id)->value('starts_at');
        return $this->sendResponse(TripResource::collection($date),'date retrieved succsessfully');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'governorate_id'=>'required',
            'offer_id'=>'required',
            'tourist_guide_id'=>'required',
            'transport_id'=>'required',
            'name'=>'required',
            'trip_date'=>'required',
            'cost'=>'required',
            'starts_at'=>'required',
            'ends_at'=>'required',
            'tripType'=>'required',
            'details'=>'required',
            'cost_after_offer'=>'required',
        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $trip = Place::create($input);
        return $this->sendResponse(new TripResource($trip),'trip create succsessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::find($id);
        if(is_null( $trip ))
        {
            return $this->sendError('trip not found');

        }
        return $this->sendResponse(new TripResource($trip),'trip found succsessfully');

    }

    public function update(Request $request, Trip $trip)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'governorate_id'=>'required',
            'offer_id'=>'required',
            'tourist_guide_id'=>'required',
            'transport_id'=>'required',
            'name'=>'required',
            'trip_date'=>'required',
            'cost'=>'required',
            'starts_at'=>'required',
            'ends_at'=>'required',
            'tripType'=>'required',
            'details'=>'required',
            'cost_after_offer'=>'required',
        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $trip->governorate_id = $input['governorate_id'];
        $trip->offer_id = $input['offer_id'];
        $trip->tourist_guide_id = $input['tourist_guide_id'];
        $trip->transport_id = $input['transport_id'];
        $trip->name = $input['name'];
        $trip->trip_date = $input['trip_date'];
        $trip->cost = $input['cost'];
        $trip->starts_at = $input['starts_at'];
        $trip->ends_at = $input['ends_at'];
        $trip->tripType = $input['tripType'];
        $trip->details = $input['details'];
        $trip->cost_after_offer = $input['cost_after_offer'];
        $trip->save();
        return $this->sendResponse(new PlaceResource($trip),'trip updated succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return $this->sendResponse(new TripResource($trip),'trip deleted succsessfully');
    }
}
