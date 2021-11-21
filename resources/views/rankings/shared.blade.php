@extends('layouts.list')
@section('cards')
@foreach ($beverages as $beverage)
<div class="col-md-5 my-2 mx-2">
    <p class="text-center">第{{ $loop->iteration}}位<p>
    @include('components.card_beverage')
</div>
@endforeach
@endsection
