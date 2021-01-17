<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Spatie\Image\Image;
use Illuminate\Http\Request;
use Spatie\Image\Manipulations;
use App\Http\Requests\StoreBreweries;

class BreweryController extends Controller
{
    public function store(StoreBreweries $request){

        $img = $request->file('img')->store('/temp/media');
        $fileName = basename($img);
        $srcPath = storage_path() . '/app/temp/media/' . $fileName;
        $destPath = storage_path() . '/app/public/media/' . $fileName;
        $imgPath = 'public/media/' . $fileName;
        $cropImg = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, 600, 600)->save($destPath);

        $brewery = Brewery::create([
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
}
