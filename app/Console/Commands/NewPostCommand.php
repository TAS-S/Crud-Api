<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Faker\Factory;

class NewPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newPost:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating new post everyday';

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
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create();
        $title = $faker->sentence;
        $content = $faker->text($maxNbChars = 200);
        $author = $faker->name;

        Post::create([
            'title' => $title,
            'content' => $content,
            'author' => $author
        ]);

        $this->info('Post successfully created');
    }
}
