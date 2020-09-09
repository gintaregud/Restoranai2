<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('countries.index', ['countries' => Country::orderBy('title')->get()]);
    }
    public function create() {
        return view('countries.create');
    }
    public function store(Request $request) {
        $country = new Country();
     // can be used for seeing the insides of the incoming request
         // var_dump($request->all()); die();
        $country->fill($request->all());
        $country->save();
        return redirect()->route('country.index');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country){
        return view('countries.edit', ['country' => $country]);
    }
 
    public function update(Request $request, Country $country){
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index');
    }
 
     public function destroy(Country $country){
         $country->delete();
         return redirect()->route('country.index');
     }
 
}
