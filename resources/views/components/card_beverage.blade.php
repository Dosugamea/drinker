<div class="card rounded-0 bg-white shadow-sm">
    <div class="row">
        <a href="{{ route('beverages.beverage', ['beverage_id'=>'1']) }}">
            <div class="col-4 my-auto">
                <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid rounded-0">
            </div>
            <div class="col-8">
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
