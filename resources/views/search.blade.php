@extends('layouts.search')

@section('cards')
@isset($reviews)
@foreach ($reviews as $review)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_review')
</div>
@endforeach
@if($reviews->count() == 0)
<div class="col-md-5 my-2 mx-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">一致するコンテンツがありませんでした</h5>
        </div>
    </div>
</div>
@endif
@endisset
@isset($beverages)
@foreach ($beverages as $beverage)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_beverage')
</div>
@endforeach
@if($beverages->count() == 0)
<div class="col-md-5 my-2 mx-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">一致するコンテンツがありませんでした</h5>
        </div>
    </div>
</div>
@endif
@endisset
@endsection
