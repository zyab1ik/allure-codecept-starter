<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

class AllureLabels
{
    // Test Layers mapping for the project see https://{your-allure-instance}/project/{project-id}/settings/testlayers
    public const MANUAL_LAYER = 'manual';

    public const ACCEPTANCE_LAYER = 'acceptance';

    public const INTEGRATION_LAYER = 'integration';

    public const API_LAYER = 'api';

    public const UNIT_LAYER = 'unit';

    // keys for mapping
    public const KEY_LAYER = 'layer';

    public const KEY_COMPONENT = 'component';

    public const KEY_MANUAL = 'ALLURE_MANUAL';

    public const KEY_JIRA = 'Jira';
}
