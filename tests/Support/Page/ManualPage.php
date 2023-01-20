<?php

declare(strict_types=1);

namespace Tests\Support\Page;

class ManualPage extends Base
{
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public $usernameField = '#username';
     * public $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * @return $this
     * @throws \Throwable
     */
    public function clickOnFirstBlogItem(): self
    {
        $this->tester->expect('Click on  ' . json_encode('div[class="blog-list_container"] > div:first-of-type'));

        return $this;
    }
}
