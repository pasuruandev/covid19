<?php

namespace Modul;

use Illuminate\Support\Facades\Auth;
use App\Permission;

/**
 * Modul Menus untuk menghandel menu pada tampilan HTML
 * untuk show - hidden menu yang forbidden atau allows
 * untuk control menu yang current aktif
 */

class Menus {

    protected static $admin = 'pasdev';

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
            'url'   => "kabupaten.odp.update"
        ]);
        $this->add_menu("kabupaten_pdp", [
            'key'   => "kabupaten_pdp",
            'name'  => "PDP",
            'icon'  => "fas fa-fw fa-bed",
            'url'   => "kabupaten.pdp.update"
        ]);
        $this->add_menu("kabupaten_positif", [
            'key'   => "kabupaten_positif",
            'name'  => "POSITIF",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kabupaten.positif.update"
        ]);

        $this->add_menu("kota_odp", [
            'key'   => "kota_odp",
            'name'  => "ODP",
            'icon'  => "fas fa-fw fa-diagnoses",
            'url'   => "kota.odp.update"
        ]);
        $this->add_menu("kota_pdp", [
            'key'   => "kota_pdp",
            'name'  => "PDP",
            'icon'  => "fas fa-fw fa-bed",
            'url'   => "kota.pdp.update"
        ]);
        $this->add_menu("kota_positif", [
            'key'   => "kota_positif",
            'name'  => "POSITIF",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kota.positif.update"
        ]);

        // =============================================================
        // ISTILAH BARU
        // =============================================================
        $this->add_menu("kabupaten_suspek", [
            'key'   => "kabupaten_suspek",
            'name'  => "Suspek",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kabupaten.suspek.update"
            // 'sub'   => [
            //     [
            //         'key'   => "grafik",
            //         'name'  => "Grafik",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "update",
            //         'name'  => "Update Data",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "history",
            //         'name'  => "History",
            //         'url'   => "admin.users.index"
            //     ]
            // ]
        ]);
        $this->add_menu("kota_suspek", [
            'key'   => "kota_suspek",
            'name'  => "Suspek",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kota.suspek.update"
            // 'sub'   => [
            //     [
            //         'key'   => "grafik",
            //         'name'  => "Grafik",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "update",
            //         'name'  => "Update Data",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "history",
            //         'name'  => "History",
            //         'url'   => "admin.users.index"
            //     ]
            // ]
        ]);

        $this->add_menu("kabupaten_konfirmasi", [
            'key'   => "kabupaten_konfirmasi",
            'name'  => "Konfirmasi",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kabupaten.konfirmasi.update"
            // 'sub'   => [
            //     [
            //         'key'   => "grafik",
            //         'name'  => "Grafik",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "update",
            //         'name'  => "Update Data",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "history",
            //         'name'  => "History",
            //         'url'   => "admin.users.index"
            //     ]
            // ]
        ]);
        $this->add_menu("kota_konfirmasi", [
            'key'   => "kota_konfirmasi",
            'name'  => "Konfirmasi",
            'icon'  => "fas fa-fw fa-biohazard",
            'url'   => "kota.konfirmasi.update"
            // 'sub'   => [
            //     [
            //         'key'   => "grafik",
            //         'name'  => "Grafik",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "update",
            //         'name'  => "Update Data",
            //         'url'   => "admin.users.index"
            //     ],
            //     [
            //         'key'   => "history",
            //         'name'  => "History",
            //         'url'   => "admin.users.index"
            //     ]
            // ]
        ]);

        $this->add_menu("kabupaten_map", [
            'key'   => "kabupaten_map",
            'name'  => "MAP",
            'icon'  => "fas fa-fw fa-map",
            'url'   => "kabupaten.map.index"            
        ]);

        $this->add_menu("kota_map", [
            'key'   => "kota_map",
            'name'  => "MAP",
            'icon'  => "fas fa-fw fa-map",
            'url'   => "kota.map.index"            
        ]);


        $this->add_menu("lockdown", [
            'key'   => "lockdown",
            'name'  => "Lockdown",
            'icon'  => "fas fa-fw fa-cogs",
            'url'   => "content.lockdown.index"
        ]);
        
        $this->add_menu("maps", [
            'key'   => "maps",
            'name'  => "MAP",
            'icon'  => "fas fa-fw fa-map",
            'url'   => "content.maps.update"            
        ]);
        

        $this->add_menu("article", [
            'key'   => "article",
            'name'  => "Article",
            'icon'  => "fas fa-fw fa-newspaper",
            'url'   => "content.article.index"
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
     * funsi untuk cek apakanh view di ijinkan untuk user yang terkait
     * 
     * Return: Boolead
     */
    public function cek_menu($key)
    {
        $user = Auth::user();

        $admin = ($user->username == SELF::$admin);
        if ($admin) return true;

        $permission = Permission::get_from_menu($user, $key);
        return $permission['view'];
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

        $admin = (Auth::user()->username == SELF::$admin);

        $this->generated[] = $this->menus['dashboard'];
        $this->generated[] = [];

        $lockdown = $this->cek_menu('lockdown');
        $article = $this->cek_menu('article');
        $content = ($lockdown || $article || $maps);

        if ($content) $this->generated[] = ['name' => "Content"];
        if ($lockdown) $this->generated[] = $this->menus['lockdown'];
        if ($article) $this->generated[] = $this->menus['article'];
        if ($content) $this->generated[] = [];

        // $kabupaten_odp = $this->cek_menu('kabupaten_odp');
        // $kabupaten_pdp = $this->cek_menu('kabupaten_pdp');        
        // $kabupaten_positif = $this->cek_menu('kabupaten_positif');
        // $kabupaten = ($kabupaten_odp || $kabupaten_pdp || $kabupaten_positif);

        // if ($kabupaten) $this->generated[] = ['name' => "Kabupaten"];
        // if ($kabupaten_odp) $this->generated[] = $this->menus['kabupaten_odp'];
        // if ($kabupaten_pdp) $this->generated[] = $this->menus['kabupaten_pdp'];        
        // if ($kabupaten_positif) $this->generated[] = $this->menus['kabupaten_positif'];
        // if ($kabupaten) $this->generated[] = [];

        // $kota_odp = $this->cek_menu('kota_odp');
        // $kota_pdp = $this->cek_menu('kota_pdp');
        // $kota_positif = $this->cek_menu('kota_positif');
        // $kota = ($kota_odp || $kota_pdp || $kota_positif);

        // if ($kota) $this->generated[] = ['name' => "Kota"];
        // if ($kota_odp) $this->generated[] = $this->menus['kota_odp'];
        // if ($kota_pdp) $this->generated[] = $this->menus['kota_pdp'];
        // if ($kota_positif) $this->generated[] = $this->menus['kota_positif'];
        // if ($kota) $this->generated[] = [];

        // =============================================================
        // ISTILAH BARU
        // =============================================================
        $kabupaten_suspek = $this->cek_menu('kabupaten_suspek');
        $kabupaten_konfirmasi = $this->cek_menu('kabupaten_konfirmasi');
        $kabupaten_map = $this->cek_menu('kabupaten_map');
        $kabupaten = ($kabupaten_suspek || $kabupaten_konfirmasi || $kabupaten_map);

        if ($kabupaten) $this->generated[] = ['name' => "Kabupaten"];
        if ($kabupaten_suspek) $this->generated[] = $this->menus['kabupaten_suspek'];
        if ($kabupaten_konfirmasi) $this->generated[] = $this->menus['kabupaten_konfirmasi'];
        if ($kabupaten_map) $this->generated[] = $this->menus['kabupaten_map'];
        if ($kabupaten) $this->generated[] = [];

        $kota_suspek = $this->cek_menu('kota_suspek');
        $kota_konfirmasi = $this->cek_menu('kota_konfirmasi');
        $kota_map = $this->cek_menu('kota_map');
        $kota = ($kota_suspek || $kota_konfirmasi || $kota_map);

        if ($kota) $this->generated[] = ['name' => "Kota"];
        if ($kota_suspek) $this->generated[] = $this->menus['kota_suspek'];
        if ($kota_konfirmasi) $this->generated[] = $this->menus['kota_konfirmasi'];
        if ($kota_map) $this->generated[] = $this->menus['kota_map'];
        if ($kota) $this->generated[] = [];

        if ($admin) $this->generated[] = ['name' => "Administrator"];
        if ($admin) $this->generated[] = $this->menus['admin'];
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
