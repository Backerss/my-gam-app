<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function deduct()
    {
        return view('behavior.deduct');
    }
}