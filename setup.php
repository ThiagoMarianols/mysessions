<?php
if (!defined('GLPI_CSRF_COMPAT')) {
    define('GLPI_CSRF_COMPAT', 1);
}

define('MYSESSIONS_VERSION', '1.0.0');

require_once __DIR__ . '/session_timeout.php';

function plugin_init_mysessions() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['mysessions'] = true;

    require_once __DIR__ . '/session_timeout.php';
    mysessions_session_timeout();
}

function plugin_version_mysessions() {
    return [
        'name'           => "mysessions",
        'version'        => '1.0',
        'author'         => "Thiago Mariano",
        'license'        => 'GLPv3',
        'homepage'       => 'https://www.linkedin.com/in/tmls/',
        'requirements'   => ['glpi' => ['min' => '9.5']],
    ];
}

function plugin_mysessions_check_prerequisites() { return true; }
function plugin_mysessions_check_config($verbose = false) { return true; }

function plugin_mysessions_install() {
    return true;
}

function plugin_mysessions_uninstall() {
    return true;
}

?>
