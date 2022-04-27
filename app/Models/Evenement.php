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
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(["user_id", "evenement_id","isDon","datePassage","isPrimoDonneur","isMoelle"]);
    }
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class)->withPivot(["promotion_id", "evenement_id","pourcentage","nbParticipant"]);
    }
}
