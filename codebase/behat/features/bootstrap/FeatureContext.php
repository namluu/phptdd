<?php

use Behat\Step\Then;
use Behat\Step\When;
use Behat\Step\Given;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\MinkAwareContext;
use Behat\Mink\WebAssert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    public Mink $mink;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.php.
     */
    public function __construct()
    {
        $this->mink = new Mink([
            'goutte' => new Session(new GoutteDriver()),
        ]);
        $this->mink->setDefaultSessionName('goutte');
        $this->mink->getSession()->start();
        $this->assertSession = new WebAssert($this->mink->getSession());
    }

    private string $homePageUrl = 'http://localhost/';

    #[Given('I have access to the home page URL')]
    public function iHaveAccessToTheHomePageUrl(): void
    {
        $this->homePageUrl = 'http://localhost/symfony/public/';
    }

    #[When('I visit the home page')]
    public function iVisitTheHomePage(): void
    {
        $this->mink->getSession()->visit($this->homePageUrl);
        # $this->mink->getSession()->getPage()->clickLink('Create your first page');
    }

    #[Then('I should see the website logo')]
    public function iShouldSeeTheWebsiteLogo(): void
    {
        $this->assertSession->elementExists('css', '.logo');
        $this->assertSession->pageTextContains("Welcome To Symfony 8");
    }
}
