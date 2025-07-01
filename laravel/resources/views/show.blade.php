<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->theme}}</title>
            @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <div class="py-5"><h1 class="font-bold text-2xl">{{ $post->theme }}</h1></div>
        @foreach(explode(',', $post->media) as $link)
            @php
                $trimmedLink = trim($link); // Убираем лишние пробелы
            @endphp
            <img src="{{ $trimmedLink }}" target="_blank"></a><br>
        @endforeach
        <pre style="white-space: pre-wrap;">{{ $post->post }}</pre>
        @foreach(explode(',', $post->url) as $link)
            @php
                $trimmedLink = trim($link); // Убираем лишние пробелы
            @endphp
            <a href="{{ $trimmedLink }}" target="_blank">{{ $trimmedLink }}</a><br>
        @endforeach
        <div class="py-5"></div><a href="/posts/{{ $post->id }}/edit"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a><br>
        <a href="/posts"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Назад к списку постов</a></div>
    </div>
</body>
</html>
