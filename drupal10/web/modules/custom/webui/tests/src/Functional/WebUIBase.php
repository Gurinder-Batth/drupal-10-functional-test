<?php

namespace Drupal\Tests\webui\Functional;

/**
 * To be extended by other test classes.
 */

use Psr\Log\LoggerInterface;
use PHPUnit\Framework\TestCase;
use Drupal\Tests\ConfigTestTrait;
use weitzman\DrupalTestTraits\ExistingSiteBase;

abstract class WebUIBase extends ExistingSiteBase {

  use ConfigTestTrait;
  protected function setUp() : void {
    parent::setUp();
  }

}
