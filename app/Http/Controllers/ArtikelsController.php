<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Factory;
use Illuminate\Support\Facades\Auth;



class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles)
    {
        $articles = Article::get();

        return view('artikel.index', ['articles'=>$articles]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($leverancier_id = null )
    {
        // $articles = Article::get();
        $factories = null;
        if(!$leverancier_id){
           $factories = Factory::get();

           // $factories = Factory::where('user_id', Auth::user()->id)->get();
        }

        return view('artikel.create', ['leverancier_id'=>$leverancier_id, 'factories'=>$factories]);
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
            $article = Article::create([
                'product' => $request->input('product'),
                'type' => $request->input('type'),
                'leverancier_id' => $request->input('leverancier_id'),
                'inkoopprijs' => $request->input('inkoopprijs'),
                'verkoopprijs' => $request->input('verkoopprijs'),
            ]);
            if($article){
                return redirect()->route('artikel.index', ['article'=> $article->id])
                ->with('article_vreated', 'Article has been created succesfully!');
            }
        // }
            // return back()->with('product_created', 'Article has been created succesfully!');
            
            // return back()->withInput()->with('errors', 'Error creating new article');
            // return back()->withInput()->wordwrap(str)ith('errors' , 'Error creating new article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id',$id)->first();

        return view('artikel.show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('artikel.edit', ['article'=>$article]);
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
        $article = Article::find($request->id);
        $article->product = $request->product;
        $article->type = $request->type;
        $article->inkoopprijs = $request->inkoopprijs;
        $article->verkoopprijs = $request->verkoopprijs;

        $article->save();
        
        return back()->with('article_updated', 'Article has been updated succesfully!');

        // if(Auth::check()){
        //     $productUpdate = Article::where('id', $article->id)
        //         ->update([
        //             'title' => $request->input('title'),
        //             'description' => $request->input('description'),
        //                 ]);

        //     if($productUpdate){
        //         return redirect()->route('articles.index',['article'=>$article->id])->with('succes', 'Article updated succesfully');
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
        Article::where('id',$id)->delete();

        return redirect()->route('artikel.index')->with('article_deleted', 'Article has been deleted successfully!');
        // return view()->with('product_deleted', 'Article has been deleted successfully!');
    }
}