
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password  | Hiyamee </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="/assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-15 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="/assets/images/logo/logo.png" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="m-t-20">Reset Password</h2>
                                    <p class="m-b-30">Enter your email to reset password</p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Email Address:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-mail"></i>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                               
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                


                                                <button class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="/assets/images/others/login-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">© 2021 Hiyamee</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Terms & Conditions</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="/assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="/assets/js/app.min.js"></script>

</body>

</html>