<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'typed_word',
        'attempts',
        'status',
        'word_id',
        'user_id'
    ];

    public function word() {
        return $this->belongsTo(Word::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
