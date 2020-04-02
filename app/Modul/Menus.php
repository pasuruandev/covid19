<?php

namespace Modul;

/**
 * Modul Menus untuk menghandel menu pada tampilan HTML
 * untuk show - hidden menu yang forbidden atau allows
 * untuk control menu yang current aktif
 */

class Menus {

    /**
     *  Properti $generated berisi menu menu yang ada untuk di DOM ke view,
     *  Tipe: Array
     *  Format: [
     *      {
     *          key: String,
     *          name: String,
     *          url: String (Routes Name),
     *          icon: String (Penulisan class HTML untuk icon) ex. "fa fa-home",
     *          sub: [
     *              {
     *                  key: String,
     *                  ...
     *              },
     *              ...
     *          ]
     *      },
     *      ...
     *  ];
     * Array kosong untuk Divider []
     * Tanpa properti url untuk heading
     */
    protected $generated = [];

    protected $menus = [];

    /**
     * properti untuk menu yang sedang aktif
     * Type: String
     * Format: key_menu atau jika merupakan sub menu key_header.key_sub
     */
    protected static $active = null;
    
    /**
     * Modul Constructor
     */
    public function __construct()
    {
        $this->boot();
    }

    /**
     * funsi untuk store menu
     * Return: Void
     */
    protected function add_menu($key, $menu)
    {
        $this->menus[$key] = $menu;
    }

    /**
     * funsi dimana menu menu di store
     * Return: Void
     */
    protected function init_menus()
    {
        $this->add_menu("dashboard", [
            'key'   => "dashboard",
            'name'  => "Dashboard",
            'url'   => "dashboard.index",
            'icon'  => "fas fa-fw fa-tachometer-alt"
        ]);
        $this->add_menu("kabupaten_odp", [
            'key'   => "kabupaten_odp",
            'name'  => "ODP",
            'icon'  => "fas fa-fw fa-diagnoses",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("kabupaten_pdp", [
            'key'   => "kabupaten_pdp",
            'name'  => "PDP",
            'icon'  => "fas fa-fw fa-bed",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("kabupaten_positif", [
            'key'   => "kabupaten_positif",
            'name'  => "POSITIF",
            'icon'  => "fas fa-fw fa-biohazard",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("kota_odp", [
            'key'   => "kota_odp",
            'name'  => "ODP",
            'icon'  => "fas fa-fw fa-diagnoses",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("kota_pdp", [
            'key'   => "kota_pdp",
            'name'  => "PDP",
            'icon'  => "fas fa-fw fa-bed",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("kota_positif", [
            'key'   => "kota_positif",
            'name'  => "POSITIF",
            'icon'  => "fas fa-fw fa-biohazard",
            'sub'   => [
                [
                    'key'   => "grafik",
                    'name'  => "Grafik",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "update",
                    'name'  => "Update Data",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "history",
                    'name'  => "History",
                    'url'   => "admin.users.index"
                ]
            ]
        ]);
        $this->add_menu("admin", [
            'key'   => "admin",
            'name'  => "Administrator",
            'icon'  => "fas fa-fw fa-cogs",
            'sub'   => [
                [
                    'key'   => "users",
                    'name'  => "Users",
                    'url'   => "admin.users.index"
                ],
                [
                    'key'   => "permissions",
                    'name'  => "Permissions",
                    'url'   => "admin.permissions.index"
                ]
            ]
        ]);
    }

    /**
     * funsi pada saat pertama kali class dipanggil
     * berisi perintah untuk meng - initial property $menus dan $generated
     * 
     * Return: Void
     */
    protected function boot()
    {
        $this->init_menus();
        $this->generated[] = $this->menus['dashboard'];
        $this->generated[] = [];
        $this->generated[] = ['name' => "Kabupaten"];
        $this->generated[] = $this->menus['kabupaten_odp'];
        $this->generated[] = $this->menus['kabupaten_pdp'];
        $this->generated[] = $this->menus['kabupaten_positif'];
        $this->generated[] = [];
        $this->generated[] = ['name' => "Kota"];
        $this->generated[] = $this->menus['kota_odp'];
        $this->generated[] = $this->menus['kota_pdp'];
        $this->generated[] = $this->menus['kota_positif'];
        $this->generated[] = [];
        $this->generated[] = ['name' => "Administrator"];
        $this->generated[] = $this->menus['admin'];
    }

    /**
     * get data generated
     * Return: Array
     */
    public function gen()
    {
        return $this->generated;
    }

    /**
     * get data menus
     * Return: Array
     */
    public function get()
    {
        return $this->menus;
    }


    /**
     * STATIC FUNCTIONS
     */

     /**
      * sama denga funsi gen()
      */
    public static function genMenus()
    {
        $obj = new SELF();
        return $obj->gen();
    }

    /**
     * STATIC FUNCTIONS
     */

     /**
      * sama denga funsi get()
      */
    public static function getMenus()
    {
        $obj = new SELF();
        return $obj->get();
    }

    /**
     * set active menu
     * Return: void
     * Param: 
     *  $active: String
     * Format: sesuai dengan properti $active
     */
    public static function setActive($active)
    {
        SELF::$active = $active;
    }

    /**
     * get active menu
     * Return: String
     */
    public static function getActive()
    {
        return SELF::$active;
    }
}