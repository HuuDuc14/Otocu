<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Province;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'title', 'car_brand', 'design_car', 'fuel_type', 'gearbox', 'url_picture',
        'price', 'year', 'mileage', 'mau_xe', 'number_seats', 'status', 'id_design_car', 
        'id_user', 'id_car_brand', 'province_id', 'district_id'
    ];

    public function carBrand()
    {
        return $this->belongsTo(BrandCar::class, 'id_car_brand');
    }

    // Quan hệ với bảng DesignCar
    public function designCar()
    {
        return $this->belongsTo(DesignCar::class, 'id_design_car');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
