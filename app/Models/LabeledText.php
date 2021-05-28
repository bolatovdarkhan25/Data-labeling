<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabeledText extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'author',
        'text',
        'audio_file_id'
    ];

    public function audioFile()
    {
        return $this->belongsTo(AudioFile::class, 'audio_file_id', 'id');
    }
}
