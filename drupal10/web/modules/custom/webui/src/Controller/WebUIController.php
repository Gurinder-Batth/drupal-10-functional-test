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
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)->condition('type', 'students');
    $ids = $query->execute();
    $students = Node::loadMultiple($ids);
    $data = [];
    foreach ($students as $student) {
      $data[] = [
        'name' => $student->title->value,
        'marks' => (int) $student->field_marks->value,
       ];
    }
    // Filter the student based on the pass or fail.
    $data = array_filter($data, fn ($item) => $type == "pass" ? $item['marks'] >= 50 : $item['marks'] < 50);
    return new JsonResponse([ 'students' => array_values($data) ]);
  }

}