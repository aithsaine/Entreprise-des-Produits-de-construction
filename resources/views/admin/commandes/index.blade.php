@extends('layouts.admin')

@section('content')
@if (session('success_msg'))
<div class="fixed bottom-0 right-0 m-4 z-50">
    <div id="success-alert"
        class="bg-green-500 text-white  rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
        <span>{{ session('success_msg') }}</span>
        <button id="close-alert"
            class="text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
</div>
@endif
@if ($errors->any())
<div class="fixed bottom-0 right-0 m-4 Z-50 ">
    <div id="fail-alert"
        class=" relative bg-red-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
        <div class="flex flex-col p-3 ">

            @foreach ($errors->all() as $err)
                <span>{{ $err }}</span>
            @endforeach
        </div>

        <button id="close-alert"
            class=" absolute top-0 right-0 text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
</div>
@endif
@if (session('error_msg'))
<div class="fixed bottom-0 right-0 m-4  z-50">
    <div id="fail-alert"
        class=" relative bg-red-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
        <div class="flex flex-col p-3 ">
            <span>{{ session('error_msg') }}</span>

        </div>

        <button id="close-alert"
            class=" absolute top-0 right-0 text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
</div>
@endif
    <section class="is-title-bar relative">

        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Clients</li>
                <li>Commandes</li>
            </ul>


        </div>
        <div class=" justify-center min-h-screen bg-gray-100 rounded mt-4">



            <div class="w-full p-4">
                <form onsubmit="" style="box-shadow: 2px 2px 2px gray" class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between">
                        <div class="">
                            <label html="email" class="block text-lg text-gray-700 font-bold mb-2">
                                Client
                            </label>
                            <select id="client_id"
                                class="bg-gray-50   text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 text-gray-600">
                                <option value="-1">Selectionner Le Client</option>
                                @foreach ($clients as $cl)
                                    <option value={{ $cl->id }}>{{ $cl->first_name . ' ' . $cl->last_name }}
                                    </option>
                                @endforeach
                                <option value="-1">Tout</option>
                            </select>
                        </div>
                       
                        <div class="">
                            <label html="date" class="block text-gray-700 font-bold mb-2">
                                &nbsp;
                            </label>
                            <button type="button" id="btn-search"
                                class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                                Chercher
                            </button>
                        </div>
                    </div>
                </form>
                @foreach ($commandes as $commande)
                    <fieldset class="border-2 border-sky-800 shadow m-5 p-5  rounded">
                        <legend class="ms-5 p-2">
                            BON N° {{ $commande->bon_number }}
                        </legend>
                        <div class="flex justify-between p-5 mb-5">
                            <div>
                                <div>
                                    <p class="">Client : <span class=" font-bold">
                                            {{ strtoupper($commande->client->first_name . ' ' . $commande->client->last_name) }}</span>
                                    </p>
                                    <p class=""><span class="font-bold"> </span></p>

                                </div>
                                <div>

                                    <p class="">Numero de commande : <span class=" font-bold">
                                            {{ $commande->id }}</span></p>
                                    <p class=""><span class="font-bold"> </span></p>
                                </div>
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
                                    <td style="text-align: right; padding: 10px;font-size:1.3rem;font-weight:bold">Total:
                                    </td>
                                    <td colspan="2"></td>
                                    <td style="padding: 10px; font-weight: bold;">
                                        {{ $commande->transport ? $totals[$commande->id] + $commande->transport->amount : $totals[$commande->id] }}
                                        DH</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="p-2">

                            <a href="{{ route('admin.commande.print', $commande->id) }}"><i class="mdi mdi-printer"></i>
                            </a>
                            <a href={{route('admin.commande.edit',$commande->id)}}><i class="mdi mdi-pen"></i>
                            </a>
                          
                        </div>
                    </fieldset>
                @endforeach
            </div>
    </section>
@endsection

@section('script')
    <script>
        let btn = document.getElementById("btn-search");
        client_id_input = document.getElementById("client_id")
        btn.addEventListener('click', () => {
            let url = `{{ route('admin.commande.index', ['client' => 'clientNumber']) }}`
            window.location.href = url.replace("clientNumber", client_id_input.value)

        })
    </script>
@endsection
