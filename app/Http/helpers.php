<?php

function getAlertType() {

  list($type, $message) = explode('|', session()->get('alert'));

  return sprintf('<div class="ui %s message"><div class="header">%s</div></div>', $type, $message);

}
