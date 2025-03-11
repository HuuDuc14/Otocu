<?php

namespace App\Http\Controllers;

use App\Models\BrandCar;
use App\Models\DesignCar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manage() {
        $carBrands = BrandCar::orderBy('created_at', 'desc')
        ->withCount(['posts as count_posts' => function ($query) {
            $query->where('status', 'đã duyệt'); 
        }])
        ->get();


        $designs = DesignCar::orderBy('created_at', 'desc')
        ->withCount(['posts as count_posts' => function ($query) {
            $query->where('status', 'đã duyệt'); 
        }])
        ->get();

        return view('pages.admin.manage', compact('carBrands', 'designs'));
    }

    public function addDesign(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name_add' => 'required|string|max:255',           
        ], [
            'name_add.required' => 'Tên kiểu dáng không được bỏ trống.',
        ]);
    
        try {
            // Create the user
            DesignCar::create([
                'name_design_car' => $validated['name_add'],
            ]);
   
            // Redirect with a success message
            return redirect()->route('admin.manage')->with('success', 'Kiểu dáng được tạo thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo Kiểu dáng. Vui lòng thử lại!');
        }
    }

    public function editDesign(Request $request, $id){
        $validated = $request->validate([
            'name_add' => 'required|string|max:255',
        ], [
            'name_add.required' => 'Tên kiểu dáng không được bỏ trống.',
        ]);
        try {
            $design = DesignCar::findOrFail($id);
   
            // Create the staff
            $design->update([
                'name_design_car' => $validated['name_add'],
            ]);
            // Redirect with a success message
            return redirect()->route('pages.admin.manage')->with('success', 'Kiểu dáng được cập nhật thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi sửa kiểu dáng. Vui lòng thử lại!');
        }
    }

    public function addBrandCar(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name_add' => 'required|string|max:255',           
        ], [
            'name_add.required' => 'Tên hãng không được bỏ trống.',
        ]);
        
        // dd($validated['name_add']);
        try {
            // Create the user
            BrandCar::create([
                'name_car_brand' => $validated['name_add'],
                'logo' => ''
            ]);
   
            // Redirect with a success message
            return redirect()->route('admin.manage')->with('success', 'Kiểu dáng được tạo thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo Kiểu dáng. Vui lòng thử lại!');
        }
    }

    public function editBrand(Request $request, $id){
        $validated = $request->validate([
            'name_add' => 'required|string|max:255',
        ], [
            'name_add.required' => 'Tên kiểu dáng không được bỏ trống.',
        ]);
        try {
            $brand = BrandCar::findOrFail($id);
   
            // Create the staff
            $brand->update([
                'name_car_brand' => $validated['name_add'],
            ]);
            // Redirect with a success message
            return redirect()->route('pages.admin.manage')->with('success', 'Kiểu dáng được cập nhật thành công!');
        } catch (\Exception $e) {
            // Redirect with an error message if something goes wrong
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi sửa kiểu dáng. Vui lòng thử lại!');
        }
    }
}
