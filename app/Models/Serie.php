<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'serie';

    protected $primaryKey = 'serie_id';

    protected $fillable = [
        'serie_id',
        'serie_titel',
        'image_name',
        'IMDB_Link',
        'genre_id',
        'actief',
        'deleted',
    ];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function seizoenen() {
        return $this->hasMany(Seizoen::class, 'serie_id', 'serie_id');
    }
}
