<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banners = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        if (count($banners) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "banners" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "banners" => $banners
            ];
        }

        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $banners = Banner::where('status', '!=', 0)->get();
        $html_sort_order = '';
        foreach ($banners as $item) {
            $html_sort_order .= '<option value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.banner.create', compact('banners', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        //
        $row = new Banner();
        $row->name = $request->name;
        $row->link = $request->link;
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/banners'), $filename);
                $row->image = $filename;
            }
        }
        $row->position = 'slideshow';
        $row->sort_order = $request->sort_order;
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        return view('backend.banner.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banners = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_sort_order = '';
        foreach ($banners as $item) {
            if ($banner->sort_order - 1  == $item->sort_order) {
                $html_sort_order .= '<option selected value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.banner.edit', compact('banner', 'banners', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        $row->name = $request->name;
        $row->link = $request->link;
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/banners'), $filename);
                $row->image = $filename;
            }
        }
        $row->position = 'slideshow';
        $row->sort_order = $request->sort_order;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        $row->delete();
        return redirect()->route('admin.banner.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }

    public function restore(string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Banner::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.banner.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
    public function delete(string $id)
    {
        //
        $row = Banner::find($id);
        if ($row == null) {
            return redirect()->route('admin.banner.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.banner.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
    public function trash()
    {
        //
        $banners = Banner::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "image", "name", "link", 'position', "status")
            ->get();
        return view('backend.banner.trash', compact('banners'));
    }
}
