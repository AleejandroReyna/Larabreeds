<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteBreed extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'breed_id'];
}
