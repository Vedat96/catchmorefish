<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medewerker;


class MedewerkersController extends Controller
{
    // public function search(Request $request)
    // {
    //     $search = $request->get('search');
    //     $medewerkers = Medewerker::all()->where('name', 'like', '%',$search, '%');
        
    //     return view('search', [ 'medewerkers' => $medewerkers]); 
    // }

    public function index(Medewerker $medewerkers)
    {
        
        $medewerkers = Medewerker::all();

        return view('medewerkers.index', ['medewerkers'=>$medewerkers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     if(Auth::check()){
    //         if(Auth::medewerker()->role_id == 1){
        
    //             return view('medewerkers.create');
    //         }
    //         return view('auth.login');
    //     }
    //     return view('auth.login');

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $medewerkers = Location::get();

        return view('medewerkers.create');
    }

    public function store(Request $request)
    {
        
        if(Auth::check()){
            $medewerker = Medewerker::create([
                'voorletters' => $request->input('voorletters'),
                'voorvoegsels' => $request->input('voorvoegsels'),
                'achternaam' => $request->input('achternaam'),
                'naam' => $request->input('naam'),
                'admin_medewerker' => $request->input('admin_medewerker'),
                'gebruikersnaam' => $request->input('gebruikersnaam'),
                'password' => password_hash($request->input('password'),PASSWORD_BCRYPT)
            ]);
            if($medewerker){
                return redirect()->route('medewerkers.index', ['medewerker'=> $medewerker->id])
                ->with('article_vreated', 'Article has been created succesfully!');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new medewerker');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new medewerker');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medewerker  $medewerker
     * @return \Illuminate\Http\Response
     */
    // public function show(Medewerker $medewerker)
    // {
    //     $medewerker = Medewerker::find($medewerker->id );


        

    //     return view('medewerkers.show', [ 'medewerker' => $medewerker]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medewerker  $medewerker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $medewerker = Medewerker::find($medewerker->id );       
        $medewerker = Medewerker::find($id);

        
        return view('medewerkers.edit', [ 'medewerker' => $medewerker]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medewerker  $medewerker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$medewerker = Medewerker::find($request->id);
        $medewerker->voorletters = $request->voorletters;
        $medewerker->voorvoegsels = $request->voorvoegsels;
        $medewerker->achternaam = $request->achternaam;
        $medewerker->naam = $request->naam;
        $medewerker->admin_medewerker = $request->admin_medewerker;
        $medewerker->gebruikersnaam = $request->gebruikersnaam;
        $medewerker->password = password_hash($request->input('password'),PASSWORD_BCRYPT);

        $medewerker->save();
        
        return back()->with('medewerker_updated', 'Medewerker has been updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medewerker  $medewerker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medewerker::where('id',$id)->delete();

        return redirect()->route('artikel.index')->with('medewerker_deleted', 'Article has been deleted successfully!');
        // return view()->with('product_deleted', 'Article has been deleted successfully!');
    }
}