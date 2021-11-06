<div class="card rounded-0 bg-white shadow-sm">
    <div class="row">
        <div class="col-4 my-auto">
            <a href="{{ route('beverages.beverage', ['beverage_id'=>$log->beverage->id]) }}">
                <img src="{{ $log->beverage->images->first()->path }}" class="img-fluid rounded-0">
            </a>
        </div>
        <div class="col-8">
                <h5 class="mt-2">{{ $log->beverage->title }}</h5>
                <p>購入本数: {{$log->count}}</p>
                <p>購入単価: {{$log->price}}</p>
                <p>登録日時: {{$log->created_at}}</p>
                <div class="text-right">
                    <p class="btn btn-secondary mx-2">詳細ページへ</p>
                </div>
            </div>
        </a>
    </div>
</div>
