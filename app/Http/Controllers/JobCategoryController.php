<?php

namespace App\Http\Controllers;

use Auth;
use App\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
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
        $job_category_list = JobCategory::where('status',1)->get();
        $count = $job_category_list->count();
        return view('job_category.index', compact('job_category_list', 'count'));
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
        return view('job_category.create');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'required|unique:job_category,name']);

        $job_category = new JobCategory($request->all());

        
        $job_category->save();

    //    flash()->success('Job Category was successfully created');

       return redirect(action('JobCategoryController@index'));
       
    }

    public function edit($id)
    {
        $job_category = JobCategory::findOrFail($id);

        return view('job_category.edit', compact('job_category'));
    }

    public function update($id, Request $request)
    {
        $job_category = JobCategory::findOrFail($id);

        $job_category->update($request->all());

        $job_category->save();
      //  flash()->success('Entities details were successfully updated');

      return redirect(action('JobCategoryController@index'));

    }

    public function delete($id)
    {
        $job_category = JobCategory::findOrFail($id);

        $job_category->status = 0;

        $job_category->update();

        $job_category->save();

        return back();
    }
}
