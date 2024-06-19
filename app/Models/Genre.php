<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;


    protected $table = 'genre';

    protected $primaryKey = 'genre_id';

    protected $fillable = [
        'genre_id',
        'genre',
    ];

    public function series() {
        return $this->hasMany(Serie::class, 'genre_id');
    }

}
