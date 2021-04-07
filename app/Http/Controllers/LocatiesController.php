<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocatiesController extends Controller
{
   public function index(Location $locations)
    {
        $locations = Location::get();

        return view('locatie.index', ['locations'=>$locations]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $locations = Location::get();

        return view('locatie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // if(Auth::check()){
            $location = Location::create([
                'locatie' => $request->input('locatie'),
            ]);
            if($location){
                return redirect()->route('locatie.index', ['location'=> $location->id])
                ->with('location_created', 'Location has been created succesfully!');
            }

    }

    public function show($id)
    {
        $location = Location::where('id',$id)->first();

        return view('locatie.show', ['location'=>$location]);
    }

     public function edit($id)
    {
        $location = Location::find($id);

        return view('locatie.edit', ['location'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $location = Location::find($request->id);
        $location->locatie = $request->locatie;

        $location->save();
        
        return back()->with('article_updated', 'Location has been updated succesfully!');

        // if(Auth::check()){
        //     $productUpdate = Location::where('id', $location->id)
        //         ->update([
        //             'title' => $request->input('title'),
        //             'description' => $request->input('description'),
        //                 ]);

        //     if($productUpdate){
        //         return redirect()->route('locations.index',['location'=>$location->id])->with('succes', 'Location updated succesfully');
        //     }
        //     //redirect
        //     return back()->withInput();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::where('id',$id)->delete();

        return redirect()->route('locatie.index')->with('article_deleted', 'Location has been deleted successfully!');
        // return view()->with('product_deleted', 'Location has been deleted successfully!');
    }
}
