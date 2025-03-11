@extends('app')
@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-16 font-weight-medium text-primary">Sửa bài đăng</h6>
                            <hr>
                        </div>
                        <div class="card-body">
                            <form class="load" action="{{route('post.update')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden class="form-control" name="id" value="{{$post->id}}">
                                <div class="form-group mt-4 formField">
                                    <input type="text" class="form-control" name="title" value="{{ $post->title}}"
                                        required="">
                                    <span for="exampleInputEmail1">Tiêu đề: <label class="text-danger">*</label></span>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row mt-5">
                                    <div class="col-sm-6">
                                        <div class="form-group formField">
                                            <span for="exampleInputEmail1" class="status">Hãng xe:<label
                                                    class="text-danger">*</label></span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="car_brand" id="car_brand" class="form-control select">
                                                @foreach ($brand_cars as $brand_car)
                                                    <option value="{{ $brand_car->id }}" {{ $brand_car->id == $post->id_car_brand ? 'selected' : '' }}>
                                                        {{ $brand_car->name_car_brand }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group formField">
                                            <span for="exampleInputEmail1" class="status">Kiểu dáng:<label
                                                    class="text-danger">*</label></span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="design_car" id="design_car" class="form-control select">
                                                @foreach ($design_cars as $design_car)
                                                    <option value="{{ $design_car->id }}" {{ $brand_car->id == $post->id_design_car ? 'selected' : '' }}>
                                                        {{ $design_car->name_design_car}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-sm-12 ">
                                        <div class="formField">
                                            <span class="status" for="exampleInputEmail1">Giá<label
                                                    class="text-danger">*</label>: <label class="text-success"
                                                    id="priceValue">{{ old('price', 300000000) }}</label> đ</span>
                                            <input type="range" class="slider-range " min="300000000" max="3000000000"
                                                step="100000000" name="price" value="{{$post->price}}" id="priceRange">
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-sm-6">
                                        <div class="formField">
                                            <span for="exampleInputEmail1" class="status">Địa điểm bán: <label
                                                    class="text-danger">*</label></span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="province_id" id="province" class="select form-control">
                                                <option value="{{$post->province->id}}" selected>{{$post->province->name}}
                                                </option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="formField">
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="district_id" id="district" class="form-control select">
                                                <option value="{{$post->district->id}}" selected>{{$post->district->name}}
                                                </option>
                                                <!-- Quận sẽ được tải qua AJAX -->
                                            </select>
                                            @error('district_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <div class="form-group ">
                                            <span for="exampleInputEmail1" class="status">Hình ảnh:</span>
                                            <label for="file" class="labelFile"><span><svg xml:space="preserve"
                                                        viewBox="0 0 184.69 184.69"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns="http://www.w3.org/2000/svg" id="Capa_1" version="1.1"
                                                        width="60px" height="60px">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M149.968,50.186c-8.017-14.308-23.796-22.515-40.717-19.813
                                  C102.609,16.43,88.713,7.576,73.087,7.576c-22.117,0-40.112,17.994-40.112,40.115c0,0.913,0.036,1.854,0.118,2.834
                                  C14.004,54.875,0,72.11,0,91.959c0,23.456,19.082,42.535,42.538,42.535h33.623v-7.025H42.538
                                  c-19.583,0-35.509-15.929-35.509-35.509c0-17.526,13.084-32.621,30.442-35.105c0.931-0.132,1.768-0.633,2.326-1.392
                                  c0.555-0.755,0.795-1.704,0.644-2.63c-0.297-1.904-0.447-3.582-0.447-5.139c0-18.249,14.852-33.094,33.094-33.094
                                  c13.703,0,25.789,8.26,30.803,21.04c0.63,1.621,2.351,2.534,4.058,2.14c15.425-3.568,29.919,3.883,36.604,17.168
                                  c0.508,1.027,1.503,1.736,2.641,1.897c17.368,2.473,30.481,17.569,30.481,35.112c0,19.58-15.937,35.509-35.52,35.509H97.391
                                  v7.025h44.761c23.459,0,42.538-19.079,42.538-42.535C184.69,71.545,169.884,53.901,149.968,50.186z"
                                                                        style="fill:#010002;"></path>
                                                                </g>
                                                                <g>
                                                                    <path d="M108.586,90.201c1.406-1.403,1.406-3.672,0-5.075L88.541,65.078
                                  c-0.701-0.698-1.614-1.045-2.534-1.045l-0.064,0.011c-0.018,0-0.036-0.011-0.054-0.011c-0.931,0-1.85,0.361-2.534,1.045
                                  L63.31,85.127c-1.403,1.403-1.403,3.672,0,5.075c1.403,1.406,3.672,1.406,5.075,0L82.296,76.29v97.227
                                  c0,1.99,1.603,3.597,3.593,3.597c1.979,0,3.59-1.607,3.59-3.597V76.165l14.033,14.036
                                  C104.91,91.608,107.183,91.608,108.586,90.201z" style="fill:#010002;"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg></span>
                                                <p>drag and drop your file here or click to select a file!</p>
                                            </label>
                                            <input class="input-image" name="url_picture" value="{{old('url_picture')}}"
                                                id="file" type="file" onchange="previewImage()" />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div id="imagePreview">
                                            @if ($post->url_picture)
                                                <img src="{{ asset('storage/' . $post->url_picture) }}" alt="Current Image"
                                                    width="100%">
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-5">
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span for="exampleInputEmail1" class="status">Năm sản xuất:</span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="year" class="form-control select">
                                                <option value="{{ $post->year }}">{{ $post->year }}</option>
                                                @for ($i = 1990; $i <= $yearnow; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span class="status">Đã đi: <label class="text-danger"
                                                    id="mileageValue">{{ old('mileage') }}</label> km</span>
                                            <input type="range" class="slider-range" min="2000" max="100000" step="1000"
                                                name="mileage" value="{{$post->mileage}}" id="mileageRange">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span class="status" for="exampleInputEmail1">Màu xe:</span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="mau_xe" class="form-control select">
                                                <option value="Trắng" {{ $post->mau_xe == 'Trắng' ? 'selected' : '' }}>Trắng
                                                </option>
                                                <option value="Đen" {{ $post->mau_xe == 'Đen' ? 'selected' : '' }}>Đen
                                                </option>
                                                <option value="Đỏ" {{ $post->mau_xe == 'Đỏ' ? 'selected' : '' }}>Đỏ</option>
                                                <option value="Vàng" {{ $post->mau_xe == 'Vàng' ? 'selected' : '' }}>Vàng
                                                </option>
                                                <option value="Xanh Dương" {{ $post->mau_xe == 'Xanh Dương' ? 'selected' : '' }}>Xanh Dương</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span for="exampleInputEmail1" class="status">Nhiên liệu:</span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="fuel_type" class='form-control select'>
                                                <option value="xăng" {{ $post->fuel_type == 'xăng' ? 'selected' : '' }}>Xăng
                                                </option>
                                                <option value="điện" {{ $post->fuel_type == 'điện' ? 'selected' : '' }}>Điện
                                                </option>
                                                <option value="dầu" {{ $post->fuel_type == 'dầu' ? 'selected' : '' }}>Dầu
                                                </option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span for="exampleInputEmail1" class="status">Hộp số:</span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="gearbox" class='form-control select'>
                                                <option value="số sàn" {{ $post->gearbox == 'số sàn' ? 'selected' : '' }}>Số
                                                    sàn</option>
                                                <option value="số tự động" {{ $post->gearbox == 'số tự động' ? 'selected' : '' }}>Số tự động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group formField">
                                            <span class="status" for="exampleInputEmail1">Số chỗ ngồi:</span>
                                            <i class="fas fa-angle-down icon"></i>
                                            <select name="number_seats" class="form-control select">
                                                <option value="2" {{ $post->number_seats == 2 ? 'selected' : '' }}>2</option>
                                                <option value="5" {{ $post->number_seats == 5 ? 'selected' : '' }}>5</option>
                                                <option value="7" {{ $post->number_seats == 7 ? 'selected' : '' }}>7</option>
                                                <option value="9" {{ $post->number_seats == 9 ? 'selected' : '' }}>9</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="d-flex justify-content-end mt-4">
                                    <div>
                                        <a href="{{ route('mypost')}}" class="btn btn-secondary">Hủy</a>
                                        <button type="submit" class="btn btn-success">Sửa</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Kiểm tra nếu có bất kỳ lỗi nào trong session
        @if ($errors->any())
            let errorMessages = '';

            // Duyệt qua tất cả các lỗi và nối chúng lại với nhau
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            // Hiển thị tất cả các lỗi bằng SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: errorMessages,
                showConfirmButton: false,
                timer: 5000
            });
        @endif
    </script>

@endsection