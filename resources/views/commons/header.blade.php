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
                    <form action="/search" method="get" class="d-flex my-auto">
                        <input name="query" class="form-control my-auto" type="text" placeholder="Search">
                        <input type="hidden" name="type" value="beverage">
                        <button class="btn btn-secondary my-auto" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown mx-2 my-auto">
                    <a class="nav-link dropdown-toggle" id="btnCategory" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">カテゴリ</a>
                    <div class="dropdown-menu" aria-labelledby="btnCategory">
                        @for ($i = 0; $i < 14; $i++)
                        {!! link_to_route('search.search', '紅茶飲料', [], ['class' => 'dropdown-item']) !!}
                        @endfor
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
                        {!! link_to_route('rankings.totals', '総合記録数', [], ['class' => 'dropdown-item']) !!}
                        {!! link_to_route('rankings.reviews', '試飲記録数', [], ['class' => 'dropdown-item']) !!}
                        {!! link_to_route('rankings.logs', '購買記録数', [], ['class' => 'dropdown-item']) !!}
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item mr-2">
                    {!! link_to_route(
                        'profile.reviews.create',
                        '試飲記録',
                        [],
                        ['class' => 'btn btn-info'])
                    !!}
                </li>
                <li class="nav-item mr-2">
                    {!! link_to_route(
                        'profile.logs.create',
                        '購買記録',
                        [],
                        ['class' => 'btn btn-info'])
                    !!}
                </li>
                <li class="nav-item">
                    <a href="{{ route('index', []) }}">
                        <img src="{{ Auth::user()->twitter_avatar }}" alt="User profile image" class="rounded-circle">
                    </a>
                </li>
                @else
                <li class="nav-item">
                {!! link_to_route(
                    'redirectToProvider',
                    'Twitterでログイン',
                    [],
                    ['class' => 'btn btn-secondary'])
                !!}
                @endif
            </li>
            </ul>
        </div>
    </nav>
</header>
