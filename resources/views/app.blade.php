<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}" />
    <title>Ô tô cũ</title>
    <link href="{{ asset('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('./dist/css/index.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="{{ asset('dist/css/button.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />


    <link href="{{ asset('dist/css/form.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->

    <div class="preloader" id="preloader">
        <div class="lds-ripple">
            <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
                <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000"
                    stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000"
                    stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"
                    stroke-dasharray="0 440" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000"
                    stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            </svg>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- header -->
        @include('partials-new.header')
        <!-- endheader -->

        <!-- sidebar -->
        @include('partials-new.sidebar')
        <!-- end sidebar -->

        @yield('content')

    </div>

    {{-- model confirm --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <form id="confirmForm" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- model delete post--}}
    <div class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePostLabel">Xác nhận</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessageDelete"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <form id="confirmFormDelete" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/prism/prism.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector(".load").addEventListener("submit", function () {
                document.getElementById("preloader").style.display = "flex"; // Hiện preloader
                document.querySelector("button[type='submit']").disabled = true; // Chặn bấm nhiều lần
            });
        });
    </script>

    <script>
        function confirmMakeStaff(userId, username) {
            // Cập nhật nội dung modal
            document.getElementById('confirmMessage').innerText = `Bạn có chắc chắn cho "${username}" làm nhân viên?`;

            // Cập nhật action của form
            document.getElementById('confirmForm').action = `/user/staff/${userId}`;

            // Hiển thị modal
            $('#confirmModal').modal('show');
        }

        function deletePost(postId) {
            // Cập nhật nội dung modal
            document.getElementById('confirmMessageDelete').innerText = `Bạn có chắc chắn xóa bài viết này không ?`;

            // Cập nhật action của form
            document.getElementById('confirmFormDelete').action = `/post/delete/${postId}`;

            // Hiển thị modal
            $('#deletePost').modal('show');
        }

        $(document).ready(function () {
            // Khi người dùng chọn tỉnh
            $('#province').on('change', function () {
                var provinceId = $(this).val();

                // Nếu tỉnh được chọn, tải danh sách quận từ server
                if (provinceId) {
                    $.ajax({
                        url: '/get-districts/' + provinceId, // Đảm bảo đường dẫn đúng
                        type: 'GET',
                        success: function (data) {
                            // Kích hoạt dropdown quận
                            $('#district').prop('disabled', false);

                            // Clear các quận cũ
                            $('#district').html('<option value="">Chọn Quận/ Huyện</option>');

                            // Thêm các quận mới vào dropdown
                            $.each(data, function (key, value) {
                                $('#district').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                        error: function () {
                            alert("Không thể tải quận, vui lòng thử lại!");
                        }
                    });
                } else {
                    // Nếu tỉnh không được chọn, vô hiệu hóa dropdown quận và clear các giá trị
                    $('#district').prop('disabled', true);
                    $('#district').html('<option value="">Chọn Quận/ Huyện</option>');
                }
            });
        });
    </script>
    <script>
        //giá
        const priceRange = document.getElementById('priceRange');
        const priceValue = document.getElementById('priceValue');
        priceRange.addEventListener('input', function () {
            priceValue.textContent = priceRange.value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Định dạng giá trị với dấu phẩy
        });
        priceValue.textContent = priceRange.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');



        //km đã đi
        const mileageRange = document.getElementById('mileageRange');
        const mileageValue = document.getElementById('mileageValue');
        mileageRange.addEventListener('input', function () {
            mileageValue.textContent = mileageRange.value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Định dạng giá trị với dấu phẩy
        });
        mileageValue.textContent = mileageRange.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    </script>

<script>
    function previewImage() {
        var fileInput = document.getElementById('file');
        var imagePreview = document.getElementById('imagePreview');

        // Clear any previous preview
        imagePreview.innerHTML = '';

        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';

                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
</script>

</body>

</html>