<?php

namespace App\Http\Controllers;

use Auth;
use App\HiringOrganization;
use Illuminate\Http\Request;

class HiringOrganizationController extends Controller
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
        $hiring_organization_list = HiringOrganization::where('status', 1)->get();
        $count = $hiring_organization_list->count();

        return view('hiring_organization.index', compact('hiring_organization_list', 'count'));
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
        return view('hiring_organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
        $this->validate($request, ['name' => 'unique:hiring_organization,name']);

        $hiring_organization = new HiringOrganization($request->all());

        if (isset($request->logo) && !empty($request->logo)) {
            $file = $request->file('logo');
            $hiring_organization->logo = preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $filename = preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $filepath = "/assets/data_store/company_logo/";
            // \Utilities::uploadFileDocument($request, $filename, 'logo', $filepath);
            if ($request->hasFile('logo')) {

                $file = $request->file('logo');
    
                if ($file->isValid()) {
                    $destinationPath = public_path($filepath);
    
                    $file->move($destinationPath, $filename);
                }
            }
        }

        $hiring_organization->save();

        // flash()->success('Job type was successfully created');

        return redirect(action('HiringOrganizationController@index'));
    }

    public function edit($id)
    {
        $hiring_organization = HiringOrganization::findOrFail($id);

        return view('hiring_organization.edit', compact('hiring_organization'));
    }

    public function update($id, Request $request)
    {
        $hiring_organization = HiringOrganization::findOrFail($id);

        $hiring_organization->update($request->all());

        $hiring_organization->save();
        //  flash()->success('Entities details were successfully updated');

        return redirect(action('HiringOrganizationController@index'));
    }

    public function delete($id)
    {
        $hiring_organization = HiringOrganization::findOrFail($id);

        $hiring_organization->status = 0;

        $hiring_organization->update();

        $hiring_organization->save();

        return back();
    }
}
