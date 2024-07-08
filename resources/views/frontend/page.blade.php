@extends('layouts.site')
@section('title')
    {!! $page->title !!}
@endsection
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="http://localhost/TranDucKhanh_2122110588/public">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $page->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="kad-maincontent py-2">
        <div class="container">
            {{-- <h1>{{ $page->title }}</h1> --}}
            <p>{!! $page->detail !!}</p> <!-- Use  to render HTML content -->
        </div>
    </section>
@endsection
