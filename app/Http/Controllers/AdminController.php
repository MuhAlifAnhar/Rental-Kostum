<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(
        private FileService $fileService,
    ) {
         // Admin dan Operator bisa mengakses `index` dan `show`
        $this->middleware('can:semuaRole', ['only' => ['index']]);

        // Operator bisa mengakses `create`, `edit`, `store`, `update`, dan `destroy`
        $this->middleware('can:isOperator', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
    }

    function indexe(){
        $this->authorize('isAdmin');
        return view('admin.index');
    }
}
