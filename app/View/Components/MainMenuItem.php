<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public $row = null;
    public function __construct($rowmenu)
    {
        //
        $this->row = $rowmenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->row;
        $args_mainmenu_sub = [
            ['status' ,'=',1],
            ['position' ,'=','mainmenu'],
            ['parent_id' ,'=',$menu->id],
        ];
        $list_menu_sub = Menu::where($args_mainmenu_sub)->orderBy('sort_order')->get();
        return view('components.main-menu-item',compact('menu','list_menu_sub'));
    }
}
