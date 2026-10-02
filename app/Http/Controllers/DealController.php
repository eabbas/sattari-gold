<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\deal;
use App\Models\User;
use App\Models\transaction;
use App\Models\logo;
use App\Models\wallet;

class DealController extends Controller
{
    public function create(){
        return view('user.deal.create');
    }
}
