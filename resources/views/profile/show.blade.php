@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">
                                <p>ユーザー名</p>
                                <p>レビュアー Lv1</p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">
                                <p>試飲記録: 0記事</p>
                                <p>購買記録: 0記事</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block my-4">試飲記録をつける</button>
        <button type="button" class="btn btn-primary btn-lg btn-block my-4">購買記録をつける</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block my-4">試飲記録一覧</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block my-4">購買記録一覧</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block my-4">質問に回答する</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block my-4">ユーザー設定</button>
    </div>
    <div class="col-md-4 mt-3">
        <h3 class="mt-4">人気ドリンク</h3>
        @for ($i = 0; $i < 3; $i++)
            <div class="row mx-2">
                @include('components.card_beverage')
            </div>
        @endfor
        <h3 class="mt-4">イチオシドリンク</h3>
        @for ($i = 0; $i < 3; $i++)
            <div class="row mx-2">
                @include('components.card_beverage')
            </div>
        @endfor
        <h3 class="mt-4">統計</h3>
        <div class="row card mx-2">
            <div class="card-body">
                <p class="card-text">
                    <p>ユーザーに飲まれた本数: XX本(ダム 0基分)</p>
                    <p>ユーザーの試飲記録数: YY記事(同人誌0冊分)</p>
                    <p>登録ユーザー数: 1人</p>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
