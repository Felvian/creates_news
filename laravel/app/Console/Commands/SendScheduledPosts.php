<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Posts;

class SendScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-posts';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Получаем посты, у которых время <= текущему времени и еще не отправлены
        $posts = Posts::where('time_for_posted', '<=', now())
            ->whereNull('posted_at') // предположим, что это поле отмечает факт отправки
            ->get();

        foreach ($posts as $post) {
            $this->sendToTelegram($post);
        }

        $this->info('Запланированные посты отправлены.');
    }

    private function sendToTelegram($post)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHANNEL_ID');

        $url = "https://api.telegram.org/bot $token/sendMessage";

        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => "*{$post->title}*\n\n{$post->content}",
            'parse_mode' => 'Markdown',
        ]);

        if ($response->successful()) {
            // Отметим, что пост был отправлен
            $post->update(['posted_at' => now()]);
        } else {
            \Log::error("Ошибка отправки в Telegram: " . $response->body());
        }
    }
}
