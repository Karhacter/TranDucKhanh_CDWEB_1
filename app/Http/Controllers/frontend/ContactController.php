<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    function index()
    {
        return view("frontend.contact");
    }
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
        return redirect()->route('site.contact.index')->with('message', ['type' => 'success', 'msg' => 'Gửi liên hệ thành công']);
    }
}
