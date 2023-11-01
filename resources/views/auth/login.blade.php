<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Url Path -->
    <meta name="server-path" content="{{ url('/') }}">
    <!-- Title Page-->
    <title>@yield('title', 'Alhuda Poultry Form')</title>
    <!-- Fontfaces CSS-->
    <!-- Fontfaces CSS-->
    <link href="{{ asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <!-- Bootstrap CSS-->
    <link href="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper" style="background-color: #F5F7FF;">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-color: #ffffff;">
                            <div class="brand-logo">
                                <img src="{{asset('images/main_logo.png')}}" alt="Admin" />
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light mb-3">Sign in to continue.</h6>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" required
                                        placeholder="Email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn loding_btn">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="{{ asset('backend/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('backend/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- endinject -->

</body>

</html>
