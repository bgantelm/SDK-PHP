<?php

namespace Entity;

require_once __DIR__ . '/../../vendor/autoload.php';

Class Entity {

  public static function __construct($name, $data) {
    $this->name = $name;
    foreach ($data as $key => $value) {
      $key = $value;
    }
  }
}

 ?>
