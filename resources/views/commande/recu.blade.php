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
            p, h3, h4{
                display: inline;
                margin-bottom: 8px
            }
        </style>
    </head>
    <body>
        <div style="padding-left: 30px; padding-right: 30px; position: relative">
            <div>
                <img src="{{ public_path('uploads/img/logo.png') }}" alt="" srcset="" width="160" height="100">
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
                <h4 style="margin-top: 100px; margin-bottom: 20px">Produits:</h4>

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
                <h4 style="margin-top: 100px; margin-bottom: 20px">Formules:</h4>

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
                            Quantite
                        </th>
                        <th>
                            Totale
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


            <div style="margin-top: 50px">
                <div style="text-align: right; float: right; margin-left: 50px">
                    <h4>${{$cmd->sousTotale}}</h4> <br>
                    <h4>${{$cmd->prixLiv}}</h4> <br>
                    <h3>${{$cmd->totale}}</h3>
                </div>
                <div style="text-align: left; float: right">
                    <h4>Sous Totale:</h4> <br>
                    <h4>Livraison:</h4> <br>
                    <h3>Totale:</h3>
                </div>
            </div>
        </div>
    </body>
</html>
