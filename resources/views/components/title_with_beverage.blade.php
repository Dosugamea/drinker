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
                    <img src="{{ $beverage->images()->get()[0]->path }}" class="img-fluid rounded-0">
                </div>
                <div class="col-8 my-auto">
                    <a href="{{ route('beverages.beverage', ['beverage_id'=> $beverage->id]) }}">
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
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
