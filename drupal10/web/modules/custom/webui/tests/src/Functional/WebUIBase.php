<?php

namespace Drupal\Tests\webui\Functional;

/**
 * To be extended by other test classes.
 */

use Psr\Log\LoggerInterface;
use PHPUnit\Framework\TestCase;
use Drupal\Tests\ConfigTestTrait;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\webui\Functional\HelperTrait;
use weitzman\DrupalTestTraits\ExistingSiteBase;

abstract class WebUIBase extends ExistingSiteBase {

  use ConfigTestTrait;
  use HelperTrait;
  protected function setUp() : void {
    parent::setUp();
  }

}
