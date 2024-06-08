<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description', 'user_id'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
