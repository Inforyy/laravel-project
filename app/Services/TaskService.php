<?php

namespace App\Services;

use GuzzleHttp\Client;

class TaskService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://164.68.97.117:5271/',
        ]);
    }

    public function getAllTasks()
    {
        $response = $this->client->get('Tasks/All');

        if ($response->getStatusCode() == 200) {
            $tasks = json_decode($response->getBody()->getContents(), true);
            return $tasks;
        }

        return null;
    }

    public function createTask($taskData)
    {
        $response = $this->client->post('Tasks', [
            'json' => $taskData,
        ]);

        if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
            $task = json_decode($response->getBody()->getContents(), true);
            return $task;
        }

        return null;
    }

    public function updateTask($taskId, $taskData)
    {
        $response = $this->client->put("Tasks/{$taskId}", [
            'json' => $taskData,
        ]);

        if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
            $task = json_decode($response->getBody()->getContents(), true);
            return $task;
        }

        return null;
    }


    // Detete Task
    public function deleteTask($taskId)
    {
        $response = $this->client->delete("Tasks/{$taskId}");

        return $response->getStatusCode() == 204; // No Content
    }

    public function getTaskById($taskId)
    {
        $response = $this->client->get("Tasks/{$taskId}");

        if ($response->getStatusCode() == 200) {
            $task = json_decode($response->getBody()->getContents(), true);
            return $task;
        }
        
        return null;
    }
}

