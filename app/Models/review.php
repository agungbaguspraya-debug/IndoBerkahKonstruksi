<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = [
        'user_id',
        'message',
        'is_approved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
