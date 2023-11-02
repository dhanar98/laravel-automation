<?php

namespace Tests\Browser\Profile;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfilePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testProfilePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'helloworld@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN')
                    ->visitRoute('profile.edit')
                    ->assertPathIs('/profile')
                    ->assertSee('Profile Information');
        });
    }
}
