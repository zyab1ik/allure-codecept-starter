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
     * @return ManualTester
     */
    public function amAuthenticatedAs(string $user): self
    {
        $this->amGoingTo('authentication as ' . $user);

        return $this;
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function amAuthenticatedAsGuest(): self
    {
        $this->amGoingTo('authentication as guest');

        return $this;
    }

    /**
     * @param string $page
     * @throws \Throwable
     */
    public function amOnPage(string $page): self
    {
        $this->amGoingTo('open the page: ' . $page);

        return $this;
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
     * @param string $locator
     * @return ManualTester
     */
    public function clickOnElement(string $locator): self
    {
        $this->wantTo("Click on ${locator}");

        return $this;
    }

    /**
     * @param string $elementName
     * @param string $data
     * @return ManualTester
     */
    public function fill(string $elementName, string $data): self
    {
        $this->wantTo('Fill "' . $data . '" to ' . $elementName);

        return $this;
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function clickSubmitButton(): self
    {
        $this->wantTo('Click submit button');

        return $this;
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function reloadPage(): self
    {
        $this->wantTo('Reload page');

        return $this;
    }

    /**
     * @return ManualTester
     * @throws \Throwable
     */
    public function openNewTab(): self
    {
        $this->wantTo('Open new tab');

        return $this;
    }
}
