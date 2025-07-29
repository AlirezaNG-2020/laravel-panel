@php
    use Illuminate\support\Str;
@endphp

@extends('admin.layouts.base')


@section('title', 'لیست دسته بندی ها')


    

@section('content')
    <!-- Content Header (Page header) -->
        <x-my.content-header>
            <x-slot:title> 
                لیست دسته بندی ها
            </x-slot:title>

             <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
             <li class="breadcrumb-item">محتوا</li>
             <li class="breadcrumb-item active">دسته بندی ها</li>
        </x-my.content-header>
    <!-- /.content-header -->

<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('admin.content.category.create') }}" class="btn btn-sm btn-outline-primary">ایجاد دسته بندی جدید</a>
                    </h3>

                    <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 180px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>شماره</th>
                            <th>نام دسته</th>
                            <th>توضیحات</th>
                            <th>تصویر</th>
                            <th>وضعیت</th>
                            <th>برچسب ها</th>
                            <th>اسلاگ</th>
                            <th>دسته بندی والد</th>
                            <th>
                                <i class="fa fa-cogs"></i>
                                تنظیمات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ substr($category->name, 0 ,50) . '...' }}</td>
                            <td>{{ Str::limit($category->description, 50) }}</td>
                            <td><span class="badge badge-success">{{ $category->image }}</span></td>
                            <td>
                                <div class="form-check">
                                    {{-- <input class="form-check-input" @if ($category->is_active) @checked(true) @endif type="checkbox" value="" id="checkDefault"> --}}
                                    <input id="{{ $category->id }}" data-url="{{ route('admin.content.category.change-status', $category->id) }}" class="form-check-input" onchange="changeStatus({{ $category->id }})" {{ ($category->is_active) ? 'checked' : '' }} type="checkbox">
                                    
                                </div>
                            </td>
                            <td>{{ $category->tags }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parent_id ?? 'دسته اصلی' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret">تنظیمات</span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-folder-open-o"></i>
                                            جزئیات
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-pencil-square-o"></i>
                                              ویرایش
                                        </a>
                                        <a class="dropdown-item" href="#">لینک ۳</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">حذف</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @empty
                            
                        @endforelse
                       
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
         </div>
        </div>
</section>
@endsection


@section('script')
    <script src="{{ asset('admin-assets/custom/changeStatus.js') }}"></script>
@endsection