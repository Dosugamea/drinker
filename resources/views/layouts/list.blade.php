@extends('layouts.app')

@section('content')
@include('components.title')
{{-- カード挿入予定地 --}}
<div class="row justify-content-around">
    @yield('cards')
</div>
{{-- ページネーション予定地 --}}
@isset($reviews)
{{ $reviews->links() }}
@endisset
@isset($logs)
{{ $logs->links() }}
@endisset
@isset($beverages)
{{ $beverages->links() }}
@endisset
@endsection
