<?php

namespace Tests\Browser\Topic;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Topic;

class IndexTest extends DuskTestCase
{
    /** @var \App\Models\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testIndexList(): void
    {
        $topics = Topic::factory()->count(3)->create();

        $this->browse(function ($browser) use ($topics) {
            $browser->visit('/');

            $browser->with("table.table tbody", function ($row) use ($topics) {
                $pos = 0;
                foreach ($topics as $topic) {
                    $pos += 1;
                    $baseSelector = "tr:nth-child({$pos}) ";

                    $row->assertSeeIn($baseSelector, $topic->title);
                    $row->assertSeeIn($baseSelector, $topic->user->name);
                    $row->assertSeeIn($baseSelector, $topic->created_at->format('d/m/Y H:i'));

                    $editSelector = $baseSelector . "a[href='" . route('show.topic', $topic->id) . "']";
                    $row->assertPresent($editSelector);
                    $row->assertPresent($deleteSelector);
                }
            });
        });
    }
}
