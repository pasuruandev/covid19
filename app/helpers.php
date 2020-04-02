<?php

/**
 * \Modul\Menus => app/Modul/Menus.php
 */

function menus() {
    return \Modul\Menus::getMenus();
}

function generated_menus() {
    return \Modul\Menus::genMenus();
}

function menu_active() {
    return \Modul\Menus::getActive();
}

function set_locale($kode) {
    $format = ['UTF8', 'UTF-8', '8859-1'];
    foreach ($format as $key => $value) {
        $format[$key] = strtolower($kode) ."_". strtoupper($kode) .".". $value;
    }
    setlocale(LC_ALL, ...$format);
}

function format_date($date, $formatout = "Y-m-d", $formatin = "d/m/Y") {
	if (!@$date) return false;
	
	$date = \Carbon\Carbon::createFromFormat($formatin, $date);
	return $date->locale(env('APP_LANG'))->format($formatout);
}