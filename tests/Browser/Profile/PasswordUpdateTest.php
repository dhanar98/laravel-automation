<?php

namespace Tests\Browser\Profile;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PasswordUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUpdatePassword(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(22))
                    ->visitRoute('profile.edit')
                    ->assertPathIs('/profile')
                    ->typeSlowly('current_password','12345678')
                    ->responsiveScreenshots('current_password')
                    ->type('password','123456789')
                    ->type('password_confirmation','123456789')
                    ->press('SAVE PASSWORD')
                    ->screenshot('page-click-password')
                    ->assertPathIs('/profile');
        });
    }
}
