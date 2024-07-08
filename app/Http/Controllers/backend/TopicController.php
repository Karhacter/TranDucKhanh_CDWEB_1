<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $topics = Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        if(count($topics)==0)
        {
            $result=[
                "status"=>false,
                "message"=>"Không tìm thấy dữ liệu",
                "topics"=>null
            ];
        }
        else
        {
            $result=[
                "status"=>true,
                "message"=>"Tải dữ liệu thành công",
                "topics"=>$topics
            ];
        }
        
        return view('backend.topic.index',compact('topics'));
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
    public function store(StoreTopicRequest $request)
    {
        //
        $row = new Topic();
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->description = $request->description;
        if($request->image) {
            $exten = $request->file('image')->extension();
            if(in_array($exten,["png","jpg","jpeg","gif","webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/topics'), $filename);
                $row->image = $filename;
            }
        }
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.topic.index')->with('message',['type'=>'success','msg'=>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        return view('backend.topic.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        return view('backend.topic.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->description = $request->description;
        if($request->image) {
            $exten = $request->file('image')->extension();
            if(in_array($exten,["png","jpg","jpeg","gif","webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/topics'), $filename);
                $row->image = $filename;
            }
        }   
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.topic.index')->with('message',['type'=>'success','msg'=>'Cap nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        $row->delete();
        return redirect()->route('admin.topic.trash')->with('message',['type'=>'success','msg'=>'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        $row->status = ($row->status==2)?1:2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.topic.index')->with('message',['type'=>'success','msg'=>'Thay đổi thành công']);
    }
     public function trash()
    {
        //
        $topics = Topic::where('status','=',0)->orderBy('created_at','desc')
        ->select("id","name","slug","status")
        ->get();
        return view('backend.topic.trash',compact('topics'));
    }
     public function restore(string $id)
    {
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
         if(count(Topic::where('status','==',0)->get()) < 1) {
            return redirect()->route('admin.topic.index')->with('message',['type'=>'success','msg'=>'Khôi phục thanh cong']);
        } 
        else {
            return redirect()->route('admin.topic.trash')->with('message',['type'=>'success','msg'=>'Khôi phục thành công']);
        }
    }
     public function delete(string $id)
    {   
        //
        $row = Topic::find($id);
        if($row==null) {
            return redirect()->route('admin.topic.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.topic.index')->with('message',['type'=>'warning','msg'=>'Xóa thành công']);
    }
}
