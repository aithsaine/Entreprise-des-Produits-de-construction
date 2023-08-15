@extends('layouts.admin')
@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Produits</li>
                <li>Les Produit</li>
            </ul>
        </div>
    </section>

    <div class="row ">
        @foreach ($products as $product)
            <div   class="block border m-2 max-w-[8rem] h-[15rem] col-6 col-md-4 col-lg-3 flex flex-col items-center rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <div class="relative overflow-hidden bg-cover bg-no-repeat">
                    <h1 class="text-base text-center text-neutral-600 dark:text-neutral-200">
                        {{ $product->designation }}
                    </h1>
                    <img width="100" class="rounded-t-lg" src={{ asset('/storage/products/' . $product->image) }}
                        alt="" />
                </div>
                <hr>
                <div class="p-6">
                    <h4 class="text-sky-800">{{ $product->stock }}</h4>
                </div>
            </div>
            @endforeach
    </div>
@endsection
