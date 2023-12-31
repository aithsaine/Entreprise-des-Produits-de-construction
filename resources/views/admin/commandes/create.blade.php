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
            <span>{{session('error_msg')}}</span>

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

    <div class="m-auto m-5 border-4 p-4">
        <form action={{ route('admin.commande.commander', $client->id) }} method="post">

        <div class="flex justify-between">

            <div><span class="font-bold">Nom De Client :</span> <span
                    class="underline ">{{ $client->first_name . ' ' . $client->last_name }}</span>
            </div>

            <div><span class="font-bold">Numero de Bon :</span> <span
                class="underline "><input class="border-2 rounded border-sky-600 text-center" type="text" name="bon"  value={{old('bon')}}></span>
        </div>

            <div> <span class="font-bold">Date :</span> <span class="underline "><input class="border-2 rounded border-sky-600 text-center" type="date" name="date" value={{$today}} id=""></span></div>
        </div>
        <hr class=" m-4">
            @csrf
            <table class="m-4">
                <thead>
                    <tr>
                        <th class="text-left " colspan="2">Designation</th>
                        <th class="text-left ">Unite</th>
                        <th class="text-left ">Quantite</th>
                        <th class="text-left ">Prix Unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img width="30" src={{ asset('/storage/products/' . $product->image) }} alt="">
                            </td>
                            <td>{{ $product->designation }}</td>
                            <td>
                                {{ $product->unite }} </td>
                            <td><input name={{ 'qte_' . $product->id }} class="border-2 rounded border-sky-600"
                                    class="numberInput" oninput="validateInput(this)" type="text"></td>
                            <td><input value="{{ $product->price }}" name={{ 'pu_' . $product->id }}
                                    class="border-2 rounded border-sky-600 text-center" type="text"></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><i style="font-size: 2rem" class="mdi mdi-ambulance"></i> Transport</td>
                        <td><input oninput="validateInput(this)" class="border-2 rounded border-sky-600 text-center" type="text" name="transport"
                                value="{{ old('transport', 0) }}"></td>
                    </tr>
                </tbody>
            </table>
            <button
                class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg  px-5 py-2.5 text-center mr-2 mb-2">Commander</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        function validateInput(input) {
            // Remove any non-numeric and non-dot characters
            input.value = input.value.replace(/[^0-9.]/g, '');

            // Remove extra dots (allow only one dot)
            const dotCount = (input.value.match(/\./g) || []).length;
            if (dotCount > 1) {
                input.value = input.value.replace(/\.+$/, '');
            }
        }
        setInterval(()=>{
            let close = document.getElementById("close-alert")
            if(close    )
            close.click()

        },2000) 
    </script>
@endsection
