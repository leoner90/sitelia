<?php
class productClass {
  // Properties
  public $id ;
  public $color;
  public $quantity;
  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
