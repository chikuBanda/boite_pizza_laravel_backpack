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
                <img src="{{ public_path('uploads/img/logo.png') }}" alt="" srcset="" width="160" height="100">
                <h2 style="display: inline; position: absolute; top: 5">Recu</h2>
            </div>

             <div style="margin-top: 70px;">
                <div style="float: left">
                    <h3>Client Name</h3> <br>
                    <p>Date: <b>04 May 16</b></p> <br>
                    <p>Invoice number: <b>1522</b></p> <br>
                </div>

                <div style="text-align: right;">
                    <p>Boite Pizza</p> <br>
                    <p>Address Boite pizza</p> <br>
                    <p>Ville boite pizza</p> <br>
                    <p>Postcode</p> <br>
                </div>
            </div>

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
                    <tr>
                        <td style="text-align: left">
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: left">
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                        <td>
                            hello
                        </td>
                    </tr>
                </tbody>
            </table>

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

                <tr>
                    <td style="text-align: left">
                        hello
                    </td>
                    <td style="text-align: left">
                        hello <br>
                        hello <br>
                        hello <br>
                        hello <br>
                    </td>
                    <td>
                        hello
                    </td>
                    <td>
                        hello
                    </td>
                    <td>
                        hello
                    </td>
                </tr>

                <td style="text-align: left">
                        hello
                    </td>
                    <td style="text-align: left">
                        hello <br>
                        hello <br>
                        hello <br>
                        hello <br>
                    </td>
                    <td>
                        hello
                    </td>
                    <td>
                        hello
                    </td>
                    <td>
                        hello
                    </td>
                </tr>
            </table>

            <h3 style="margin-top: 50px; text-align: end; float: right">Totale: $5000</h3>
        </div>
    </body>
</html>
