<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';

    protected $fillable = [
        'id_seller', 'id_customer', 'date', 'id_post', 'status'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'id_seller');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
