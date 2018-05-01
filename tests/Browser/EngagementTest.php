<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class EngagementTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateEngagement()
    {
        $admin = \App\User::find(1);
        $engagement = factory('App\Engagement')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $engagement) {
            $browser->loginAs($admin)
                ->visit(route('admin.engagements.index'))
                ->clickLink('Add new')
                ->type("stats_date", $engagement->stats_date)
                ->type("fans", $engagement->fans)
                ->type("engagements", $engagement->engagements)
                ->type("reactions", $engagement->reactions)
                ->type("comments", $engagement->comments)
                ->type("shares", $engagement->shares)
                ->press('Save')
                ->assertRouteIs('admin.engagements.index')
                ->assertSeeIn("tr:last-child td[field-key='stats_date']", $engagement->stats_date)
                ->assertSeeIn("tr:last-child td[field-key='fans']", $engagement->fans)
                ->assertSeeIn("tr:last-child td[field-key='engagements']", $engagement->engagements)
                ->assertSeeIn("tr:last-child td[field-key='reactions']", $engagement->reactions)
                ->assertSeeIn("tr:last-child td[field-key='comments']", $engagement->comments)
                ->assertSeeIn("tr:last-child td[field-key='shares']", $engagement->shares);
        });
    }

    public function testEditEngagement()
    {
        $admin = \App\User::find(1);
        $engagement = factory('App\Engagement')->create();
        $engagement2 = factory('App\Engagement')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $engagement, $engagement2) {
            $browser->loginAs($admin)
                ->visit(route('admin.engagements.index'))
                ->click('tr[data-entry-id="' . $engagement->id . '"] .btn-info')
                ->type("stats_date", $engagement2->stats_date)
                ->type("fans", $engagement2->fans)
                ->type("engagements", $engagement2->engagements)
                ->type("reactions", $engagement2->reactions)
                ->type("comments", $engagement2->comments)
                ->type("shares", $engagement2->shares)
                ->press('Update')
                ->assertRouteIs('admin.engagements.index')
                ->assertSeeIn("tr:last-child td[field-key='stats_date']", $engagement2->stats_date)
                ->assertSeeIn("tr:last-child td[field-key='fans']", $engagement2->fans)
                ->assertSeeIn("tr:last-child td[field-key='engagements']", $engagement2->engagements)
                ->assertSeeIn("tr:last-child td[field-key='reactions']", $engagement2->reactions)
                ->assertSeeIn("tr:last-child td[field-key='comments']", $engagement2->comments)
                ->assertSeeIn("tr:last-child td[field-key='shares']", $engagement2->shares);
        });
    }

    public function testShowEngagement()
    {
        $admin = \App\User::find(1);
        $engagement = factory('App\Engagement')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $engagement) {
            $browser->loginAs($admin)
                ->visit(route('admin.engagements.index'))
                ->click('tr[data-entry-id="' . $engagement->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='stats_date']", $engagement->stats_date)
                ->assertSeeIn("td[field-key='fans']", $engagement->fans)
                ->assertSeeIn("td[field-key='engagements']", $engagement->engagements)
                ->assertSeeIn("td[field-key='reactions']", $engagement->reactions)
                ->assertSeeIn("td[field-key='comments']", $engagement->comments)
                ->assertSeeIn("td[field-key='shares']", $engagement->shares);
        });
    }

}
