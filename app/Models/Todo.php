<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'task_details',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
