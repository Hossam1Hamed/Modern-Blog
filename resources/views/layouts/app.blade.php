@include('inc\header')
@include('inc\aside')
@include('inc\navbar')

<div class="container-fluid py-4">

    @yield('content')

</div>
@include('inc\errors')
@include('inc\footer')