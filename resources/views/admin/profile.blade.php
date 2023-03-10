@extends('_layouts.admin')
@section('page_title', 'Halaman Profil')
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
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Form profil saya</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update-profile') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama lengkap</label>
                            <input type="text"
                                class="form-control @error('nama_petugas')
                            is-invalid
                            @enderror"
                                value="{{ $me->nama_petugas }}" name="nama_petugas">
                            @error('nama_petugas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text"
                                class="form-control @error('username')
                            is-invalid
                            @enderror"
                                value="{{ $me->username }}" name="username">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="number"
                                class="form-control @error('telp')
                            is-invalid
                            @enderror"
                                value="{{ $me->telp }}" name="telp">
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
                    <h3>Form Ubah Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update-password') }}" method="post">
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
    </div>
@endsection
