@extends('_layouts.app')
@section('css')
    <style>
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
@endsection
@section('content')
    <div class="page-heading">
        <h3>Profil Saya</h3>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Profil</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('masyarakat.update-profile') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text"
                                class="form-control @error('username')
                            is-invalid
                            @enderror"
                                name="username" value="{{ $me->username }}" id="username">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor telepon :</label>
                            <input type="number"
                                class="form-control @error('telp')
                            is-invalid
                            @enderror"
                                name="telp" value="{{ $me->telp }}" id="telp">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Ubah Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('masyarakat.update-password') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Password saat ini</label>
                            <input type="password"
                                class="form-control @error('current_password')
                            is-invalid
                            @enderror"
                                name="current_password">
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password baru</label>
                            <input type="password"
                                class="form-control @error('new_password')
                            is-invalid
                            @enderror"
                                name="new_password">
                            @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password baru</label>
                            <input type="password"
                                class="form-control @error('confirm_password')
                            is-invalid
                            @enderror"
                                name="confirm_password">
                            @error('confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Diri</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <span><b>NIK</b></span>
                                <small>{{ $me->nik }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Nama Lengkap</b></span>
                                <small>{{ $me->nama }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Jenis Kelamin</b></span>
                                <small>{{ $me->jenis_kelamin }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Tempat, Tanggal lahir</b></span>
                                <small>{{ $me->tempat_lahir }}, {{ date('d F Y', strtotime($me->tanggal_lahir)) }}
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <span><b>Alamat</b></span>
                                <small>{{ $me->alamat }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Agama</b></span>
                                <small>{{ $me->agama }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Status Perkawinan</b></span>
                                <small>{{ $me->status_perkawinan }}</small>
                            </div>
                            <div class="d-flex flex-column">
                                <span><b>Pekerjaan</b></span>
                                <small>{{ $me->pekerjaan }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
