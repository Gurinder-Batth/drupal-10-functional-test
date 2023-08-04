<?php

namespace Drupal\Tests\webui\Functional;

use Drupal\Tests\webui\Functional\WebUIBase;

/**
 * Test something about my WebUI.
 *
 * @group webui
 */

class WebsiteFunctionalTest extends WebUIBase {


  protected function setUp()  : void {
    parent::setUp();
  }

  public function testAdminPage() {
    $this->login(['administrator']);
    $this->visit("/admin");
    $extendMenuLink = $this->getCurrentPage()->findLink("Extend");
    $this->assertNotEmpty($extendMenuLink, "Admin should be see the extends");

    $this->login([]);
    $this->visit("/admin");
    $extendMenuLink = $this->getCurrentPage()->findLink("Extend");
    $this->assertEmpty($extendMenuLink, "Non Admin should not be see the extends");
  }

}
