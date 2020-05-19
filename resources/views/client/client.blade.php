@include('client.template.head')

<body>

    <div class="wrapper">
        @include('client.template.header')
        @yield('content')
        {{-- @include('client.template.main')
        @include('client.template.project')
        @include('client.template.job')
        @include('client.template.chatbox') --}}
    </div>
    @include('client.template.script')
</body>

</html>