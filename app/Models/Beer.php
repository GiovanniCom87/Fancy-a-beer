<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Beer extends Model
{
    use HasFactory;


    public $guarded = [];


    public function breweries(){
        return $this->belongsToMany(Brewery::class);
    }
}
