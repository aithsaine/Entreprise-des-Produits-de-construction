@extends('layouts.admin')

@section("content")
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Produits</li>
            <li>Ajouter un nouveau Produit</li>
        </ul>
    </div>


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
    <form action={{route("admin.products.store")}} enctype="multipart/form-data" method="post">
        @csrf
        <hr class="border-b-1 border-blueGray-300">
        <h6 class="text-blueGray-400   mb-6  uppercase">
            Information de produit
        </h6>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                        Designation
                    </label>
                    <input value="{{ old('designation') }}" type="text" name="designation"
                        class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                    @error('designation')
                        <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                        Stock
                    </label>
                    <input value="{{ old('stock') }}" name="stock" type="text"
                        class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                    @error('stock')
                        <div class="p-4  text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                        Prix Unitaire
                    </label>
                    <input type="text" name="price"
                        class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600"
                        value="{{ old('price') }}">
                    @error('price')
                        <div class="p-4 mb-4  text-red-500 rounded-lg bg-red-50 bg-inherit dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                        Unite
                    </label>
                    <input type="text" name="unite"
                        class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600"
                        value="{{ old('unite') }}">
                    @error('unite')
                        <div class="p-4 mb-4  text-red-500 rounded-lg bg-red-50 bg-inherit dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
                <label class="text-lg block uppercase text-blueGray-600 text-xs  mb-2" htmlfor="grid-password">
                    Image
                </label>
                <input type="file" name="image"
                    class=" border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600"
                    value="{{ old('image') }}">
                @error('image')
                    <div class="p-4 mb-4  text-red-500 rounded-lg bg-red-50 bg-inherit dark:text-red-400"
                        role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>

    
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

           
        </div>
        <button type="submit"
            class=" m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg  px-5 py-2.5 text-center mr-2 mb-2">Enregistrer</button>


        <hr class="mt-6 border-b-1 border-blueGray-300">

    </form>

</div>
</section>@endsection
