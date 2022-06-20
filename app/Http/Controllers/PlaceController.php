<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Resources\Place as PlaceResource;



class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id1,$id2)// ؟؟ تأكيد
    {
        $places = Place::where('governorate_id','type_of_place_id',$id1,$id2);
        return $this->sendResponse(PlaceResource::collection($places),'places retrieved succsessfully');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validatior = Validator::make($input,[
            'id_type_of_place'=>'required',
            'id_governorate'=>'required',
            'name'=>'required',

        ]);
        if($validatior->fails())
        {
            return $this->sendError('please validate error',$validatior->errors());
        }
        $place = Place::create($input);
        return $this->sendResponse(new PlaceResource($place),'place create succsessfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        if(is_null( $place ))
        {
            return $this->sendError('place not found');

        }
        return $this->sendResponse(new PlaceResource($place),'place found succsessfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Place $place)
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
        $place->name = $input['name'];
        $place->evaluation = $input['evaluation'];
        $place->phoneNumber = $input['phoneNumber'];
        $place->save();
        return $this->sendResponse(new PlaceResource($place),'place updated succsessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
       $place->delete();
       return $this->sendResponse(new PlaceResource($place),'place deleted succsessfully');

    }
}
