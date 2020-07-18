<?php

namespace App\Http\Controllers;

use Auth;
use App\SalaryPeriod;
use Illuminate\Http\Request;

class SalaryPeriodController extends Controller
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
        $salary_period_list = SalaryPeriod::where('status', 1)->get();
        $count = $salary_period_list->count();

        return view('salary_period.index', compact('salary_period_list', 'count'));
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
        return view('salary_period.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:salary_period,name']);

        $salary_period = new SalaryPeriod($request->all());

        $salary_period->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('SalaryPeriodController@index'));
    }

    public function edit($id)
    {
        $salary_period = SalaryPeriod::findOrFail($id);

        return view('salary_period.edit', compact('salary_period'));
    }

    public function update($id, Request $request)
    {
        $salary_period = SalaryPeriod::findOrFail($id);

        $salary_period->update($request->all());

        $salary_period->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('SalaryPeriodController@index'));
    }

    public function delete($id)
    {
        $salary_period = SalaryPeriod::findOrFail($id);

        $salary_period->status = 0;

        $salary_period->update();

        $salary_period->save();

        return back();
    }
}
