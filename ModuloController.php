<?php

namespace App\Http\Controllers\Frontend\Modulo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuloController extends Controller {

    public function index() {
         return view('frontend.modulo');
    }

}