@extends('layouts.app')

@section('content')
    <div id="hero_section" style="
            background-size: cover;
            width: 100%;
            height: 100vh;
            position: relative;
            background-image: url('{{ asset('uploads/img/pizza2.jpg') }}');">
            <div style="background-color: black; width: inherit; height: inherit; opacity: 50%"></div>
            @if (Session::has('success'))
                <div class="row">
                    <div class="col-sm-6 col-md-4 offset-md4 offset-sm-3">
                        <div id="charge-message" class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    </div>
                </div>
            @endif
            <h1
                style="
                    position: absolute;
                    background-color: transparent;
                    top: 40%;
                    bottom: 40%;
                    left: 30%;
                    right: 30%;
                    color: white;
                    text-align: center;
                "
            >Tous nos Produits</h1>
    </div>
    <div id="contents"
        style="
            background-attachment: fixed;
            background-size: cover;
            width: 100%;
            display: flex;
            flex-flow: column;
            min-height: 100vh;
            background-image: url('{{ asset('uploads/img/wood-background6.jpg') }}');
            padding-top: 30px">
        <div class="container" style="padding-top: 50px">

            <div id="tab-buttons" class="tab">
                @foreach ($categories as $categorie)
                    @if ($cat == $categorie->nomCat)
                        <a class="cat btn active" href="/produits/{{$categorie->nomCat}}#contents" class="tablinks active"> {{$categorie->nomCat}} </a>
                    @else
                        <a class="cat btn" href="/produits/{{$categorie->nomCat}}#contents" class="tablinks"> {{$categorie->nomCat}} </a>
                    @endif
                @endforeach
            </div>


            <div class="row tabcontent" style="margin-top: 1%">
                <div class="col-md-10 offset-md-2">
                    <div class="row">
                        @foreach ($produits as $produit)
                            @if ($produit->categories->nomCat == $cat)
                                <div class="col-md-4" style="margin-bottom: 120px">
                                    <div style="background-color: white; border-radius: 15px; width: 250px; height: 370px;">
                                        <div style="padding-top: 20px; height: 45%; text-align: center; margin-bottom: 10px">
                                            <img src="{{ asset($produit->imgPath) }}" style="width: 200px; height: 100%;" alt="{{$produit->nom}}">
                                        </div>
                                        <h3 style="text-align: center">{{$produit->nom}}</h3>
                                        <p style="text-align: center">${{$produit->prix}}</p>
                                        <a class="btn" style="background-color: #FEDDCA; display: block; margin-bottom: 10px; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/produits/{{$produit->codeProduit}}/details">details</a>
                                        <a class="btn" style="background-color: #FC955B; display: block; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/add-produit-to-cart/{{$produit->codeProduit}}">ajouter au panier</a> <br>
                                        <br>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/produit.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('css/produit.css') }}" rel="stylesheet">
@endsection
