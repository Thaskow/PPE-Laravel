<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
    public function contenu()
    {
        return $this->belongsTo(Image::class);
    }
    
}
