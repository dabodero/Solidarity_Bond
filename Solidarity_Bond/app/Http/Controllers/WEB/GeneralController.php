<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function accueil(){
        return view('accueil');
    }

    public function a_propos(){
        return view('a-propos');
    }

    public function mentions(){
        return view('mentions');
    }

    public function contact(){
        return view('contact');
    }

    public function cgv(){
        return view('cgv');
    }

    public function partenaires(){
        return view('partenaires');
    }

}
