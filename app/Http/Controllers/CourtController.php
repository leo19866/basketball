<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Court;
use App\Discussion;
use App\Http\Requests;
use App\Http\Requests\CreateCourtRequest;
use App\Http\Controllers\Controller;

class CourtController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth', ['except' => 'show']);

       parent::__construct();

    }


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


        \Auth::user()->courts()->create($request->all());

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

    public function AddDiscussion(Request $request, $id)
    {
         
         $court = Court::findOrFail($id);

         $court->discussions()->create($request->all());

         return redirect('courts');

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
        
        
        if (!$court->ownedBy($this->user)) {
          
          return $this->unauthorized($request);

        }

        $court->update($input);
        //return redirect('courts');  
        
    }

    public function unauthorized(CreateCourtRequest $request)
    {
        if($request->ajax())
        {
             return response(['message' =>'No way'], 403);
        }
            
          //flash('No way. ');  

          return redirect('/');

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
