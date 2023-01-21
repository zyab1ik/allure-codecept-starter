<?php

namespace Tests\Acceptance;

use Qameta\Allure\Allure;
use Tests\Support\AcceptanceTester;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\Helper\AllureLabels;
use Tests\Support\Page\Index;

#[Label(AllureLabels::KEY_COMPONENT, 'Component name')]
#[Label(Label::TAG, 'Index Page')]
class IndexCest
{
    #[Description('Check title adn url on index page')]
    #[Label('jira', 'SA-0000')]
    public function testPageTitle(AcceptanceTester $I): void
    {
        $I->amOnPage(Index::URL);
        $I->comment('Test is failed, because the element is not visible in DOM');
        Allure::runStep(
            function () use ($I) {
                $I->waitForElementVisible(Index::PAGE_TITLE_XPATH);
            },
            'Waits up to 10 seconds for the given element: ' . json_encode(Index::PAGE_TITLE_XPATH) . 'to be visible on the page'
        );
    }

    #[Description('Check that pricing page is visible after click on get free trial button')]
    #[Label('jira', 'SA-0000')]
    public function testOpenTrialPricingPage(AcceptanceTester $I): void
    {
        $I->amOnPage(Index::URL);
        $I->click(Index::FREE_TRIAL_PRICING_BUTTON_XPATH);
        $I->seeInCurrentUrl('/#pricing');
    }
}
