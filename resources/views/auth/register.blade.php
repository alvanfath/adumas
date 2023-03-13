<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - PEMAS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png" />
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgb(137, 137, 137);
            border-radius: 10px;
            height: 50px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #6b6b6b;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <h3 class="auth-title">Register</h3>
                    <form action="{{ route('store.register') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text"
                                class="form-control @error('nik')
                            is-invalid
                            @enderror"
                                placeholder="NIK" name="nik" value="{{ old('nik') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('nik')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text"
                                class="form-control @error('username')
                            is-invalid
                            @enderror"
                                placeholder="Username" name="username" value="{{ old('username') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror"
                                placeholder="Password" name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                placeholder="Nomor Telepon" name="telp" value="{{ old('telp') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block shadow-lg mt-5">
                            Simpan
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-5">
                        <p class="text-gray-600">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-bold">Login</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right" class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/assets/pemas.png') }}" width="100%" height="30%;" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script>
        @if (Session::has('error'))
            Toastify({
                text: "{{ Session::get('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#B4000D",
            }).showToast()
        @endif

        @if (Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#60AF4B",
            }).showToast()
        @endif
    </script>
</body>

</html>
