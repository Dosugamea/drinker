@extends('layouts.app')

@section('content')
<div class="container-lg mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="mt-5">プロフィール設定</h3>
            <form method="post" action="/">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="name">ユーザー名</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword" placeholder="ユーザー名を入力">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="name">ユーザーID(変更不可)</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="shallow_omado">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="name">コメント欄</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" placeholder="コメントを入力"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="name">プロフィールを非公開にする</label>
                    <div class="col-sm-8 mx-auto">
                        <input class="form-control" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block my-4">設定を保存する</button>
                <button type="button" class="btn btn-danger btn-lg btn-block mt-8" data-toggle="modal" data-target="#accountDeleteModal">退会する</button>
            </form>
        </div>
    </div>
</div>
<!-- アカウント削除モーダル -->
<div class="modal fade" id="accountDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">本当にアカウントを削除しますか?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            アカウントを削除すると、本サイトにこれまでに登録した購買記録と、保持しているユーザー情報が全て削除されます。
            試飲記録は自動的に削除されません。試飲記録の削除をご希望の場合はお問い合わせください。
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">アカウントを削除しないで閉じる</button>
            <form method="post" action="/delete-account">
                <button type="button" class="btn btn-danger">アカウントを削除する</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
