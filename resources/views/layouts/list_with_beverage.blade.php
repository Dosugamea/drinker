@extends('layouts.app')

@section('content')
@include('components.title_with_beverage')
<div class="row justify-content-around">
@foreach ($reviews as $review)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_review')
</div>
@endforeach
</div>
{{-- ページネーション仮置 --}}
{{ $reviews->links() }}
@endsection
