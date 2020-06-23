<?php

namespace App\Http\Controllers\Test;

use App\Mail\CommandeTerminee;
use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\Produit;
use App\Models\Role;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sandbox(Request $request){
        dd(Mail::to("clappebruno@gmail.com")->send((new CommandeTerminee())->build()));

        return view('test', compact('data'));

    }
}
