<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\KomentarRequest;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class KontrolerKomentara extends Controller
{
    public function show($id){

        //anti bot
        $broj1 = mt_rand(1,5);
        $broj2 = mt_rand(1,5);
        $sabirak1 = '';
        $sabirak2 = '';
        switch ($broj1) {
            case 1:
                $sabirak1 = 'jedan';
        break;
            case 2:
                $sabirak1 = 'dva';
        break;
            case 3:
                $sabirak1 = 'tri';
        break;
            case 4:
                $sabirak1 = 'cetiri';
        break;
            case 5:
                $sabirak1 = 'pet';
        }
        switch ($broj2) {
            case 1:
                $sabirak2 = 'jedan';
                break;
            case 2:
                $sabirak2 = 'dva';
                break;
            case 3:
                $sabirak2 = 'tri';
                break;
            case 4:
                $sabirak2 = 'cetiri';
                break;
            case 5:
                $sabirak2 = 'pet';
        }

        $rezultat = $broj1 + $broj2;


        $clanak = Article::findOrFail($id);
        $komentari = Comment::where('article_id','=',$clanak->id)->where('parent_id','=','0')->get();


        return view('clanak.komentar', compact('clanak','komentari','sabirak1','sabirak2','rezultat'));
    }


    public function store(KomentarRequest $request){

        $anti = $request->get('anti');
        $s = 0;
        switch ($anti) {
            case 'null':
                $s = 0;
                break;
            case 'jedan':
                $s = 1;
                break;
            case 'dva':
                $s = 2;
                break;
            case 'tri':
                $s = 3;
                break;
            case 'cetiri':
                $s = 4;
                break;
            case 'pet':
                $s = 5;
                break;
            case 'sest':
                $s = 6;
                break;
            case 'sedam':
                $s = 7;
                break;
            case 'osam':
                $s = 8;
                break;
            case 'devet':
                $s = 9;
                break;
            case 'deset':
                $s = 10;
        }
        $rez = $request->get('rezultat');
        if($rez == $s)
        {
            $komentar = new Comment();
            $komentar->article_id = $request->get('id');
            $komentar->name = $request->get('name');
            $komentar->body = $request->get('body');
            $komentar->parent_id = $request->get('parent_id');
            $komentar->level = $request->get('level') + 1;
           // $komentar->save();

            if($komentar->save()) {

                $komentar = Comment::find($komentar->id);//Response::json(array('success' => true, 'last_insert_id' => $komentar->id), 200));
                //dd($komentar);
                $clanak = $komentar->article_id;

                //===========================generisanje antibota========================
                //anti bot
                $broj1 = mt_rand(1,5);
                $broj2 = mt_rand(1,5);
                $sabirak1 = '';
                $sabirak2 = '';
                switch ($broj1) {
                    case 1:
                        $sabirak1 = 'jedan';
                        break;
                    case 2:
                        $sabirak1 = 'dva';
                        break;
                    case 3:
                        $sabirak1 = 'tri';
                        break;
                    case 4:
                        $sabirak1 = 'cetiri';
                        break;
                    case 5:
                        $sabirak1 = 'pet';
                }
                switch ($broj2) {
                    case 1:
                        $sabirak2 = 'jedan';
                        break;
                    case 2:
                        $sabirak2 = 'dva';
                        break;
                    case 3:
                        $sabirak2 = 'tri';
                        break;
                    case 4:
                        $sabirak2 = 'cetiri';
                        break;
                    case 5:
                        $sabirak2 = 'pet';
                }

                $rezultat = $broj1 + $broj2;
                //===========================generisanje antibota========================

                return view('clanak.prokomentarisi', compact('komentar','clanak','sabirak1','sabirak2','rezultat'));
            }
            else
            {
                Session::flash('flash_message','Neuspjesno objavljivanje komentara');
            }
        }
        else
        {
            //Session::flash('flash_message','Pogresan odgovor na anti bot pitanje ');
        }

        return redirect('komentar/'.$id);



    }

    public function plus(Request $request){

        //dd('bidon');

        $id = $request->get('podatak');
        $komentar = Comment::find($id);

        $komentar->plus = $komentar->plus + 1;
        $plus = $komentar->plus;
        //$komentar->update($komentar->plus);
        DB::update('update comments set plus = ? where id = ?', [ $plus, $id]);

        return view('clanak.plus', compact('plus'));
    }

    public function minus(Request $request){

        $id = $request->get('podatak');
        $komentar = Comment::find($id);

        $komentar->minus = $komentar->minus + 1;
        $minus = $komentar->minus;
       // $komentar->update($komentar->minus);
        DB::update('update comments set minus = ? where id = ?', [ $minus, $id]);

        return view('clanak.minus', compact('minus'));
    }

    public function destroy(Request $request){
        $id = $request->get('id');
        Comment::destroy($id);
        // return Redirect::back();
    }

    public function prijavi(Request $request){
        $id = $request->get('id');
        $komentar = Comment::find($id);

        $flag = $komentar->flag + 1;
        DB::update('update comments set flag = ? where id = ?', [ $flag, $id]);
    }
}
