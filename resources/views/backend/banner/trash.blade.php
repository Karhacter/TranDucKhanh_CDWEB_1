@extends('layouts.admin')
@section('title', 'Quản lý Banner')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-danger">Thùng rác Banner</h1>
            <div class="text-end">
                <a href="{{ route('admin.banner.index') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-arrow-left"></i> Về danh sách
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            @includeIf('backend.message')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Tên banner</th>
                        <th>Vị trí</th>
                        <th>Liên kết</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($banners as $banner)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $banner->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" value="{{ $banner->id }}" />
                            </td>
                            <td>
                                <img class="img-fluid" src="../public/images/banner/" alt="">
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=banner&cat=edit&id=">
                                        {{ $banner->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $banner->position }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>
                                <div class="function_style">
                                    <a href="{{ route('admin.banner.show', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Chi tiết
                                    </a>
                                    <a href="{{ route('admin.banner.restore', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-undo"></i> Khôi phục
                                    </a>
                                    <form action="{{ route('admin.banner.destroy', $args) }}" method="post"
                                        class=" d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">{{ $banner->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
