<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aflevering extends Model
{
    use HasFactory;

    protected $table = 'aflevering';
    protected $primaryKey = 'aflevering_id';

    protected $fillable = [
        'seizoen_id',
        'rang',
        'aflevering_titel',
        'duur',
    ];

    public function seizoen() {
        return $this->belongsTo(Seizoen::class, 'seizoen_id', 'seizoen_id');
    }
}
