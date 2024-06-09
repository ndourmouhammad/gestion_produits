<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    protected $fillable = ['reference','designation',
    'prix_unitaire','image','etat','categorie_id','user_id'];

    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}
