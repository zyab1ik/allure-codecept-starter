<?php

namespace Tests\Manual;

use Codeception\Example;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\Helper\AllureLabels;
use Tests\Support\ManualTester;
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
        $I->amOnPage('/blog');
        $I->reloadPage();
        $I->expectStep('Title in blog page');
        $I->subStep('Find the first blog item', 'Check title in first blog item');

        $manualPage->clickOnFirstBlogItem();
        $I->step('Check title of news');
        $I->expectStep('Title of news is visible');
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
    public function testOpenedCourseInNewPage(ManualTester $I, Example $example): void
    {
        $I->amAuthenticatedAsGuest();
        $I->amOnPage('/education');
        $I->clickOnElement($example['course']);

        $I->expectStep('The page with course "' . $example['course'] . '" is opened in new tab');
    }
}
