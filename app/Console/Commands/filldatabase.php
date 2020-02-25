<?php

namespace App\Console\Commands;

use App\Review;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class filldatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filldatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание администратора admin:123, создание нескольких отзывов';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::create(['name' => 'admin', 'email' => 'admin@example.com', 'password' => Hash::make('123')]);
        echo 'Создан администратор: admin:123' . PHP_EOL;

        Review::create(['author' => 'Иван', 'email' => 'ivan.horoshiy@mail.ru', 'text' => 'Очень хороший скрипт, мне нравится. Пишите ещё!', 'published_at' => Carbon::now()]);
        echo 'Создан отзыв от Ивана' . PHP_EOL;

        Review::create(['author' => 'Владимир', 'email' => 'hacker2007@yandex.ru', 'text' => 'Ой, фууу. Bootstrap, laravel... Я бы за 15 минут на чистом C написал этот сайт без ваших тяжёлых библиотек', 'published_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'image' => '/storage/images/reviews/1582596387_564640.jpg']);
        echo 'Создан отзыв от Владимира' . PHP_EOL;

        Review::create(['author' => 'Константин', 'email' => 'super-gamer@gmail.com', 'text' => 'А что здесь делать надо? Это сайт из одной страницы?', 'published_at' => Carbon::now()]);
        echo 'Создан отзыв от Константина' . PHP_EOL;
    }
}
