<html>
    <head>
        <style>
            html{
                max-width: 600px;
                max-height: 350px;
            },
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
            },
            p{
                margin-bottom: 8px
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
                    <h3 style="margin: 0px">{{$cmd->client->nom}} {{$cmd->client->prenom}}</h3> <br>
                    <p style="margin: 0px">Date: <b>{{$cmd->date}}</b></p> <br>
                    <p style="margin: 0px">Num recu: <b>{{$cmd->numCommande}}</b></p> <br>
                </div>

                <div style="text-align: right;">
                    <p style="margin: 0px">Boite Pizza</p> <br>
                    <p style="margin: 0px">Marjane</p> <br>
                    <p style="margin: 0px">Beni Mellal</p> <br>
                    <p style="margin: 0px">23000</p> <br>
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
                            <th style="text-align: right">
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
                                <td style="text-align: center">
                                    ${{$produit->prix}}
                                </td>
                                <td style="text-align: center">
                                    {{$produit->pivot->nb}}
                                </td>
                                <td style="text-align: right">
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
                        <th style="text-align: right">
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
                            <td style="text-align: center">
                                {{$formule->prix}}
                            </td>
                            <td style="text-align: center">
                                {{$formule->pivot->nb}}
                            </td>
                            <td style="text-align: right">
                                {{$formule->pivot->prix}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            <div style="margin-top: 50px; text-align: end; float: right">
                <div style="text-align: left; float: left;">
                    <h4>Sous Totale:</h4>
                    <h4>Livraison:</h4>
                    <h3>Totale:</h3>
                </div>
                <div style="text-align: right; float: right; margin-left: 50px">
                    <h4>${{$cmd->totale}}</h4>
                    <h4>${{$cmd->prixLiv}}</h4>
                    <h3>${{$cmd->totale + $cmd->prixLiv}}</h3>
                </div>
            </div>

        </div>
    </body>
</html>
