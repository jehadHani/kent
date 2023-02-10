@extends('dashboard.layout')
@section('title')
    {{'إضافة منتج'}}
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">إضافة منتج جديد</h1>
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
                            <a href="{{route('products.index')}}" class="text-muted text-hover-primary">المنتجات</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">إضافة منتج جديد</li>
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
                        <!--begin::Alert-->
                        @if(session()->has('product-created'))
                            <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
																	<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
																</g>
															</svg>
														</span>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Title-->
                                    <h5 class="mb-1">تمت العملية بنجاح</h5>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <span>تم إضافة منتج جديد بنجاح</span>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Close-->
                                <button type="button"
                                        class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                        data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z"
                                                          fill="#12131A"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.29289 8.29289C8.68342 7.90237 9.31658 7.90237 9.70711 8.29289L12 10.5858L14.2929 8.29289C14.6834 7.90237 15.3166 7.90237 15.7071 8.29289C16.0976 8.68342 16.0976 9.31658 15.7071 9.70711L13.4142 12L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L12 13.4142L9.70711 15.7071C9.31658 16.0976 8.68342 16.0976 8.29289 15.7071C7.90237 15.3166 7.90237 14.6834 8.29289 14.2929L10.5858 12L8.29289 9.70711C7.90237 9.31658 7.90237 8.68342 8.29289 8.29289Z"
                                                          fill="#12131A"></path>
                                                </svg>
                                            </span>
                                </button>
                                <!--end::Close-->
                            </div>
                        @endif
                        <!--end::Alert-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->

                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body col-md-12 scroll-y px-10 px-lg-15 pt-0 pb-15">
                                    <!--begin:Form-->

                                    <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">أدخل بيانات المنتج</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold fs-5">يمكنك تصفح جميع المنتجات من
                                                <a href="{{route('products.index')}}" class="fw-bolder link-primary">هنا</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->

                                    <form method="POST" action="{{route('products.store')}}" class="w-100 position-relative mb-3" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3 mb-10" style="border:1px ">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                     style="background-image: url({{asset('assets/media/avatars/dummy.png')}})">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-225px h-225px"
                                                         style="background-image: url({{asset('assets/media/avatars/dummy.png')}})"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="تغيير الصورة">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image" accept="image/*"/>
                                                        <input type="hidden" name="avatar_remove"/>
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="حذف الصورة">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="حذف الصورة">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text mb-10 ">
                                                    <span>الصيغة المسموح بها : jpg , jpeg , png</span><br>
                                                    <span>
                                                        @error('image')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                    @enderror
                                                    </span>
                                                </div>

                                                <!--end::Hint-->
                                            </div>
                                            <div class="col-md-9 mb-10" style="border:1px ">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">عنوان المنتج</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                               data-bs-toggle="tooltip"
                                                               title="قم بإدخال عنوان المنتج الذي سيظهر للمستخدم"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid"
                                                               placeholder="عنوان المنتج" name="name" value="{{old('name')}}"/>
                                                        @error('name')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">سعر المنتج</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                               data-bs-toggle="tooltip"
                                                               title="قم بإدخال سعر بيع المنتج الذي سيظهر للمستخدم"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="number" class="form-control form-control-solid"
                                                               placeholder="سعر المنتج" name="price" value="{{old('price')}}"/>
                                                        @error('price')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">القسم</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                               data-bs-toggle="tooltip"
                                                               title="قم بإختيار الفسم الذي تود اضافة المنتج اليه"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select  class="form-control form-control-solid" name="category">
                                                            <option disabled hidden selected>-- إختيار القسم --</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">وصف المنتج</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                               data-bs-toggle="tooltip"
                                                               title="قم بإدخال سعر بيع المنتج الذي سيظهر للمستخدم"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea style="min-height: 100px" class="form-control form-control-solid"
                                                                  placeholder="وصف المنتج" name="description">{{value(old('description'))}}</textarea>
                                                        @error('description')
                                                        <span class="text-danger">
                                                            {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-white me-3">مسح البيانات</button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="indicator-label">إضافة</span>
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
