<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $Dashboards = Dashboard::paginate('5');
        return view('dashboard', compact('Dashboards'));
    }

    public function __invoke()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $emps = new Dashboard;

        $emps->name = $request->input('name');
        $emps->description = $request->input('description');
        $emps->unit = $request->input('unit');
        $emps->category = $request->input('category');
        $emps->price = $request->input('price');
        $emps->status = $request->input('status');

        $emps->save();

        return redirect('/dashboard')->with('success', 'Data Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Dashboards = Dashboard::find($id);
        
        return view('dashboard.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $Dashboards = Dashboard::find($id);

        $Dashboards->name = $request->name;
        $Dashboards->description = $request->description;
        $Dashboards->unit = $request->unit;
        $Dashboards->category = $request->category;
        $Dashboards->price = $request->price;
        $Dashboards->status = $request->status;

        $Dashboards->save();

        return redirect('/dashboard')->with('success', 'Data Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $Dashboards = Dashboard::find($id);

        $Dashboards->delete();

        return redirect('/dashboard')->with('success', 'Data Delete');
    }
}
