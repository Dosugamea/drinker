@extends('layouts.app')

@section('content')
    <style>
        .custom-tron {
            border: 0px;
            box-shadow: 0px;
            background:url('imgs/jong-marshes-79mNMAvSORg-unsplash.jpg') center no-repeat;
            background-size: cover;
        }
        @media only screen and (min-width: 600px) {
            .custom-tron {height: 30vh; margin: 0px;}
        }
    </style>
    <div class="center jumbotron rounded-0 custom-tron">
        <div class="text-center text-white">
            <h1>Drinker</h1>
            <h1>毎日のゴクゴクをシェアしよう</h1>
        </div>
    </div>
    <div class="container-lg mt-4">
        <div class="row">
            <div class="col-md-8 mt-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">使い方</h5>
                        <p class="card-text">
                            <ol>
                                <li>このサイトのレビューを見ていい感じの飲み物を買います</li>
                                <li>飲みます</li>
                                <li>いい感じのレビューをします</li>
                                <li>他の人のレビューを見て美味しいドリンクが探せます</li>
                                <li>好循環ループ完成 !!</li>
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">統計</h5>
                        <p class="card-text">
                            <p>ユーザーに飲まれた本数: {{$logs_count}}本</p>
                            <p>ユーザーの試飲記録数: {{$reviews_count}}記事</p>
                            <p>登録ユーザー数: {{$users_count}}人</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="h-100">
                    <h3>新着レビュー</h3>
                    @foreach ($reviews as $review)
                    @include('components.card_review')
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="h-100">
                    <h3>新着ドリンク</h3>
                    @foreach ($beverages as $beverage)
                    @include('components.card_beverage')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
