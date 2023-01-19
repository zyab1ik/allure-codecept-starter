<?php

namespace Tests\Support\Page;

use Tests\Support\ManualTester;

abstract class Base
{
    /**
     * Constructor
     *
     * @param ManualTester $I
     */
    public function __construct(ManualTester $I)
    {
        $this->tester = $I;
    }

    /**
     * @param string $elementName
     * @param string $elementType
     * @return $this
     * @throws \Throwable
     */
    public function click(string $elementName, string $elementType = 'button'): self
    {
        $this->tester->step('Click on "' . $elementName . '" ' . $elementType);

        return $this;
    }

    /**
     * @param string $elementName
     * @param string $data
     * @return $this
     * @throws \Throwable
     */
    public function fill(string $elementName, string $data): self
    {
        $this->tester->step('Fill "' . $data . '" to ' . $elementName);

        return $this;
    }
}
