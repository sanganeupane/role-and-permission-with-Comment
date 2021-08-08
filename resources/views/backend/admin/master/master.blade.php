@include('backend\admin\layouts\header')
@include('backend\admin\layouts\sidebar')

@include('backend\admin\layouts\footer')


@yield('header')
@yield('sidebar')
@yield('content')


@yield('footer')
