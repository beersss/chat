<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm my_navbar">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-start  align-items-center" href="#">
            <img class="d-inline-block align-text-center me-2" width="32" src="{{ url('pics/logo/laravel.png') }}" alt="logo" />
            BbsChat
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"  href="#">注册</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('login') }}">登录</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
