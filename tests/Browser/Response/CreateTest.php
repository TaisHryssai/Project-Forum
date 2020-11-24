<?php

namespace Tests\Browser\Response;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Topic;
use App\Models\User;
use App\Models\Response;

class CreateTest extends DuskTestCase
{
    /** @var \App\Models\User */
    protected $user;
    /** @var \App\Models\Topic */
    protected $topic;
    /** @var \App\Models\Response */
    protected $response;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->topic = Topic::factory()->create();
        $this->response = Response::factory()->create();
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(route('new.response', ['user_id' => $this->user, 'id' => $this->topic]));

            $browser->type('content', $this->response->content)
            ->attach('attachments[]', 'tests/files/test.png')
            ->press('Responder Tópico');

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Resposta adicionada com sucesso ao tópico');
            });
            $browser->with('table.table', function ($table) {
                $table->assertSee($this->topic->title);
            });
        });
    }
}
