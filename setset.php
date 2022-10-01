<?php
date_default_timezone_set("Asia/Jakarta");
include ("app/init.php");

class Index{
    public $menu,$Register,$listaccount,$login;

    function __construct(){
        $this->menu = new Class_Menu();
        $this->register = new Class_Register();
        $this->login = new Class_Login();
        $this->listaccount = new Class_Listaccount();
    }

    function main(){
        $this->menu->head();
        mainmenu:
        $mainmenu = $this->menu->mainmenu();

        switch ($mainmenu) {
            case 1:
                $this->register->register();
            break;
            case 2:
                $this->login->loginaccount();
            break;
            case 3:
                $this->listaccount->listaccount();
            break;
            default:
            $this->menu->pilihankosong();
            goto mainmenu;
        }
    }
}

$load = new Index();
$load->main();
?> 