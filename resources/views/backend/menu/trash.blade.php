@extends('layouts.admin')
@section('title', 'Thùng rác menu')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-danger">Thùng rác menu</h1>
            <div class="text-end">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-danger">
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
                        <th>Tên menu</th>
                        <th>Liên kết</th>
                        <th>Vị trí</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($menus as $menu)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $menu->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" value="{{ $menu->id }}" />
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=menu&cat=edit&id=<">
                                        {{ $menu->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $menu->link }}</td>
                            <td>{{ $menu->position }}</td>

                            <td>
                                <div class="function_style">
                                    <a href="{{ route('admin.menu.show', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Chi tiết
                                    </a>
                                    <a href="{{ route('admin.menu.restore', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-undo"></i> Khôi phục
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $args) }}" method="post"
                                        class=" d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">{{ $menu->id }}</td>
                        </tr>

                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
