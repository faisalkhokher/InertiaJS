<?php

namespace App\Jobs;

use Faker\Factory;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CallRabbiqJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // https://github.com/vyuldashev/laravel-queue-rabbitmq/blob/master/README.md

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $faker = Factory::create();
        for ($i=0; $i <10000 ; $i++) {
           $job =  Post::create([
                'name' => $faker->name(),
                'user_id' => $faker->numberBetween(1, 10),
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
