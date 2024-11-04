<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function __construct() {
         // Admin dan Operator bisa mengakses `index` dan `show`
        $this->middleware('can:semuaRole', ['only' => ['indexe']]);
    }

    function indexe(){
        $this->authorize('semuaRole');
        return view('admin.index');
    }
}
