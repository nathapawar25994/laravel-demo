<?php

namespace App\Http\Controllers;

use Auth;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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
        $country_list = Country::where('status', 1)->get();
        $count = $country_list->count();

        return view('country.index', compact('country_list', 'count'));
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
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:country,name']);

        $country = new Country($request->all());

        $country->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('CountryController@index'));
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);

        return view('country.edit', compact('country'));
    }

    public function update($id, Request $request)
    {
        $country = Country::findOrFail($id);

        $country->update($request->all());

        $country->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('CountryController@index'));
    }

    public function delete($id)
    {
        $country = Country::findOrFail($id);

        $country->status = 0;

        $country->update();

        $country->save();

        return back();
    }
}
