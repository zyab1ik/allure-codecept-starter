<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

use Codeception\TestInterface;

// here you can define custom actions for 'Manual' tester
// all public methods declared in helper class will be available in $I
use Codeception\Module;
use Qameta\Allure\Allure;

class Manual extends Module
{
    /**
     * @see https://docs.qameta.io/allure-testops/faq/labels/
     *
     * {@inheritdoc}
     */
    public function _before(TestInterface $test): void
    {
        parent::_before($test);

        $data = (serialize(Allure::getLifecycle()));
        $contains = (bool) strpos($data, '"manual"');
        if ($contains) {
            Allure::label(AllureLabels::KEY_MANUAL, 'true');
            Allure::label(AllureLabels::KEY_LAYER, AllureLabels::MANUAL_LAYER);
        }
    }
}
