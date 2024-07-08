<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        if (count($users) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "users" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "users" => $users
            ];
        }

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::where('status', '!=', 0)->get();
        return view('backend.user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        $row = new User();
        $row->name = $request->name;
        $row->gender = $request->gender;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->username = $request->username;
        $row->password = $request->password;
        $repassword = $request->repassword;
        if ($request->password != $repassword) {
            return redirect()->route('admin.user.create')->with('message', ['type' => 'danger', 'msg' => 'Xác nhận mật khẩu không đúng']);
        }
        $row->address = $request->address;
        $row->roles = $request->roles;
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $row = User::find($id);
        if ($row == null) {
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $row = new User();
        $row->name = $request->name;
        $row->gender = $request->gender;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->username = $request->username;
        $row->password = $request->password;
        $row->address = $request->address;
        $row->roles = $request->roles;

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = User::find($id);
        if (
            $row == null
        ) {
            return redirect()->route('admin.user.index');
        }
        $row->delete();
        return redirect()->route('admin.user.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = User::find($id);
        if ($row == null) {
            return redirect()->route('admin.user.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    public function delete(string $id)
    {
        //
        $row = User::find($id);
        if ($row == null) {
            return redirect()->route('admin.user.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.user.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
    public function trash()
    {
        //
        $users = User::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->get();
        return view('backend.user.trash', compact('users'));
    }
    public function restore(string $id)
    {
        //
        $row = User::find($id);
        if ($row == null) {
            return redirect()->route('admin.user.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(User::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.user.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
}
