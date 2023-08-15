@extends('layouts.admin')

@section('content')
    <div class="m-auto m-5 border-4 p-4">
        <div class="flex justify-between">

            <div><span class="font-bold">Nom De Client :</span> <span
                    class="underline ">{{ $client->first_name . ' ' . $client->last_name }}</span>
            </div>
            <div> <span class="font-bold">Date :</span> <span class="underline ">{{ $today }}</span></div>
        </div>
        <form action="" method="post">
        <table class="m-4">
            <thead>
                <tr>
                    <th class="text-left" colspan="2">designation</th>
                    <th class="text-left">unite</th>
                    <th class="text-left">quantite</th>
                    <th class="text-left">prix unitaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img width="30" src={{ asset('/storage/products/' . $product->image) }} alt=""></td>
                        <td>{{ $product->designation }}</td>
                        <td>
                            <select name="" id="">
                                <option value="">Choisie une unite</option>
                                <option value="">KG</option>
                                <option value="">VGE</option>
                                <option value="">U</option>
                            </select>
                        </td>
                        <td><input class="border-2 rounded border-sky-600" class="numberInput" oninput="validateInput(this)" type="text"></td>
                        <td><input class="border-2 rounded border-sky-600" type="text"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="commander">
    </form>
    </div>
@endsection
@section("script")
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
    </script>
    
@endsection