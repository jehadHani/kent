@extends('dashboard.layout')
@section('title')
    {{'عرض الطلب'}}
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">عرض الطلب</h1>
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
                            <a href="{{route('orders.index')}}" class="text-muted text-hover-primary">الطلبات</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">عرض الطلب</li>
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
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold fs-5">يمكنك تصفح جميع الطلبات من
                                    <a href="{{route('orders.index')}}" class="fw-bolder link-primary">هنا</a>.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->

                            <form class="w-100 position-relative mb-3">

                                <div class="row">
                                    <div class="h4" >
                                        <br>
                                        <span>{{$order->product->name}}</span><br>
                                        <span>
                                        </span>
                                    </div>
                                    <div class="col-md-3 mb-10" style="border:1px ">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                             style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-225px h-225px"
                                                 style="background-image: url({{asset('product-images/'.$order->product->image)}})"></div>

                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->


                                        <!--end::Hint-->
                                    </div>
                                    <div class="col-md-9 mb-10" style="border:1px ">
                                        <div class="row">
                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">اسم مقدم الطلب</span>

                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                        value="{{$order->first_name}} {{$order->last_name}}" disabled/>

                                            </div>
                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">إجمالي سعر الطلب</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                        value="{{$order->product->price}}" disabled/>

                                            </div>

                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">الاسم على البطاقة</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                       value="{{$order->card_name}}" disabled/>

                                            </div>

                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">رقم البطاقة</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                       value="{{$order->card_number}}" disabled/>

                                            </div>

                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">تاريخ الانتهاء</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                       value="{{$order->expire}}" disabled/>

                                            </div>

                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">CVV</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid"
                                                       value="{{$order->cvv}}" disabled/>

                                            </div>

                                        </div>
                                    </div>
                                </div>

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
