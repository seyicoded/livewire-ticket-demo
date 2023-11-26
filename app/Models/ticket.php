<?php

namespace App\Models;

use App\Models\comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function comments (){
        return $this->hasMany(comments::class)->orderBy('id', 'desc')->get();
    }
}
