@extends("layouts.home")

@section("content")
<img
src="{{asset('assets/imgs/wave.png')}}"
class="fixed hidden lg:block inset-0 h-full"
style="z-index: -1;"
/>
<div
class="w-screen h-screen flex flex-col justify-center items-center lg:grid lg:grid-cols-2"
>
<img
  src="{{asset('assets/imgs/unlock.svg')}}"
  class="hidden lg:block w-1/2 hover:scale-150 transition-all duration-500 transform mx-auto"
/>
<form class="flex flex-col justify-center items-center w-1/2" method="post" action="{{route('login')}}">
  @csrf
  <img src="{{asset('assets/imgs/logo.png')}}" class="w-32" />
  <h2
    class="my-8 font-display font-bold text-3xl text-gray-700 text-center"
  >
    Rab Sal
  </h2>
  <div class="relative">
    <i class="fa fa-user absolute text-primarycolor text-xl"></i>
    <input
    name="email"
      type="email"
      placeholder="email"
      class="pl-8 border-b-2 font-display focus:outline-none focus:border-primarycolor transition-all duration-500  text-lg"
    />
    @error('email')
    <p class="text-red-500 text-sm font-bold mt-1">{{ $message }}</p>
      @enderror
  </div>
  <div class="relative mt-8">
    <i class="fa fa-lock absolute text-primarycolor text-xl"></i>
    <input
    name="password"
      type="password"
      placeholder="password"
      class="pl-8 border-b-2 font-display focus:outline-none focus:border-primarycolor transition-all duration-500 capitalize text-lg"
    />
    @error('password')
    <p class="text-red-500 text-sm font-bold mt-1">{{ $message }}</p>
      @enderror
  </div>
  {{-- <a href="#" class="self-end mt-4 text-gray-600 font-bold"
    >Forgot password?</a
  > --}}
  <button
    class="py-3 px-20 bg-primarycolor rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all duration-500"
    >Login</button
  >
</form>
</div>
@endsection