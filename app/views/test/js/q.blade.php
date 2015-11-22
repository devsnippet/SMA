<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="">

    <title>Test Javascript</title>

    <!-- jQuery -->
    {{ HTML::script('js/jquery-1.11.3.min.js'); }}
</head>

<body>    
    {{ HTML::script('js/lib/q.js'); }}
    {{ HTML::script('js/test/test.q.js'); }}
</body>
</html>