<?php

namespace App\Http\Controllers\WEB;

use App\Models\Liker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    private const nom_dossier = 'general.';

    public function accueil(){
        return view(self::nom_dossier.'accueil');
    }

    public function a_propos(){
        return view(self::nom_dossier.'a-propos');
    }

    public function mentions(){
        return view(self::nom_dossier.'mentions-legales');
    }

    public function contact(){
        return view(self::nom_dossier.'contact');
    }

    public function cgv(){
        return view(self::nom_dossier.'cgv');
    }

}
