@extends('layouts.app')

@section('content')
<div class="container-lg mt-4">
    {{-- ソート方法 --}}
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">検索結果ページ</h3>
            {{--
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
            --}}
        </div>
        <div class="col-md-6 mt-2 mt-md-0 text-center">
            <button class="btn btn-secondary mx-auto" data-toggle="modal" data-target="#filterModal">絞り込み方法選択</button>
        </div>
    </div>

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
            <form action="/search" method="get">
                <h3>カテゴリ</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="categoryTagRadio" value selected>
                            <label class="form-check-label" for="categoryTagRadio">
                                未指定
                            </label>
                        </div>
                    </div>
                    @foreach ( $headerCategory as $category )
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="categoryTagRadio{{ $loop->iteration }}" value="{{ $category->name }}">
                            <label class="form-check-label" for="categoryTagRadio{{ $loop->iteration }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h3 class="mt-4">タグ</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tag" id="tagRadio" selected value>
                            <label class="form-check-label" for="tagRadio">
                                未選択
                            </label>
                        </div>
                    </div>
                    @foreach ( $tags as $tag )
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tag" id="tagRadio{{ $loop->iteration }}" value="{{ $tag->name }}">
                            <label class="form-check-label" for="tagRadio{{ $loop->iteration }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h3 class="mt-4">検索対象</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="radioBeverage" value="beverage" checked>
                            <label class="form-check-label" for="radioBeverage">
                                ドリンク
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="radioReview" value="review">
                            <label class="form-check-label" for="radioReview">
                                レビュー
                            </label>
                        </div>
                    </div>
                </div>
                {{--
                <h3 class="mt-4">評価</h3>
                <select name="rate" class="form-control">
                    <option selected value>未指定</option>
                    <option value="1.0">~1.0</option>
                    <option value="1.5">1.0~1.5</option>
                    <option value="2.0">1.5~2.0</option>
                    <option value="2.5">2.0~2.5</option>
                    <option value="3.0">2.5~3.0</option>
                    <option value="3.5">3.0~3.5</option>
                    <option value="4.0">3.5~4.0</option>
                    <option value="4.5">4.0~4.5</option>
                    <option value="5.0">4.5~5.0</option>
                </select>
                --}}
                <button type="submit" class="btn btn-primary btn-lg btn-block my-4">絞り込む</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
