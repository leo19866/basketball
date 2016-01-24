<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Court;
use App\Http\Requests;
use App\Http\Requests\CreateCourtRequest;
use App\Http\Controllers\Controller;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = Court::all();


        return view('courts.listing',compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourtRequest $request)
    {

        $input = $request->all();

        Court::create($input);

        return redirect('courts');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $court = Court::findOrFail($id);

        return view('courts.show',compact('court'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $court = Court::findOrFail($id);

        return view('courts.edit',compact('court'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCourtRequest $request, $id)
    {
        

        $input = $request->all();

        $court = Court::findOrFail($id);

        $court->update($input);




        //return redirect('courts');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
