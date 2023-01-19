<?php

namespace Tests\Unit;

use PHPUnit\Util\Color;
use Qameta\Allure\Attribute\Description;
use Qameta\Allure\Attribute\Label;
use Tests\Support\Helper\AllureLabels;

class TestUnitCest
{

    // If method is set to public, allure create a new test case
    protected static function colorizeProvider(): array
    {
        return [
            'no color'                 => ['', 'string', 'string'],
            'one color'                => ['fg-blue', 'string', "\x1b[34mstring\x1b[0m"],
        ];
    }

    #[Description('Check some unit test')]
    #[Label(AllureLabels::KEY_JIRA, 'SA-0000')]
    #[Label(AllureLabels::KEY_LAYER, AllureLabels::UNIT_LAYER)]
    public static function colorizePathProvider(): array
    {
        $sep    = DIRECTORY_SEPARATOR;
        $sepDim = Color::dim($sep);

        return [
            'null previous path'  => [
                null,
                $sep . 'php' . $sep . 'unit' . $sep . 'test.phpt',
                false,
                $sepDim . 'php' . $sepDim . 'unit' . $sepDim . 'test.phpt',
            ],
            'empty previous path' => [
                '',
                $sep . 'php' . $sep . 'unit' . $sep . 'test.phpt',
                false,
                $sepDim . 'php' . $sepDim . 'unit' . $sepDim . 'test.phpt',
            ],
        ];
    }
}
