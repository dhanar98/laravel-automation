<?php

namespace Tests\Browser\Application;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ResponsiveTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testWelcomePageResponsive(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->responsiveScreenshots('welcome-page')
                    ->assertSee('Laravel');
        });
    }

    public function testLoginPageResponsive(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                    ->responsiveScreenshots('login-page')
                    ->assertSee('LOG IN');
        });
    }

    public function testRegisterPageResponsive(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('register')
                    ->responsiveScreenshots('register-page')
                    ->assertSee('REGISTER');
        });
    }
}
