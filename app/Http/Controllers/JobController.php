<?php

namespace App\Http\Controllers;

use Auth;
use App\City;
use App\Job;
use App\JobBaseSalary;
use Illuminate\Http\Request;

class JobController extends Controller
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
        $job_list = Job::where('status', 1)->get();
        $count = $job_list->count();

        return view('job.index', compact('job_list', 'count'));
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
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        //Model Validation
        $this->validate($request, [
            'job_code' => 'required|unique:job,job_code',
            'title' => 'required',
            'sub_title' => 'required',
            'last_date_to_submit' => 'required|date|date_format:Y-m-d',
            'description' => 'required',
            'job_category_id' => 'required',
            'job_type_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'total_vacancy' => 'required|numeric|min:1',
            'hiring_organization_id' => 'required',
            // 'value' => 'numeric|min:1',
            // 'min_value' => 'numeric|min:1',
            // 'max_value' => 'numeric|gt:min_value',
            ]);

        $job = new Job($request->all());

        // trim
        $slug = trim($request->title, '-');
        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '_', $slug);
        // lowercase
        $slug = strtolower($slug);
        $job->slug = $slug;

        $job->save();

        $job_id = $job->id;

        $job_base_salary = new JobBaseSalary();
        $job_base_salary->job_id = $job_id;
        $job_base_salary->currency_id = $request->currency_id;
        $job_base_salary->salary_period_id = $request->salary_period_id;
        $job_base_salary->is_range = $request->is_range;
        $job_base_salary->value = $request->value;
        $job_base_salary->min_value = $request->min_value;
        $job_base_salary->max_value = $request->max_value;
        $job_base_salary->save();

        $job_update = Job::findOrFail($job_id);
        $job_update->job_base_salary_id = $job_base_salary->id;
        $job_update->update();
        $job_update->save();


        // flash()->success('Job type was successfully created');

        return redirect(action('JobController@index'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);

        $job_base_salary = JobBaseSalary::where('job_id', '=', $id)->first();

        $job->is_range = $job_base_salary->is_range;
        $job->value = $job_base_salary->value;
        $job->currency_id = $job_base_salary->currency_id;
        $job->salary_period_id = $job_base_salary->salary_period_id;
        $job->min_value = $job_base_salary->min_value;
        $job->max_value = $job_base_salary->max_value;

        $country_id = $job->country_id;
        $state_id = $job->state_id;

        return view('job.edit', compact('job', 'country_id', 'state_id'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'job_code' => 'required|unique:job,job_code,'.$id,
            'title' => 'required',
            'sub_title' => 'required',
            'last_date_to_submit' => 'required|date|date_format:Y-m-d',
            'description' => 'required',
            'job_category_id' => 'required',
            'job_type_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'total_vacancy' => 'required|numeric|min:1'
            ]);

        $job = Job::findOrFail($id);

        $job->update($request->all());

        // trim
        $slug = trim($request->title, '-');
        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '_', $slug);
        // lowercase
        $slug = strtolower($slug);
        $job->slug = $slug;

        $job->save();

        $job_base_salary = JobBaseSalary::where('job_id', '=', $id)->first();

        $job_base_salary->is_range = $request->is_range;
        $job_base_salary->value = $request->value;
        $job_base_salary->currency_id = $request->currency_id;
        $job_base_salary->salary_period_id = $request->salary_period_id;
        $job_base_salary->min_value = $request->min_value;
        $job_base_salary->max_value = $request->max_value;

        $job->update();
        $job->save();

        //  flash()->success('Entities details were successfully updated');

        return redirect(action('JobController@index'));
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);

        $job->status = 0;

        $job->update();

        $job->save();

        return back();
    }

}
