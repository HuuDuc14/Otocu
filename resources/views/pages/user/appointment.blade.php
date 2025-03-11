@extends('app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        Lịch hẹn xem xe
                    </h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item">Tất cả lịch hẹn</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($appointments->isNotEmpty())
                                <div class="table-responsive">
                                    <table id="zero_config" class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-14 font-weight-medium text-dark">Khách</th>
                                                <th class="font-14 font-weight-medium text-dark">Xe</th>
                                                <th class="font-14 font-weight-medium text-dark">Ngày xem</th>
                                                <th class="font-14 font-weight-medium text-dark">Trạng thái</th>
                                                <th class="font-14 font-weight-medium text-dark">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <tr>
                                                    <td>{{$appointment->customer->username}}
                                                        <span class="text-muted font-12"> <i class=" fas fa-caret-right"></i> {{\Carbon\Carbon::parse($appointment->created_at)->diffForHumans()}}</span>
                                                        <a href="https://zalo.me/{{ $appointment->customer->phone_number }}"
                                                            target="_blank" class="btn-phone" data-bs-toggle="tooltip"
                                                            data-placement="top" title="Liên hệ">
                                                            <span><i class="fas fa-phone"></i></span>
                                                        </a>
                                                        
                                                    </td>
                                                    <td>{{$appointment->post->carBrand->name_car_brand ?? 'N/A' }} |
                                                        {{$appointment->post->title ?? 'N/A' }}</td>
                                                    <td>{{\Carbon\Carbon::parse($appointment->date)->format('d/m/Y')}}</td>
                                                    <td>
                                                        @if ($appointment->status)
                                                            <i class="fa fa-circle text-success font-12" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Đã xem"> Hoàn thành</i>                                                      
                                                        @else
                                                            <i class="fa fa-circle text-danger font-12" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Chưa xem"> Chưa xem</i>
                                                        @endif                                         
                                                    </td>
                                                    <td>                                                      
                                                        <a href="{{route('appointment.watched', $appointment->id)}}"
                                                            class="btn btn-sm btn-success shadow-sm">Hoàn thành</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4 class="text-center mt-4">Không có bài đăng</h4>
                            @endif
                        </div>
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




@endsection