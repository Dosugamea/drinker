<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="janCode">JANコード</label>
    <div class="col-sm-8">
        <div class="input-group">
            <input type="text" name="janCode" readonly id="janCode" class="form-control" placeholder="JANコードを入力してください">
            <div class="input-group-append">
                <button type="button" onclick="startCamera()" class="button btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#janCodeModal">カメラ起動</button>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="productName">商品名(初回登録時のみ変更可能)</label>
    <div class="col-sm-8">
        <input id="productName" name="productName" type="text" disabled class="form-control" placeholder="JANコードを入力してください">
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