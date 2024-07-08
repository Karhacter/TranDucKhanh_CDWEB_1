<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $brands = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();
        if (count($brands) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "brands" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "brands" => $brands
            ];
        }
        $html_sort_order = '';
        foreach ($brands as $item) {
            $html_sort_order .= '<option value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.brand.index', compact('brands', 'html_sort_order'));
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
    public function store(StoreBrandRequest $request)
    {
        //
        $row = new Brand();
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->sort_order = $request->sort_order;
        $row->description = $request->description;
        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/brands'), $filename);
                $row->image = $filename;
            }
        }
        //
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.brand.index')->with('message', ['type' => 'success', 'msg' => 'Thêm  thanh cong']);
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
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $brands = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();

        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($brands as $item) {
            if ($row->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            if ($row->sort_order - 1  == $item->sort_order) {
                $html_sort_order .= '<option selected value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.brand.edit', compact('brands', 'html_parent_id', 'html_sort_order', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $row->name = $request->name;
        $row->slug = Str::of($request->name)->slug('-');
        $row->sort_order = $request->sort_order;
        $row->description = $request->description;
        //upload image
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/brands'), $filename);
                $row->image = $filename;
            }
        }
        //
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.brand.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function show(string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        return view('backend.brand.show', compact('row'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $row->delete();
        return redirect()->route('admin.brand.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }

    // 
    public function status(string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.brand.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }

    public function restore(string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Brand::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.brand.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.brand.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
    public function delete(string $id)
    {
        //
        $row = Brand::find($id);
        if ($row == null) {
            return redirect()->route('admin.brand.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.brand.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
    public function trash()
    {
        //
        $brands = Brand::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "slug", "status")
            ->get();
        return view('backend.brand.trash', compact('brands'));
    }
}
