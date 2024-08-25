<!DOCTYPE html>
<html lang="en" dir="">

<head>
    @include('includes.head')
</head>

<body>
    {{-- Header --}}
    @include('includes.header')

    {{-- Content --}}
    @yield('content')
    {{-- End Content --}}

    {{-- Footer --}}
    @include('includes.footer')

    {{-- script --}}
    @include('includes.script')
</body>

</html>