<?php

namespace App\Http\Controllers;

use Auth;
use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
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
        $currency_list = Currency::where('status', 1)->get();
        $count = $currency_list->count();

        return view('currency.index', compact('currency_list', 'count'));
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
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:currency,name']);

        $currency = new Currency($request->all());

        $currency->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('CurrencyController@index'));
    }

    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('currency.edit', compact('currency'));
    }

    public function update($id, Request $request)
    {
        $currency = Currency::findOrFail($id);

        $currency->update($request->all());

        $currency->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('CurrencyController@index'));
    }

    public function delete($id)
    {
        $currency = Currency::findOrFail($id);

        $currency->status = 0;

        $currency->update();

        $currency->save();

        return back();
    }
}
