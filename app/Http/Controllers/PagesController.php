<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breed;

class PagesController extends Controller
{
    public function dashboard() 
    {
        $breeds = Breed::get();
        return view('dashboard', ['breeds' => $breeds]);
    }
}
