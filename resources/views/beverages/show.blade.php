@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 text-center">
        <img src="https://placehold.jp/640x480.png" class="img-fluid" alt="Responsive image">
        <div class="row mt-1">
            <div class="col-4">
                <img src="https://placehold.jp/640x480.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-4">
                <img src="https://placehold.jp/640x480.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-4">
                <img src="https://placehold.jp/640x480.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-4 mt-sm-0">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#info" data-toggle="tab">情報</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#review" data-toggle="tab">レビュー</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#qa" data-toggle="tab">Q&A</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link bg-primary text-white" href="#">お気に入り</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div id="info" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>ドリンク名</h3>
                                <h4>メーカー名</h4>
                            </div>
                            <div class="col-md-4 mt-2 mt-sm-0">
                                <h4>飲まれた本数: 1本</h4>
                                <h4>人気ランキング: 1位</h4>
                            </div>
                        </div>
                        <p class="mt-2 mt-sm-0">星: 星星星星 半星 4.5 (評価者数: 1名)</p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <p>カテゴリ: ネタ枠</p>
                                <p>容量: 1204ml</p>
                            </div>
                            <div class="col-md-6">
                                <p>発売時期: 2021-12-04</p>
                                <p>終売時期: 2022-12-04</p>
                            </div>
                        </div>
                        <p class="mt-4">タグ:</p>
                        <p>BootStrap-tags-input</p>
                    </div>
                    <div id="review" class="tab-pane text-center">
                        <div class="card rounded-0 bg-white shadow-sm h-100 my-2">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="mx-2 my-1">
                                        <i class="fas fa-user"></i>
                                        ユーザー名
                                    </h4>
                                    <h5 class="mx-2 my-1">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        4.5
                                    </h5>
                                </div>
                                <div class="col-4 text-right">
                                    <h6 class="mr-2 my-1">
                                        スコア: 1
                                    </h6>
                                    <small class="mr-2">2021/12/04 12:04</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                            </div>
                            <h5 class="mx-2 mt-2">
                                レビュータイトル
                            </h5>
                            <h6 class="mx-2 my-1">
                                レビュー本文
                            </h6>
                            <h6 class="text-right mr-2">全文を見る</h6>
                        </div>
                        <div class="card rounded-0 bg-white shadow-sm h-100 my-2">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="mx-2 my-1">
                                        <i class="fas fa-user"></i>
                                        ユーザー名
                                    </h4>
                                    <h5 class="mx-2 my-1">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        4.5
                                    </h5>
                                </div>
                                <div class="col-4 text-right">
                                    <h6 class="mr-2 my-1">
                                        スコア: 1
                                    </h6>
                                    <small class="mr-2">2021/12/04 12:04</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                            </div>
                            <h5 class="mx-2 mt-2">
                                レビュータイトル
                            </h5>
                            <h6 class="mx-2 my-1">
                                レビュー本文
                            </h6>
                            <h6 class="text-right mr-2">全文を見る</h6>
                        </div>
                        <div class="card rounded-0 bg-white shadow-sm h-100 my-2">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="mx-2 my-1">
                                        <i class="fas fa-user"></i>
                                        ユーザー名
                                    </h4>
                                    <h5 class="mx-2 my-1">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        4.5
                                    </h5>
                                </div>
                                <div class="col-4 text-right">
                                    <h6 class="mr-2 my-1">
                                        スコア: 1
                                    </h6>
                                    <small class="mr-2">2021/12/04 12:04</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                                <div class="col-3">
                                    <img src="https://placehold.jp/320x240.jpg" alt="..." class="img-fluid"">
                                </div>
                            </div>
                            <h5 class="mx-2 mt-2">
                                レビュータイトル
                            </h5>
                            <h6 class="mx-2 my-1">
                                レビュー本文
                            </h6>
                            <h6 class="text-right mr-2">全文を見る</h6>
                        </div>
                        <a class="mt-2 btn btn-primary w-75">もっと見る</a>
                    </div>
                    <div id="qa" class="tab-pane text-center">
                        <div class="card">
                            <div class="card-body">
                                aaa
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                aaa
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                aaa
                            </div>
                        </div>
                        <a class="mt-2 btn btn-primary w-75">もっと見る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 text-center mt-2 mt-sm-0">
        <h3>この飲料を買う(楽天市場)</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ショップ名</th>
                <th scope="col">商品名</th>
                <th scope="col">価格</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>KFCN</td>
                <td>KFCN</td>
                <td>1204円</td>
              </tr>
              <tr>
                <td>HTCC</td>
                <td>HTCC</td>
                <td>1204円</td>
              </tr>
              <tr>
                <td>TTRZ</td>
                <td>TTRZ</td>
                <td>1204円</td>
              </tr>
            </tbody>
        </table>
        <a class="btn btn-primary w-75">もっと探す</a>
    </div>
    <div class="col-md-6 text-center my-auto">
        <h3 class="mt-4 mt-sm-0">この飲料を買う(その他)</h3>
        <div>
            <div class="row justify-content-around">
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">Amazon</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">Yahoo</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">auPay</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">オムニ7</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">メルカリ</a>
                </div>
                <div class="col-5 mx-1 my-1">
                    <a class="btn btn-primary w-75">Google</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-around text-center mt-4">
    <div class="col-md-3 mx-1 my-1">
        <a class="btn btn-primary w-75">Twitterでシェア</a>
    </div>
    <div class="col-md-3 mx-1 my-1">
        <a class="btn btn-primary w-75">Facebookでシェア</a>
    </div>
</div>
@endsection
