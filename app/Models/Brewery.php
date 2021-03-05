<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Brewery extends Model
{
    use HasFactory;
    // use Searchable;

    protected $fillable = ['name', 'description', 'img', 'lat', 'lon', 'address'];

    // public function toSearchableArray()
    // {
    //     $b = $this->beers->pluck('name')->join(', ');
    //     $array = [
    //         "id"=>$this->id,
    //         "name"=>$this->name,
    //         "description"=>$this->description,
    //         "address"=>$this->address,
    //         "altro"=>"birrerie birra",
    //         'beers'=>$b,
    //     ];
    

    //     return $array;
    // }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function beers(){
        return $this->belongsToMany(Beer::class);
    }
}
