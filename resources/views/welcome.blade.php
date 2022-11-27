{{--<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />--}}
{{--<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>--}}

{{--<div id="editor"></div>--}}

{{--<script>--}}

{{--</script>--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@yield('content')
@vite(['resources/scss/app.scss', 'resources/js/app.js'])
</body>
</html>
