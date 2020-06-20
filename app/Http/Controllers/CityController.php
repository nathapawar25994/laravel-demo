<?php

namespace App\Http\Controllers;

use Auth;
use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $city_list = City::where('status', 1)->get();
        $count = $city_list->count();

        return view('city.index', compact('city_list', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:city,name']);

        $city = new City($request->all());

        $city->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('CityController@index'));
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        $country_id = $city->country_id;

        return view('city.edit', compact('city', 'country_id'));
    }

    public function update($id, Request $request)
    {
        $city = City::findOrFail($id);

        $city->update($request->all());

        $city->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('CityController@index'));
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);

        $city->status = 0;
        
        $city->update();

        $city->save();

        return back();
    }

    public function getCity(Request $request)
    {
        $cities = City::where('state_id',$request->state_id)->where('status',1)->get();

        if(empty($cities)){
            $cities = [];
        }
        
        return response()->json(['status'=>'200','data'=>$cities,'message'=>'cities list state wise']);
    }
}
