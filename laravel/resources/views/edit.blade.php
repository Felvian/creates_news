<!DOCTYPE html>
<html>
<head>
    <title>Редактировать пост</title>
</head>
<body>
<h1>Редактировать пост</h1>

<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT') <!-- Указываем, что это PUT-запрос -->

    <div>
        <label for="title">Заголовок:</label>
        <input type="text" name="theme" id="theme" value="{{ old('title', $post->theme) }}" required>
    </div>

    <div>
        <label for="content">Текст:</label>
        <textarea name="post" id="post" required>{{ old('content', $post->post) }}</textarea>
    </div>
    <div>
        <label for="published_at">Дата публикации:</label>
        <input type="datetime-local" name="time_for_posted" id="time_for_posted"
               value="{{ old('time_for_posted', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
    </div>
    <button type="submit">Обновить</button>
</form>

<br>
<a href="/posts">Назад к списку</a>
</body>
</html>
