<?php

declare(strict_types=1);

namespace Tests\Support\Page;

class Index
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Page URL
     *
     * @const string
     */
    public const URL = '/';

    /**
     * Page title xpath selector
     *
     * @const string
     */
    public const PAGE_TITLE_XPATH = '//title[text()="Allure TestOps - Full-stack Test Management"]';

    /**
     * "free trial pricing" button xpath selector
     *
     * @const string
     */
    public const FREE_TRIAL_PRICING_BUTTON_XPATH = '//a[@id="free_trial_pricing"]';
}
