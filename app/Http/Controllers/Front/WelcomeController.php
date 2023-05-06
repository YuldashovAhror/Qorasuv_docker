<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dowload;
use App\Models\Plan;

class WelcomeController extends Controller
{
    public function index()
    {
        $dowload = Dowload::find(1);
        $plans = Plan::all();
        return view('welcome', [
            'dowload'=>$dowload,
            'plans'=>$plans,
        ]);
    }
}

