@extends('_layouts.admin')
@section('page_title')
    Aktivitas Login {{$masyarakat->nama}}
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Aktivitas</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="data-table">
                        <thead>
                            <th>Aktivitas</th>
                            <th>Waktu</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            var nik = '{{$nik}}';
            initiateDatatable(nik);
        })

        function initiateDatatable(nik) {
            var url = '{{route('admin.get-log', ':nik')}}';
            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: url.replace(':nik', nik),
                columns: [
                    {
                        data: 'activity'
                    },
                    {
                        data: 'time'
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari Data",
                    lengthMenu: "Tampilkan _MENU_ baris",
                    zeroRecords: "Tidak ada data",
                    infoEmpty: "Menampilkan 0 - 0 (0 data)",
                    infoFiltered: "(Difilter dari _MAX_ total data)",
                    info: "Menampilkan _START_ - _END_ (_TOTAL_ data)",
                    paginate: {
                        previous: '<i class="bi bi-arrow-left"></i>',
                        next: '<i class="bi bi-arrow-right"></i>',
                    }
                },
            })
        }
    </script>
@endsection
