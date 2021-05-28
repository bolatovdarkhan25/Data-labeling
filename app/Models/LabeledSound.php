<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabeledSound extends Model
{
    use HasFactory;

    protected $fillable = [
       'start',
       'end',
       'sound',
       'audio_file_id'
    ];

    public function audioFile()
    {
        return $this->belongsTo(AudioFile::class, 'audio_file_id', 'id');
    }
}
