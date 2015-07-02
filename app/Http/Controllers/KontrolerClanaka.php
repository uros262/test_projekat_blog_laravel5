<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\ClanakRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Request;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use DB;
use Carbon\Carbon;


class KontrolerClanaka extends Controller
{

    public function index(){

        $clanci = Article::latest()->published()->get();
        return view('clanak.index', compact('clanci'));
    }
    public function show($id){

        $clanak = Article::findOrFail($id);
        $komentari = Comment::latest('created_at')->where('article_id','=',$id)->get();

        return view('clanak.clanak', compact('clanak','komentari'));
    }
    public function create(){
        if(!Auth::check())
        {
            return redirect('/');
        }
        return view('clanak.napisi');
    }

    /**
     * @param ClanakRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ClanakRequest $request){

        $input = ['title'=>Request::get('title'),'body'=>Request::get('body'),'published_at'=>Request::get('published_at'),'user_id'=>Auth::id()];
        Article::create($input);
        Session::flash('flash_message','Uspjesno ste kreirali clanak');
        return redirect('clanak');
    }
    public function edit($id){

        if(!Auth::check())
        {
            return redirect('/');
        }
        $clanak = Article::findOrFail($id);
        return view('clanak.edit', compact('clanak'));
    }
    public function update($id, ClanakRequest $request){

        $clanak = Article::findOrFail($id);
        $clanak->update($request->all());
        Session::flash('flash_message','Uspjesno ste izmjenili clanak');
        return redirect('clanak');
    }
}
