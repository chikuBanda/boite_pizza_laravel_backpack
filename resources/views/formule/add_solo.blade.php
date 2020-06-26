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
            >Formule {{$formule->nomFormule}}</h1>
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

                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-8 offset-md-2" style="text-align: center">
                        <h1 style="text-align: center">Selectionnez les produits</h1>
                        <p style="margin-bottom: 0px"><i>{{$formule->description}}</i></p>
                    </div>
                </div>

                <hr style="margin-bottom: 25px">

                <form action="/add-formule-to-cart/{{$formule->codeFormule}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-5 form-group" style="margin-bottom: 40px">
                            <label for="pizza1">Pizza 1</label>
                            <select id="pizza1" class="form-control" name="pizza1">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'pizza')
                                        <option style="background-image: url('{{ asset('uploads/img/wood-background.jpg') }}')">
                                            {{$produit->nom}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5 offset-md-2" style="margin-bottom: 40px">
                            <div class="form-check form-check-inline">
                                <input checked class="form-check-input" type="radio" name="choix" id="radio_salade" value="option1">
                                <label class="form-check-label" for="radio_salade">Salade</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="radio_wings" value="option2">
                                <label class="form-check-label" for="radio_wings">6 chicken wings</label>
                            </div>

                            <select style="margin-top: 7px" class="form-control" name="salade_verte" id="salade_verte">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'salade')
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <div class="form-group" style="margin-top: 7px">
                                <input value="6 chicken wings" name="chicken_wings" class="form-control" id="chicken_wings" readonly hidden>
                            </div>
                        </div>

                        <div class="col-md-5 form-group" style="margin-bottom: 40px">
                            <label for="boisson">Boisson</label>
                            <select class="form-control" id="boisson" name="boisson">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'boisson'
                                        && (
                                            $produit->nom == 'coca' ||
                                            $produit->nom == 'coca zero' ||
                                            $produit->nom == 'the froid' ||
                                            $produit->nom == 'fanta'))
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <hr />

                        <div class="col-md-3 offset-md-9 form-group">
                            <button type="submit" style="width: 100%" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/form_add.js')}}"></script>
@endsection

@section('styles')

@endsection



