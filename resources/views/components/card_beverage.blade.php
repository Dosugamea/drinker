<div class="card rounded-0 bg-white shadow-sm">
    <div class="is-centered">
        <a href="{{ route('beverages.beverage', ['beverage_id'=> $beverage->id]) }}">
            @if ($beverage->images->count() >= 1)
            <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid rounded-0">
            @else
            <img src="https://placehold.jp/24/cc9999/993333/250x250.png?text=%E7%94%BB%E5%83%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%9B%E3%82%93" class="img-fluid rounded-0">
            @endif
            <div class="col-12 is-centered">
                <h4 class="mt-2">{{ $beverage->title }}</h4>
                <h6>{{ $beverage->company }}</h6>
                <p>
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
                    <small>評価者数: {{$beverage->ratingCount}} 名</small>
                </p>
            </div>
        </a>
    </div>
</div>
