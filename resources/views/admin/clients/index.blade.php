@extends('layouts.admin')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Clients</li>
            <li>les clients</li>
        </ul>
        <a
        href="{{route('admin.client.create')}}"
        class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
        >
        Ajouter Un Nouveau Clients
    </a>
    </div>
</section>
    <table id="myTable" class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">NOM COMPLET</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">NUMERO TELEPHONE</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">TOTAL MARCHANDISES</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">TOTAL DES AVANCES</div>
                </th>
                
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">ACTIONS</div>
                </th>
            </tr>
        </thead>
        <tbody class="text-sm divide-y divide-gray-100">
            @foreach ($clients as $client)
                <tr>
                    <td data-label="NOM COMPLETE" class="p-2 whitespace-nowrap ">
                        <div class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                    src="https://avatars.dicebear.com/v2/initials/{{ $client->first_name[0] }}-{{ $client->last_name[0] }}.svg">
                            </div>
                            <div class="font-medium text-gray-800">{{ strtoupper($client->first_name) }}
                                {{ strtoupper($client->last_name) }}
                            </div>
                        </div>
                        </div>
                    </td>
                    <td data-label="Numero de telephone" class="p-2 whitespace-nowrap ">
                        <div class="text-center">{{ $client->tele?$client->tele: '---' }}</div>
                    </td>
                    <td data-label="Numero de telephone" class="p-2 whitespace-nowrap ">
                        <div class="text-center">{{ $client->purchases() }} DH</div>
                    </td>
                    <td data-label="Numero de telephone" class="p-2 whitespace-nowrap ">
                        <div class="text-center">{{$client->avancements()}} Dh </div>
                    </td>
                    <td data-label="Actions" class="p-2 whitespace-nowrap lg:flex lg:justify-center ">
                        <div class="none">
                            <a class="flex items-center space-x-2 m-2 p-1 text-xs bg-sky-200 rounded-lg" href={{route("admin.commande.create",$client->id)}}>
                                <i class="fas fa-plus"></i> <!-- Replace with your icon's HTML -->
                                <span> commander</span>
                            </a>
                            <a
                            href="{{route('admin.client.situation',$client->id)}}"
                            class="flex items-center space-x-2 m-2 p-1 text-xs bg-yellow-200 rounded-lg" href={{route("admin.commande.create",$client->id)}}>
                                <i class="fas fa-info"></i> <!-- Replace with your icon's HTML -->
                                <span> situation</span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
