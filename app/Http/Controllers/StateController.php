<?php

namespace App\Http\Controllers;

use Auth;
use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
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
        $state_list = State::where('status', 1)->get();
        $count = $state_list->count();

        return view('state.index', compact('state_list', 'count'));
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
        return view('state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:state,name']);

        $state = new State($request->all());

        $state->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('StateController@index'));
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);

        return view('state.edit', compact('state'));
    }

    public function update($id, Request $request)
    {
        $state = State::findOrFail($id);

        $state->update($request->all());

        $state->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('StateController@index'));
    }

    public function delete($id)
    {
        $state = State::findOrFail($id);

        $state->status = 0;

        $state->update();

        $state->save();

        return back();
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->where('status',1)->get();

        if(empty($states)){
            $states = [];
        }
        
        return response()->json(['status'=>'200','data'=>$states,'message'=>'states list country wise']);
    }



}
