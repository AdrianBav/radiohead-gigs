@extends('layouts.app')
@inject('metrics', 'App\Services\MetricsService')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('layouts.tiles.concert-title')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('layouts.tiles.setlist')
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('layouts.tiles.concert-album-distribution')
        </div>
    </div>

@endsection
