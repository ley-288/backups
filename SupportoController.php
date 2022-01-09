<?php

namespace App\Http\Controllers\Supporto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportoController extends Controller {

    public function index() {
         return view('frontend.supporto');
    }

}