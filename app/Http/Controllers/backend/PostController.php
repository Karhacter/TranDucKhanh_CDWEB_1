<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::where('status','!=',0)->orderBy('created_at','desc')->get();
        if(count($posts)==0)
        {
            $result=[
                "status"=>false,
                "message"=>"Không tìm thấy dữ liệu",
                "posts"=>null
            ];
        }
        else
        {
            $result=[
                "status"=>true,
                "message"=>"Tải dữ liệu thành công",
                "posts"=>$posts
            ];
        }
        
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::where('status','!=',0)->get();
        return view('backend.post.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $row = new Post();
        $row->title = $request->title;
        $row->slug = Str::of($request->title)->slug('-');    
        $row->detail = $request->detail;
        $row->type = $request->type;
        //upload image
        if($request->image) {
            $exten = $request->file('image')->extension();
            if(in_array($exten,["png","jpg","jpeg","gif","webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/posts'), $filename);
                $row->image = $filename;
            }
        }
        //
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.post.index')->with('message',['type'=>'success','msg'=>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        return view('backend.post.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        if($post==null) {
            return redirect()->route('admin.post.index');
        }
        return view('backend.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        //
        $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        $row->title = $request->title;
        $row->slug = Str::of($request->title)->slug('-');    
        $row->detail = $request->detail;
        $row->type = $request->type;
        //upload image
        if($request->image) {
            $exten = $request->file('image')->extension();
            if(in_array($exten,["png","jpg","jpeg","gif","webp"])) {
                $filename = $row->slug .  "." . $exten;
                $request->image->move(public_path('images/posts'), $filename);
                $row->image = $filename;
            }
        }
        //
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.post.index')->with('message',['type'=>'success','msg'=>'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        $row->delete();
        return redirect()->route('admin.post.trash')->with('message',['type'=>'success','msg'=>'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        $row->status = ($row->status==2)?1:2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.post.index')->with('message',['type'=>'success','msg'=>'Thay đổi thành công']);
    }
     public function trash()
    {
        //
        $posts = Post::where('status','=',0)->orderBy('created_at','desc')
        ->select("id","image","title","slug","type","status")
        ->get();
        return view('backend.post.trash',compact('posts'));
    }
     public function delete(string $id)
    {   
        //
        $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.post.index')->with('message',['type'=>'warning','msg'=>'Xóa thành công']);
    }
     public function restore(string $id)
    {
        //
        $row = Post::find($id);
        if($row==null) {
            return redirect()->route('admin.post.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
         if(count(Post::where('status','==',0)->get()) < 1) {
            return redirect()->route('admin.post.index')->with('message',['type'=>'success','msg'=>'Khôi phục thanh cong']);
        } 
        else {
            return redirect()->route('admin.post.trash')->with('message',['type'=>'success','msg'=>'Khôi phục thành công']);
        }
    }
}
