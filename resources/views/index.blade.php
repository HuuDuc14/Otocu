<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/index.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">

    <div id="preloader">
        {{-- <div class="loader"></div> --}}
        <div class="loop cubes">
            <div class="itemc cubes"></div>
            <div class="itemc cubes"></div>
            <div class="itemc cubes"></div>
            <div class="itemc cubes"></div>
            <div class="itemc cubes"></div>
            <div class="itemc cubes"></div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partials.navbar')
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".load").addEventListener("submit", function() {
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
                            $('#district').html('<option value="">Chọn quận</option>');

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
                    $('#district').html('<option value="">Chọn quận</option>');
                }
            });
        });
    </script>

</body>

</html>