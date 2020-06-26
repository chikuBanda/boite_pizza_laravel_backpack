@extends('layouts.app')

@section('content')
    <div id="hero_section" style="
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-image: url('{{ asset('uploads/img/pizza2.jpg') }}');">
            <div style="background-color: black; width: inherit; height: inherit; opacity: 50%"></div>
    </div>
    <div id="info_section" style="
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-color: white;
            ">
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('styles')

@endsection


