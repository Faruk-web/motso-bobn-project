<?php

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\Menu;

if (!function_exists('breadcrumbs')) {
    function breadcrumbs($currentRoute,$menuId = null,$menuList = [])
    {
        if($menuId){
            $CurrentMenu = Menu::find($menuId);
        }else{
            $CurrentMenu = Menu::whereRouteName($currentRoute)->first();
        }

        if($CurrentMenu->parent_id){
            $menuList = breadcrumbs($currentRoute,$CurrentMenu->parent_id, $menuList);
        }

        $menuList[] = [
            'name' => $CurrentMenu->name,
            'url' => route($CurrentMenu->route_name),
        ];

        return $menuList;
    }
}
