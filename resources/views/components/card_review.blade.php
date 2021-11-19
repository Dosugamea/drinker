<div class="card rounded-0 bg-white shadow-sm">
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
            <h6 class="mr-2 my-1">
                スコア: 1
            </h6>
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
    <h6 class="text-right mr-2">
        <a class="btn btn-primary" href="{{ route('beverages.beverage', ['beverage_id'=> $review->beverage->id]) }}">
            飲料情報を見る
        </a>
        <a class="btn btn-secondary" href="{{ route('beverages.review', ['beverage_id'=> $review->beverage->id, 'review_id'=> $review->id]) }}">
            レビュー全文を見る
        </a>
    </h6>
</div>
