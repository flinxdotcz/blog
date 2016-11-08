<?php

function getAlertType() {

  list($type, $message) = explode('|', session()->get('alert'));

  return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);

}
