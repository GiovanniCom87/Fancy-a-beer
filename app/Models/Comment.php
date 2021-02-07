<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brewery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id', 'brewery_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function brewery(){
        return $this->belongsTo(Brewery::class);
    }
}
