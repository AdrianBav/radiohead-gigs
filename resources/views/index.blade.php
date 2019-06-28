@extends('layouts.app')
@inject('metrics', 'App\Services\MetricsService')


@section('content')

    {{-- Row 1 --}}
    @include('layouts.tiles.boxes')

    {{-- Row 2 --}}
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            @include('layouts.tiles.album-coverage')
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            @include('layouts.tiles.album-distribution')
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            @include('layouts.tiles.top-songs')
        </div>
    </div>

    {{-- Row 3 --}}
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            @include('layouts.tiles.concerts')
        </div>

        <div class="col-md-8 col-sm-8 col-xs-12">
            @include('layouts.tiles.concert-locations')
        </div>
    </div>

@endsection
