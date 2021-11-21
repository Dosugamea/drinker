@extends('layouts.app')

@section('content')
@include('components.title_with_beverage')
<div class="row">
    <div class="col-12 text-center mt-4">
        <div class="card">
            <div class="row mt-3">
                <div class="col-8 mt-2 my-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>
                                <i class="fas fa-user"></i>
                                {{ $review->user->name }}
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <h5>
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
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <h5>
                                {{ $review->created_at }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-2 mx-auto">
                    <div class="row justify-content-center">
                        <form action="{{ route('beverages.review.vote', ['review_id'=> $review->id, 'beverage_id'=> $review->beverage->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                            <button type="submit" class="btn btn-primary">↑</button>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                        {{ $score }}
                    </div>
                    <div class="row justify-content-center">
                        <form action="{{ route('beverages.review.vote', ['review_id'=> $review->id, 'beverage_id'=> $review->beverage->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="vote" value="-1">
                            <button type="submit" class="btn btn-primary">↓</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ( $review->images as $img )
                <div class="col-3">
                    <img src="{{ '/storage/'.$img->path }}" alt="..." class="img-fluid">
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="mx-2 mt-2 text-center">
                        {{ $review->title }}
                    </h3>
                </div>
                <div class="col-12">
                    <h4 class="mx-2 my-1">
                        {{ $review->body }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-4 mb-2">
                <div class="col-md-3 mx-1 my-1">
                    <a
                        target="_blank"
                        class="btn btn-primary w-75"
                        href="{{'https://twitter.com/share?url='.urlencode(request()->fullUrl()).'&text='.urlencode('[Drinker] '.$review->beverage->title.'のレビュー評価はこちら!')}}">
                        Twitterでシェア
                    </a>
                </div>
                <div class="col-md-3 mx-1 my-1">
                    <a
                        target="_blank"
                        class="btn btn-primary w-75"
                        href="{{'https://line.me/R/msg/text/?'.htmlspecialchars('[Drinker] '.$review->beverage->title.'のレビュー評価を見てみよう!')}}">
                        LINEでシェア
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
