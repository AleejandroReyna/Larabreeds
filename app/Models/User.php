<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Breed;
use App\Models\UserFavoriteBreed;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function breeds() 
    {
        return $this->hasManyThrough(Breed::class, UserFavoriteBreed::class);
    }

    public function checkBreed(Breed $breed) {
        $query = UserFavoriteBreed::where([
            ["user_id", "=", $this->id],
            ["breed_id", "=",$breed->id]]
        );
        return $query->count();
    }

    public function addBreed(Breed $breed) {
        if($this->checkBreed($breed)) {
            return null;
        }
        UserFavoriteBreed::create([
            'user_id' => $this->id,
            'breed_id' => $breed->id
        ]);
        return true;
    }
}
