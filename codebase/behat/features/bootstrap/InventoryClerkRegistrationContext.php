<?php

use Behat\Step\Then;
use Behat\Step\When;
use Behat\Step\Given;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

class InventoryClerkRegistrationContext implements Context
{
    

    #[Given('I am in the home :arg1 path')]
    public function iAmInTheHomePath($arg1): void
    {
        throw new PendingException();
    }

    #[When('I click the :arg1 link')]
    public function iClickTheLink($arg1): void
    {
        throw new PendingException();
    }

    #[Then('I should be redirected to the registration page')]
    public function iShouldBeRedirectedToTheRegistrationPage(): void
    {
        throw new PendingException();
    }

    #[Given('I am in the register :arg1 path')]
    public function iAmInTheRegisterPath($arg1): void
    {
        throw new PendingException();
    }

    #[When('I fill in Email :arg1 with :arg2')]
    public function iFillInEmailWith($arg1, $arg2): void
    {
        throw new PendingException();
    }

    #[When('I fill in Password :arg1 with :arg2')]
    public function iFillInPasswordWith($arg1, $arg2): void
    {
        throw new PendingException();
    }

    #[When('I click on the :arg1 button')]
    public function iClickOnTheButton($arg1): void
    {
        throw new PendingException();
    }

    #[Then('I should be able to register a new account')]
    public function iShouldBeAbleToRegisterANewAccount(): void
    {
        throw new PendingException();
    }
}
