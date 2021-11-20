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
                                <p>{{ $user->name}}</p>
                                <p>レビュアー Lv1</p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">
                                <p>試飲記録: {{ $user->reviews_count }}記事</p>
                                <p>購買記録: {{ $user->logs_count }}記事</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $links = [
                '試飲記録を付ける' => 'profile.reviews.create',
                '購買記録を付ける' => 'profile.logs.create',
                '試飲記録一覧を見る' => 'profile.reviews.index',
                '購買記録一覧を見る' => 'profile.logs.index',
                'ログアウト' => 'profile.logout'
            ]
        ?>
        @foreach ($links as $title => $name)
            {!! link_to_route(
                $name,
                $title,
                [],
                ['class' => 'btn btn-primary btn-lg btn-block my-4'])
            !!}
        @endforeach
    </div>
    <div class="col-md-4 mt-3">
        <h3 class="mt-4">新着レビュー</h3>
        @foreach ($reviews as $review)
        <div class="row mx-2">
            @include('components.card_review')
        </div>
        @endforeach
        <h3 class="mt-4">新着ドリンク</h3>
        @foreach ($beverages as $beverage)
        <div class="row mx-2">
            @include('components.card_beverage')
        </div>
        @endforeach
        <h3 class="mt-4">統計</h3>
        <div class="row card mx-2">
            <div class="card-body">
                <p class="card-text">
                    <p>ユーザーに飲まれた本数: {{$logs_count}}本(ダム 0基分)</p>
                    <p>ユーザーの試飲記録数: {{$reviews_count}}記事(同人誌0冊分)</p>
                    <p>登録ユーザー数: {{$users_count}}人</p>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
