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
            >Panier</h1>
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
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-right: 50px; padding-left: 50px">
                @if (Session::has('cart'))
                    <!-- Shopping cart table -->
                    <form action="{{route('updateCart')}}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Item</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantite</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Totale</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Soupprimer</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $id => $item)
                                    @if ($id[0] == 'p')
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="{{ asset($item['item']->imgPath ) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div style="max-width: 54%" class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="/produits/{{$item['item']->codeProduit}}/details" class="text-dark d-inline-block align-middle">{{$item['item']->nom}}</a></h5>
                                                        <span class="text-muted font-weight-normal font-italic d-block">Categorie: {{$item['item']->categories->nomCat}}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong class="prix">{{$item['item']->prix}}</strong></td>
                                            <td class="border-0 align-middle">
                                                <div class="def-number-input number-input mb-0 w-100">
                                                    <button type="button" onclick="subtract(this)"
                                                    class="minus">-</button>
                                                    <input
                                                        class="quantity"
                                                        min="0"
                                                        name="{{$id}}"
                                                        value="{{$item['quantity']}}"
                                                        type="number"
                                                        style="width: 50%"
                                                        onchange="myfunc(this)">
                                                    <button type="button" onclick="add(this)"
                                                    class="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><strong class="totale">{{$item['item']->prix * $item['quantity']}}</strong></td>
                                            <td class="border-0 align-middle"><a href="#" onclick="removeElem(event, this)" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                    @if ($id[0] == 'f')
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                <img src="{{ asset($item['item']->imgPath ) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div style="max-width: 54%" class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="/formules/{{$item['item']->codeFormule}}/{{$item['item']->nomFormule}}" class="text-dark d-inline-block align-middle">Formule {{$item['item']->nomFormule}}</a></h5>
                                                    <div>
                                                        @foreach (($item['produits']) as $prod)
                                                            <span class="text-muted font-weight-normal font-italic">{{$prod->nom}}, </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong class="prix">{{$item['item']->prix}}</strong></td>
                                            <td class="border-0 align-middle">
                                                <div class="def-number-input number-input mb-0">
                                                    <button type="button" onclick="subtract(this)"
                                                    class="minus">-</button>
                                                    <input
                                                        class="quantity"
                                                        min="0"
                                                        name="{{$id}}"
                                                        value="{{$item['quantity']}}"
                                                        type="number"
                                                        onchange="myfunc(this)"
                                                        style="width: 50%"
                                                        >
                                                    <button type="button" onclick="add(this)"
                                                    class="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><strong class="totale">{{$item['item']->prix * $item['quantity']}}</strong></td>
                                            <td class="border-0 align-middle"><a href="#" onclick="removeElem(event, this)" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                        <div class="row" style="padding-left: 20px; padding-right: 20px;">
                            <div class="col-md-4">
                                <a href="/cart" class="btn btn-outline-secondary">reset</a>
                                <button class="btn btn-primary" type="submit">update cart</button>
                            </div>
                            <div class="col-md-2 offset-md-6">
                                <a href="/checkout" class="btn btn-success" style="width: 100%">checkout</a>
                            </div>
                        </div>

                    </form>
                @else
                    <div class="row">
                        <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4">
                            <h2 style="text-align: center">No items in Cart</h2>
                            <a href="/produits" class="btn btn-success" style="width: 100%">Go to products</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection

@section('styles')

@endsection
