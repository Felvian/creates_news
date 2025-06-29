<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule as Scheduler;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

Artisan::command('posts:send-scheduled', function () {
    $now = now();

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
            $post->update(['posted_at' => now()]);
        } else {
            \Log::error("Ошибка отправки в Telegram: " . $response->body());
        }
    }

    $this->info(count($posts) . ' пост(ов) отправлено.');
})->describe('Отправляет запланированные посты в Telegram');
//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->purpose('Display an inspiring quote');
//


