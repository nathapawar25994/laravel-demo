<?php

namespace App\Http\Controllers;

use Auth;
use App\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
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
        $job_type_list = JobType::where('status', 1)->get();
        $count = $job_type_list->count();

        return view('job_type.index', compact('job_type_list', 'count'));
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
        return view('job_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:job_type,name']);

        $job_type = new JobType($request->all());

        // trim
        $slug = trim($request->name, '-');
        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '_', $slug);
        // lowercase
        $slug = strtolower($slug);
        $job_type->slug = $slug;

        $job_type->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('JobTypeController@index'));
    }

    public function edit($id)
    {
        $job_type = JobType::findOrFail($id);

        return view('job_type.edit', compact('job_type'));
    }

    public function update($id, Request $request)
    {
        $job_type = JobType::findOrFail($id);

        $job_type->update($request->all());

        // trim
        $slug = trim($request->name, '-');
        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '_', $slug);
        // lowercase
        $slug = strtolower($slug);
        $job_type->slug = $slug;

        $job_type->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('JobTypeController@index'));
    }

    public function delete($id)
    {
        JobType::destroy($id);

        return back();
    }
}
