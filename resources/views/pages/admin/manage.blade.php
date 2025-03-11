@extends('app')
@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($carBrands->isNotEmpty())
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Quản lý hãng xe</h4>
                                    <div class="ms-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" onclick="addBrandCar()">Thêm hãng xe</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table no-wrap v-middle mb-0 text-center">
                                        <thead>
                                            <tr>
                                                <th class="font-14 font-weight-medium text-dark">STT</th>
                                                <th class="font-14 font-weight-medium text-dark">Hãng xe</th>
                                                <th class="font-14 font-weight-medium text-success">Số bài viết</th>
                                                <th class="font-14 font-weight-medium text-dark">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carBrands as $carBrand)
                                                <tr>
                                                    <td class="border-top-0 px-2 text-dark">{{$carBrand->id}}</td>
                                                    <td>{{$carBrand->name_car_brand}}</td>
                                                    <td class="font-14 font-weight-medium text-success">{{$carBrand->count_posts}}
                                                    </td>
                                                    <td>
                                                        <a onclick="editBrand({{$carBrand}})" class="btn btn-warning btn-sm">Sửa</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4 class="text-center mt-4">Chưa có hãng xe</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Quản lý thiết kế</h4>
                                <div class="ms-auto">
                                    <div class="dropdown sub-dropdown">
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                            <a class="dropdown-item" onclick="addDesign()">Thêm kiểu dáng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="default_order" class="table no-wrap v-middle mb-0 text-center"">
                                            <thead>
                                                <tr>
                                                    <th class=" font-14 font-weight-medium text-dark">STT</th>
                                    <th class="font-14 font-weight-medium text-dark">Kiểu dáng</th>
                                    <th class="font-14 font-weight-medium text-success">Số bài viết</th>
                                    <th class="font-14 font-weight-medium text-dark">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($designs as $design)
                                            <tr>
                                                <td class="border-top-0 px-2 text-dark">{{$loop->iteration}}</td>
                                                <td>{{$design->name_design_car}}</td>
                                                <td class="font-14 font-weight-medium text-success">{{$design->count_posts}}
                                                </td>
                                                <td>
                                                    <a onclick="editDesign({{$design}})" class="btn btn-warning btn-sm">Sửa</a>
                                        @endforeach                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form_add" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header modal-colored-header" id='bg-header'>
                        <h5 class="modal-title" id="title_add"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label id="text_add"></label>
                            <input type="text" class="form-control" name="name_add" id="name_design"
                                value="{{old('name_add')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn" id="button_modal"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        {{-- Xóa thông báo sau khi hiển thị (Chỉ để hiển thị 1 lần) --}}
        {{ session()->forget('success') }}
    @endif

    <script>
        function addDesign() {
            // Cập nhật nội dung modal
            document.getElementById('bg-header').classList.add('bg-success');
            document.getElementById('title_add').innerText = `Thêm dáng xe`;
            document.getElementById('text_add').innerText = `Nhập tên dáng xe muốn thêm`;
            document.getElementById('button_modal').innerText = `Thêm`;
            document.getElementById('button_modal').classList.add('btn-success');

            // Cập nhật action của form
            document.getElementById('form_add').action = `/admin/addDesign`;

            // Hiển thị modal
            $('#add').modal('show');
        }

        function editDesign(design) {
            // Cập nhật nội dung modal
            document.getElementById('bg-header').classList.add('bg-primary');
            document.getElementById('title_add').innerText = `Sửa dáng xe`;
            document.getElementById('text_add').innerText = `Nhập tên dáng xe muốn sửa`;
            document.getElementById('button_modal').innerText = `Sửa`;
            document.getElementById('name_design').value = `${design.name_design_car}`;
            document.getElementById('button_modal').classList.add('btn-primary');

            // Cập nhật action của form
            document.getElementById('form_add').action = `/admin/design/edit/${design.id}`;

            // Hiển thị modal
            $('#add').modal('show');
        }

        function addBrandCar() {
            // Cập nhật nội dung modal
            document.getElementById('bg-header').classList.add('bg-success');
            document.getElementById('title_add').innerText = `Thêm hãng xe`;
            document.getElementById('text_add').innerText = `Nhập tên hãng xe muốn thêm`;
            document.getElementById('button_modal').innerText = `Thêm`;
            document.getElementById('button_modal').classList.add('btn-success')

            // Cập nhật action của form
            document.getElementById('form_add').action = `/admin/addBrandCar`;

            // Hiển thị modal
            $('#add').modal('show');
        }

        function editBrand(carBrand) {
            // Cập nhật nội dung modal
            document.getElementById('bg-header').classList.add('bg-primary');
            document.getElementById('title_add').innerText = `Sửa hãng xe`;
            document.getElementById('text_add').innerText = `Nhập tên hãng xe muốn sửa`;
            document.getElementById('button_modal').innerText = `Sửa`;
            document.getElementById('name_design').value = `${carBrand.name_car_brand}`;
            document.getElementById('button_modal').classList.add('btn-primary');

            // Cập nhật action của form
            document.getElementById('form_add').action = `/admin/brand/edit/${carBrand.id}`;

            // Hiển thị modal
            $('#add').modal('show');
        }

    </script>



@endsection