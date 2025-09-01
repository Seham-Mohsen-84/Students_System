<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
    ];
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

}
