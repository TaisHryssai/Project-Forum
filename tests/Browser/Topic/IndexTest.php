<?php

namespace Tests\Browser\Topic;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Topic;

class IndexTest extends DuskTestCase
{

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
                }
            });
        });
    }

    public function testSearchField(): void
    {
        $topic = Topic::factory()->create(['title' => 'Linux']);

        $this->browse(function ($browser) use ($topic) {

            $browser->visit('/')
            ->type('#search_input', $topic->title)
            ->press('#search')
            ->assertUrlIs(route('search.topics', $topic->title));

            $browser->assertInputValue('term', $topic->title);
            $browser->with("table.table tbody", function ($row) use ($topic) {
                $pos = 0;
                $pos += 1;
                $baseSelector = "tr:nth-child({$pos}) ";

                $row->assertSeeIn($baseSelector, $topic->title);
            });

            $term = time();
            $browser->type('#search_input', $term);
            $browser->keys('#search_input', '{enter}')->assertUrlIs(route('search.topics', $term));

            $browser->assertDontSee($topic->title);
        });
    }
}
