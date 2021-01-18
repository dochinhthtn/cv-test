<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table = 'cvs';

    protected $casts = [
        'content' => 'array'
    ];

    protected $fillable = ['name', 'file', 'image', 'content', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
