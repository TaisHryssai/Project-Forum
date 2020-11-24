<?php

namespace Tests\Browser\Topic;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Topic;

class ShowTest extends DuskTestCase
{
    /** @var \App\Models\Topic */
    protected $topic;

    public function setUp(): void
    {
        parent::setUp();
        $this->topic = Topic::factory()->create();
    }

    public function testShow(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(route('show.topic', $this->topic->id));

            $browser->with('.card .card-body', function ($body) {
                $body->assertSee($this->topic->title);
                $body->assertSee($this->topic->user->name);
                $body->assertSee($this->topic->created_at->format('d/m/Y H:i'));
                $body->assertSee($this->topic->content);
            });
        });
    }
}
