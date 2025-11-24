<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type',
        'from_date',
        'to_date',
        'reason',
        'status',
    ];

    // ADD THIS RELATIONSHIP
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
