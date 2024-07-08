<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductFliter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        $list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])->get();
        $list_brand = Brand::where('status', '=', 1)->limit(4)->get();

        return view('components.product-fliter', compact('list_category', 'list_brand'));
    }
}
