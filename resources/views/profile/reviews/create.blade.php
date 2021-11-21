@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">試飲記録投稿</h2>
        <h5 class="text-center">ここではレビューを投稿できます。同じ飲み物にレビューを2回投稿した場合は前回のレビューが上書きされます。</h5>
        <form class="mt-5" method="post" action="{{ route('profile.reviews.store', []) }}" enctype="multipart/form-data">
            @csrf
            @include('components.jan_reader')
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="reviewRate">評価</label>
                <div class="col-sm-8">
                    <select id="reviewRate" name="reviewRate" class="form-control">
                        <option>1.0</option>
                        <option>1.5</option>
                        <option>2.0</option>
                        <option>2.5</option>
                        <option>3.0</option>
                        <option>3.5</option>
                        <option>4.0</option>
                        <option>4.5</option>
                        <option>5.0</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="reviewTitle">レビュータイトル</label>
                <div class="col-sm-8">
                    <input id="reviewTitle" name="reviewTitle" type="text" class="form-control" placeholder="うまい">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="reviewBody">レビュー本文</label>
                <div class="col-sm-8">
                    <textarea id="reviewBody" name="reviewBody" class="form-control" rows="5" placeholder="もっと評価されるべき"></textarea>
                </div>
            </div>
            {{--
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="validatedCustomFile">画像選択(任意)</label>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="files[][photo]" id="customFile" multiple>
                        <label class="custom-file-label" for="customFile">ファイルを選択...</label>
                    </div>
                </div>
            </div>
            --}}
            <button type="submit" class="btn btn-primary btn-lg btn-block my-4">試飲記録を投稿する</button>
        </form>
    </div>
</div>
@endsection
