<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name', 'link', 'position', 'sort_order', 'status')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name')->get();
        $list_post = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->select('id', 'title')->get();
        $html_sort_order = '';
        $html_parent_id = '';
        foreach ($menus as $item) {
            $html_sort_order .= '<option value="' . ($item->sort_order + 1) . '">Sau: ' . $item->name . '</option>';
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.menu.index', compact('menus', 'list_category', 'list_brand', 'list_topic', 'list_post', 'html_sort_order', 'html_parent_id'));
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
    public function store(Request $request)
    {
        //
        if (isset($request->createCategory)) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $row = new Menu();
                        $row->name = $category->name;
                        $row->link = "danh-muc/" . $category->slug;
                        $row->sort_order = $request->sort_order;
                        $row->parent_id = $request->parent_id;
                        $row->type = 'category';
                        $row->position = $request->position;
                        $row->table_id = $id;
                        $row->created_at = date('Y-m-d H:i:s');
                        $row->created_by = Auth::id() ?? 1;
                        $row->status = $request->status;
                        $row->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                echo "Khong co";
            }
        }
        if (isset($request->createBrand)) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $row = new Menu();
                        $row->name = $brand->name;
                        $row->link = $brand->slug;
                        $row->sort_order = $request->sort_order + 1;
                        $row->parent_id = $request->parent_id;
                        $row->type = 'brand';
                        $row->position = $request->position;
                        $row->table_id = $id;
                        $row->created_at = date('Y-m-d H:i:s');
                        $row->created_by = Auth::id() ?? 1;
                        $row->status = $request->status;
                        $row->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => ' Thêm thành công']);
            } else {
                echo "Khong co";
            }
        }
        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $row = new Menu();
                        $row->name = $topic->name;
                        $row->link = $topic->slug;
                        $row->sort_order = $request->sort_order + 1;
                        $row->parent_id = $request->parent_id;
                        $row->type = 'topic';
                        $row->position = $request->position;
                        $row->table_id = $id;
                        $row->created_at = date('Y-m-d H:i:s');
                        $row->created_by = Auth::id() ?? 1;
                        $row->status = $request->status;
                        $row->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                echo "Khong co";
            }
        }
        if (isset($request->createPost)) {
            $listid = $request->postid;
            if ($listid) {
                foreach ($listid as $id) {
                    $post = Post::where([['status', '!=', 0], ['type', '=', 'page']])
                        ->orderBy('created_at', 'desc')
                        ->select('id', 'title')->first();
                    if ($post != null) {
                        $row = new Menu();
                        $row->name = $post->title;
                        $row->link = $post->slug;
                        $row->sort_order = $request->sort_order + 1;
                        $row->parent_id = $request->parent_id;
                        $row->type = 'post';
                        $row->position = $request->position;
                        $row->table_id = $id;
                        $row->created_at = date('Y-m-d H:i:s');
                        $row->created_by = Auth::id() ?? 1;
                        $row->status = $request->status;
                        $row->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Them thanh cong']);
            } else {
                echo "Khong co";
            }
        }
        if (isset($request->createCustom)) {
            $row = new Menu();
            $row->name = $request->name;
            $row->link = $request->link;
            $row->sort_order = $request->sort_order + 1;
            $row->parent_id = $request->parent_id;
            $row->type = 'custom';
            $row->position = $request->position;
            $row->table_id = 0;
            $row->created_at = date('Y-m-d H:i:s');
            $row->created_by = Auth::id() ?? 1;
            $row->status = $request->status;
            $row->save();
            return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Them thanh cong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        return view('backend.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menus = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')
            ->select("id", "name", "link", "position", "status")
            ->get();

        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($menus as $item) {
            if ($menu->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            if ($menu->sort_order - 1  == $item->sort_order) {
                $html_sort_order .= '<option selected value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . ($item->id + 1) . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.menu.edit', compact('menus', 'html_parent_id', 'html_sort_order', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $row = Menu::find($id);
        if ($row == null) {
            return redirect()->route('admin.menu.index');
        }
        $row->name = $request->name;
        $row->link = $request->link;
        $row->sort_order = $request->sort_order;
        $row->parent_id = $request->parent_id;
        $row->type = $request->type;
        $row->position = $request->position;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Menu::find($id);
        if ($row == null) {
            return redirect()->route('admin.menu.index');
        }
        $row->delete();
        return redirect()->route('admin.menu.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Menu::find($id);
        if ($row == null) {
            return redirect()->route('admin.menu.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    public function trash()
    {
        //
        $menus = Menu::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "name", "link", "position", "status")
            ->get();
        return view('backend.menu.trash', compact('menus'));
    }
    public function delete(string $id)
    {
        //
        $row = Menu::find($id);
        if ($row == null) {
            return redirect()->route('admin.menu.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.menu.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
    public function restore(string $id)
    {
        //
        $row = Menu::find($id);
        if ($row == null) {
            return redirect()->route('admin.menu.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Menu::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.menu.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
}
