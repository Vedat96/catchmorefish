<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Article;
use App\Models\Location;
use DB;


class VoorraadsController extends Controller
{
    public function index(Store $rows)
    {
        

		$rows = DB::table('voorraad')
				->join('artikel', 'artikel.id', '=', 'voorraad.artikel_id')
				->join('locatie', 'locatie.id', '=', 'voorraad.locatie_id')
				->select('artikel.product', 'voorraad.aantal', 'locatie.locatie')
				->get();
		$stores = Store::get();

        return view('voorraad.index', ['rows'=>$rows, 'stores'=>$stores]);
        
    }

    public function create($artikel_id = null, $locatie_id = null )
    {
        // $stores = Store::get();
        $articles = null;
        if(!$artikel_id){
           $articles = Article::get();

           // $factories = Factory::where('user_id', Auth::user()->id)->get();
        }
        $locations = null;
        if(!$locatie_id){
           $locations = Location::get();

           // $factories = Factory::where('user_id', Auth::user()->id)->get();
        }

        return view('voorraad.create', ['artikel_id'=>$artikel_id, 'articles'=>$articles, 'locatie_id'=>$locatie_id, 'locations'=>$locations]);
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
            $stores = Store::create([
                'aantal' => $request->input('aantal'),
                'artikel_id' => $request->input('artikel_id'),
                'locatie_id' => $request->input('locatie_id'),
    
            ]);
            if($stores){
                return redirect()->route('voorraad.index', ['stores'=> $stores->id])
                ->with('store_created', 'Store has been created succesfully!');
            }
        // }
            // return back()->with('product_created', 'Store has been created succesfully!');
            
            // return back()->withInput()->with('errors', 'Error creating new store');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new store');
    }
     public function edit($id, $artikel_id = null, $locatie_id = null )
    {
    	$articles = null;
        if(!$artikel_id){
           $articles = Article::get();
        }

        $locations = null;
        if(!$locatie_id){
           $locations = Location::get();
       }
       $store = Store::find($id);

        return view('voorraad.edit', ['store'=>$store, 'artikel_id'=>$artikel_id, 'articles'=>$articles, 'locatie_id'=>$locatie_id, 'locations'=>$locations]);
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
        $store = Store::find($request->id);
        $store->locatie_id = $request->locatie_id;
        $store->artikel_id = $request->artikel_id;
        $store->aantal = $request->aantal;
        $store->save();
        
        return back()->with('store_updated', 'Store has been updated succesfully!');

        // if(Auth::check()){
        //     $productUpdate = Store::where('id', $store->id)
        //         ->update([
        //             'title' => $request->input('title'),
        //             'description' => $request->input('description'),
        //                 ]);

        //     if($productUpdate){
        //         return redirect()->route('stores.index',['store'=>$store->id])->with('succes', 'Store updated succesfully');
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
        Store::where('id',$id)->delete();

        return redirect()->route('medewerkers.index')->with('store_deleted', 'Store has been deleted successfully!');
        // return view()->with('product_deleted', 'Store has been deleted successfully!');
    }
}