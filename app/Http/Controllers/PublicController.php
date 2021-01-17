<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index() {

        $breweries= Brewery::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();

        return view('homepage', compact('breweries'));
    }

    public function breweries() {
        $user = Auth::user();
        if($user && $user->role == 'admin'){

            $breweries= Brewery::orderBy('created_at', 'desc')->get();
        }else{

            $breweries= Brewery::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        }
        

        return view('breweries', compact('breweries'));
    }
}
