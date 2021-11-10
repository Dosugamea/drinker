@extends('layouts.search')

@section('cards')
@isset($reviews)
@foreach ($reviews as $review)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_review')
</div>
@endforeach
@endisset
@isset($beverages)
@foreach ($beverages as $beverage)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_beverage')
</div>
@endforeach
@endisset
@endsection
