@extends('layouts.admin')
@section('title', 'Quản lý Liên hệ')
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Liên hệ</h1>
            <a href="{{ route('site.contact.index') }}" class="d-flex justify-content-end"><button
                    class="btn btn-sm btn-success">Thêm liên
                    hệ</button></a>
            <a href="{{ route('admin.contact.trash') }}" class="d-flex justify-content-end pt-2"><button
                    class="btn btn-sm btn-danger">Thùng rác</button></a>
        </section>
        <section class="content-body my-2">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @includeIf('backend.message')
                @foreach ($contacts as $contact)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $contact->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" id="checkId" value="{{ $contact->id }}" />
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=contact&cat=replay">
                                        {{ $contact->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->content }}</td>
                            <td>
                                @if ($contact->status == 1)
                                    <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-success ">
                                        <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                @else
                                    <a href="{{ route('admin.contact.status', $args) }}" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                @endif

                                <a href="{{ route('admin.contact.edit', $args) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                </a>
                                <a href="{{ route('admin.contact.show', $args) }}" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye"></i> chi tiết
                                </a>
                                <a href="{{ route('admin.contact.delete', $args) }}" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash"></i> xóa
                                </a>
                            </td>
                            <td class="text-center">{{ $contact->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
