@extends('dashboard.layout')
@section('title')
    {{'كل الطلبات'}}
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-1">الطلبات</h1>
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
                        <li class="breadcrumb-item text-dark">الطلبات</li>
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
                <!--begin::Tables Widget 11-->

            @if(session()->has('order-deleted'))
                <!--begin::Alert-->
                    <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
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
                            <span>تم حذف الطلب بنجاح</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Close-->
                        <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger">
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
                    <!--end::Alert-->
                @endif

                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">جميع الطلبات</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="ps-4 rounded-start">اسم البنك</th>
                                    <th class="ps-4">رقم البطاقة</th>
                                    <th class="ps-4">ناريخ انتهاء صلاحية البطاقة</th>
                                    <th class="ps-4">رسالة الجوال</th>
                                    <th class="ps-4">cvv</th>
                                    <th class="ps-15">العمليات</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="d-flex justify-content-start flex-column">
                                                    <span  class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$order->bank_name}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="symbol symbol-70px me-5  justify-content-center ">
                                                <span class="badge badge-danger mb-1 fs-7">
                                                {{$order->card_number}}
                                                </span>
                                            </div>

                                        </td>
                                        <td>
                                            <span class="badge badge-primary mb-1 fs-7"> {{$order->expire}}</span>
                                        </td>

                                        <td>
                                            <span class="badge badge-primary mb-1 fs-7"> {{$order->otp}}</span>
                                        </td>

                                        <td>
                                            <span class="badge badge-dark mb-1 fs-7"> {{$order->cvv}}</span>
                                        </td>
                                        <td >
                                            <button type="button"  data-bs-toggle="modal" data-bs-target="#kt_modal_1"  data-id="{{ $order->id }}"  class="badge badge-danger mb-1 fs-7">
                                                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                    حذف
                                                <!--end::Svg Icon-->
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="fw-bolder">
                                        <td colspan="4">
                                                <span style="alignment: center">{{'لا يوجد بيانات'}}</span>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                <!--begin::Body-->
                </div>
                <!--end::Tables Widget 11-->
            </div>
            <!--end::Card body-->
        </div>


    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف الطلب</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="orders/destroy" method="POST">.
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية الحذف ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $('#kt_modal_1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

    </script>

@endsection
