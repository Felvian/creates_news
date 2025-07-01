<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Тема
                </th>
                <th scope="col" class="px-6 py-3">
                    Пост
                </th>
                 <th scope="col" class="px-6 py-3">
                    Медиа 
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата для выгрузки 
                </th>
                <th scope="col" class="px-6 py-3">
                    Выгружено 
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Открыть</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{$post->theme}}
                </td>
                <td class="px-6 py-4">
                    {{$post->post}}
                </td>
                <td class="px-6 py-4">
                    @if ($post->media)
                        Есть
                    @else
                        Нет
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$post->time_for_posted}}
                </td>
                <td class="px-6 py-4">
                    @if ($post->posted_at)
                        Выгружено
                    @else
                        Не выгружено
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="/posts/{{$post->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Открыть</a>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    </body>
</html>
