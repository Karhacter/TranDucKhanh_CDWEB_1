<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public $cat_row = null;
    public function __construct($catrow)
    {
        //
        $this->cat_row = $catrow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cat = $this->cat_row;
        $listcatid = [];
           array_push($listcatid,$cat->id);
            $list1 = Category::where([['parent_id', '=', $cat->id], ['status', '=', 1]])
            ->select("id")->get();   
            if(count($list1) > 0) {
                foreach($list1 as $cat1) {
                    array_push($listcatid,$cat1->id);
                    $list2 = Category::where([['parent_id', '=', $cat1->id], ['status', '=', 1]])
                    ->select("id")->get();   
                    if(count($list2) > 0) {
                        foreach($list2 as $cat2) {
                            array_push($listcatid,$cat2->id);
                            $list3 = Category::where([['parent_id', '=', $cat2->id], ['status', '=', 1]]);
                            if(count($list3) > 0) {
                                foreach($list3 as $cat3) {
                                    array_push($listcatid,$cat3->id);
                                }
                            }
                        }    
                    }
                }
            }


        $product_list = Product::where('status', '=', 1)
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at', 'desc')
        ->limit(4)->get();
        return view('components.product-category',compact('product_list','cat'));
    }
}
