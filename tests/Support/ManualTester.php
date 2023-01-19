<?php

namespace Tests\Support;

use Codeception\Actor;
use Qameta\Allure\Allure;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class ManualTester extends Actor
{
    use _generated\ManualTesterActions;

    /**
     * @param string $user
     * @param array $columns
     * @return ManualTester
     * @throws \Throwable
     */
    public function amAuthenticatedAs(string $user, array $columns): self
    {
        return $this->step('I\'m auth as "' . $user . '" with "' . json_encode($columns) . '"');
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function amAuthenticatedAsGuest(): self
    {
        return $this->step('Am authenticate as guest');
    }

    /**
     * @param string $page
     * @return ManualTester
     * @throws \Throwable
     */
    public function amOnPage(string $page): ManualTester
    {
        return $this->step('Am on page ' . $page);
    }

    /**
     * Step for allure
     *
     * @param string $text Step description
     * @throws \Throwable
     * @return $this
     */
    public function step(string $text): self
    {
        Allure::runStep(
            function () use ($text) {
            },
            $text,
        );

        return $this;
    }

    /***
     * return $this
     * @param string $step
     * @param string $subStep
     * @return mixed
     * @throws \Throwable
     */
    public function subStep(string $step, string $subStep): self
    {
        Allure::runStep(
            function () use ($subStep) {
                Allure::runStep(
                    function () use ($subStep) {
                    },
                    $subStep
                );
            },
            $step,
        );

        return $this;
    }

    /**
     * Step 'Expect'
     *
     * @throws \Throwable
     * @return $this
     */
    public function expectStep(string $text): self
    {
        return $this->step('Expect: ' . $text);
    }

    /**
     * Step 'Precondition'
     *
     * @throws \Throwable
     * @return $this
     */
    public function preconditionStep(string $text): self
    {
        return $this->step('Precondition: ' . $text);
    }

    /**
     * Step 'Prepare data'
     *
     * @throws \Throwable
     * @return $this
     */
    public function prepareDataStep(string $text): self
    {
        return $this->step('Prepare data: ' . $text);
    }

    /**
     * @param string $locator
     * @return ManualTester
     * @throws \Throwable
     */
    public function clickOnElement(string $locator): self
    {
        $this->step("Click on ${locator}");

        return $this;
    }

    /**
     * @param string $elementName
     * @param string $data
     * @return ManualTester
     * @throws \Throwable
     */
    public function fill(string $elementName, string $data): self
    {
        return $this->step('Fill "' . $data . '" to ' . $elementName);
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function clickSubmitButton(): self
    {
        return $this->step('Click submit button');
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function reloadPage(): self
    {
        return $this->step('Reload page');
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function openNewTab(): self
    {
        return $this->step('Open new tab');
    }
}
