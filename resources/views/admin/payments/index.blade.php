@extends("layouts.admin")

@section("content")

@if (session('success_msg'))
<div class="fixed bottom-0 right-0 m-4 z-50">
    <div id="success-alert"
        class="bg-green-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
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
<div class="fixed bottom-0 right-0 m-4">
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


<section class="is-title-bar relative">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Clients</li>
            <li>Avancements</li>
        </ul>

        <button
            class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
            data-modal-target="#modal">
            Marquer une avancement
        </button>
    </div>

</section>

@endsection