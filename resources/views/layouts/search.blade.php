@extends('layouts.app')

@section('content')
<div class="container-lg mt-4">
    {{-- ソート方法 --}}
    <div class="row">
        <div class="col-md-6">
            <ul class="nav nav-pills">
                <li class="nav-item ml-auto">
                    <a class="nav-link active" href="#">新着順</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">評価順</a>
                </li>
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="#">評価数順</a>
                </li>
            </ul>
        </div>
        <div class="col-md-6 mt-2 mt-md-0 text-center">
            <button class="btn btn-secondary mx-auto" data-toggle="modal" data-target="#filterModal">絞り込み方法選択</button>
        </div>
    </div>

    {{-- カード挿入予定地 --}}
    <div class="row justify-content-around">
        @yield('content')
    </div>

    {{-- ページネーション予定地 --}}
    <nav aria-label="Page navigation example mx-auto">
        <ul class="pagination">
            <li class="page-item ml-auto"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item mr-auto"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
<!-- 絞り込み用モーダル -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">絞り込み方法</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <h3>カテゴリ</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            未選択
                        </label>
                    </div>
                </div>
                {{-- ここにカテゴリ一覧が入る予定 --}}
            </div>
            <h3 class="mt-4">タグ</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios21" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios21">
                            未選択
                        </label>
                    </div>
                </div>
                {{-- ここにタグ一覧が入る予定 --}}
            </div>
            <h3 class="mt-4">検索対象</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios31" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios31">
                            レビュー
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios32" value="option2">
                        <label class="form-check-label" for="exampleRadios32">
                            ドリンク
                        </label>
                    </div>
                </div>
            </div>
            <h3 class="mt-4">評価</h3>
            <select class="form-control" id="exampleFormControlSelect2">
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
            {{--
            後回しにする
            <h3 class="mt-4">非表示</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    画像無しのレビューを非表示
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck2">
                    匿名ユーザーのレビューを非表示
                </label>
            </div>
            --}}
            <button type="button" class="btn btn-primary btn-lg btn-block my-4">絞り込む</button>
        </div>
    </div>
    </div>
</div>
@endsection
