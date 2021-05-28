<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sounds()
    {
        return $this->hasMany(LabeledSound::class, 'audio_file_id', 'id');
    }

    public function authors()
    {
        return $this->hasMany(LabeledAuthor::class, 'audio_file_id', 'id');
    }

    public function texts()
    {
        return $this->hasMany(LabeledText::class, 'audio_file_id', 'id');
    }
}
