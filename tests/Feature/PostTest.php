<?php

namespace Tests\Feature;

use Faker\Provider\Address;
use Faker\Provider\de_AT\Text;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private string $createUrl = 'post/store';

    public function testFieldsAreValidated()
    {
        $payload = $this->getEmptyPayload();
        $response = $this->post($this->createUrl, $payload);
        $response->assertSessionHasErrors(['title', 'slug', 'content']);

    }

    public function testCreatePost()
    {
        $this->handleValidationExceptions([]);
        $payload = $this->getPayload();
        $response = $this->post($this->createUrl, $payload);

        $this->assertDatabaseHas('posts', [
            'title' => $payload['title'],
            'slug'  => $payload['slug'],
            'content' => $payload['content']
        ]);
    }


    private function getEmptyPayload(): array
    {
        $payload = $this->getPayload();
        $emptyPayload = [];
        foreach($payload as $key =>  $item) {
            $emptyPayload[$key] = '';
        }

        return $emptyPayload;
    }

    private function getPayload(): array
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->text
        ];
    }
}
