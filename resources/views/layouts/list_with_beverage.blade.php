@extends('layouts.app')

@section('content')
@include('components.title_with_beverage')
<div class="row justify-content-around">
    @for ($i = 0; $i < 6; $i++)
    <div class="col-md-5 my-2 mx-2">
        @include('components.card_review')
    </div>
    @endfor
</div>
{{-- ページネーション仮置 --}}
<nav aria-label="Page navigation example mx-auto">
    <ul class="pagination">
        <li class="page-item ml-auto"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item mr-auto"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
@endsection
