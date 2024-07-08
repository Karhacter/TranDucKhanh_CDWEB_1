<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contacts = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        if (count($contacts) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "contacts" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "contacts" => $contacts
            ];
        }

        return view('backend.contact.index', compact('contacts'));
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

        $row = new Contact();
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->title = $request->title;
        $row->content = $request->content;

        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = 1;
        $row->save();
        return redirect()->route('admin.contact.index')->with('message', ['type' => 'success', 'msg' => 'Thêm liên hệ thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Contact::find($id);
        if ($row == null) {
            return redirect()->route('admin.contact.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.contact.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        return view('backend.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        return view('backend.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $row = Contact::find($id);
        if (
            $row == null
        ) {
            return redirect()->route('admin.contact.index');
        }
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->title = $request->title;
        $row->content = $request->content;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.contact.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật liên hệ thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Contact::find($id);
        if ($row == null) {
            return redirect()->route('admin.contact.index');
        }
        $row->delete();
        return redirect()->route('admin.contact.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }
    public function delete(string $id)
    {
        //
        $row = Contact::find($id);
        if ($row == null) {
            return redirect()->route('admin.contact.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.contact.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
    public function trash()
    {
        //
        $contacts = Contact::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->select("id", "name", "email", "phone", "title", "content", "status")
            ->get();
        return view('backend.contact.trash', compact('contacts'));
    }
    public function restore(string $id)
    {
        //
        $row = Contact::find($id);
        if ($row == null) {
            return redirect()->route('admin.contact.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Contact::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.contact.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.contact.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
}
