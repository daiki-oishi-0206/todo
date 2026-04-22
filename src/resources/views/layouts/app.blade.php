<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <title>todo</title>
</head>

<body>
    <!-- ヘッダー -->
    <header class="header">
        <div class="header_inner">
            <h2 class="header_logo">
                <a href="/" class="header_logo">
                    Todo
                </a>
            </h2>
        </div>
    </header>

    <!-- メイン -->
    <main>
        @yield('content')
    </main>


</body>

</html>