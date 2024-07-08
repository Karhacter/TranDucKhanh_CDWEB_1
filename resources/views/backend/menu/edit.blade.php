@extends('layouts.admin')
@section('title', 'Quản lý menu')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Chỉnh sửa menu</h1>
            <div class="text-end">
                <a href="{{ route('admin.menu.trash') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Câp nhật
                    </button>
                </div>

                <section class="content-body my-2">
                    <input name="id" value="" type="hidden">
                    <div class="mb-3">
                        <label><strong>Tên Menu (*)</strong></label>
                        <input type="text" name="name" value="{{ old('name', $menu->name) }}" id="name"
                            value="" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label><strong>Link</strong></label>
                        <input type="text" name="link" id="link" value="{{ old('link', $menu->link) }}"
                            class="form-control">
                    </div>
                    <div class="box-container mt-4 bg-white">
                        <div class="box-header py-1 px-2 border-bottom">
                            <strong>Đăng</strong>
                        </div>
                        <div class="box-body p-2 border-bottom">
                            <p>Chọn trạng thái đăng</p>
                            <select name="status" class="form-control">
                                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                <option value="2" {{ $menu->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>

                            </select>
                        </div>
                    </div>
                    <div class="box-container mt-4 bg-white">
                        <div class="box-body p-2 border-bottom">
                            <p>Chọn position</p>
                            <select name="position" class="form-control">
                                <option value="mainmenu" {{ $menu->position == 'mainmenu' ? 'selected' : '' }}>Mainmenu
                                </option>
                                <option value="footermenu" {{ $menu->position == 'footermenu' ? 'selected' : '' }}>
                                    Footermenu</option>

                            </select>
                        </div>
                    </div>
                    <div class="box-container mt-4 bg-white">
                        <div class="box-header py-1 px-2 border-bottom">
                            <strong>Danh mục cha (*)</strong>
                        </div>
                        <div class="box-body p-2">
                            <select name="parent_id" class="form-control">
                                <option value="0">None</option>
                                {!! $html_parent_id !!}
                            </select>
                        </div>
                    </div>
                    <div class="box-container mt-4 bg-white">
                        <div class="box-header py-1 px-2 border-bottom">
                            <strong>Thứ tự</strong>
                        </div>
                        <div class="box-body p-2">
                            <select name="sort_order" class="form-control">
                                <option value="0">Chọn vị trí</option>
                                {!! $html_sort_order !!}
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label><strong>Thể loại</strong></label>
                        <input type="text" name="type" id="type" value="{{ old('type', $menu->type) }}"
                            class="form-control" readonly>
                    </div>
                </section>
            </form>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
