<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
    <title>PEMAS</title>
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
        body {
            background-image: linear-gradient(to right, rgba(32, 110, 159, 0.393), rgb(35, 155, 203));
            margin: auto;
            padding: 50px;
            font-family: 'Lexend Deca', sans-serif;
            color: #2E475D;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
            flex-flow: column;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <h2 class="text-white text-center">{{ strtoupper('Halo selamat datang di pemas cipinganggading') }}</h2>
        <span class="text-white text-center">Pemas adalah sebuah platform untuk pengaduan berbagai hal dari sudut
            pandang
            masyarakat, <br> disini anda bisa mengadukan berbagai hal baik positif maupun negatif, <br> dengan syarat
            anda harus mempunya bukti berupa foto.</span>
        <img src="{{ asset('img/assets/landing.png') }}" width="30%" height="30%;" alt="">
        <div class="row mb-5">
            <div class="col-6 text-center">
                <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary">Masuk</a>
            </div>
            <div class="col-6 text-center">
                <a href="{{ route('register') }}" class="btn btn-lg btn-outline-primary">Daftar</a>
            </div>
        </div>
    </div>
    <section class="container-fluid mb-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text">Langkah Langkah Mendaftar di Pemas Cipinanggading</h5>
                    </div>
                </div>
            </div>
            @foreach ($step_register as $item)
                <div class="col-sm-3">
                    <div class="card h-100 d-flex justify-content-start text-left">
                        <div class="card-header">
                            <h5><b>{{ $loop->iteration }}</b></h5>
                        </div>
                        <div class="card-body">
                            <span><b>{!! $item !!}</b></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text">Langkah Langkah Membuat Pengaduan di Pemas Cipinanggading</h5>
                    </div>
                </div>
            </div>
            @foreach ($step_pengaduan as $item)
                <div class="col-sm-3 mb-4">
                    <div class="card h-100 d-flex justify-content-start text-left">
                        <div class="card-header">
                            <h5><b>{{ $loop->iteration }}</b></h5>
                        </div>
                        <div class="card-body">
                            <span><b>{{ $item }}</b></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
