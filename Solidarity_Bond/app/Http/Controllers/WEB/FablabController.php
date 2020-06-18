<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use const http\Client\Curl\Features\HTTP2;

class FablabController extends Controller
{
    public function commandes(){
        return view('fablab.fablab');
    }
}
