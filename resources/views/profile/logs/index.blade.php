@extends('layouts.search')

@section('content')
@for ($i = 0; $i < 5; $i++)
@include('components.card_beverage')
@endfor
@endsection
