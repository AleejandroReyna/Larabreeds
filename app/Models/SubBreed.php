<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Breed;

class SubBreed extends Model
{
    use HasFactory;

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
