@extends('layout.app')

@section('content')

<div class="flex justify-around  text-white text-xl items-center mt-5">
    <router-link :to="{ name: 'pizza-create' }" class="btn btn-primary">Pizza Create</router-link>
    <router-link :to="{ name: 'pizza-index' }" class="btn btn-primary">Pizza Index</router-link>
</div>
<div class="bg-blue-300 h-full">
    <router-view></router-view>
    {{-- Work in Progress here... --}}
</div>

@endsection