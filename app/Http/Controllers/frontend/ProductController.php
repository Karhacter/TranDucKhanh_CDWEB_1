<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('status', '=', 1);

        // Apply price filter based on presence of price or pricesale
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $price_min = $request->input('price_min', 0);
            $price_max = $request->input('price_max', PHP_INT_MAX);

            $query->where(function ($q) use ($price_min, $price_max) {
                $q->where(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('price')
                        ->whereBetween('price', [$price_min, $price_max]);
                })->orWhere(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('pricesale')
                        ->whereBetween('pricesale', [$price_min, $price_max]);
                });
            });
        }

        // Apply sorting
        $sortField = $request->input('sort_field', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortField, $sortOrder);


        // Paginate results
        $products = $query->paginate(8);

        $list_category = Category::where('parent_id', 0)->where('status', 1)->get();

        // Fetch brands for sidebar filtering
        $list_brand = Brand::where('status', 1)->limit(4)->get();
        return view('frontend.product', [
            'products' => $products,
            'list_category' => $list_category,
            'list_brand' => $list_brand
        ]);
    }



    public function getListCategory($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])
            ->select("id")->get();
        if (count($list1) > 0) {
            foreach ($list1 as $cat1) {
                array_push($listcatid, $cat1->id);
                $list2 = Category::where([['parent_id', '=', $cat1->id], ['status', '=', 1]])
                    ->select("id")->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $cat2) {
                        array_push($listcatid, $cat2->id);
                        $list3 = Category::where([['parent_id', '=', $cat2->id], ['status', '=', 1]]);
                        if (count($list3) > 0) {
                            foreach ($list3 as $cat3) {
                                array_push($listcatid, $cat3->id);
                            }
                        }
                    }
                }
            }
        }
        return $listcatid;
    }

    public function category(Request $request, $slug)
    {
        $row_category = Category::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")->first();

        if (!$row_category) {
            // Handle the case where the category is not found
            return redirect()->route('site.product.index')->with('error', 'Category not found');
        }

        $listcatid = $this->getListCategory($row_category->id);

        $query = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid);

        // Apply price filter based on presence of price or pricesale
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $price_min = $request->input('price_min', 0);
            $price_max = $request->input('price_max', PHP_INT_MAX);

            $query->where(function ($q) use ($price_min, $price_max) {
                $q->where(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('price')
                        ->whereBetween('price', [$price_min, $price_max]);
                })->orWhere(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('pricesale')
                        ->whereBetween('pricesale', [$price_min, $price_max]);
                });
            });
        }

        // Apply sorting
        $sortField = $request->input('sort_field', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortField, $sortOrder);

        $product_list = $query->paginate(8);

        return view('frontend.product_category', compact('product_list', 'row_category'));
    }



    public function product_detail($slug)
    {
        $productitem = Product::where([['slug', '=', $slug], ['status', '=', 1]])
            ->first();
        $listcatid = $this->getListCategory($productitem->category_id);
        $list_product = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        return view("frontend.product_detail", compact('productitem', 'list_product'));
    }

    public function brand(Request $request, $slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")->first();

        if (!$row_brand) {
            // Handle the case where the brand is not found
            return redirect()->route('site.product.index')->with('error', 'Brand not found');
        }

        $query = Product::where('status', '=', 1)
            ->where('brand_id', '=', $row_brand->id);

        // Apply price filter based on presence of price or pricesale
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $price_min = $request->input('price_min', 0);
            $price_max = $request->input('price_max', PHP_INT_MAX);

            $query->where(function ($q) use ($price_min, $price_max) {
                $q->where(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('price')
                        ->whereBetween('price', [$price_min, $price_max]);
                })->orWhere(function ($q) use ($price_min, $price_max) {
                    $q->whereNotNull('pricesale')
                        ->whereBetween('pricesale', [$price_min, $price_max]);
                });
            });
        }

        // Apply sorting
        $sortField = $request->input('sort_field', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortField, $sortOrder);

        $product_list = $query->paginate(8);

        return view('frontend.product_brand', compact('product_list', 'row_brand'));
    }
}
