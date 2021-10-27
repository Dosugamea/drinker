@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <h2 class="text-center">試飲記録投稿</h2>
        <form class="mt-5" method="post" action="/">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="janCode">JANコード</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" readonly id="janCode" class="form-control" placeholder="JANコードを入力してください">
                        <div class="input-group-append">
                            <button type="button" onclick="startCamera()" class="button btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#janCodeModal">カメラ起動</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="name">商品名(初回登録時のみ変更可能)</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control" placeholder="JANコードを入力してください">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="name">評価</label>
                <div class="col-sm-8">
                    <select class="form-control" id="exampleFormControlSelect2">
                        <option>1.0</option>
                        <option>1.5</option>
                        <option>2.0</option>
                        <option>2.5</option>
                        <option>3.0</option>
                        <option>3.5</option>
                        <option>4.0</option>
                        <option>4.5</option>
                        <option>5.0</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="name">レビュータイトル</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="うまい">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="name">レビュー本文</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="5" placeholder="もっと評価されるべき"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="validatedCustomFile">画像選択(任意)</label>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">ファイルを選択...</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block my-4">試飲記録を投稿する</button>
        </form>
    </div>
</div>
<!-- JANコード読み取りモーダル -->
<div class="modal fade" id="janCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">JANコード読み取り</h5>
        <button type="button" onclick="stopCamera()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            JANコードをカメラにかざしてください
            読み取りに成功すると自動的に画面が切り替わります
            <div id="camera-area" class="camera-area">
                <!-- 青い四角のDIV -->
                <div class="detect-area"></div>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
<script src="/barcode-reader.js"></script>
<link rel="stylesheet" href="/barcode-reader.css">
@endsection
