@extends('layouts.admin')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Clients</li>
            <li>les clients</li>
        </ul>
    </div>
</section>
    <table id="myTable" class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Nom Compléte</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">numero de tele</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">buttons</div>
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
                    <td data-label="le post" class="p-2 whitespace-nowrap ">
                        <div class="text-center">{{ $client->tele ?? '---' }}</div>
                    </td>
                    <td data-label="actions" class="p-2 whitespace-nowrap lg:flex lg:justify-center ">
                        <div class="none">
                            <button class="flex items-center space-x-2 p-1 text-xs bg-sky-200 rounded-lg">
                                <i class="fas fa-plus"></i> <!-- Replace with your icon's HTML -->
                                <span> commander</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
