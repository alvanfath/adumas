@extends('_layouts.app')
@section('content')
    <div class="page-heading">
        <h3>Halo {{ $me->nama }}</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>Lihat Pengaduan Terbaru</h5>
        </div>
        @forelse ($pengaduan as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ $item->masyarakat->nama }}</span>
                        @if ($item->status == 'selesai')
                            <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                        @else
                            <span class="badge bg-warning">{{ ucfirst($item->status) }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/pengaduan/' . $item->foto) }}" class="rounded mb-2" width="100%"
                            height="200px;" alt="">
                        <h6>{{ $item->isi_laporan }}</h6>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            @if ($item->status == 'selesai')
                                <a href="{{ route('masyarakat.pengaduan.tanggapan.detail', $item->no_pengaduan) }}"
                                    class="btn btn-sm btn-primary">Lihat tanggapan</a>
                            @endif
                            <small>{{ date('d F Y', strtotime($item->tgl_pengaduan)) }}</small>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <center>
                <div class="col-md-6 d-flex-justify-content-center align-items-center text-center">
                    <div class="card">
                        <div class="card-header">
                            <h4>Masi kosong masbro</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/assets/opah.jpg') }}" alt="gada euy error"
                                width="80%" height="300px" class="rounded text-center">
                        </div>
                        <div class="card-footer d-flex flex-column">
                            <span class="mb-3"><b>Sok atuh jadi yang pertama buat pengaduan hehehehehe</b></span>
                            <a href="{{route('masyarakat.pengaduan.create')}}" class="btn btn-primary">Buat Pengaduan</a>
                        </div>
                    </div>
                </div>
            </center>
    </div>
    @endforelse

    </div>
@endsection
