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
    <label class="col-sm-4 col-form-label" for="productName">商品名(初回登録時のみ変更可)</label>
    <div class="col-sm-8">
        <input id="productName" name="productName" type="text" disabled class="form-control" placeholder="商品名のみ (例: リプトン ミルクティー)">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="productCompany">製造会社名(初回登録時のみ変更可)</label>
    <div class="col-sm-8">
        <input id="productCompany" name="productCompany" type="text" disabled class="form-control" placeholder="社名のみ (例: キリン/サントリー)">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="productVolume">内容量(初回登録時のみ変更可)</label>
    <div class="col-sm-8">
        <div class="input-group">
            <input id="productVolume" name="productVolume" type="number" disabled class="form-control" min="1" max="5000" placeholder="数値のみ (例: 500)">
            <div class="input-group-append">
                <span class="input-group-text">ml</span>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="productCategory">カテゴリ(初回登録時のみ変更可)</label>
    <div class="col-sm-8">
        <select id="productCategory" name="productCategory" disabled class="form-control">
            <option value="">無し</option>
            @foreach ( $headerCategory as $category )
            <option>{{ $category->name }}</option>
            @endforeach
        </select>
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