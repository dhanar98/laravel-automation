<?php

namespace Tests\Browser\Auth;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testOpenWelcomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Documentation');
        });
    }

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'dhanar98x44r4@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN') 
                    ->assertPathIs('/dashboard');
        });
    }

    public function testCheckDashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
            ->assertSee("You're logged in!");
        });
    }

    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
            ->click('#profile-link')
            ->clickLink('Log Out')
            ->assertPathIs('/');
        });
    }
}
