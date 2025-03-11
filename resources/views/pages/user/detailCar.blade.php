@extends('app')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <img src={{ asset('storage/' . $car->url_picture) }} alt="raptor" width="100%" class="mb-2" />
                </div>
                <div class="col-md-5">
                    <div class="thongtin">
                        <p class="name">{{ $car->carBrand->name_car_brand ?? 'N/A' }} {{ $car->title}}</p>
                        <p class="text-secondary my-1">{{ $car->designCar->name_design_car ?? 'N/A'}}</p>
                        <p class="price">{{ number_format($car->price, 0, ',', '.')}}</p>
                        <div class="item">
                            <p><i class="far fa-calendar"></i> Năm sản xuất</p>
                            <p>{{ $car->year}}</p>
                        </div>
                        <div class="item">
                            <p><i class="fas fa-road"></i> Đã lăn bánh</p>
                            <p>{{ $car->mileage}} km</p>
                        </div>
                        <div class="item">
                            <p><i class="fas fa-fire-extinguisher"></i> Nhiên liệu</p>
                            <p>{{ $car->fuel_type}}</p>
                        </div>
                        <div class="item">
                            <p><i class="fas fa-paint-brush"></i> Màu</p>
                            <p>{{ $car->mau_xe}}</p>
                        </div>
                        <div class="item">
                            <p><i class=" fas fa-tachometer-alt"></i> Hộp số</p>
                            <p>{{ $car->gearbox}}</p>
                        </div>
                        <div class="item">
                            <p><i class="fas fa-couch"></i> Chỗ ngồi</p>
                            <p>{{ $car->number_seats}}</p>
                        </div>

                        <hr />
                        <div class="item">
                            <p><i class=" fas fa-user"></i> Người bán</p>
                            <p>{{ $car->user->username ?? 'N/A'}}</p>
                        </div>
                        <div class="item">
                            <p><i class="fas fa-map-marker-alt"></i> Địa điểm</p>
                            <p>{{ $car->district->name ?? 'N/A'}}, {{ $car->province->name ?? 'N/A'}}</p>
                        </div>
                        <div class="goi">
                            <button onclick="appointment({{$car}})" class="btn btn-primary">Hẹn ngày xem xe</button>
                            <a class="btn btn-success" href="https://zalo.me/{{ $car->user->phone_number }}"
                                target="_blank"><i class="fa-solid fa-phone"></i>Gọi điện</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-light font-weight-medium" id="deletePostLabel">Đặt lịch xem xe</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <form class="user" action="{{route('appointment.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input type="text" name="id_seller" hidden id="id_seller">
                                <input type="text" name="id_post" hidden id="id_post">
                                <div class="form-group formField mt-3">
                                    <span class="status">Seller: </span>
                                    <input type="text" class="form-control" id="seller" placeholder="name" readonly>
                                </div>

                                <div class="form-group formField mt-5">
                                    <span class="status">Xe: </span>
                                    <input type="text" class="form-control" id="title" readonly>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="formField form-group">
                                            <span class="status">Ngày xem<span class="text-danger">*</span>:</span>
                                            <input type="date" class="form-control" id="date" placeholder="Date"
                                                name="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="formField form-group">
                                            <span class="status">Địa chỉ: </span>
                                            <input type="text" class="form-control" id="province" placeholder="Province"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Đặt lịch</button>
                            </div>
                        </form>
                    </div>
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
        function appointment(car) {
            document.getElementById('seller').value = `${car.user.username}`;
            document.getElementById('title').value = `${car.car_brand.name_car_brand} ${car.title}`;
            document.getElementById('province').value = `${car.province.name}`;
            document.getElementById('id_seller').value = `${car.user.id}`;
            document.getElementById('id_post').value = `${car.id}`;
            $('#appointment').modal('show');

        }
    </script>

@endsection