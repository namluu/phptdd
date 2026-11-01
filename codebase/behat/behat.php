<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/features/bootstrap/bootstrap.php';

use Behat\Config\Config;
use Behat\Config\Profile;
use Behat\Config\Suite;

return (new Config())
    ->withProfile(
        (new Profile('default'))
            ->withSuite(
                (new Suite('default'))
                    ->withPaths('%paths.base%/features')
                    ->withContexts(
                        'FeatureContext', 
                        'HomeContext',
                        'InventoryClerkRegistrationContext'
                        )
            )
    );
