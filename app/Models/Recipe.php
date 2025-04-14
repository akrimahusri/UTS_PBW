<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // Menentukan kolom-kolom yang boleh diisi massal
    protected $fillable = [
        'user_id',   // ID pengguna yang memberikan review
        'recipe_id', // ID resep yang direview
        'rating',    // Rating yang diberikan
        'comment',   // Komentar dari pengguna (opsional)
    ];

    // Relasi ke User (setiap review dimiliki oleh satu User)
    public function user()
    {
        return $this->belongsTo(User::class); // Setiap review dimiliki oleh satu pengguna
    }

    // Relasi ke Recipe (setiap review dimiliki oleh satu Recipe)
    public function recipe()
    {
        return $this->belongsTo(Recipe::class); // Setiap review berhubungan dengan satu resep
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
