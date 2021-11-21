@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 text-center">
        <img src="{{ $beverage->images->first()->path }}" class="img-fluid" alt="Responsive image">
        <div class="row mt-1">
            @if ($beverage->images->count() >= 2)
            <div class="col-4">
                <img src="{{ $beverage->images[1]->path }}" class="img-fluid" alt="Responsive image">
            </div>
            @endif
            @if ($beverage->images->count() >= 3)
            <div class="col-4">
                <img src="{{ $beverage->images[2]->path }}" class="img-fluid" alt="Responsive image">
            </div>
            @endif
            @if ($beverage->images->count() >= 4)
            <div class="col-4">
                <img src="{{ $beverage->images[3]->path }}" class="img-fluid" alt="Responsive image">
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-8 mt-4 mt-sm-0">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#info" data-toggle="tab">情報</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#review" data-toggle="tab">レビュー</a>
            </li>
            <li class="nav-item ml-auto">
                <form action="{{ route('beverages.beverage.vote', ['beverage_id'=> $beverage->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="nav-link bg-primary text-white">お気に入り x{{ $score }}</button>
                </form>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div id="info" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>{{ $beverage->title }}</h3>
                                <h4>{{ $beverage->company }}</h4>
                            </div>
                            <!--
                            <div class="col-md-4 mt-2 mt-sm-0">
                                <h5>飲まれた本数: 1本</h5>
                                <h5>レビュー数: {{ $beverage->reviews_count}}記事</h5>
                            </div>
                            -->
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p>容量: {{ $beverage->volume }}ml</p>
                                <p>評価:
                                @for ($i = 1; $i <= $beverage->ratingAverage; $i++)
                                <i class="fas fa-star text-warning"></i>
                                @endfor
                                @if ($beverage->ratingAverage - floor($beverage->ratingAverage) > 0)
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                @endif
                                @for ($i = 1; $i <= 5 - $beverage->ratingAverage; $i++)
                                    <i class="far fa-star text-warning"></i>
                                @endfor
                                {{ $beverage->ratingAverage }} |
                                <small>評価者数: {{$beverage->ratingCount}} 名</small></p>
                            </div>
                            <div class="col-md-6">
                                @if ($beverage->sell_start_on != NULL)
                                <p>発売時期: {{ $beverage->sell_start_on }}</p>
                                @endif
                                @if ($beverage->sell_end_on != NULL)
                                <p>終売時期: {{ $beverage->sell_end_on }}</p>
                                @endif
                            </div>
                        </div>
                        <p class="mt-4">タグ:</p>
                        <input id="tags" name="tags" type="text" data-role="tagsinput">
                        <script>
                        let tags = {!! json_encode($tags) !!}
                        </script>
                    </div>
                    <div id="review" class="tab-pane text-center">
                        @foreach ( $reviews as $review )
                        <div class="card rounded-0 bg-white shadow-sm h-100 my-2">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="mx-2 my-1">
                                        <i class="fas fa-user"></i>
                                        {{ $review->user->name }}
                                    </h4>
                                    <h5 class="mx-2 my-1">
                                        @for ($i = 1; $i <= $review->star; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                        @endfor
                                        @if ($review->star - floor($review->star) > 0)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        @endif
                                        @for ($i = 1; $i <= 5 - $review->star; $i++)
                                            <i class="far fa-star text-warning"></i>
                                        @endfor
                                        {{ $review->star }}
                                    </h5>
                                </div>
                                <div class="col-4 text-right">
                                    <small class="mr-2">{{ $review->created_at }}</small>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ( $review->images as $img )
                                <div class="col-3">
                                    <img src="{{ '/storage/'.$img->path }}" alt="..." class="img-fluid">
                                </div>
                                @endforeach
                            </div>
                            <h5 class="mx-2 mt-2">
                                {{ Str::limit($review->title, 15) }}
                            </h5>
                            <h6 class="mx-2 my-1">
                                {{ Str::limit($review->body, 30) }}
                            </h6>
                            <a href="{{ route('beverages.review', ['review_id'=> $review->id, 'beverage_id'=> $review->beverage->id]) }}" class="text-right mr-2">全文を見る</a>
                        </div>
                        @endforeach
                        @isset($review)
                        <a href="{{ route('beverages.reviews', ['beverage_id'=> $review->beverage->id]) }}" class="mt-2 btn btn-primary w-75">もっと見る</a>
                        @else
                        <p>まだ レビューはありません</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 text-center mt-2 mt-sm-0">
        <h3>この飲料を買う(楽天市場)</h3>
        <table class="table">
            <thead>
              <tr>
                  <th scope="col">商品名</th>
                  <th scope="col">ショップ名</th>
                <th scope="col">価格</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $beverage->rakuten_products->take(5) as $product )
                    <tr>
                        <td><a target="_blank" href="{{ $product->url }}">{{ $product->title }}</a></td>
                        <td>{{ $product->shopName }}</td>
                        <td>{{ $product->price.'円' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a target="_blank" class="btn btn-primary w-75" href="{{ 'https://search.rakuten.co.jp/search/mall/'.urlencode($beverage->title) }}">もっと探す</a>
    </div>
    <div class="col-md-6 text-center my-auto">
        <h3 class="mt-4 mt-sm-0">この飲料を買う(その他)</h3>
        <div>
            <div class="row justify-content-around">
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://www.amazon.co.jp/s?k='.urlencode($beverage->title) }}" class="btn btn-primary w-75">Amazon</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://shopping.yahoo.co.jp/search?p='.urlencode($beverage->title) }}" class="btn btn-primary w-75">Yahoo</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://www.yodobashi.com/?word='.urlencode($beverage->title) }}" class="btn btn-primary w-75">ヨドバシ.com</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://7net.omni7.jp/search/?keyword='.urlencode($beverage->title) }}" class="btn btn-primary w-75">オムニ7</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://jp.mercari.com/search?keyword='.urlencode($beverage->title) }}" class="btn btn-primary w-75">メルカリ</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a target="_blank" href="{{ 'https://www.google.com/search?tbm=shop&q='.urlencode($beverage->title) }}" class="btn btn-primary w-75">Google</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-around text-center mt-4">
    <div class="col-md-3 mx-1 my-1">
        <a
            class="btn btn-primary w-75"
            target="_blank"
            href="{{'https://twitter.com/share?url='.urlencode(request()->fullUrl()).'&text='.urlencode('[Drinker] '.$beverage->title.'のレビュー評価はこちら!')}}">
            Twitterでシェア
        </a>
    </div>
    <div class="col-md-3 mx-1 my-1">
        <a
            class="btn btn-primary w-75"
            target="_blank"
            href="{{'https://line.me/R/msg/text/?'.htmlspecialchars('[Drinker] '.$beverage->title.'のレビュー評価を見てみよう!')}}">
            LINEでシェア
        </a>
    </div>
</div>
@endsection
