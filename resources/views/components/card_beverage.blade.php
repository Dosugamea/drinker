<div class="card rounded-0 bg-white shadow-sm">
    <div class="is-centered">
        <a href="{{ route('beverages.beverage', ['beverage_id'=> $beverage->id]) }}">
            <div class="col-12">
                <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid d-block mx-auto rounded-0">
            </div>
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
