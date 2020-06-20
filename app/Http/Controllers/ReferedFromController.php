<?php

namespace App\Http\Controllers;

use Auth;
use App\ReferedFrom;
use Illuminate\Http\Request;

class ReferedFromController extends Controller
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
        $refered_from_list = ReferedFrom::where('status', 1)->get();
        $count = $refered_from_list->count();

        return view('refered_from.index', compact('refered_from_list', 'count'));
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
        return view('refered_from.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:refered_from,name']);

        $refered_from = new ReferedFrom($request->all());

        $refered_from->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('ReferedFromController@index'));
    }

    public function edit($id)
    {
        $refered_from = ReferedFrom::findOrFail($id);

        return view('refered_from.edit', compact('refered_from'));
    }

    public function update($id, Request $request)
    {
        $refered_from = ReferedFrom::findOrFail($id);

        $refered_from->update($request->all());

        $refered_from->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('ReferedFromController@index'));
    }

    public function delete($id)
    {
        $refered_from = ReferedFrom::findOrFail($id);

        $refered_from->status = 0;

        $refered_from->update();

        $refered_from->save();

        return back();
    }
}
