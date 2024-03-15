<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected $connection;
    protected $channel;
    protected $exchange = 'your_exchange_name';
    protected $queue = 'rabbitmq_laravel_queue';
    protected $routingKey = 'your_routing_key';

    public function __construct()
    {
        /**
         * https://www.rabbitmq.com/tutorials/tutorial-one-php
         * https://fish.rmq.cloudamqp.com/#/queues/kesmdcjd/rabbitmq_queue_waada
         *
         *
         */
        // RABBITMQ_HOST=fish-01.rmq.cloudamqp.com
        // RABBITMQ_PORT=5672
        // RABBITMQ_VHOST=kesmdcjd
        // RABBITMQ_LOGIN=kesmdcjd
        // RABBITMQ_PASSWORD=U-WamYDf5rH5ku_CD6et1SzFG88kSE-w

        // # RABBITMQ_USERNAME=adminx
        // # RABBITMQ_PASSWORD=admin
        // # RABBITMQ_PORT=5672
        // # RABBITMQ_VHOST=/
        // # RABBITMQ_HOST=localhost
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_LOGIN'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST')
        );

        $this->channel = $this->connection->channel();

        $this->channel->exchange_declare($this->exchange, 'direct', false, true, false);
        $this->channel->queue_declare($this->queue, false, true, false, false);
        $this->channel->queue_bind($this->queue, $this->exchange, $this->routingKey);
    }

    public function publish($message)
    {
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, $this->exchange, $this->routingKey);
    }

    public function consume($callback)
    {
        $this->channel->basic_consume($this->queue, '', false, true, false, false, $callback);

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
