<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubBreed;

class Breed extends Model
{
    use HasFactory;

    public function subBreeds()
    {
        return $this->hasMany(SubBreed::class);
    }
}
