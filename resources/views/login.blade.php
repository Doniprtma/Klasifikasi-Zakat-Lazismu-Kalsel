<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('T4/assets/images/umbjm2.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('T4/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('T4/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('T4/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('T4/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('T4/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('T4/assets/css/icons.css') }}" rel="stylesheet">
    <title>LAZISMU</title>
    <style type="text/css">
        .authentication-header {
            background: #ff6602 !important;
        }

        .sidebar-wrapper .metismenu a:hover,
        .sidebar-wrapper .metismenu a:focus,
        .sidebar-wrapper .metismenu a:active,
        .sidebar-wrapper .metismenu .mm-active>a {
            color: #000;
            background: orange;
        }

        a {
            color: #0d6efd;
        }

        .text-primary {
            color: orange !important;
        }

        .border-primary {
            border-color: orange !important;
        }

        .btn-primary {
            color: #fff !important;
            background: orange !important;
            border-color: orange !important;
        }

        .back-to-top {
            background: #ffffa4;
        }

        .pace .pace-progress {
            background: orange !important;
        }

        .toggle-icon {
            color: orange !important;
        }

        .user-img {
            border: 2px solid orange !important;
        }

        .dropdown-menu:active, .dropdown-menu li:hover {
            
            background: orange !important;
        }
    </style>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-header"></div>
        <div class="authentication-reset-password d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-5 border-end">
                                <div class="card-body">
                                    <div class="p-5">
                                        <div class="text-start">
                                            <img src="{{ asset('T4/assets/images/umbjm.png') }}" width="250"
                                                alt="">
                                        </div>
                                        <h4 class="mt-5 font-weight-bold">Login</h4>
                                        <p class="text-muted">Silahkan Masukkan Email dan Password Untuk Login!</p>
                                        <form action="{{ route('postlogin') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="mb-3 mt-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmailAddress"
                                                    name="email" placeholder="Masukkan Email" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" name="password"
                                                        placeholder="Masukkan Password">
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-warning"><i
                                                        class="bx bxs-lock-open"></i>Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <img src="{{ asset('T4/assets/images/login-images/forgot-password-frent-img.jpg') }}"
                                    class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>
