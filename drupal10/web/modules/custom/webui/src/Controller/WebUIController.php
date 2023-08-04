<?php

namespace Drupal\webui\Controller;

use Drupal\node\Entity\Node;
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
    $type = \Drupal::request()->get("type", "pass");
    // Filter the student based on the pass or fail.
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)->condition('type', 'students');
    $type == "pass" ? $query->condition("field_marks", 50, ">=") : $query->condition("field_marks", 50, "<");
    $ids = $query->execute();
    $students = Node::loadMultiple($ids);
    $data = [];
    foreach ($students as $student) {
      $data[] = [
        'name' => $student->title->value,
        'marks' => (int) $student->field_marks->value,
       ];
    }
    return new JsonResponse([ 'students' => array_values($data) ]);
  }

}