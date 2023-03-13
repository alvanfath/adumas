<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Petugas PEMAS</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png" />
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/datatables.net-bs5/css/datatables.responsive.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}" />
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
    </style>
    @yield('css')
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">
        <section>
            <div class="card">
                <div class="card-header">
                    <h4>Tanggapan Pengaduan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center align-items-center text-center mb-3">
                            <img src="{{ asset('storage/pengaduan/' . $data->foto) }}" class="rounded" width="80%"
                                height="400px" alt="tidak ada gambar">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="isi">Isi Laporan :</label>
                                        <span><b>{{ $data->isi_laporan }}</b></span>
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="tgl_[]">Dibuat Pada :</label>
                                        <span id="tgl_p" ><b>{{ date('d F Y', strtotime($data->tgl_pengaduan)) }}</b></span>
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="author">Author :</label>
                                        <span id="author"><b>{{ $data->masyarakat->nama }}</b></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="tgp">Tanggapan :</label>
                                        <span id="tgp"><b>{{ $tanggapan->tanggapan }}</b></span>
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="tgp_a">Ditanggapi Pada :</label>
                                        <span id="tgp_a"><b>{{ date('d F Y', strtotime($tanggapan->tgl_tanggapan)) }}</b></span>
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                        <label for="tgl_t">Ditanggapi Oleh :</label>
                                        <span id="tgl_t"><b>{{ $tanggapan->petugas->nama_petugas }}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('_partials_admin.js')
    <script src="{{ asset('assets/js/extensions/printpage.js') }}"></script>
</body>

</html>
