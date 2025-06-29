<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->theme}}</title>
</head>
<body>
<h1>{{ $post->theme }}</h1>
<p>{{ $post->post }}</p>
<a href="/posts/{{ $post->id }}/edit">Редактировать</a>
<a href="/posts">Назад к списку постов</a>
</body>
</html>
