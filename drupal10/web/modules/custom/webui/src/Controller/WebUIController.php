<?php

namespace Drupal\webui\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * An webui controller.
 */
class WebUIController extends ControllerBase {

  function __construct() {
    
  }
  /**
   * Returns a render-able array for a test page.
   */
  public function home() {
   return new JsonResponse(['status' => true]);
  }

}