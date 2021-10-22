@extends('layouts.app')

@section('content')
@include('components.title_with_beverage')

<div class="card rounded-0 bg-white shadow-sm text-center mt-4">
    <div class="row justify-content-center mt-2">
        <div class="col-md-7">
            <p class="mx-2 mt-1">以前発売していた フルーツティーと同じじゃないですか!</p>
            <h4 class="mx-2">
                <i class="fas fa-user"></i>
                ユーザー名 <small>2021/12/04 12:04</small>
            </h4>
        </div>
    </div>
    <div class="row justify-content-center">
        @for ($i = 0; $i < 6; $i++)
        <div class="col-md-10">
            @include('components.card_answer')
        </div>
        @endfor
    </div>
</div>

<div class="row justify-content-center text-center mt-4">
    <div class="col-md-3 mx-1 my-1">
        <a class="btn btn-primary w-75">回答を投稿する</a>
    </div>
</div>
<div class="row justify-content-around text-center mt-4">
    <div class="col-md-3 mx-1 my-1">
        <a class="btn btn-primary w-75">Twitterでシェア</a>
    </div>
    <div class="col-md-3 mx-1 my-1">
        <a class="btn btn-primary w-75">Facebookでシェア</a>
    </div>
</div>
@endsection
