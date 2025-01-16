<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'ten_nguoi_dung',
        'email',
        'so_dien_thoai',
        'mat_khau',
    ];
}
