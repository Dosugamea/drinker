@extends('layouts.list')
@section('cards')
@foreach ($reviews as $review)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_review')
</div>
@endforeach
@endsection
