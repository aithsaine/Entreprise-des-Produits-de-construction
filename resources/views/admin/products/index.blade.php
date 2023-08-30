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


            <table class="m-4">
                <thead>
                    <tr>
                        <th class="text-left" >DESIGNATION</th>
                        <th class="text-left" >UNITE</th>
                        <th class="text-left">PRIX UNITAIRE</th>
                        <th class="text-left">STOCK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <div class="flex ">
                                    <span><img width="30" src={{ asset('storage/products/' . $product->image) }} alt=""></span>
                                    <span>{{ $product->designation }}</span>
                                </div>
                            </td>
                            <td>{{$product->unite}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
