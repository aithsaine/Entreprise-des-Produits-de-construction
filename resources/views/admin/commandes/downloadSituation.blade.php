<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
      *{
        font-size: 0.9rem;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
      }
      td{
        height: 2px !important;
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
<body>
    <h1 style="font-size: 24px; margin: 0;text-align:center">RAB SAL</h1>
    <div style="display: flex;justify-content:space-between;flex-direction:row">
        <div style=" margin-bottom: 30px;">
            <p style="font-size: 16px; font-weight: bold;">Date: {{ now()->format('d/m/Y') }}
            </p>
        </div>

        <div style="margin-bottom: 30px;">
            <p style="font-size: 16px; font-weight: bold;">Customer: RABSAL</p>
            <p style="font-size: 16px; font-weight: bold;">Client:
                {{ $client->first_name . ' ' . $client->last_name }}</p>
        </div>
    </div>

    <div class="w-full p-4">
        <div style="background-color: white; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow-x: auto;">
            <table style="min-width: 100%;">
                <thead>
                    <tr style="background-color: #f3f4f6; color: #374151; line-height: 1.25rem;">
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">#</th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Date Commande</th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Designation</th>
                        <th></th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Unite</th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Quantite</th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Prix Unitaire</th>
                        <th style="padding: 0.75rem 1.5rem; text-align: left;">Montant</th>
                    </tr>
                </thead>
                <tbody style="color: #4b5563; font-weight: 300;">
                    @php $nbr=0 @endphp
                    @foreach($commandes as $index=>$commande)
                    @foreach ($commande->items as $item)
                    @php $nbr+=1 @endphp
                    <tr style="border-bottom: 1px solid #edf2f7;">
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$nbr}}</td>
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$commande->dateCommande()}}</td>
                        <td colspan="2" style="padding: 0.75rem 1.5rem; text-align: left;width:240px">{{$item->product->designation}}</td>
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$item->product->unite}}</td>
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$item->quantity}}</td>
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$item->price}}</td>
                        <td style="padding: 0.75rem 1.5rem; text-align: left;">{{$item->price * $item->quantity}} Dh</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            
            </table>
            <div style="display: flex;justify-content:space-between;border:2px solid black;margin:10px;padding:10px">
                <span style="font-size: 1.2rem;font-weight:bold;color: #4b5563;">TOTAL</span>
                <span style="font-size: 1.2rem;font-weight:bold;margin-left:500px;color: #4b5563;">{{$client->purchases()}} Dh</span>
            </div>
        </div>
    </div>

<footer style="text-align: center; margin-top: 40px;">
    <p style="font-size: 14px; color: #000000;">Merci pour votre confiance!</p>
    <p style="font-size: 12px; color: #000000;">Pour toute question, veuillez nous contacter à +212 635 535 351</p>
    <p style="font-size: 14px; font-weight: bold; color: #333;">RAB SAL</p>
</footer>

</body>
</html>