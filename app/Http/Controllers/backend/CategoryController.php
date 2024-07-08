<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();
        if (count($categories) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "bannners" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "categories" => $categories
            ];
        }
        $html_parent_id = '';
        $html_sort_order = '';


        foreach ($categories as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.category.index', compact('categories', 'html_parent_id', 'html_sort_order'));
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
    public function store(StoreCategoryRequest $request)
    {
        //
        $row = new Category();
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;

        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/categories'), $filename);
                $row->image = $filename;
            }
        }
        //

        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $categories = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();

        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($categories as $item) {
            if ($category->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            if ($category->sort_order - 1  == $item->sort_order) {
                $html_sort_order .= '<option selected value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.category.edit', compact('categories', 'html_parent_id', 'html_sort_order', 'category'));
    }

    public function show(string $id)
    {
        //
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        return view('backend.category.show', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        //
        $row = Category::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->parent_id = $request->parent_id;
        $row->sort_order = $request->sort_order;
        $row->description = $request->description;
        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/categories'), $filename);
                $row->image = $filename;
            }
        }
        //

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Category::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->delete();
        return redirect()->route('admin.category.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }

    // 
    public function status(string $id)
    {
        //
        $row = Category::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    public function trash()
    {
        //
        $categories = Category::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();
        return view('backend.category.trash', compact('categories'));
    }
    public function restore(string $id)
    {
        //
        $row = Category::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Category::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.category.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
    public function delete(string $id)
    {
        //
        $row = Category::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.category.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
}
