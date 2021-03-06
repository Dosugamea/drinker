<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Drinker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Bootswatch Lumenテーマ --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.6.0/dist/lumen/bootstrap.min.css">
    </head>

    <body>

        {{-- ヘッダー: ナビゲーションバー --}}
        @include('commons.header')
        {{-- メインコンテンツ --}}
        <main>
            <div class="container-lg mt-4">
                {{-- エラーメッセージ --}}
                @include('commons.error_messages')

                @yield('content')
            </div>
        </main>
        {{-- フッター: リンク --}}
        @include('commons.footer')
        {{-- BootStrap4の最新にアップデート --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        {{-- 全ページに置かれちゃうが たぶんキャッシュが効くはずなのでとりあえずここにおいておく... --}}
        <link href="/tagsinput.css" rel="stylesheet" type="text/css">
        <script src="/tagsinput.js"></script>
    </body>
</html>
