<?php

namespace App\Http\Controllers;

use App\Models\BrandCar;
use App\Models\Post;
use Illuminate\Http\Request;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Province;

class CarController extends Controller
{
    public function showPostsCar(Request $request) {
        $query = Post::with(['carBrand', 'designCar', 'province', 'district', 'user'])
            ->where('status', 'đã duyệt')
            ->orderBy('created_at', 'desc');

        $provinces = Province::all();
        $districts = District::all();
        $brand_cars = BrandCar::all();

        if ($request->has('province_id') && !empty($request->province_id)) {
            $query->where('province_id', $request->province_id);
        }

        if ($request->has('district_id') && !empty($request->district_id)) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->has('car_brand') && !empty($request->car_brand)) {
            $query->where('id_car_brand', $request->car_brand);
        }

        if ($request->has('min_price') || $request->has('max_price')) {
            $minPrice = $request->input('min_price', 300000000); // Giá trị mặc định nếu không nhập
            $maxPrice = $request->input('max_price', 3000000000);
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }        

        $cars = $query->get();

        return view('pages.user.cars', compact('cars', 'provinces', 'districts', 'brand_cars'));
    }

    public function detailCar($id) {
        // dd($id);
        $car = Post::findOrFail($id);

        return view('pages.user.detailCar')->with('car', $car);
    }
}
