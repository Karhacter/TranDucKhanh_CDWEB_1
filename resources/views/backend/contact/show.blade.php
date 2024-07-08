@extends('layouts.admin')
@section('title')
    {!! $contact->name !!}
@endsection
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-primary">Chi Tiết Liên hệ </h1>
            <div class="row mt-2 align-items-center">
                <div class="col-md-12 text-end">
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                    <a href="{{ route('admin.contact.edit', ['id' => $contact->id]) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.contact.delete', ['id' => $contact->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                    <a href="{{ route('admin.contact.trash') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </section>
        <section class="content-body my-2">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:30%">Tên trường</th>
                        <th style="width:70%">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            Id

                        </td>
                        <td>
                            <?= $contact->id ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Name
                        </td>
                        <td>
                            <?= $contact->name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Phone
                        </td>
                        <td>
                            <?= $contact->phone ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Email
                        </td>
                        <td>
                            <?= $contact->email ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Title
                        </td>
                        <td>
                            <?= $contact->title ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            Content
                        </td>
                        <td>
                            <?= $contact->content ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_at
                        </td>
                        <td>
                            <?= $contact->created_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_by
                        </td>
                        <td>
                            <?= $contact->created_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_at
                        </td>
                        <td>
                            <?= $contact->updated_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_by
                        </td>
                        <td>
                            <?= $contact->updated_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Status
                        </td>
                        <td>
                            <?= $contact->status ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
    </div>
@endsection
