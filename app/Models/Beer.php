<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Beer extends Model
{
    use HasFactory;
    // use Searchable;


    public $guarded = [];

    // public function toSearchableArray()
    // {
    //     $array = [
    //         "id"=>$this->id,
    //         "name"=>$this->name,
    //     ];
    

    //     return $array;
    // }

    public function breweries(){
        return $this->belongsToMany(Brewery::class);
    }
}
