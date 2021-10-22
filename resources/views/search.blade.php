@extends('layouts.search')

@section('cards')
@for ($i = 0; $i < 5; $i++)
<div class="col-md-5 my-2 mx-2">
@include('components.card_beverage')
</div>
@endfor
@endsection
