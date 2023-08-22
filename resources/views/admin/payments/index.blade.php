@extends('layouts.admin')

@section('content')
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


        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true" id="modal">

            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- Modal content -->
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form id="add_leave" method="post" class="px-4 py-6" action="{{route('admin.payment.store')}}">
                        @csrf

                        <!-- Form title -->
                        <div class="mb-6">
                            <button id="close" type="button"
                                class=" absolute  top-0 right-0 text-gray-500 hover:text-gray-800 hover:bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none"
                                aria-label="Close modal" data-modal-close>
                                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M15.707 4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293A1 1 0 1 0 4.293 5.707L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="client">
                                Client
                            </label>
                            <select name="client"
                                class="shadow appearance-none border-2 border-sky-800 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="client">
                                @foreach ($clients as $client)
                                    <option value={{ $client->id }}>
                                        {{ strtoupper($client->first_name) }} {{ strtoupper($client->last_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Form inputs -->
                        <div class="flex">

                            <div class="mb-4 m-2 md:w-full">
                                <label class="block text-gray-700 font-bold mb-2" for="name-input">
                                    Date
                                </label>
                                <input
                                    class="shadow appearance-none border-2 border-sky-800 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="date" type="date" value="{{ now()->format('Y-m-d') }}" name="date">
                            </div>

                        </div>
                        <div class="mb-4 " >
                            <label class="block text-gray-700 font-bold mb-2" for="employee_id">
                                Montant
                            </label>
                            <input
                                class="shadow appearance-none border-2 border-sky-800 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" name="amount">


                        </div>
                        <div class="flex">
                            <div class="mb-4 m-2 md:w-1/2">
                                <label class="block text-gray-700 font-bold mb-2" for="gender-input">
                                    Type de verment
                                </label>
                                <div class="flex justify-around">

                                    <div class="flex items-center">
                                        <input checked type="radio" class="mr-2 leading-tight" name="type" id="espece"
                                            value="espece">
                                        <label class="text-gray-700" for="espece">
                                            Espece
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="type" class="mr-2 leading-tight" id="check"
                                            value="check">
                                        <label class="text-gray-700" for="check">
                                            Chéque
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mb-4 " style="display: none" id="check_number">
                            <label class="block text-gray-700 font-bold mb-2" for="employee_id">
                                Numero de cheque
                            </label>
                            <input
                                class="shadow appearance-none border-2 border-sky-800 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text" name="check_number">


                        </div>


                        <!-- Form actions -->
                        <div class="flex justify-end">
                            <button
                                class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                type="submit">
                                Enregister
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="w-full p-4">
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Client</th>
                    <th class="py-3 px-6 text-left">Date D'Avancement</th>
                    <th class="py-3 px-6 text-left">Numero de Check</th>
                    <th class="py-3 px-6 text-left">Type</th>
                    <th class="py-3 px-6 text-left">Montant</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
             @foreach($payments as $index=>$payment)
                <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-default">
                    <td class="py-3 px-6 text-left">{{$index+1}}</td>
                    <td class="py-3 px-6 text-left">{{$payment->client->first_name." ".$payment->client->last_name}}</td>
                    <td class="py-3 px-6 text-left">{{$payment->date}}</td>
                    <td class="py-3 px-6 text-left">{{$payment->check?$payment->check->number:"--"}}</td>
                    <td class="py-3 px-6 text-left">{{$payment->check?"Chéque":"Espece"}}</td>
                    <td class="py-3 px-6 text-left">{{$payment->amount}} Dh</td>
                </tr>
                @endforeach
            </tbody>
            <hr>
         
    
        </table>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        let types = document.querySelectorAll("input[name='type']")
        let check_number = document.getElementById("check_number")
        for (let type of types) {
            type.addEventListener("click", (e) => {
                if (e.target.value == "espece"){
                    check_number.style.display = 'none'
                }
                else{
                    check_number.style.display = 'block'

                }
            })
        }
    </script>
@endsection
