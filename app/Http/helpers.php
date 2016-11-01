<?php

function getAlertType() {

  list($type, $message) = explode('|', session()->get('alert'));

  return sprintf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div></div>', $type, $message);

}
