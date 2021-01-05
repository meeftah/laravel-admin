@extends('layouts.app')

@section('body')
@include('partials.headbar')
@include('partials.sidebar')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    @yield('breadcrumb')
    @yield('content-header')

    <div class="br-pagebody">
        @yield('content')
    </div><!-- br-pagebody -->
    @include('partials.footer')
</div><!-- br-mainpanel -->
@include('modals.logout')
<!-- ########## END: MAIN PANEL ########## -->

@push('styles')
<link href="{{ asset('assets/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dashboard/lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/moment/moment.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/peity/jquery.peity.js') }}"></script>
<script src="{{ asset('assets/dashboard/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bracket.js') }}"></script>
@endpush
@endsection