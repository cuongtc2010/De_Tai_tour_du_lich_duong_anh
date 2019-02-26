<?php

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}
spl_autoload_register(function ($class_name) {
    if (endsWith(strtolower($class_name), "controller")) {
        require_once HOME_CONTROLLER_DIRECTORY . DS . $class_name . '.php';
    }
    if (endsWith(strtolower($class_name), "model")) {
        require_once ADMIN_MODEL_DIRECTORY . DS . $class_name . '.php';
    }
    
});
