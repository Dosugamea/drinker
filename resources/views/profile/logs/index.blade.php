@extends('layouts.search')

@section('cards')
@foreach ($logs as $log)
<div class="col-md-5 my-2 mx-2">
    @include('components.card_log')
</div>
@endforeach
@endsection
