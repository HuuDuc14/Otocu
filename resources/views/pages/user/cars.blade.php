@extends('app')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Cars</h1>
                <div class="d-flex justify-content-end">
                    <a href="{{route('post.create')}}" class="create-button">
                        <i class="arr-2  fas fa-arrow-right"> </i>
                        <span class="text">Đăng bài</span>
                        <span class="circle"></span>
                        <i class="arr-1  fas fa-arrow-right"> </i>
                    </a>
                </div>
            </div>
            <div class="row">               
                <div class="col-lg-3">
                    <div class="card-sl">
                        <div class="card-body">
                            <h4 class=" text-center mb-4">Bộ lọc</h4>
                            <hr>
                            <form action="{{ route('cars')}}" method="get">
                                <div class="">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <div class="form-group formField">
                                                <span class="status">Địa điểm bán</span>
                                                <i class="fas fa-angle-down icon"></i>
                                                <select name="province_id" id="province" class="form-control select">
                                                    <option value="">--Chọn tỉnh/ thành phố--</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}" {{ request('province_id') == $province->id ? 'selected' : '' }}>
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="form-group mb-3 formField">
                                                <i class="fas fa-angle-down icon"></i>
                                                <select name="district_id" id="district" class="form-control select"
                                                    disabled>
                                                    <option value="">Chọn Quận/ Huyện</option>
                                                    <!-- Quận sẽ được tải qua AJAX -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="form-group mb-3 formField">
                                                <span class="status">Hãng xe</span>
                                                <i class="fas fa-angle-down icon"></i>
                                                <select name="car_brand" id="car_brand" class="form-control select">
                                                    <option value="">--Chọn hãng xe--</option>
                                                    @foreach ($brand_cars as $brand_car)
                                                        <option value="{{ $brand_car->id }}" {{ request('car_brand') == $brand_car->id ? 'selected' : '' }}>
                                                            {{ $brand_car->name_car_brand }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="form-group">
                                                <span class="status font-16 font-weight-medium text-dark">Khoảng giá</span>
                                                <div class="font-14 font-weight-medium mt-2">
                                                    <span class="text-danger" id="min_price_value">
                                                        {{ request('min_price', 300000000) }}
                                                    </span> <i class=" fas fa-arrows-alt-h"></i>
                                                    <span class="text-danger" id="max_price_value">
                                                        {{ request('max_price', 3000000000) }}
                                                    </span>
                                                </div>

                                                <div class="range-2-slider mt-2">
                                                    <input class="range1" type="range" min="300000000" max="1000000000"
                                                        step="100000000" name="min_price" id="min_price_range"
                                                        value="{{ request('min_price', 300000000) }}">

                                                    <input class="range2" type="range" min="1000000000" max="3000000000"
                                                        step="100000000" name="max_price" id="max_price_range"
                                                        value="{{ request('max_price', 3000000000) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions mt-4">
                                    <div class="text-end">
                                        <a href="{{route('cars')}}" class="btn btn-info shadow-sm mt-2">Reset</a>
                                        <button type="submit" class="btn btn-dark shadow-sm mt-2">Lọc</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    @if ($cars->isNotEmpty())
                        <div class="row">
                            @foreach ($cars as $car)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <div class="shadow">
                                        <div class="card-sl">
                                            <div class="card-image">
                                                <a href="{{ route('cars.detail', $car->id)}}"><img
                                                        src="{{ asset('storage/' . $car->url_picture) }}" alt="Image"
                                                        width="100%"></a>
                                            </div>
                                            <a class="card-action" href="{{route('save', $car->id)}}"><i
                                                    class="far fa-save"></i></a>
                                                                                                      
                                            <div class="card-heading">
                                                {{$car->carBrand->name_car_brand ?? 'N/A' }} | {{$car->title}}
                                            </div>
                                            <div class="card-text text-danger">
                                                đ {{number_format($car->price, 0, ',', '.')}}
                                            </div>
                                            <div class="card-text">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="d-flex align-items-center">
                                                            <i class=" icon-calender"></i>
                                                            <p class="my-0 mx-2">{{$car->year}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-road"></i>
                                                            <p class="my-0 mx-2">{{$car->mileage}} km</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-sm-12">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <p class="my-0 mx-2">{{$car->district->name ?? 'N/A'}},
                                                                {{$car->province->name ?? 'N/A'}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 d-flex justify-content-center">
                                                    <a href="{{ route('cars.detail', $car->id)}}"
                                                        class="btn btn-primary shadow-sm w-100">Chi
                                                        tiết</a>
                                                </div>
                                                <div class="col-sm-6 d-flex justify-content-center">
                                                    <a href="https://zalo.me/{{ $car->user->phone_number }}" target="_blank"
                                                        class="btn btn-success shadow-sm w-100">Liên hệ</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <h2 class="text-center">Không tìm thấy bài đăng nào</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        {{-- Xóa thông báo sau khi hiển thị (Chỉ để hiển thị 1 lần) --}}
        {{ session()->forget('success') }}
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let minPriceInput = document.getElementById("min_price_range");
            let maxPriceInput = document.getElementById("max_price_range");
            let minPriceValue = document.getElementById("min_price_value");
            let maxPriceValue = document.getElementById("max_price_value");

            function updatePriceDisplay() {
                minPriceValue.textContent = new Intl.NumberFormat('vi-VN').format(minPriceInput.value);
                maxPriceValue.textContent = new Intl.NumberFormat('vi-VN').format(maxPriceInput.value);
            }

            // Cập nhật khi giá trị thay đổi
            minPriceInput.addEventListener("input", updatePriceDisplay);
            maxPriceInput.addEventListener("input", updatePriceDisplay);

            // Gọi ngay khi trang load để giữ giá trị đúng
            updatePriceDisplay();
        });
    </script>

@endsection