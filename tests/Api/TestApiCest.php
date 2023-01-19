<?php

namespace Tests\Api;

use Codeception\Util\HttpCode;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\ApiTester;
use Tests\Support\Helper\AllureLabels;

class TestApiCest
{
    #[Description('Check that user not authorized with random uuid')]
    #[Label(AllureLabels::KEY_JIRA, 'SA-0000')]
    #[Label(AllureLabels::KEY_LAYER, AllureLabels::API_LAYER)]
    public function test(ApiTester $I): void
    {
        $uuid = $I->getFaker()->randomDigitNotNull();
        $I->sendGET('/' . $uuid);

        $I->seeResponseCodeIs(HttpCode::UNAUTHORIZED);
        $I->seeResponseContainsJson(['code' => '1200', 'message' => 'User not authorized!']);
    }
}
