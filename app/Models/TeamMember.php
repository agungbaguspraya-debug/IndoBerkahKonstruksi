<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'foto', 'profil_singkat', 'email', 'telepon', 'alamat', 'posisi', 'is_visible', 'status', 'start_date', 'rejection_reason'];
    
    protected $casts = [
        'is_visible' => 'boolean',
        'start_date' => 'date',
    ];
}
