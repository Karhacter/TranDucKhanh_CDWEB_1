<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->with(['category', 'brand'])
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();

        $html_category_id = '';
        $html_brand_id = '';

        foreach ($list_category as $category) {
            $html_category_id .= '<option value="' . ($category->id ?? '') . '">' . ($category->name ?? 'Unknown') . '</option>';
        }

        foreach ($list_brand as $brand) {
            $html_brand_id .= '<option value="' . ($brand->id ?? '') . '">' . ($brand->name ?? 'Unknown') . '</option>';
        }
        return view('backend.product.index', compact('products', 'html_category_id', 'html_brand_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $row = new Product();
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->price = $request->price;
        $row->pricesale = $request->pricesale;
        $row->detail = $request->detail;
        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/products'), $filename);
                $row->image = $filename;
            }
        }
        //

        $row->qty = $request->qty;
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $row = Product::with(['category', 'brand'])->find($id);
        if ($row == null) {
            return redirect()->route('admin.product.index');
        }
        return view('backend.product.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();

        $html_category_id = '';
        $html_brand_id = '';

        foreach ($list_category as $category) {
            if ($category->id == $product->category_id) {
                $html_category_id .= '<option selected value="' . ($category->id ?? '') . '">' . ($category->name ?? 'Unknown') . '</option>';
            } else {
                $html_category_id .= '<option value="' . ($category->id ?? '') . '">' . ($category->name ?? 'Unknown') . '</option>';
            }
        }

        foreach ($list_brand as $brand) {
            if ($brand->id == $product->brand_id) {
                $html_brand_id .= '<option selected value="' . ($brand->id ?? '') . '">' . ($brand->name ?? 'Unknown') . '</option>';
            } else {
                $html_brand_id .= '<option value="' . ($brand->id ?? '') . '">' . ($brand->name ?? 'Unknown') . '</option>';
            }
        }
        return view('backend.product.edit', compact('product', 'html_category_id', 'html_brand_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
        $row = Product::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->category_id = $request->category_id;
        $row->brand_id = $request->brand_id;
        $row->price = $request->price;
        $row->pricesale = $request->pricesale;
        $row->detail = $request->detail;
        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/products'), $filename);
                $row->image = $filename;
            }
        }
        //

        $row->qty = $request->qty;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Product::find($id);
        if ($row == null) {
            return redirect()->route('admin.product.index');
        }
        $row->delete();
        if (count(Product::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi cơ sở dữ liệu thanh cong']);
        } else {
            return redirect()->route('admin.product.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa  khỏi cơ sở dữ liệu thành công']);
        }
    }
    public function status(string $id)
    {
        //
        $row = Product::find($id);
        if ($row == null) {
            return redirect()->route('admin.product.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    public function trash()
    {
        //
        $products = Product::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();
        return view('backend.product.trash', compact('products'));
    }
    public function restore(string $id)
    {
        //
        $row = Product::find($id);
        if ($row == null) {
            return redirect()->route('admin.product.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Product::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.product.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
    public function delete(string $id)
    {
        //
        $row = Product::find($id);
        if ($row == null) {
            return redirect()->route('admin.product.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.product.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
}
