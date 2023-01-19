<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\Helper\AllureLabels;

#[Label(AllureLabels::KEY_COMPONENT, 'Component name')]
#[Label(Label::TAG, 'Landing Page')]
class IndexCest
{
    #[Description('Check title adn url on index page')]
    #[Label('jira', 'SA-0000')]
    public function testPageTitle(AcceptanceTester $I): void
    {
        $I->amOnUrl('https://qameta.io/');
        $I->comment('Test is failed, because the element is not visible in DOM');
        $I->waitForElementVisible('//title[text()="Allure TestOps: Centralized Test Reporting"]');
    }

    #[Description('Check that pricing page is visible after click on get free trial button')]
    #[Label('jira', 'SA-0000')]
    public function testOpenTrialPricingPage(AcceptanceTester $I): void
    {
        $I->amOnUrl('https://qameta.io/');
        $I->click('//a[@id="free_trial_pricing"]');
        $I->seeInCurrentUrl('/#pricing');
    }
}
