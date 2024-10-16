<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view("user.index");
    }

    function kostum(){
        return view("user.kostum");
    }

    function kontak(){
        return view("user.kontak");
    }

    function syarat(){
        return view("user.syarat");
    }

    function login(){
        return view("user.login");
    }

    function registrasi(){
        return view("user.register");
    }
}
