@extends('_layouts.admin')
@section('page_title', 'Tanggapan Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body" id="content">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center align-items-center text-center mb-3">
                            <img src="{{ asset('storage/pengaduan/' . $data->foto) }}" class="rounded" width="80%"
                                height="400px" alt="tidak ada gambar">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
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

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{route('admin.tanggapan.print', $data->no_pengaduan)}}" class="btn btn-warning btnprn" id="btn-print">Cetak Pengaduan</a>
                                <a href="{{ route('admin.pengaduan-done') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/js/extensions/printpage.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.btnprn').printPage({
                message:"Mohon tunggu dokumen sedang dalam proses"
            });
        })
    </script>
@endsection
