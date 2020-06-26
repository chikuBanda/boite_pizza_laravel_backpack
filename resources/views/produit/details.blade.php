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
            >Details du Produit</h1>
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
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-left: 130px">
                <div class="row">
                    <div class="col-md-7">
                        <img
                            src="{{ asset($produit->imgPath) }}"
                            alt=""
                            srcset=""
                            width="550"
                            height="350"
                            style="border-radius: 21px; border: 1px solid rgb(243, 243, 247)"
                            >
                        <h2 style="margin-top: 20px; margin-bottom: 20px" class="animate__animated animate__bounce"><strong>{{$produit->nom}}</strong></h2>
                    </div>
                    <div class="col-md-5" style="padding-left: 60px">
                        <div style="margin-bottom: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>prix</i></p>
                            <h3>{{$produit->prix}}</h3>
                        </div>
                        <div style="margin-bottom: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>categorie</i></p>
                            <h3>{{$produit->categories->nomCat}}</h3>
                        </div>
                        <div style="margin-bottom: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>remise</i></p>
                            <h3>{{$produit->remise}}</h3>
                        </div>
                    </div>
                </div>
                <hr style="width: 77%; margin-left: 0px; margin-right: 0px;">

                @if ($ingredients->count() > 0)
                    <h4 style="margin-top: 40px; margin-bottom: 30px">Ingredients</h4>
                    <div class="container">
                        <div class="row">
                            @foreach ($ingredients as $ingredient)
                                <div class="col-md-4" style="margin-bottom: 40px">
                                    <img style="border-radius: 5px" src="{{ asset($ingredient->imgPath) }}" alt="{{$ingredient->nomElem}}" width="100" height="100">
                                    <h5 style="margin-top: 10px; margin-left: 20px">{{$ingredient->nomElem}}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr style="width: 77%; margin-left: 0px; margin-right: 0px;">

                @endif

                <h4 style="margin-top: 40px; margin-bottom: 30px">Commentaires</h4>
                <div class="container" style="padding: 40px; background-color: rgb(243, 243, 247); border-radius: 15px; width: 80%; margin-left: 0;">
                    @comments(['model' => $produit])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('styles')

@endsection
