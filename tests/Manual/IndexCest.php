<?php

namespace Tests\Manual;

use Codeception\Example;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\Helper\AllureLabels;
use Tests\Support\ManualTester;
use Tests\Support\Page\Education;
use Tests\Support\Page\ManualPage;

class IndexCest
{
    /**
     * Example of manual tests
     */

    /**
     * @param ManualTester $I Manual tester
     * @throws \Throwable
     */
    #[Description('Check title in blog page')]
    #[Label(AllureLabels::KEY_JIRA, 'SA-0000')]
    #[Label(AllureLabels::KEY_LAYER, AllureLabels::MANUAL_LAYER)]
    public function testBlogsTitle(ManualTester $I, ManualPage $manualPage): void
    {
        $I->preconditionStep('Create several blogs with different news');
        $I->openNewTab();
        $I->amOnPage(ManualPage::URL);
        $I->reloadPage();
        $I->wantToTest('title in first blog item');
        $I->expectTo('Title in blog page');

        $manualPage->clickOnFirstBlogItem();
        $I->wantToTest('title of news');
        $I->expectTo('title of news is visible');
    }

    /**
     * @example {"course": "otus"}
     * @example {"course": "testautomationu"}
     * @example {"course": "udemy"}
     * @example {"course": "qa.guru"}
     *
     * @throws \Throwable
     */
    #[Description('Check that all courses is opened in new page')]
    #[Label(AllureLabels::KEY_JIRA, 'SA-0001')]
    #[Label(AllureLabels::KEY_LAYER, AllureLabels::MANUAL_LAYER)]
    public function testOpeningNewCourseInNewTab(ManualTester $I, Example $example): void
    {
        $I->amAuthenticatedAsGuest();
        $I->amOnPage(Education::URL);
        $I->clickOnElement($example['course']);

        $I->expectTo('The page with course "' . $example['course'] . '" is opened in new tab');
    }
}
