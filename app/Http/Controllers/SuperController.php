<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{

    function indexe(){
        $this->authorize('isAdmin');
        return view('admin.index');
    }
}
