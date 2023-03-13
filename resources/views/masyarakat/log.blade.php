@extends('_layouts.app')
@section('content')
    <div class="page-heading">
        <h3>Aktivitas Saya</h3>
    </div>
    <div class="row">
        @foreach ($activity as $item)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$item->activity}}</h4>
                    </div>
                    <div class="card-body d-flex justify-content-end">
                        <span>{{$item->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
