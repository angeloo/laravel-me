<?php

namespace Angeloo\Me\Tests\Feature\Http\Controllers\Api;

use Angeloo\Me\Http\Resources\PostResource;
use Angeloo\Me\Tests\Http\Resources\MeResource;
use Angeloo\Me\Tests\Models\User;
use Angeloo\Me\Tests\TestCase;

class MeControllerTest extends TestCase
{
    /** @test */
    public function it_can_display_the_current_user()
    {
        config(['me.with' => 'posts']);
        config(['me.resource' => MeResource::class]);

        $user = User::factory()
            ->hasPosts(3)
            ->create();

        $resource = (new MeResource($user));

        $response = $this
            ->actingAs($user)
            ->get('me')
            ->assertOk();

        $this->assertSame(json_decode($resource->response()->getContent(), true), $response->json());

    }
}
