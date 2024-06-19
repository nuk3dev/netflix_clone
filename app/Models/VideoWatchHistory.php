<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoWatchHistory extends Model
{
    use HasFactory;

    protected $table = 'video_watch_history';

    protected $fillable = [
        'user_id',
        'video_id',
        'serie_id',
        'started_at',
        'ended_at',
        'playback_position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Aflevering::class);
    }
    public function serie() {
        return $this->belongsTo(Serie::class, 'serie_id', 'serie_id');
    }

    public function aflevering() {
        return $this->belongsTo(Aflevering::class, 'video_id', 'aflevering_id');
    }

}
