<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        * {
            font-family: 'Roboto Mono', monospace;
        }

        footer {
             font-family:Arial, Helvetica, sans-serif !important;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            background-color: #f9f9f9;
        }

        /* Styles for the footer when printing */
        @media print {
            footer {
                 font-family:Arial, Helvetica, sans-serif !important;
                position: static;
                text-align: center;
                padding: 10px 0;
                background-color: #f9f9f9;
                page-break-after: always;
                /* Ensure each page has a footer */
            }
        }
    </style>
</head>

<body >

    <h1 style="font-size: 24px; margin: 0;text-align:center">RAB SAL</h1>
    <div  style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <div style="display: flex;justify-content:space-between;flex-direction:row">
            <div style=" margin-bottom: 30px;">
                <p style="font-size: 16px; font-weight: bold;">Numero De Commande: {{ $cmd->id }}</p>
                <p style="font-size: 16px; font-weight: bold;">Date: {{ $cmd->created_at->format('d/m/Y') }}
                </p>
            </div>

            <div style="margin-bottom: 30px;">
                <p style="font-size: 16px; font-weight: bold;">Customer: RABSAL</p>
                <p style="font-size: 16px; font-weight: bold;">Client:
                    {{ $cmd->client->first_name . ' ' . $cmd->client->last_name }}</p>
            </div>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th
                    style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;">
                    #</th>
                    <th
                        style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;">
                        Designation</th>
                    <th
                        style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;">
                        Quantite</th>
                    <th
                        style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;">
                        Prix Unitaire</th>
                    <th
                        style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;">
                        SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cmd->items as $index => $item)
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;text-align:center">
                            {{ $index+1 }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;text-align:center">
                            {{ $item->product->designation }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;text-align:center">{{ $item->quantity }}
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;text-align:center">{{ $item->price }}
                            DH</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;text-align:center">
                            {{ $item->price * $item->quantity }} DH</td>
                    </tr>
                @endforeach
                @if ($cmd->transport)
               
                    <tr>
                        <td
                        style="padding: 10px; background-color: #f9f9f9; border-bottom: 2px solid #ddd; text-align: left;"
                        >{{$index+2}}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;;text-align:center;text-decoration:underline">Transport</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;;text-align:center">--</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;;text-align:center">--</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;;text-align:center">{{ $cmd->transport->amount }} DH</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                       
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr style="margin-top: 15px;border:2px solid black">
                    <td></td>
                    <td  style="text-align: right; padding: 10px;font-size:1.3rem;font-weight:bold">Total:</td>
                    <td colspan="2"></td>
                    <td style="padding: 10px; font-weight: bold;">
                        {{ $cmd->transport ? $total + $cmd->transport->amount : $total }} DH</td>
                </tr>
            </tfoot>
        </table>

    </div>
    <footer style="text-align: center; margin-top: 40px;">
        <p style="font-size: 14px; color: #000000;">Merci pour votre confiance!</p>
        <p style="font-size: 12px; color: #000000;">Pour toute question, veuillez nous contacter à +212 635 535 351</p>
        <p style="font-size: 14px; font-weight: bold; color: #333;">RAB SAL</p>
    </footer>
</body>

</html>
