@extends('layouts.app')

@section('content')
    @include('layouts.headers.title-header' , [
        "title" => "403",
        "description" => "Você não ter permissão para realizar essa ação"
    ])
@endsection

@push('js')
    <!-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> -->
@endpush
