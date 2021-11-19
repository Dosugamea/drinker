<div class="card rounded-0 bg-white shadow-sm">
    <div class="is-centered">
        <a href="{{ route('beverages.beverage', ['beverage_id'=> $beverage->id]) }}">
            <div class="col-12">
                <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid d-block mx-auto rounded-0">
            </div>
            <div class="col-12 is-centered">
                <h4 class="mt-2">{{ $beverage->title }}</h4>
                <h6>メーカー名</h6>
                <p>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    4.5 |
                    <small>評価者数: 1名</small>
                </p>
            </div>
        </a>
    </div>
</div>
