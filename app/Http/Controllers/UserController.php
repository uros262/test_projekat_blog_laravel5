<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        if(!Auth::check())
        {
            return redirect('/');
        }
        $users = User::all();
        $articles = Article::all();
        return view('auth.profil', compact('users','articles'));
    }
    public function show($id){

        if(!Auth::check())
        {
            return redirect('/');
        }
        $clanak = Article::findOrFail($id);
        $komentari = Comment::latest('created_at')->where('article_id','=',$id)->get();

        return view('auth.komentari', compact('clanak','komentari'));
    }
    public function prijavljeni(){

        if(!Auth::check())
        {
            return redirect('/');
        }

        $komentari = Comment::orderBy('flag','desc')->where('flag','>','0')->get();

        return view('auth.prijavljeni', compact('komentari'));
    }
    public function store(Request $request){

        if(!Auth::check())
        {
            return redirect('/');
        }

        $user = new User();
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->password = crypt($request->get('password'));


        if($user->save()) {

            $user = User::find($user->id);

            return view('auth.novi_korisnik', compact('user'));
        }
    }
    public function destroy(Request $request){
        $id = $request->get('id');
        User::destroy($id);
        // return Redirect::back();
    }
}
