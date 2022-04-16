@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
    @include('layouts.headers.guest')
    @include('layouts.navbars.navs.auth')

    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush