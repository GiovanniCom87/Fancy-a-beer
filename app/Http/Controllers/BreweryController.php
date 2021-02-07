<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use App\Models\Comment;
use Spatie\Image\Image;
use Illuminate\Http\Request;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBreweries;
use App\Http\Requests\StoreComments;

class BreweryController extends Controller
{
    public function store(StoreBreweries $request){

        $img = $request->file('img')->store('/temp/media');
        $fileName = basename($img);
        $srcPath = storage_path() . '/app/temp/media/' . $fileName;
        $destPath = storage_path() . '/app/public/media/' . $fileName;
        $imgPath = 'public/media/' . $fileName;
        $cropImg = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, 600, 600)->save($destPath);

        $b = Brewery::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $imgPath,
            'lat' => $request->lat,
            'lon' => $request->lon,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('message', 'La birreria è stata segnalata correttamente');
    }

    public function approve($id){
        $brewery = Brewery::find($id);

        $brewery->is_accepted = true;

        $brewery->save();

        return redirect()->back()->with('message', 'La birreria è stata approvata');
    }

    public function storeComment(StoreComments $request, $id){

        $user = Auth::user();
        $brewery = Brewery::find($id);
        $comment = Comment::create([
            'user_id' => $user->id,
            'brewery_id' => $brewery->id,
            'comment'=> $request->comment
        ]);

        $comment->save();
        
        return redirect()->back()->with('message', 'Il commento è stato aggiunto');
    }

    public function beersSync($id, Request $request){

        $beer_ids = $request->input('beer_ids');
        $brewery = Brewery::find($id);
        $brewery->beers()->sync($beer_ids);
        
        return redirect()->back();
    
       } 
}
