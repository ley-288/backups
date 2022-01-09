<?php

namespace App\Http\Controllers\Suggerimenti;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggerimentiController extends Controller {

    public function index() {
         return view('frontend.suggerimenti');
    }

}