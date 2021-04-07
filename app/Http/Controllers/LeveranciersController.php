<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factory;

class LeveranciersController extends Controller
{
    public function index(Factory $factories)
    {
        $factories = Factory::get();

        return view('leverancier.index', ['factories'=>$factories]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $factories = Factory::get();

        return view('leverancier.create');
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
            $foctory = Factory::create([
                'leverancier' => $request->input('leverancier'),
                'telefoon' => $request->input('telefoon')
            ]);
            if($foctory){
                return redirect()->route('leverancier.index', ['foctory'=> $foctory->id])
                ->with('factory_created', 'Factory has been created succesfully!');
            }
        // }
            // return back()->with('product_created', 'Factory has been created succesfully!');
            
            // return back()->withInput()->with('errors', 'Error creating new foctory');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new foctory');
    }

    public function show($id)
    {
        $factory = Factory::where('id',$id)->first();

        return view('leverancier.show', ['factory'=>$factory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factory = Factory::find($id);

        return view('leverancier.edit', ['factory'=>$factory]);
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
        $factory = Factory::find($request->id);
        $factory->leverancier = $request->leverancier;
        $factory->telefoon = $request->telefoon;
        $factory->save();
        
        return back()->with('factory_updated', 'Factory has been updated succesfully!');

        // if(Auth::check()){
        //     $productUpdate = Factory::where('id', $factory->id)
        //         ->update([
        //             'title' => $request->input('title'),
        //             'description' => $request->input('description'),
        //                 ]);

        //     if($productUpdate){
        //         return redirect()->route('factories.index',['factory'=>$factory->id])->with('succes', 'Factory updated succesfully');
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
        Factory::where('id',$id)->delete();

        return redirect()->route('leverancier.index')->with('factory_deleted', 'Factory has been deleted successfully!');
        // return view()->with('factory_deleted', 'Factory has been deleted successfully!');
    }
}