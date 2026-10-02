<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\deal;
use App\Models\User;
use App\Models\transaction;
use App\Models\logo;
use App\Models\wallet;

class DealController extends Controller
{
    public function create(){
        $asset = Auth::user()->wallet->asset;
        return view('user.deal.create', ['asset'=>$asset]);
    }
}
