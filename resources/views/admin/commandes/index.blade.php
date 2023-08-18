@extends('layouts.admin')

@section('content')
    <div class=" justify-center min-h-screen bg-gray-100">


        <div class="w-full p-4">
            @foreach ($commandes as $commande)
                
                <div class="border-2 border-sky-800 shadow m-4 rounded">
                    <div class="flex justify-between p-4">
                        <div>

                            <p class="">Numero de commande : <span class=" font-bold"> {{$commande->id}}</span></p>
                            <p class="">Client : <span class="font-bold"> {{$commande->client->first_name." ".$commande->client->last_name}}</span></p>
                        </div>
                        <div>
                            <p class="">date de commande : <span class=" font-bold"> {{$commande->dateCommande()}}</span></p>
                            <p class="">Client : <span class="font-bold"> {{$commande->client->first_name." ".$commande->client->last_name}}</span></p>
                        </div>
                    </div>
                    <table class="custom-font p-4">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    #
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    designation
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Quantite
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    pric unitaire
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($commande->items as $index => $item)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $index + 1 }}
                                    </td>
                                    <td data-label="Designation" class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $item->product->designation }}
                                        </div>
                                    </td>
                                    <td data-label="Quantite" class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{ $item->quantity }}</div>
                                    </td>
                                    <td data-label="Prix" class="px-6 py-4 text-sm text-gray-500">
                                        {{ $item->price }} DH
                                    </td>
                                    <td data-label="montant" class="px-6 py-4">
                                        {{ $item->price * $item->quantity }} DH
                                    </td>
                                </tr>
                            @endforeach


                            <!--end tr-->
                            <tr class="p-4">
                                <td colspan="3"></td>
                                <td class="text-sm font-bold"><b>Total</b></td>
                                <td class="text-sm font-bold"><b>{{ $totals[$commande->id] }} DH</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endsection
