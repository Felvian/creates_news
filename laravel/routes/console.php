<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

Artisan::command('posts:send-scheduled', function () {
    $now = now();
javascript:;
    $posts = Posts::where('time_for_posted', '<=', $now)
        ->whereNull('posted_at')
        ->get();

    foreach ($posts as $post) {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHANNEL_ID');

        $response = Http::withOptions(['verify'=>false,])->post("https://api.telegram.org/bot$token/sendMessage", [
            'chat_id' => $chatId,
            'text' => "*{$post->theme}*\n\n{$post->post}",
            'parse_mode' => 'Markdown',
        ]);
        $this->info($response);
        if ($response->successful()) {
            $post->update(['posted_at' => 1]);
        } else {
            \Log::error("Ошибка отправки в Telegram: " . $response->body());
        }
    }

    $this->info(count($posts) . ' пост(ов) отправлено.');
})->describe('Отправляет запланированные посты в Telegram');

Schedule::command('posts:send-scheduled')->everyMinute();
//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote');
//


