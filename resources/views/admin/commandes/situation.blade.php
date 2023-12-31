@extends('layouts.admin')
@section('content')
<section class="is-title-bar relative">

    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>{{$client->first_name." ".$client->last_name}}</li>
            <li>Situation</li>
        </ul>
        <a
        href="{{route('admin.client.situation.print',$client->id)}}"
        class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
        >
        Telecharger
    </a>
      
    </div>
    <div class="w-full p-4">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <h1 class="text-sky-800 text-lg p-4">Les Marchandise : </h1>
            <table class="min-w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Bon N°</th>
                <th class="py-3 px-6 text-left">Date Commande</th>
                <th class="py-3 px-6 text-left">Designation</th>
                <th class="py-3 px-6 text-left">Unite</th>
                <th class="py-3 px-6 text-left">Quantite</th>
                <th class="py-3 px-6 text-left">Prix Unitaire</th>
                <th class="py-3 px-6 text-left">Montant</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
            @php $nbr=0 @endphp
            @foreach($commandes as $index=>$commande)
            @foreach ($commande->items as $item)
            @php $nbr+=1 @endphp
            <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-default">
                <td class="py-3 px-6 text-left">{{$nbr}}</td>
                <td class="py-3 px-6 text-left">{{$commande->bon_number }}</td>
                <td class="py-3 px-6 text-left">{{$commande->dateCommande()}}</td>
                <td class="py-3 px-6 text-left">{{$item->product->designation}}</td>
                <td class="py-3 px-6 text-left">{{$item->product->unite}}</td>
                <td class="py-3 px-6 text-left">{{$item->quantity}}</td>
                <td class="py-3 px-6 text-left">{{$item->price}}</td>
                <td class="py-3 px-6 text-left">{{$item->price * $item->quantity}} Dh</td>
            </tr>
            @endforeach
            @if($commande->transport)
            @php $nbr+=1 @endphp
            <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-default">
                <td class="py-3 px-6 text-left">{{$nbr}}</td>
                <td class="py-3 px-6 text-left">&nbsp;</td>
                <td class="py-3 px-6 text-left">{{$commande->dateCommande()}}</td>
                <td class="py-3 px-6 text-left">TRS</td>
                <td class="py-3 px-6 text-left">--</td>
                <td class="py-3 px-6 text-left">1</td>
                <td class="py-3 px-6 text-left">{{$commande->transport->amount}}</td>
                <td class="py-3 px-6 text-left">{{$commande->transport->amount}} Dh</td>
            </tr>
            @endif
            @endforeach
        </tbody>
        <hr>
        <tfoot>
            <tr class="border-2">
                <th colspan="6">Total</th>
                <th>{{$client->purchases()}} Dh</th>
            </tr>
        </tfoot>

    </table>
        </div>
    </div>

    {{-- les avancements --}}

    <div class="w-full p-4">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <h1 class="text-sky-800 text-lg p-4">Les Avancements : </h1>
            <table class="min-w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Date D'Avancement</th>
                <th class="py-3 px-6 text-left">Numero de Check</th>
                <th class="py-3 px-6 text-left">Type</th>
                <th class="py-3 px-6 text-left">Montant</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
            @foreach($payments as $index=>$payment)
            <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-default">
                <td class="py-3 px-6 text-left">{{$index + 1}}</td>
                <td class="py-3 px-6 text-left">{{$payment->date}}</td>
                <td class="py-3 px-6 text-left">{{$payment->check?$payment->check->number:"--"}}</td>
                <td class="py-3 px-6 text-left">{{$payment->check?"Chéque":"Espece"}}</td>
                <td class="py-3 px-6 text-left">{{$payment->amount}} Dh</td>
            </tr>
            @endforeach
        </tbody>
        <hr>
        <tfoot>
            <tr class="border-2">
                <th colspan="4">Total D'avancements</th>
                <th>{{$client->avancements()}} Dh</th>
            </tr>
        </tfoot>

    </table>
        </div>
    </div>
    <hr class="p-2">
    <div class="w-full p-4">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">

    <table>
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
                <th class="py-3 px-6 text-left"></th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    <tfoot>
        <tr class="border-2">
            <th colspan="6">Le Rest</th>
            <th>{{$client->purchases() - $client->avancements()}} Dh</th>
        </tr>
    </tfoot>
</table>
        </div></div>
</section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
