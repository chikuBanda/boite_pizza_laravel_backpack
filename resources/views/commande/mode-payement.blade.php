@extends('layouts.app')

@section('content')
    <div style="
        background-size: cover;
        width: 100%;
        display: flex;
        flex-flow: column;
        min-height: 100vh;
        background-color: #e8dcd8;
    ">
        <div style="
            background-size: cover;
            width: 100%;
            height: 350px;
            background-image: url('{{ asset('uploads/img/ingredients.jpg') }}');
            position: relative;
        ">
            <div style="background-color: black; width: inherit; height: inherit; opacity: 50%">
            </div>
            <h1
                style="
                    position: absolute;
                    background-color: transparent;
                    top: 140px;
                    left: 30%;
                    right: 30%;
                    color: white;
                    text-align: center;
                "
                class="animate__animated animate__bounce"
            >Mode de Payement</h1>
            <div style="
                background-size: cover;
                position: absolute;
                bottom: 0px;
                background-color: transparent;
                top: 280px;
                left: 90px;
                right: 90px;
            ">
                <div style="
                    background-size: cover;
                    height: 100%;
                    background-color: white;
                ">
                </div>
            </div>
        </div>
        <div style="
            margin-right: 90px;
            margin-left: 90px;
            display: flex;
            flex-flow: column;
            background-color: white;
            min-height: 70vh
        ">
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-right: 200px; padding-left: 200px">
                <h2 style="text-align: center; margin-bottom: 40px">Choisissez votre mode de payement</h2>

                <hr style="margin-bottom: 55px">

                <div class="row">
                    <div class="col-md-6" style="text-align: center; border-right: 1px solid grey">
                        <img style="display: block; margin-left: auto; margin-right: auto" src="{{asset('uploads/img/pay_cart.png')}}" alt="payement a la livraison" srcset="" width="200" height="100">
                        <a href="/checkout" class="btn btn-outline-success" style="border-radius: 15px; width: 80%; margin-top: 30px">Payer par carte</a>
                    </div>
                    <div class="col-md-6" style="text-align: center">
                        <img style="display: block; margin-left: auto; margin-right: auto" src="{{asset('uploads/img/pay_livraison.jpeg')}}" alt="payement a la livraison" srcset="" width="200" height="100">
                        <a href="/checkout2" class="btn btn-outline-primary" style="border-radius: 15px; width: 80%; margin-top: 30px">Payer a la livraison</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/checkout.js')}}"></script>
    <script src="{{ asset('js/map.js')}}"></script>
@endsection

@section('styles')

@endsection

@section('map_links')
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""
    />

    <link
        rel="stylesheet"
        href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin=""
    >
@endsection

@section('map_scripts')
    <script
        src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin="">
    </script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <!-- Geocoding Control -->

    <script
        src="https://unpkg.com/esri-leaflet@2.4.1/dist/esri-leaflet.js"
        integrity="sha512-xY2smLIHKirD03vHKDJ2u4pqeHA7OQZZ27EjtqmuhDguxiUvdsOuXMwkg16PQrm9cgTmXtoxA6kwr8KBy3cdcw=="
        crossorigin="">
    </script>

    <script
        src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
        integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
        crossorigin="">
    </script>
@endsection
