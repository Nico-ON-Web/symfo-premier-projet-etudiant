<?php

namespace App\Services\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MyExtensions extends AbstractExtension{
    public function getFilters(){
        return [
            new TwigFilter('statusActivity',[$this, "statusActivity"]),
            new TwigFilter('initiales',[$this, "initiales"])
        ];
    }

    public function statusActivity(bool $bool):string
    {
        if($bool === true){
            return "🟢";
        }else{
            return "🔴";
        }
    }

    public function initiales(string $name){
        return $name[0];
    }
}