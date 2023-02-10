@extends('dashboard.layout')

@section('title')
    {{'الرئيسية'}}
@endsection

@section('content')


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">الصفحة الرئيسية</h1>
                    <!--end::Title-->
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
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 5-->
                        <a href="{{route('orders.index')}}" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-bar1.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect>
															<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect>
															<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
															<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect>
														</g>
													</svg>
												</span>
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 float-end">
{{--                                       <div class="text-inverse-warning fw-bolder fs-1  mt-5">64</div>--}}
												</span>
                                <!--end::Svg Icon-->
                                <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">الطلبات</div>
{{--                                <div class="fw-bold text-inverse-success fs-7">عدد الطلبات على المتجات</div>--}}
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Menu separator-->
                <div class="separator my-10"></div>
                <!--end::Menu separator-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

@endsection

