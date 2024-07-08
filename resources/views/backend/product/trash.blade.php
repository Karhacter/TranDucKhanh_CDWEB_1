 @extends('layouts.admin')
 @section('title', 'Thùng rác sản phẩm')
 @section('content')
     <div class="content" style="padding-left: 20px;padding-right: 20px;">
         <section class="content-body my-2">
             <div class="table-responsive" style="padding-left: 20px;padding-right: 20px;">
                 <h1 class="d-inline text-main text-danger ">Thùng rác Sản phẩm</h1>
                 <div class="text-end mb-4">
                     <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-success">
                         <i class="fa fa-arrow-left"></i> Về danh sách
                     </a>
                 </div>
                 @includeIf('backend.message')

                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th class="text-center" style="width:30px;">
                                 <input type="checkbox" id="checkboxAll" />
                             </th>
                             <th class="text-center" style="width:130px;">Hình ảnh</th>
                             <th>Tên sản phẩm</th>
                             <th>Tên danh mục</th>
                             <th>Tên thương hiệu</th>
                             <th>Chuc nang</th>
                             <th>ID</th>
                         </tr>
                     </thead>
                     @foreach ($products as $product)
                         <tbody>
                             <tr class="datarow">
                                 @php
                                     $args = ['id' => $product->id];
                                 @endphp
                                 <td>
                                     <input type="checkbox" id="checkId[]" value="{{ $product->id }}" />
                                 </td>
                                 <td>
                                     <img class="img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                         alt="Image">
                                 </td>
                                 <td>
                                     <div class="name">
                                         <a href="index.php?opt=product&cat=edit">
                                             {{ $product->name }}
                                         </a>
                                     </div>

                                 </td>
                                 <td> {{ $product->category->name ?? 'Unknown' }} </td>
                                 <td> {{ $product->brand->name ?? 'Unknown' }}</td>
                                 <td>
                                     <div class="function_style">
                                         <a href="{{ route('admin.product.show', $args) }}" class="btn btn-sm btn-primary">
                                             <i class="fa fa-edit"></i> Chi tiết
                                         </a>
                                         <a href="{{ route('admin.product.restore', $args) }}" class="btn btn-sm btn-info">
                                             <i class="fa fa-undo"></i> Khôi phục
                                         </a>
                                         <form action="{{ route('admin.product.destroy', $args) }}" method="post"
                                             class=" d-inline">
                                             @csrf
                                             @method('delete')
                                             <button type="submit" class="btn btn-sm btn-danger ">
                                                 <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                             </button>
                                         </form>
                                     </div>
                                 </td>
                                 <td class="text-center" style="width:30px;">{{ $product->id }}</td>
                             </tr>

                         </tbody>
                     @endforeach

                 </table>
             </div>
         </section>
     </div>
 @endsection
