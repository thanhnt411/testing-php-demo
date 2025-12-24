<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'status' => \App\Casts\TaskStatusCast::class
        ];
    }
}
