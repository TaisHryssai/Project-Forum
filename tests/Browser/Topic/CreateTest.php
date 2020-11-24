<?php

namespace Tests\Browser\Topic;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Topic;
use App\Models\User;

class CreateTest extends DuskTestCase
{
    /** @var \App\Models\User */
    protected $user;
    /** @var \App\Models\Topic */
    protected $topic;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->topic = Topic::factory()->create();
    }

    public function testFailureCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(route('new.topic', $this->user))
            ->press('Criar Tópico');

            $browser->with('span.invalid-feedback', function ($flash) {
                $flash->assertSee('O campo título é obrigatório.');
            });

            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Existem dados incorretos! Por favor verifique!');
            });
        });
    }

    public function testSucessfullyCreate(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(route('new.topic', $this->user));

            $browser->type('title', $this->topic->title)
            ->type('content', $this->topic->content)
            ->type('keywords[]', $this->topic->keywords)
            ->attach('attachments[]', 'tests/files/test.png')
            ->press('Criar Tópico');

            // $browser->assertUrlIs(route('index.topic'));
            $browser->with('div.alert', function ($flash) {
                $flash->assertSee('Tópico adicionado com sucesso');
            });
            $browser->with('table.table', function ($table) {
                $table->assertSee($this->topic->title);
            });
        });
    }
}
