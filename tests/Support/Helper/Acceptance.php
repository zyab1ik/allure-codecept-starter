<?php

namespace Tests\Support\Helper;

use Codeception\TestInterface;
use Faker\Factory;
use Faker\Generator;
use Qameta\Allure\Allure;

/**
 * Class Acceptance
 * Helper for acceptance testing
 * All public methods declared here is available in $I
 */
use Codeception\Module;

class Acceptance extends Module
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
                AllureLabels::ACCEPTANCE_LAYER
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
}
