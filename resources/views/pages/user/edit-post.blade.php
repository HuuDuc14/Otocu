@extends('index')
@section('content')

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sửa bài đăng</h6>
                    </div>
                    <div class="card-body">
                        <form class="load" action="{{route('post.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden class="form-control" name="id" value="{{$post->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title}}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hãng xe</label>
                                        <select name="car_brand" id="car_brand" class="form-control">
                                            @foreach ($brand_cars as $brand_car)
                                                {{-- <option value="{{ $brand_car->id }}">{{ $brand_car->name_car_brand }}</option> --}}
                                                <option value="{{ $brand_car->id }}" {{ $brand_car->id == $post->id_car_brand ? 'selected' : '' }}>
                                                    {{ $brand_car->name_car_brand }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('car_brand')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kiểu dáng</label>
                                        <select name="design_car" id="design_car" class="form-control">
                                            @foreach ($design_cars as $design_car)
                                                <option value="{{ $design_car->id }}" 
                                                    {{ $brand_car->id == $post->id_design_car ? 'selected' : '' }}>
                                                    {{ $design_car->name_design_car}}</option>
                                            @endforeach
                                        </select>
                                        @error('design_car')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá: đ <span class="text-success" id="priceValue">{{ old('price', 300000000) }}</span></label>
                                        <input type="range" class="form-control" min="300000000" max="3000000000"
                                            step="100000000" name="price" value="{{$post->price}}" id="priceRange">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>                             
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa điểm bán</label>
                                        <select name="province_id" id="province" class="form-control">
                                            <option value="{{$post->province->id}}" selected>{{$post->province->name}}</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="district">Quận/ Huyện</label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="{{$post->district->id}}" selected>{{$post->district->name}}</option>
                                            <!-- Quận sẽ được tải qua AJAX -->
                                        </select>
                                        @error('district_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>

                                @if ($post->url_picture)
                                    <img src="{{ asset('storage/' . $post->url_picture) }}" alt="Current Image" width="150">
                                @endif
                        
                                <!-- Input để chọn hình ảnh mới -->
                                <input type="file" class="form-control" name="url_picture" value="{{ old('url_picture', $post->url_picture) }}">
                                @error('url_picture')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Năm sản xuất</label>
                                        <select name="year" class="form-control">
                                            <option value="{{ $post->year }}">{{ $post->year }}</option>
                                            @for ($i = 1990; $i <= $yearnow; $i++ )
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Đã đi: <span class="text-danger" id="mileageValue">{{ old('mileage') }}</span> km</label>
                                                <input type="range" class="form-control" min="2000" max="20000"
                                            step="1000" name="mileage" value="{{$post->mileage}}" id="mileageRange">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Màu xe</label>
                                        <select name="mau_xe" class="form-control">
                                            <option value="Trắng" {{ $post->mau_xe == 'Trắng' ? 'selected' : '' }}>Trắng</option>
                                            <option value="Đen" {{ $post->mau_xe == 'Đen' ? 'selected' : '' }}>Đen</option>
                                            <option value="Đỏ" {{ $post->mau_xe == 'Đỏ' ? 'selected' : '' }}>Đỏ</option>
                                            <option value="Vàng" {{ $post->mau_xe == 'Vàng' ? 'selected' : '' }}>Vàng</option>
                                            <option value="Xanh Dương" {{ $post->mau_xe == 'Xanh Dương' ? 'selected' : '' }}>Xanh Dương</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhiên liệu</label>
                                        <select name="fuel_type" class='form-control'>
                                            <option value="xăng" {{ $post->fuel_type == 'xăng' ? 'selected' : '' }}>Xăng</option>
                                            <option value="điện" {{ $post->fuel_type == 'điện' ? 'selected' : '' }}>Điện</option>
                                            <option value="dầu" {{ $post->fuel_type == 'dầu' ? 'selected' : '' }}>Dầu</option>
                                        </select>
                                        @error('fuel_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hộp số</label>
                                        <select name="gearbox" class='form-control'>
                                            <option value="số sàn" {{ $post->gearbox == 'số sàn' ? 'selected' : '' }}>Số sàn</option>
                                            <option value="số tự động" {{ $post->gearbox == 'số tự động' ? 'selected' : '' }}>Số tự động</option>
                                        </select>
                                        @error('gearbox')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số chỗ ngồi</label>
                                            <select name="number_seats" class="form-control">
                                                <option value="2" {{ $post->number_seats == 2 ? 'selected' : '' }}>2</option>
                                                <option value="5" {{ $post->number_seats == 5 ? 'selected' : '' }}>5</option>
                                                <option value="7" {{ $post->number_seats == 7 ? 'selected' : '' }}>7</option>
                                                <option value="9" {{ $post->number_seats == 9 ? 'selected' : '' }}>9</option>
                                            </select>
                                            @error('number_seats')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="d-flex justify-content-end">
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