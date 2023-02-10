@extends('dashboard.layout')
@section('title')
    {{'إضافة قسم'}}
@endsection


@section('content')


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex flex-column align-items-start me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">تعديل القسم</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('categories.index')}}" class="text-muted text-hover-primary">الأقسام</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">تعديل القسم</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">

                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-10">
                        <!--begin::Heading-->
                            <!--begin::Modal content-->
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->

                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <!--begin:Form-->
                                    <form id="kt_modal_new_target_form" class="form" method="POST" action="{{route('categories.update',$category->id)}}">
                                    @csrf
                                        @method('PUT')
                                    <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">التعديل على بيانات القسم</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold fs-5">يمكنك تصفح جميع الأقسام من
                                                <a href="{{route('categories.index')}}" class="fw-bolder link-primary">هنا</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">عنوان القسم</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="عنوان القسم الذي ستقوم بإضافة المنتجات له وسيظهر للمستخدم"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder="أدخل عنوان القسم" name="name" value="{{$category->name}}" />
                                            <span class="text-danger">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <a href="{{route('categories.index')}}"  class="btn btn-white me-3">إلغاء</a>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="indicator-label">حفظ</span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end:Form-->
                                </div>
                                <!--end::Modal body-->

                            <!--end::Modal content-->

                        <!--end::Modal dialog-->
                    </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Illustration-->

                        <!--end::Illustration-->
                    </div>
                    <!--end::Card body-->
                </div>


            </div>


@endsection
