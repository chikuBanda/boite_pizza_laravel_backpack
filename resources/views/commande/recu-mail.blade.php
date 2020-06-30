<html>
    <head>
        <style>
            th
            {
                text-align: right;
                border-bottom: 1px solid grey;
                padding: 5px;
            },
            td
            {
                text-align: right;
                padding: 5px;
                padding-top: 15px;
                /*border-bottom: 1px solid grey;*/
            },
            table { overflow: visible !important; }
            thead { display: table-header-group }
            tfoot { display: table-row-group }
            tr { page-break-inside: avoid },
            @page {
                    margin-top: 50mm;
            },
            p, h3{
                display: inline;
            }
        </style>
    </head>
    <body>
        <div style="padding-left: 30px; padding-right: 30px; position: relative">
            <div>
                <img src="{{ asset('uploads/img/logo.png') }}" alt="" srcset="" width="160" height="100">
                <h2 style="display: inline; position: absolute; top: 5">Recu</h2>
            </div>

             <div style="margin-top: 70px;">
                <div style="float: left">
                    <h3>{{$cmd->client->nom}} {{$cmd->client->prenom}}</h3> <br>
                    <p>Date: <b>{{$cmd->date}}</b></p> <br>
                    <p>Invoice number: <b>{{$cmd->numCommande}}</b></p> <br>
                </div>

                <div style="text-align: right;">
                    <p>Boite Pizza</p> <br>
                    <p>Marjane</p> <br>
                    <p>Beni Mellal</p> <br>
                    <p>23000</p> <br>
                </div>
            </div>


            @if ($cmd->produits->count() > 0)
                <h4 style="margin-top: 70px; margin-bottom: 20px">Produits:</h4>

                <table style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto">
                    <thead>
                        <tr style="border-bottom: 1px solid black">
                            <th style="width: 40%; text-align: left">
                                Nom
                            </th>
                            <th>
                                Prix unitaire
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Subtotal
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cmd->produits as $produit)
                            <tr>
                                <td style="text-align: left">
                                    {{$produit->nom}}
                                </td>
                                <td>
                                    ${{$produit->prix}}
                                </td>
                                <td>
                                    {{$produit->pivot->nb}}
                                </td>
                                <td>
                                    ${{$produit->pivot->prix}}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            @endif

            @if ($cmd->formules->count() > 0)
                <h4 style="margin-top: 70px; margin-bottom: 20px">Formules:</h4>

                <table style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto">
                    <tr style="border-bottom: 1px solid black">
                        <th style="width: 20%; text-align: left">
                            Nom
                        </th>
                        <th style="width: 20%; text-align: left">
                            Produits
                        </th>
                        <th>
                            Prix unitaire
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Subtotal
                        </th>
                    </tr>

                    @foreach ($cmd->formules as $formule)
                        <tr>
                            <td style="text-align: left">
                                {{$formule->nomFormule}}
                            </td>
                            <td style="text-align: left">
                                @foreach ($formule->produitsDuFormule() as $produitItem)
                                    {{$produitItem->nom}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$formule->prix}}
                            </td>
                            <td>
                                {{$formule->pivot->nb}}
                            </td>
                            <td>
                                {{$formule->pivot->prix}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            <h3 style="margin-top: 50px; text-align: end; float: right">Totale: ${{$cmd->totale}}</h3>
        </div>
    </body>
</html>
