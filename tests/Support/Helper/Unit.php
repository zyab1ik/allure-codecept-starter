<?php

namespace Tests\Support\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Carbon\Carbon;
use Codeception\Module;
use Codeception\TestInterface;
use Faker\Factory;
use Faker\Generator;
use Qameta\Allure\Allure;

class Unit extends Module
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
        } else {
            Allure::label(
                AllureLabels::KEY_LAYER,
                AllureLabels::UNIT_LAYER
            );
        }
    }

    /**
     * Get FaKer
     */
    public function getFaker(): Generator
    {
        return $this->faker ?? Factory::create();
    }

    /**
     * Get FaKer
     */
    public function getCarbon(): Carbon
    {
        return $this->carbon ?? Carbon::create();
    }
}
