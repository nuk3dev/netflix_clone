<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seizoen extends Model
{
    use HasFactory;

    protected $table = 'seizoen';
    protected $primaryKey = 'seizoen_id';

    protected $fillable = [
        'serie_id',
        'rang',
        'jaar',
        'IMDBRating',
    ];
    public function serie() {
        return $this->belongsTo(Serie::class, 'serie_id', 'serie_id');
    }

    public function afleveringen() {
        return $this->hasMany(Aflevering::class, 'seizoen_id', 'seizoen_id');
    }
}
