<header class="header">

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <a href="" class="navbar-brand">پروژه لاراول</a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <section class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link @yield('home')">خانه</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link @yield('category')">دسته بندی</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @yield('post')">پست</a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @yield('user')">کاربران</a>
                </li>
            </ul>

            <section class="me-auto mx-3">
                <span><a href="" class="btn btn-sm btn-info">ثبت نام</a></span>
                <span><a href="" class="btn btn-sm btn-info">ورود</a></span>
            </section>
        </section>
    </nav>
</header>