<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index() {
        return view('page', [
            'name' => 'Karīna',
        ]);
    }
}
