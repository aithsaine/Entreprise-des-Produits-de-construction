@extends('layouts.admin')

@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Clients</li>
                <li>Ajouter un nouveau client</li>
            </ul>
        </div>
    </section>


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

    <div class="card-content">
        <form action="" method="post">
            @csrf
            <hr class="border-b-1 border-blueGray-300">
            <h6 class="text-lg text-blueGray-400   mb-6  uppercase">
                Information d'employee
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                            Nom
                        </label>
                        <input value="{{ old('first_name') }}" type="text" name="first_name"
                            class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                        @error('first_name')
                            <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                            Prenom
                        </label>
                        <input value="{{ old('last_name') }}" name="last_name" type="text"
                            class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                        @error('last_name')
                            <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                            numéro National(cin)
                        </label>
                        <input type="text" name="cin"
                            class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600"
                            value="{{ old('cin') }}">
                        @error('cin')
                            <div class="p-4 mb-4  text-red-500 rounded-lg bg-red-50 bg-inherit dark:text-red-400"
                                role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="mt-6 border-b-1 border-blueGray-300">

            <h6 class="text-lg text-blueGray-400  mt-3 mb-6  uppercase">
                Contact Information
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                            description
                        </label>
                        <textarea name="description"
                            class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 text-gray-600 resize-none">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                            Telephone
                        </label>
                        <input value="{{ old('phone') }}" name="phone" type="text"
                            class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600"
                            placeholder="+212 XXX XXX XXX">
                        @error('phone')
                            <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit"
                class=" m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg  px-5 py-2.5 text-center mr-2 mb-2">Enregistrer</button>


            <hr class="mt-6 border-b-1 border-blueGray-300">

        </form>

    </div>
@endsection
