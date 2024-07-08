@extends('layouts.admin')
@section('title', 'Cập nhật Liên hệ')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Cập nhật Liên hệ</h1>
            <div class="text-end">
                <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-arrow-left"></i>Về danh sách
                </a>
            </div>
        </section>
        <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="post">
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
                    <label><strong>Tên liên hệ (*)</strong></label>
                    <input type="text" name="name" value="{{ old('name', $contact->name) }}" id="name"
                        value="" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label><strong>Email</strong></label>
                    <input type="text" name="email" id="email" value="{{ old('email', $contact->email) }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label><strong>Phone</strong></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label><strong>Title</strong></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $contact->title) }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label><strong>Content</strong></label>
                    <textarea name="content" id="content" rows="3" class="form-control">{{ old('content', $contact->content) }}</textarea>
                </div>

                <div class="box-container mt-4 bg-white">
                    <div class="box-header py-1 px-2 border-bottom">
                        <strong>Đăng</strong>
                    </div>
                    <div class="box-body p-2 border-bottom">
                        <p>Chọn trạng thái đăng</p>
                        <select name="status" class="form-control">
                            <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            <option value="2" {{ $contact->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>

                        </select>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
