@extends('app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        Bài viết
                    </h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item">Quản lý bài viết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-5 align-self-center">
                    <div class="customize-input float-end">

                        <a href="{{route('post.create')}}" class="create-button">
                            <i class="arr-2  icon-user-follow"> </i>
                            <span class="text">Tạo bài viết</span>
                            <span class="circle"></span>
                            <i class="arr-1  icon-user-follow"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($posts->isNotEmpty())
                                <div class="table-responsive">
                                    <table id="zero_config" class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font-14 font-weight-medium text-muted">User</th>
                                                <th class="font-14 font-weight-medium text-muted">Hình ảnh</th>
                                                <th class="font-14 font-weight-medium text-muted">Tiêu đề</th>
                                                <th class="font-14 font-weight-medium text-muted">Kiểu dáng</th>
                                                <th class="font-14 font-weight-medium text-muted">Địa chỉ</th>
                                                <th class="font-14 font-weight-medium text-muted">Giá</th>
                                                <th class="font-14 font-weight-medium text-muted">Trạng thái</th>
                                                <th class="font-14 font-weight-medium text-muted">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td class="border-top-0 px-2 py-4 text-dark">
                                                        <span class="d-none">{{$post->created_at}}</span>
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">{{$post->user->username}}</h5>
                                                        <span class="text-muted font-10">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                                                    </td>
                                                    <td><img src="{{ asset('storage/' . $post->url_picture) }}" alt="Image"
                                                            width="100%">
                                                    </td>
                                                    <td>{{$post->carBrand->name_car_brand ?? 'N/A' }} | {{$post->title}}</td>
                                                    <td>{{$post->designCar->name_design_car ?? 'N/A'}}</td>
                                                    <td>{{$post->district->name ?? 'N/A'}}, {{$post->province->name ?? 'N/A'}}</td>
                                                    <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                                                        {{number_format($post->price, 0, ',', '.')}} đ
                                                    </td>
                                                    <td>
                                                        @if ($post->status == 'đã duyệt')
                                                            <i class="fa fa-circle text-success font-12" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Đã duyệt"> Đã duyệt</i>
                                                        @elseif ($post->status == 'bị từ chối')
                                                            <i class="fa fa-circle text-danger font-12" data-bs-toggle="tooltip"
                                                                data-placement="top" title="bị từ chối"> Từ chối</i>
                                                        @else
                                                            <i class="fa fa-circle text-primary font-12" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Chờ duyệt"> Chờ duyệt</i>
                                                        @endif 
                                                    </td>
                                                    <td>
                                                        @if ($post->status == 'chờ duyệt')
                                                            <div class="d-flex justify-content-around">
                                                                <a href="{{ route('post.accept', $post->id)}}"
                                                                    class="btn btn-sm btn-success shadow-sm"><i
                                                                        class=" fas fa-check"></i></a>
                                                                <a href="{{ route('post.refuse', $post->id)}}"
                                                                    class="btn btn-sm btn-danger shadow-sm ms-2"><i
                                                                        class="fas fa-times"></i></a>
                                                            </div>
                                                        @else
                                                            <button onclick="deletePost({{$post->id}})"
                                                                class="btn btn-sm btn-danger shadow-sm"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endif

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