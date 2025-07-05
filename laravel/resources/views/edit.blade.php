<!DOCTYPE html>
<html>
<head>
    <title>Редактировать пост</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
<h1>Редактировать пост</h1>

<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT') <!-- Указываем, что это PUT-запрос -->

    <div >
        <div>
            <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Заголовок:</label>
            <input type="text"  name="theme" id="theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('title', $post->theme) }}" required />
        </div>
    </div>

    <div>
        <label for="content">Текст:</label>
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                    <label for="editor" class="sr-only">Publish post</label>
                    <textarea  name="post" id="post" rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required >{{ old('content', $post->post) }}</textarea>
                </div>
        </div>
    </div>
    <div>
        <label for="published_at">Дата публикации:</label>
        <input type="datetime-local" name="time_for_posted" id="time_for_posted" class="border-blue-500 border-2 border-solid"
               value="{{ old('time_for_posted', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
    </div>
    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Обновить</button>
</form>

<br>
<a href="/posts" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Назад к списку</a>
</div>

</body>
</html>
