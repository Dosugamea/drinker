@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">購買記録投稿</h2>
        <form class="mt-5" method="post" action="{{ route('profile.logs.store', []) }}">
            @csrf
            @include('components.jan_reader')
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="logPrice">購入価格</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="number" class="form-control" name="logPrice" min="1" max="100000" placeholder="130" value="130">
                        <div class="input-group-append">
                            <span class="input-group-text">円</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="logCount">購入本数</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button onclick="changeLogCount(1)" type="button" class="button btn-primary"> + </button>
                        </div>
                        <input type="number" class="form-control" id="logCount" name="logCount" min="1" max="1000" placeholder="1" value="1">
                        <div class="input-group-append">
                            <button onclick="changeLogCount(-1)" type="button" class="button btn-primary"> - </button>
                        </div>
                        <script>
                            function changeLogCount(num) {
                                const logCount = document.getElementById('logCount');
                                const afterValue = parseInt(logCount.value) + num;
                                if (afterValue >= 1 && afterValue <= 1000) {
                                    logCount.value = afterValue;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="logBody">メモ(任意)</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="logBody" rows="5" placeholder="もっと評価されるべき"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block my-4">購買記録を投稿する</button>
        </form>
    </div>
</div>
@endsection
