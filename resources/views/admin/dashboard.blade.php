@extends('layouts.admin')

@section("content")

<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>admin</li>
            <li>Tableau de Board</li>
        </ul>
    </div>
</section>

<div class=" p-4 container mx-auto mt-8 grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Chiffre d'affaire card -->
    <div class="bg-blue-500 p-6 rounded-lg shadow-md text-white">
        <div class="flex items-center">
            <span class="text-2xl mr-3">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM1 10a9 9 0 0116-5.12 2.5 2.5 0 00-3.86-.29A3 3 0 009.5 10H7a1 1 0 01-1-1V6a1 1 0 112 0v2h2a1 1 0 100-2H9.5a1.5 1.5 0 011.14.54 4 4 0 003.15 1.93 5 5 0 11-7.23-5.35L6 7a1 1 0 011.42-1.42l2 2a1 1 0 010 1.42l-4 4a1 1 0 11-1.42-1.42L7 9a1 1 0 011.42-1.42l2 2a1 1 0 010 1.42l-4 4a1 1 0 11-1.42-1.42L7 11z" clip-rule="evenodd"/>
                </svg>
            </span>
            <div>
                <p class="text-lg font-semibold">Chiffre d'affaire</p>
                <p class="text-sm">du mois {{$month}}</p>
            </div>
        </div>
        <p class="text-2xl mt-4 font-bold tabular-nums">{{$chiffre}} MAD</p>
    </div>

    <!-- Clients card -->
    <div class="bg-green-500 p-6 rounded-lg shadow-md text-white">
        <div class="flex items-center">
            <span class="text-2xl mr-3">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 3a1 1 0 011-1h14a1 1 0 011 1v8a1 1 0 11-2 0V4H3v12h7a1 1 0 110 2H3a1 1 0 01-1-1V3z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7 15a1 1 0 100 2 1 1 0 000-2zM7 11a1 1 0 100 2 1 1 0 000-2zM7 7a1 1 0 100 2 1 1 0 000-2zM12 15a1 1 0 100 2 1 1 0 000-2zM12 11a1 1 0 100 2 1 1 0 000-2zM12 7a1 1 0 100 2 1 1 0 000-2zM17 15a1 1 0 100 2 1 1 0 000-2zM17 11a1 1 0 100 2 1 1 0 000-2zM17 7a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                </svg>
            </span>
            <div>
                <p class="text-lg font-semibold">Clients</p>
                <p class="text-sm">Total clients</p>
            </div>
        </div>
        <p class="text-2xl mt-4 font-bold">{{$count_clients}}</p>
    </div>

    <!-- Fournisseurs card -->
    <div class="bg-yellow-500 p-6 rounded-lg shadow-md text-white">
        <div class="flex items-center">
            <span class="text-2xl mr-3">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a2 2 0 100 4V7H6v6h5a1 1 0 010 2H5a3 3 0 110-6h7V7a4 4 0 00-4-4H4a1 1 0 01-1-1zM6 5v2h8V5H6z" clip-rule="evenodd"/>
                    <path d="M9 14a1 1 0 100-2 1 1 0 000 2z"/>
                </svg>
            </span>
            <div>
                <p class="text-lg font-semibold">Fournisseurs</p>
                <p class="text-sm">Total fournisseurs</p>
            </div>
        </div>
        <p class="text-2xl mt-4 font-bold">98</p>
    </div>
        <!-- Commands card -->
        <div class="bg-red-500 p-6 rounded-lg shadow-md text-white">
            <div class="flex items-center">
                <span class="text-2xl mr-3">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 100 2h10a1 1 0 110 2H3a1 1 0 100 2h10a1 1 0 110 2H5a1 1 0 100 2h8a1 1 0 010 2H5a3 3 0 010-6h8a3 3 0 000-6H3zm1 4a1 1 0 100 2h8a1 1 0 010 2H4a1 1 0 100 2h6a1 1 0 010 2H4a3 3 0 010-6h6a3 3 0 000-6H4z" clip-rule="evenodd"/>
                    </svg>
                </span>
                <div>
                    <p class="text-lg font-semibold">Commands</p>
                    <p class="text-sm">Total commands</p>
                </div>
            </div>
            <p class="text-2xl mt-4 font-bold">{{count($current_commands)}}</p>
        </div>
    </div>
</div>

@endsection