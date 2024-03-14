<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\RabbitMQService;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = array(
            'key1' => 'faisal',
            'key2' => 'javed',
            'key3' => 'value3'
        );

        // Convert data to JSON
        $jsonData = json_encode($data);

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish($jsonData);
        dd("RabbitMQ message sent successfully");
    }

    // public function test_received_example()
    // {
    //     $rabbitMQService = new RabbitMQService();

    //     $callback = function ($msg) {
    //         echo "Received message: " . $msg->body . "\n";
    //     };

    //     $rabbitMQService->consume($callback);
    //     dd("RabbitMQ received message successfully".$rabbitMQService->consume($callback));
    // }
}
