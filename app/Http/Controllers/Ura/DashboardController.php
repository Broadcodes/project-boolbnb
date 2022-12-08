<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class DashboardController extends Controller
{
    public function index() {

        $id = Auth::id();
        $user = Auth::user(); // restituisce un array contentente le info dell'utente loggato

        $onBoolBnb = $user->created_at->toDateString();

        return view('ura.dashboard', compact('id', 'user', 'onBoolBnb'));
    }
}
