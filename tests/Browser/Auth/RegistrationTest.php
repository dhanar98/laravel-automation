<?php

namespace Tests\Browser\Auth;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     */
    public function testOpenHomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });
    }

    public function testPasswordValidation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Hello World')
                ->type('email', 'helloworld@gmail.com')
                ->type('password', '1234')
                ->type('password_confirmation', '1234')
                ->press('REGISTER')
                ->assertSee('The password must be at least 8 characters.');
        });
    }

    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->refresh()
                ->type('name', 'helloworld')
                ->type('email', 'helloworld@gmail.com')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('REGISTER')
                ->assertPathIs('/dashboard');
        });
    }
}
