<?php
if (!function_exists('mysessions_session_timeout')) {
    function mysessions_session_timeout() {
        if (php_sapi_name() === 'cli' || (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')) {
            return;
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $timeout = 900; // tempo limite de inatividade em segundos (exemplo: 900 segundos = 15 minutos)

        $now = time();
        $last = $_SESSION['LAST_ACTIVITY'] ?? null;

        if (!isset($_SESSION['LAST_ACTIVITY'])) {
            $_SESSION['LAST_ACTIVITY'] = $now;
        } elseif ($now - $_SESSION['LAST_ACTIVITY'] > $timeout) {
            file_put_contents(__DIR__ . "/plugin_log.txt", "Sessão expirada. Logout.\n", FILE_APPEND);
            session_unset();
            session_destroy();
            header("Location: /glpi/front/logout.php");
            exit();
        } else {
            $_SESSION['LAST_ACTIVITY'] = $now;
        }

        // log para debug
        $log = "Agora: $now | Última: $last" . PHP_EOL;
        file_put_contents(__DIR__ . "/plugin_log.txt", $log, FILE_APPEND);
    }
}
