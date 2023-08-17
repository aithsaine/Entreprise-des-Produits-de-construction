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
                        <th class="text-left" colspan="2">designation</th>
                        <th class="text-left">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img width="30" src={{ asset('/storage/products/' . $product->image) }} alt="">
                            </td>
                            <td>{{ $product->designation }}</td>
                            <td>{{$product->stock." ".$product->unite}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
