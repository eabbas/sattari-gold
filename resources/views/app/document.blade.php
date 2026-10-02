@include('app.header')

<div id="mainDiv">
    @yield('content')
</div>
@if (!Route::is('home'))
    <script>
        document.querySelector('#mainDiv').classList = 'mt-[' + document.querySelector('header').clientHeight + 'px]'
    </script>
@endif
@include('app.footer')
