<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('admin.layouts.head-tag')
</head>
<body>
    <section id="app">
        @include('admin.layouts.header')

        <section class="container container-alert mt-3">
            @include('admin.alerts.success')
            @include('admin.alerts.error')
        </section>

        @yield('content')

        @include('admin.layouts.footer')
    </section>




    @include('admin.layouts.script')
</body>
</html>