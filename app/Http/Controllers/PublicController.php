<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index() {

        $breweries= Brewery::where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('homepage', compact('breweries'));
    }

    public function search(Request $request){
        $q = $request->input('q');
        $breweries = Brewery::search($q)->paginate(10);

        return view('result', compact('breweries', 'q'));
    }

    public function breweries() {
        $user = Auth::user();
        if($user && $user->role == 'admin'){

            $breweries= Brewery::orderBy('created_at', 'desc')->paginate(10);
        }else{

            $breweries= Brewery::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        }
        

        return view('breweries', compact('breweries'));
    }

    public function show($id){

        $user = Auth::user();

        $beers = Beer::all();

        $brewery = Brewery::find($id);

        $comments = Comment::where('brewery_id',$id)->orderBy('created_at','desc')->get();

        return view('show', compact('brewery', 'comments', 'user', 'beers'));
    }

    public function contact(){

        return view('contact');

    }
}
