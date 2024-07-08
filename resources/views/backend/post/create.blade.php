@extends('layouts.admin')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Thêm bài viết</h1>
            <div class="text-end">
                <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-arrow-left"></i> Về danh sách
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label><strong>Tiêu đề bài viết (*)</strong></label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label>
                                <strong>Tên slug (*)</strong>
                            </label>
                            <input type="text" name="slug" placeholder="Nhập tên slug" value="{{ old('slug') }}"
                                class="form-control">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label><strong>Chi tiết (*)</strong></label>
                            <textarea name="detail" rows="7" class="form-control" placeholder="Nhập chi tiết">{{ old('detail') }}</textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-container mt-4 bg-white">
                            <div class="box-header py-1 px-2 border-bottom">
                                <strong>Đăng</strong>
                            </div>
                            <div class="box-body p-2 border-bottom">
                                <p>Chọn trạng thái đăng</p>
                                <select name="status" class="form-select">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                            <div class="box-footer text-end px-2 py-3">
                                <button type="submit" class="btn btn-success btn-sm text-end" name="THEM">
                                    <i class="fa fa-save" aria-hidden="true"></i> Đăng
                                </button>
                            </div>

                        </div>
                        <div class="box-container mt-2 bg-white">
                            <div class="box-body p-2 border-bottom">
                                <label><strong>Kiểu Bài Viết</strong></label>
                                <select name="type" class="form-select">
                                    <option value="0">None</option>
                                    <option value="post">Post</option>
                                    <option value="page">Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-container mt-2 bg-white">
                            <div class="box-header py-1 px-2 border-bottom">
                                <strong>Hình đại diện</strong>
                            </div>
                            <div class="box-body p-2 border-bottom">
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
