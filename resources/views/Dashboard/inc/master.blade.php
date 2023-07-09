@include('Dashboard/inc/header')


@include('Dashboard/inc/navbar')

@include('Dashboard/inc/sidebar')
@include('Dashboard/inc/contentStart')


@yield('content')

@include('Dashboard/inc/contentEnd')
@include('Dashboard/inc/footer')

