@extends('layouts.app')

@section('content')
    <style>
        .custom-tron {
            border: 0px;
            box-shadow: 0px;
            background:url('imgs/daniel-sinoca-AANCLsb0sU0-unsplash.jpg') center no-repeat;
            background-size: cover;
        }
        @media only screen and (min-width: 600px) {
            .custom-tron {height: 30vh; margin: 0px;}
        }
    </style>
    <div class="center jumbotron rounded-0 custom-tron">
        <div class="text-center text-white mt-5">
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
                            <p>ユーザーに飲まれた本数: XX本(ダム 0基分)</p>
                            <p>ユーザーの試飲記録数: YY記事(同人誌0冊分)</p>
                            <p>登録ユーザー数: 1人</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-4">
                <div class="h-100">
                    <h3>新着レビュー</h3>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="h-100">
                    <h3>人気ドリンク</h3>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="h-100">
                    <h3>イチオシドリンク</h3>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                    <div class="card">
                        カード要素
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
