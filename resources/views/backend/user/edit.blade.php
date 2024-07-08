@extends('layouts.admin')

@section('title', 'Cập nhật người dùng')
@section('content')
    <div class="bg-light p-3">
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="content-header my-2">
                <h3 class="d-inline text-primary">Cập nhật thành viên</h3>
                <div class="row mt-2  align-items-center">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Cập nhật [Thêm]
                        </button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-sm ms-2">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </section>
            @includeIf('backend.message')
            <section class="content-body my-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>
                                <strong>Tên đăng nhập(*)</strong>
                            </label>
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập"
                                value="{{ old('username', $user->username) }}" />
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Mật khẩu(*)</strong>
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                                value="{{ old('password', $user->password) }}" />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Email(*)</strong>
                            </label>
                            <input type="text" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Điện thoại(*)</strong>
                            </label>
                            <input type="text" class="form-control" placeholder="Điện thoại"
                                value="{{ old('phone', $user->phone) }}" name="phone" />
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>
                                <strong>Họ tên (*)</strong>
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Họ tên"
                                value="{{ old('name', $user->name) }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Giới tính</strong>
                            </label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="nam" {{ $user->gender == 'nam' ? 'selected' : '' }}>Nam</option>
                                <option value="nu" {{ $user->gender == 'nu' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Đối tượng</strong>
                            </label>
                            <select name="roles" class="form-select">
                                <option value="admin" {{ $user->roles == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="customer" {{ $user->roles == 2 ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Địa chỉ</strong>
                            </label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                value="{{ old('address', $user->address) }}" />
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Hình đại diện</strong>
                            </label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Trạng thái</strong>
                            </label>
                            <select name='status' class="form-select">
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
