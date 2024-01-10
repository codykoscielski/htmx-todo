<?php

    // Global functions that we might want to use across the application

    function redirect(string $path, int $statusCode = 303): void {
        header('location: ' . $path, true, $statusCode);
        exit;
    }

    function dd($value): void {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
