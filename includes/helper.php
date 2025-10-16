<?php
// helpers.php

if (!function_exists('formatoCOP')) {
    function formatoCOP($valor, $conDecimales = false) {
        if ($valor === null || $valor === '') return '';
        
        $decimales = $conDecimales ? 2 : 0;
        return '$ ' . number_format($valor, $decimales, ',', '.');
    }
}