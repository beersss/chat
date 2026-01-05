<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm my_navbar">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-start  align-items-center" href="{{route('root')}}">
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
                @guest
                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('register')}}">注册</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('login') }}">登录</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-thumbnail" width="32" src="{{ asset('fakers/avatars/face1.jpg') }}" alt="avatar">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="text-center">
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-user-tie"></i>
                                    个人中心
                                </a>
                            </li>
                            <li class="text-center">
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    编辑资料
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="text-center">
                                <form action="{{ route('logout') }}" method="POST"
                                onsubmit="return confirm('您是否真的要退出登录')"
                                >
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        退出
                                    </button>
                                </form>
                            </li>


                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
