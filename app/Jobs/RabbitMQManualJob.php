<?php

namespace App\Jobs;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use App\Services\RabbitMQService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class RabbitMQManualJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
            (new RabbitMQService())->publish(json_encode($job));
        }
        return true;
    }
}
