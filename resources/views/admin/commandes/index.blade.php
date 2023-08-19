@extends('layouts.admin')

@section('content')
    <div class=" justify-center min-h-screen bg-gray-100">


        <div class="w-full p-4">
            @foreach ($commandes as $commande)
                <fieldset class="border-2 border-sky-800 shadow m-5 p-5  rounded">
                    <legend class="ms-5 p-2">
                        {{ strtoupper($commande->client->first_name . ' ' . $commande->client->last_name) }}
                    </legend>
                    <div class="flex justify-between p-5 mb-5">
                        <div>

                            <p class="">Numero de commande : <span class=" font-bold"> {{ $commande->id }}</span></p>
                            <p class=""><span class="font-bold"> </span></p>
                        </div>
                        <div>
                            <p class="">date de commande : <span class=" font-bold">
                                    {{ $commande->dateCommande() }}</span></p>
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
                                    prix unitaire
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
                            @if ($commande->transport)
                                <tr class="whitespace-nowrap">
                                    <td data-label="Quantite" class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{ $index + 2 }}</div>
                                    </td>
                                    <td data-label="Designation" class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            Transport </div>
                                    </td>
                                    <td data-label="Quantite" class="px-6 py-4">
                                        <div class="text-sm text-gray-500">--</div>
                                    </td>
                                    <td data-label="Quantite" class="px-6 py-4">
                                        <div class="text-sm text-gray-500">--</div>
                                    </td>
                                    <td data-label="Ammount" class="px-6 py-4  ">
                                        {{ $commande->transport->amount }} DH
                                    </td>

                                </tr>
                            @endif
                            <!--end tr-->


                        </tbody>
                        <tfoot>
                            <tr style="margin-top: 15px;border:1px solid rgb(26, 25, 25);border-radius:15px">
                                <td></td>
                                <td style="text-align: right; padding: 10px;font-size:1.3rem;font-weight:bold">Total:</td>
                                <td colspan="2"></td>
                                <td style="padding: 10px; font-weight: bold;">
                                    {{ $commande->transport ? $totals[$commande->id] + $commande->transport->amount : $totals[$commande->id] }}
                                    DH</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="p-2">

                        <a href="{{ route('admin.commande.print', $commande->id) }}"><i class="fas fa-print mr-2"></i> </a>
                    </div>
                </fieldset>
            @endforeach
        </div>
    @endsection

    @section('script')
        <script></script>
    @endsection
