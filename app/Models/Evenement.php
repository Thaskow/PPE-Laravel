<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }
}
