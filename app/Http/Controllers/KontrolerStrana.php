<?php
/**
 * Created by PhpStorm.
 * User: Uros i Vesko
 * Date: 6/28/2015
 * Time: 4:32 PM
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class KontrolerStrana extends BaseController{

    public function about(){
       /**
        // prvi nacin
        $ime = 'Uroš <span style="color: red">Gogić</span>';
        return view('strane.about')->with([
           'ime'=>'Uros',
            'prezime'=>'Gogic'
        ]);

        //drugi nacin
        $niz = [];
        $niz['ime'] = 'Uross';
        $niz['prezime'] = 'GGogic';
        return view('strane.about', $niz);
        */
        //treci nacin
        $ime = 'Uroš';
        $prezime = 'Gogić';
        //return view('strane.about', compact('ime','prezime'));

        $ljudi = [
            'Marko Markovic','Janko Jankovic','Ivan Ivanovic'
        ];
        return view('strane.about', compact('ime','ljudi','prezime'));
    }
    public function kontakt(){
        return view('strane.kontakt');
    }
}