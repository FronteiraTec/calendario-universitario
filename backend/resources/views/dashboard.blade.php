@extends('layouts.app')

@section('content')
    @include('layouts.headers.title-header' , ["title" => "Calendário UFFS"])

    <div class="container-fluid mt--7">
        <div class="row mt-7">

        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <!-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> -->
@endpush
