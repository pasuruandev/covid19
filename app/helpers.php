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