@extends('layouts.list')
@section('cards')
@foreach ($beverages as $beverage)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_beverage')
</div>
@endforeach
@endsection
