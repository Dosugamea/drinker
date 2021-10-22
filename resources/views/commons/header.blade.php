<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="/">Drinker</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar"
            aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="nav-bar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-4">
                    <form class="d-flex my-auto">
                        <input class="form-control my-auto" type="text" placeholder="Search">
                        <button class="btn btn-secondary my-auto" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown mx-2 my-auto">
                    <a class="nav-link dropdown-toggle" id="btnCategory" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">カテゴリ</a>
                    <div class="dropdown-menu" aria-labelledby="btnCategory">
                        <a class="dropdown-item" href="#">水飲料</a>
                        <a class="dropdown-item" href="#">お茶飲料</a>
                        <a class="dropdown-item" href="#">珈琲飲料</a>
                        <a class="dropdown-item" href="#">紅茶飲料</a>
                        <a class="dropdown-item" href="#">果実飲料</a>
                        <a class="dropdown-item" href="#">炭酸飲料</a>
                        <a class="dropdown-item" href="#">乳酸飲料</a>
                        <a class="dropdown-item" href="#">スポーツ飲料</a>
                        <a class="dropdown-item" href="#">野菜飲料</a>
                        <a class="dropdown-item" href="#">お酢飲料</a>
                        <a class="dropdown-item" href="#">栄養ドリンク</a>
                        <a class="dropdown-item" href="#">エナジードリンク</a>
                        <a class="dropdown-item" href="#">ネタ枠</a>
                    </div>
                </li>
                <li class="nav-item dropdown mx-2  my-auto">
                    <a class="nav-link dropdown-toggle" id="btnRanking" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">ランキング</a>
                    <div class="dropdown-menu" aria-labelledby="btnRanking">
                        <a class="dropdown-item" href="#">総合数</a>
                        <a class="dropdown-item" href="#">試飲記録数</a>
                        <a class="dropdown-item" href="#">購買数</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item mr-2"><a href="/auth/login/twitter" class="btn btn-info">試飲記録</a></li>
                <li class="nav-item mr-2"><a href="/auth/login/twitter" class="btn btn-info">購買記録</a></li>
                <li class="nav-item"><img src="https://placehold.jp/35x35.jpg" alt="..." class="rounded-circle"></li>
                @else
                <li class="nav-item"><a href="/auth/login/twitter" class="btn btn-secondary">Twitterでログイン</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
