<div class="row">
    <div class="col-md-6 text-center">
        <div class="row h-100 mb-3">
            <h3 class="my-auto mx-auto">{{ $pageTitle }}</h3>
        </div>
    </div>
    <div class="col-md-6 mt-2 mt-md-0 text-center">
        <div class="card rounded-0 bg-white shadow-sm">
            <div class="row">
                <div class="col-4 my-auto">
                    @if ($beverage->images->count() >= 1)
                    <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid rounded-0">
                    @else
                    <img src="https://placehold.jp/24/cc9999/993333/250x250.png?text=%E7%94%BB%E5%83%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%9B%E3%82%93" class="img-fluid rounded-0">
                    @endif
                </div>
                <div class="col-8 my-auto">
                    <a href="{{ route('beverages.beverage', ['beverage_id'=> $beverage->id]) }}">
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
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
