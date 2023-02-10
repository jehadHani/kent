@extends('admin.layouts.master')
@section('pageTitle')
    {{admin('Home')}}
@endsection
@section('styles')

@endsection
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        <a class="text-dark" href="{{route('admin.home')}}">{{admin('Home')}}</a>
                    </h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                {{--                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>--}}
                {{--                    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>--}}
                <!--end::Actions-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->


                    <!--end::Actions-->

                    @if (\Illuminate\Support\Facades\Auth::user()['role_id'] == 3 || \Illuminate\Support\Facades\Auth::user()['provider_id_owner'] )
                        @if (\App\Models\Provider::find(Illuminate\Support\Facades\Auth::user()['super_user_id'])->have_branches == "false")
                            @if ($open == 1)
                                <div class=" btn-sm  bg-light-success font-weight-bold mr-2"
                                     id="kt_dashboard_daterangepicker">
                                <span class="text-gray font-size-lg"
                                      id="kt_dashboard_daterangepicker_title">الحالة:</span>
                                    <span class="text-primary font-size-lg "
                                          id="kt_dashboard_daterangepicker_date">مفتوح</span>
                                </div>
                            @else
                                <div class=" btn-sm  bg-light-danger font-weight-bold mr-2"
                                     id="kt_dashboard_daterangepicker">
                                <span class="text-gray font-size-lg"
                                      id="kt_dashboard_daterangepicker_title">الحالة:</span>
                                    <span class="text-primary font-size-lg "
                                          id="kt_dashboard_daterangepicker_date">مغلق</span>
                                </div>
                            @endif
                        @endif




                        <div class=" btn-sm  bg-light-danger font-weight-bold mr-2"
                             id="kt_dashboard_daterangepicker">
                            <a href="{{route('admin.users.providers.plan')}}"><span class="text-primary font-size-lg "
                                                                                    id="kt_dashboard_daterangepicker_date">
                                        @php
                                            $subscription = \App\Models\PlanSubscription::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->where('status' , 'active')->first();
                                        @endphp
                                    @if ($subscription)
                                        {{admin('You are subscribed to the package ').optional($subscription->plan)->name}}
                                    @else
                                        {{admin('Subscribe to a package')}}
                                    @endif
                                    </span></a>
                        </div>

                        @if ($subscription->plan->id != 1)
                            <div class=" btn-sm  bg-light-success font-weight-bold mr-2"
                                 id="kt_dashboard_daterangepicker">
                                <a href="{{route('admin.users.providers.plan')}}"><span
                                        class="text-primary font-size-lg "
                                        id="kt_dashboard_daterangepicker_date">
                                        @php
                                            $subscription = \App\Models\PlanSubscription::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->where('status' , 'active')->first();
                                        @endphp
                                        @if ($subscription)
                                            {{admin('Subscription expiration date:').$subscription->finish_at}}
                                        @else
                                            {{admin('Subscribe to a package')}}
                                        @endif
                                    </span></a>
                            </div>

                        @endif
                    @endif

                    @can('wallet')
                        @if (\Illuminate\Support\Facades\Auth::user()['role_id'] == 3 ||  \Illuminate\Support\Facades\Auth::user()['provider_id_owner'] || \Illuminate\Support\Facades\Auth::user()['role_id'] == 4)
                            <a href="{{url('/admintz/wallet')}}" class="btn btn-sm btn-outline-light font-weight-bold"
                               id="kt_dashboard_daterangepicker">
                                <span class="text-gray font-size-lg  mr-2" id="kt_dashboard_daterangepicker_title">رصيدك بالمحفظة :</span>
                                <span class="text-primary font-size-lg "
                                      id="kt_dashboard_daterangepicker_date">{{ \Illuminate\Support\Facades\Auth::user()['role_id'] == 3 || \Illuminate\Support\Facades\Auth::user()['provider_id_owner'] ? optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id'])->wallet)->balance .' '. optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id'])->country)->currency->name  ?? 0 :  get_wallet(\Illuminate\Support\Facades\Auth::user()['super_user_id']).' '. optional(\App\Models\Delivery::find(\Illuminate\Support\Facades\Auth::user()['super_user_id'])->country)->currency->name ?? 0}} </span>
                            </a>
                    @endif
                @endcan


                <!--end::Daterange-->
                    <!--begin::Dropdowns-->

                    <!--end::Dropdowns-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">


            <!--begin::Container-->
            <div class="container">
                @if(\Illuminate\Support\Facades\Auth::user()->role_id ==3)
                    @php
                        $provider_data = \App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()->super_user_id);
                        $category_limt = \App\Models\Category::find($provider_data->category_id);
                    @endphp
                    @if(\App\Models\Product::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->count() < $category_limt->product_no ?? 1 )
                        <div class="alert alert-custom alert-light-warning alert-shadow gutter-b" role="alert">
                            <div class="alert-text">
                                <p class="m-0">
                                    <span
                                        class="label label-inline label-pill label-danger label-rounded mr-2">{{admin('important :')}}</span>{{admin('In order to be able to appear in the application you have to have at least').($category_limt->product_no ?? 1) .' '.admin('products')}}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->country_id == null || optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->city_id == null|| optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->longitude == null && \App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id'])->have_branches != "true"|| optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->latitude == null && \App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id'])->have_branches != "true" || optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->address == null)
                        <div class="alert alert-custom alert-light-warning alert-shadow gutter-b" role="alert">
                            <div class="alert-text">
                                <p class="m-0">
                                    <span
                                        class="label label-inline label-pill label-danger label-rounded mr-2">{{admin('important :')}}</span>{{admin('Account settings must be completed to be able to appear in the app')}}
                                    <a href="{{route('admin.users.providers.profiles')}}"
                                       class="ml-1">{{admin('Click here ')}}</a>
                                </p>
                            </div>
                        </div>
                    @endif


                    @if (optional(\App\Models\Provider::find(\Illuminate\Support\Facades\Auth::user()['super_user_id']))->have_branches == 'true' && \App\Models\Branches::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->first()->start_time == null)
                        <div class="alert alert-custom alert-light-warning alert-shadow gutter-b" role="alert">
                            <div class="alert-text">
                                <p class="m-0">
                                    <span
                                        class="label label-inline label-pill label-danger label-rounded mr-2">{{admin('important :')}}</span>{{admin('Branch Setting must be completed to be able to appear in the app')}}
                                    <a href="{{route('admin.branches.edit' , \App\Models\Branches::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->first()->id)}}"
                                       class="ml-1">{{admin('Click here ')}}</a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endif


                <div class=" gutter-b">
                    <div class="row">
                        @can('home_admin')
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.clients.index' , 'user_type=1') }}"
                                   class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
												<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Active clients') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\User::query()->has('orders_complete')->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.clients.index' , 'user_type=2') }}"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
								<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Communication/Delete-user.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{admin('Inactive clients')}}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\User::query()->doesntHave('orders_complete')->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>

                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.clients.index' , 'user_type=3') }}"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
								<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Communication/Delete-user.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{admin('not mobile verified')}}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\User::query()->where('mobile_verified', '0')->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.providers.index') }}"
                                   class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
													<span class="svg-icon svg-icon-3x">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path
                                                                    d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                                    fill="#000000" opacity="0.3"></path>
																<path
                                                                    d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                                    fill="#000000"></path>
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Providers') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Provider::query()->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.clients.index') }}"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
								<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Communication/Delete-user.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{admin('clients')}}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\User::query()->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.users.vendors.index') }}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
												<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet3.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
            fill="#000000"/>
        <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Vendors') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Vendor::query()->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
									<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Bag1.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('All Orders') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Order::query()->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=1')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
									<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Bag1.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders Complete') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Order::query()->whereIn('status' , ['sending_end' , 'done'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=2')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
									<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Bag1.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders Complete Today') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Order::query()->whereDate('created_at', \Carbon\Carbon::today())->whereIn('status' , ['sending_end' , 'done'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>

                        @endcan
                        @can('home_provider')
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.provider_categories.index') }}"
                                   class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Layout/Layout-top-panel-2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z"
            fill="#000000"/>
        <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Categories') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\ProviderCategory::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{ route('admin.products.index') }}"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
							<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Box1.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <polygon fill="#000000" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
        <path
            d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{admin('Products')}}</h3>
                                                <div
                                                    class="text-dark-50">{{ \App\Models\Product::where('provider_id' , \Illuminate\Support\Facades\Auth::user()['super_user_id'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Bag1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where(function ($query) use ($auth) {
                                                                         $query-> where('provider_id', 'like', "%,{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%[{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%,{$auth}]%")
                                                                               ->orWhere('provider_id', 'like', "[{$auth}]");
                                                                              })->where('status','!=' , 'canceled')->where('order_accept' , ACTIVE)->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=1')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
												<span class="svg-icon svg-icon-primary svg-icon-3x">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
     viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders Complete') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where(function ($query) use ($auth) {
                                                                         $query-> where('provider_id', 'like', "%,{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%[{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%,{$auth}]%")
                                                                               ->orWhere('provider_id', 'like', "[{$auth}]");
                                                                              })->where(function ($q) {
                                                                                  $q->where('status' , 'done')->orWhere('status' , 'sending_end');
                                                                              })->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=3')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders processing') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where(function ($query) use ($auth) {
                                                                         $query-> where('provider_id', 'like', "%,{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%[{$auth},%")
                                                                               ->orWhere('provider_id', 'like', "%,{$auth}]%")
                                                                               ->orWhere('provider_id', 'like', "[{$auth}]");
                                                                              })->whereNotIn('status' , ['canceled' , 'done' , 'sending_end'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
												<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Chart-pie.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z"
            fill="#000000" opacity="0.3"/>
        <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('sales balance') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{\App\Models\OrderProvider::where('provider_id' , $auth)->sum('price') .' '. \App\Models\Provider::find($auth) ? optional(optional(optional(\App\Models\Provider::find($auth))->country)->currency)->name : ''}}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="#"
                                   class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">

                                                <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3"
              y="3" width="18" height="7" rx="1"/>
        <path
            d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('balances') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ optional(optional(\App\Models\Provider::find($auth))->wallet)->balance ? optional(optional(\App\Models\Provider::find($auth))->wallet)->balance.' '. optional(\App\Models\Provider::find($auth)->country)->currency->name : '0'   }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                    <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="#"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
								<span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
        <path
            d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('balance recharges') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ optional(optional(\App\Models\Provider::find($auth))->wallet)->balance_recharge ? optional(optional(\App\Models\Provider::find($auth))->wallet)->balance_recharge.' '. optional(optional(\App\Models\Provider::find($auth))->country)->currency->name : '0' }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="#"
                                   class="card card-custom wave wave-animate wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
								<span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Money.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z"
            fill="#000000" opacity="0.3"
            transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
        <path
            d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('balance withdrawals') }}</h3>
                                                <div
                                                    class="text-dark-50">{{ optional(optional(\App\Models\Provider::find($auth))->wallet)->withdrawal_balance ? optional(optional(\App\Models\Provider::find($auth))->wallet)->withdrawal_balance .' '. optional(optional(\App\Models\Provider::find($auth))->country)->currency->name: '0' }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                        @endcan
                        @can('home_delivery')
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Bag1.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->where('status' , '!=' , 'canceled')->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index'  , 'order_type=1')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
												<span class="svg-icon svg-icon-primary svg-icon-3x">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
     viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders Complete') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->whereIn('status' , ['sending_end' , 'done'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index'  , 'order_type=3')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders processing') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->whereNotIn('status', ['done','sending_end','canceled'])->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=4')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders completed month') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->whereIn('status' , ['sending_end' , 'done'])->whereMonth('created_at', \Carbon\Carbon::now()->month)->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index'  , 'order_type=5')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders complete last month') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->whereIn('status' , ['sending_end' , 'done'])->when('created_at', function ($query) {$start = date('Y-m') . '-01'; return $query->where("created_at", '>=', $start);})->count() }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>
                            <div class="col-lg-4 mb-5">
                                <!--begin::Callout-->
                                <a href="{{route('admin.orders.index' , 'order_type=4')}}"
                                   class="card card-custom wave wave-animate-fast wave-primary mb-8 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center p-6">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <h3 class="text-dark h4 mb-3">{{ admin('Orders completed month Sale') }}</h3>
                                                <div
                                                    @php $auth = Auth::user()['super_user_id']; @endphp
                                                    class="text-dark-50">{{ \App\Models\Order::where('delivery_id', $auth)->whereIn('status' , ['sending_end' , 'done'])->whereMonth('created_at', \Carbon\Carbon::now()->month)->sum('delivery_cost').' '. optional(optional(optional(\App\Models\Delivery::find($auth))->country)->currency)->name }}</div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </a>
                                <!--end::Callout-->
                            </div>

                        @endcan
                    </div>
                </div>


                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    @can('home_admin')
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 3-->
                            <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 bg-secondary py-5">
                                    <h3 class="card-title font-weight-bolder text-white">{{ admin('Quick access') }}</h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#"
                                               class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ admin('Add') }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header pb-1">
                                                    <span
                                                        class="text-primary text-uppercase font-weight-bold font-size-sm">{{ admin('Add New') }}:</span>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{route('admin.users.clients.create')}}"
                                                           class="navi-link">
																		<span class="navi-icon">

																			<i class="fas fa-user"></i>
																		</span>
                                                            <span class="navi-text">{{ admin('Add Customer') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{route('admin.users.providers.create')}}"
                                                           class="navi-link">
																		<span class="navi-icon">
																			<i class="fas fa-user-tag"></i>
																		</span>
                                                            <span class="navi-text">{{ admin('Add provider') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{route('admin.users.delivery.create')}}"
                                                           class="navi-link">
																		<span class="navi-icon">
																			<i class="fas fa-shipping-fast"></i>
																		</span>
                                                            <span class="navi-text">{{ admin('Add delivery') }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{route('admin.users.vendors.create')}}"
                                                           class="navi-link">
																		<span class="navi-icon">
																		<i class="fas fa-money-check"></i>
																		</span>
                                                            <span
                                                                class="navi-text">{{ admin('Add Selling point') }}</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body p-0 position-relative overflow-hidden">
                                    <!--begin::Chart-->
                                    <div id="kt_mixed_widget_3_chart" class="card-rounded-bottom bg-secondary"
                                         style="height: 200px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Stats-->
                                    <div class="card-spacer mt-n25">
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
															<span
                                                                class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">

									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>


                                                <a href="{{route('admin.banners.create')}}"
                                                   class="text-dark font-weight-bold font-size-h6">{{ admin('Add ads') }}</a>
                                            </div>
                                            <div class="col bg-white px-6 py-8 rounded-xl mb-7">
															<span
                                                                class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
         viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
            fill="#000000"/>
        <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
              fill="#000000"/>
    </g>
</svg>
															</span>
                                                <a href="{{route('admin.users.vendors.status','openwallet')}}"
                                                   class="text-dark font-weight-bold font-size-h6 mt-2">{{ admin('recharge the balance') }}</a>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col bg-white px-6 py-8 rounded-xl mr-7">
															<span
                                                                class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">


    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
         viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <polygon fill="#000000" opacity="0.3"
                 points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
        <polygon fill="#000000"
                 points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
        <path
            d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866"
            fill="#000000" opacity="0.3"/>
        <path
            d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg>

															</span>
                                                <a href="{{route('admin.promo_codes.create')}}"
                                                   class="text-dark font-weight-bold font-size-h6 mt-2">{{ admin('Add Discount coupon') }}</a>
                                            </div>
                                            <div class="col bg-white px-6 py-8 rounded-xl">
														<span
                                                            class="svg-icon svg-icon-3x svg-icon-gray-500 d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                              width="3" height="16" rx="1.5"/>
																		<rect fill="#000000" x="8" y="9" width="3"
                                                                              height="11" rx="1.5"/>
																		<rect fill="#000000" x="18" y="11" width="3"
                                                                              height="9" rx="1.5"/>
																		<rect fill="#000000" x="3" y="13" width="3"
                                                                              height="7" rx="1.5"/>
																	</g>
																</svg>
                                                            <!--end::Svg Icon-->
															</span>
                                                <a href="#"
                                                   class="text-dark font-weight-bold font-size-h6 mt-2">{{ admin('Watch statistics') }}</a>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 3-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 16-->
                            <div class="card card-custom gutter-b card-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <div class="card-title font-weight-bolder">
                                        <div class="card-label">{{ admin('Order statistics') }}
                                            <div
                                                class="font-size-sm text-muted mt-2">{{$orders_total}} {{ admin('Sales') }} </div>
                                        </div>
                                    </div>
                                    <div class="card-toolbar">
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column" style="position: relative;">
                                    <!--begin::Chart-->
                                    <div id="kt_mixed_widget_16_chart" style="height: 200px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Items-->
                                    <div class="mt-10 mb-5">
                                        <div class="row row-paddingless mb-10">
                                            <!--begin::Item-->
                                            <div class="col">
                                                <div class="d-flex align-items-center mr-2">
                                                    <!--begin::Symbol-->
                                                    <div
                                                        class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                                                        <div class="symbol-label">
																		<span
                                                                            class="svg-icon svg-icon-lg svg-icon-success">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"></rect>
																					<path
                                                                                        d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                                                        fill="#000000"
                                                                                        fill-rule="nonzero"
                                                                                        opacity="0.3"></path>
																					<path
                                                                                        d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                                                        fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="font-size-h4 text-success font-weight-bolder">
                                                            {{$done_total}}</div>
                                                        <div
                                                            class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Done sales') }}</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="col">
                                                <div class="d-flex align-items-center mr-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                                                        <div class="symbol-label">
																		<span
                                                                            class="svg-icon svg-icon-lg svg-icon-info">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"></rect>
																					<path
                                                                                        d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                                                        fill="#000000"
                                                                                        fill-rule="nonzero"
                                                                                        opacity="0.3"></path>
																					<path
                                                                                        d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                                                        fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="font-size-h4 text-info font-weight-bolder">
                                                            {{$processing_total}}</div>
                                                        <div
                                                            class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Processing sales') }}</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <div class="row row-paddingless">
                                            <!--begin::Item-->
                                            <div class="col">
                                                <div class="d-flex align-items-center mr-2">
                                                    <!--begin::Symbol-->
                                                    <div
                                                        class="symbol symbol-45 symbol-light-warning mr-4 flex-shrink-0">
                                                        <div class="symbol-label">
																		<span
                                                                            class="svg-icon svg-icon-lg svg-icon-warning">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"></rect>
																					<path
                                                                                        d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                                                        fill="#000000"
                                                                                        fill-rule="nonzero"
                                                                                        opacity="0.3"></path>
																					<path
                                                                                        d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                                                        fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="font-size-h4 text-warning font-weight-bolder">
                                                            {{$pending_total}}</div>
                                                        <div
                                                            class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Pending sales') }}</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="col">
                                                <div class="d-flex align-items-center mr-2">
                                                    <!--begin::Symbol-->
                                                    <div
                                                        class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                                        <div class="symbol-label">
																		<span
                                                                            class="svg-icon svg-icon-lg svg-icon-danger">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"></rect>
																					<path
                                                                                        d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                                                        fill="#000000"
                                                                                        fill-rule="nonzero"
                                                                                        opacity="0.3"></path>
																					<path
                                                                                        d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                                                        fill="#000000"></path>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <div class="font-size-h4 text-danger font-weight-bolder">
                                                            {{$canceled_total}}</div>
                                                        <div
                                                            class="font-size-sm text-muted font-weight-bold mt-1">{{ admin('Canceled Sales') }}</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                    </div>
                                    <!--end::Items-->
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 329px; height: 465px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 16-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::List Widget 16-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title  text-dark">{{ admin('Most Requested Service Providers') }}</h3>
                                </div>
                                <!--end:Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    @foreach($providers as $provider)

                                        <div class="d-flex flex-wrap align-items-center mb-6">
                                            <!--begin::Symbol-->

                                            <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label"
                                                     style="background-image: url('{{url($provider->profile_image)}}')"></div>
                                            </div>

                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                                <a href="{{route('admin.users.providers.profile',$provider->id)}}"
                                                   class="text-dark font-weight-bold text-hover-primary mb-1 font-size-lg">{{$provider->name}}</a>
                                                <span
                                                    class="text-success font-weight-bold"> {{$provider->orderCount}}</span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Btn-->
                                            <a href="{{route('admin.users.providers.profile',$provider->id)}}"
                                               class="btn btn-icon btn-light btn-sm">
														<span class="svg-icon svg-icon-primary">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<rect fill="#000000" opacity="0.3"
                                                                              transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                              x="11" y="5" width="2" height="14"
                                                                              rx="1"/>
																		<path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                            </a>
                                            <!--end::Btn-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                    @endforeach
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 13-->
                        </div>
                    @endcan
                </div>
                <!--end::Row-->
                @if (\Illuminate\Support\Facades\Auth::user()['role_id'] == 1 || \Illuminate\Support\Facades\Auth::user()['role_id'] == 3)
                <!--begin::Row-->
                    <div class="row">
                        <div class="col-xxl-12 order-2 order-xxl-1">
                            <!--begin::Advance Table Widget 2-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label font-weight-bolder text-secondary">{{ admin('New Orders') }}</span>
                                    </h3>

                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-3 pb-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0" style="width: 50px"></th>
                                                <th class="p-0" style="min-width: 70px"></th>
                                                <th class="p-0" style="min-width: 50px"></th>
                                                <th class="p-0" style="min-width: 30px"></th>
                                                <th class="p-0" style="min-width: 50px"></th>
                                                <th class="p-0" style="min-width: 125px"></th>
                                                @if (\Illuminate\Support\Facades\Auth::user()['role_id'] != 4)
                                                    <th class="p-0" style="min-width: 110px"></th>
                                                @endif
                                                <th class="p-0" style="min-width: 110px"></th>
                                                <th class="p-0" style="min-width: 20px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders->take(5) as $order)
                                                <tr>
                                                    <td class="pl-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-1">
																		<span class="symbol-label">
																			<img
                                                                                src="{{url($order->user->profile_image)}}"
                                                                                class="h-50 align-self-center" alt="">
																		</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="{{route('admin.users.clients.profile',$order->user->id)}}"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$order->user->name}}</a>
                                                        <div>
                                                            <div
                                                                class="text-muted">{{$order->user->mobile??admin('No Mobile')}}</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                <span
                                                    class="d-flex align-items-center text-dark-75 font-weight-bolder d-block font-size-lg">
{{--													here--}}
													<i class=" label label-{{$order->status=='done'?'danger':'success'}} label-dot mx-2 "></i>{{$order->total}} {{$order->user->country->currency->name}}</span>
                                                    </td>
                                                    <td class="text-right">
                                                    <span
                                                        class="text-muted font-weight-500">{{$order->order_number}}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        @if($order->provider)
                                                            <a href="{{route('admin.users.providers.profile',optional($order->provider)->id)}}"><span
                                                                    class="text-muted font-weight-500">{{optional($order->provider)->name}}</span></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                    <span
                                                        class="text-muted font-weight-500">{{admin('Payment Type is:')}}{{$order->payment_type_name}}</span>
                                                    </td>
                                                    @if (\Illuminate\Support\Facades\Auth::user()['role_id'] != 4)
                                                        <td class="text-left">
                                                            <span
                                                                class="text-muted font-weight-500">{{admin('delivery type name')}} : {{$order->delivery_type_name}}</span>
                                                        </td>
                                                    @endif

                                                    @if(\Illuminate\Support\Facades\Auth::user()['role_id'] == 3 || \Illuminate\Support\Facades\Auth::user()['provider_id_owner'])
                                                        <td class="text-right">
                                                    <span
                                                        class="label label-lg {{str_replace('label', 'label', $order->delivery_type == 2 &&  optional($order->provider_order)->status == 'sending' ? 'label-light':   optional($order->provider_order)->status_color)}} label-inline">{{$order->delivery_type == 2 &&  optional($order->provider_order)->status == 'sending' ? admin('Sending End'):   optional($order->provider_order)->status_name}}</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                    <span
                                                        class="label label-lg {{str_replace('label', 'label', $order->delivery_type == 2 && $order->status == 'sending' ? 'label-light':  $order->status_color)}} label-inline">{{$order->delivery_type == 2 && $order->status == 'sending' ? admin('Sending End'):  $order->status_name}}</span>
                                                        </td>

                                                    @endif


                                                    <td class="text-right">
                                                        <a href="{{route('admin.orders.details',$order->id)}}"
                                                           class="btn btn-icon btn-light btn-sm">
														<span class="svg-icon svg-icon-primary">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<rect fill="#000000" opacity="0.3"
                                                                              transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                              x="11" y="5" width="2" height="14"
                                                                              rx="1"/>
																		<path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Advance Table Widget 2-->
                        </div>

                    </div>
                @endif

                <div class="row">
                    @can('home_admin')
                        <div class="col-xl-6 order-2 order-xxl-1">
                            <!--begin::Advance Table Widget 2-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                    <span
                                        class="card-label font-weight-bolder text-secondary">{{ admin('New Users') }}</span>
                                    </h3>

                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-3 pb-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0" style="width: 50px"></th>
                                                <th class="p-0" style="min-width: 200px"></th>
                                                <th class="p-0" style="min-width: 100px"></th>
                                                <th class="p-0" style="min-width: 125px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td class="pl-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-1">
																		<span class="symbol-label">
																			<img src="{{$user->profile_image}}"
                                                                                 class="h-50 align-self-center" alt="">
																		</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="{{route('admin.users.clients.profile',$user->id)}}"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$user->name}}</a>
                                                        <div>
                                                            <div class="text-muted">{{$user->mobile}}</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                    <span
                                                        class="text-dark-75  font-size-lg">{{$user->orders->sum('total')}}</span>
                                                    </td>
                                                    <td class="text-right">
                                                    <span
                                                        class="text-muted font-weight-500">{{\Carbon\Carbon::parse($user->created_at)->longRelativeDiffForHumans()}}</span>
                                                    </td>

                                                    <td class="text-right pr-0 card-toolbar">

                                                        <div class="">
                                                            <a href="{{route('admin.users.clients.profile',$user->id)}}"
                                                               class="btn btn-icon btn-sm btn-info mr-1 "
                                                               data-card-tool="toggle" data-toggle="tooltip"
                                                               data-placement="top" title="" data-original-title="عرض">
                                                                <i class="flaticon-eye icon-1x"></i>
                                                            </a>
                                                            <a href="{{route('admin.users.clients.edit',$user->id)}}"
                                                               class="btn btn-icon btn-sm btn-success mr-1"
                                                               data-card-tool="reload" data-toggle="tooltip"
                                                               data-placement="top" title=""
                                                               data-original-title="تعديل">
                                                                <i class="flaticon2-edit icon-1x"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Advance Table Widget 2-->
                        </div>
                    @endcan

                    @if (\Illuminate\Support\Facades\Auth::user()['role_id'] == 1 || \Illuminate\Support\Facades\Auth::user()['role_id'] == 3)
                        <div class="col-xl-6">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header border-0">
                                    <h3 class="card-title  text-dark">{{ admin('New products') }}</h3>

                                </div>


                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    @foreach($new_products as $product)
                                        <div class="d-flex flex-wrap align-items-center mb-6">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label"
                                                     style="background-image: url('{{$product->featured_image}}')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                                <div
                                                    class="text-dark font-weight-bold  mb-1 font-size-lg">{{$product->name}}</div>
                                                <div class="d-flex">
                                                    <div
                                                        class="text-dark   mb-1 font-size-lg text-muted">{{$product->price}}
                                                        {{$product->provider->country->currency->name}}
                                                    </div>
                                                    @if (\Illuminate\Support\Facades\Auth::user()['role_id'] != 3)
                                                        <a href="{{route('admin.users.providers.profile',$product->provider->id)}}"
                                                           class="text-dark text-hover-primary mb-1  ml-10 text-muted"> {{$product->provider->name}}</a>
                                                    @endif


                                                </div>

                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Btn-->
                                            <a class="btn btn-icon btn-light btn-sm"
                                               href="{{route('admin.products.edit',$product->id)}}">
														<span class="svg-icon svg-icon-primary">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<rect fill="#000000" opacity="0.3"
                                                                              transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                              x="11" y="5" width="2" height="14"
                                                                              rx="1"/>
																		<path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                            </a>
                                            <!--end::Btn-->
                                        </div>
                                @endforeach
                                <!--end::Item-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 13-->
                        </div>
                    @endif
                    @can('home_provider')
                        <div class="col-xl-6">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header border-0">
                                    <h3 class="card-title  text-dark">{{ admin('Best products') }}</h3>

                                </div>


                                <div class="card-body pt-2">
                                    <!--begin::Item-->
                                    @if ($best_products)
                                        @foreach($best_products as $product)
                                            <div class="d-flex flex-wrap align-items-center mb-6">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                                    <div class="symbol-label"
                                                         style="background-image: url('{{$product->featured_image}}')"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 mr-2">
                                                    <div
                                                        class="text-dark font-weight-bold  mb-1 font-size-lg">{{$product->name}}</div>
                                                    <div class="d-flex">
                                                        <div
                                                            class="text-dark   mb-1 font-size-lg text-muted">{{$product->price}}
                                                            {{$product->provider->country->currency->name}}
                                                        </div>
                                                        <a href="{{route('admin.users.providers.profile',$product->provider->id)}}"
                                                           class="text-dark text-hover-primary mb-1  ml-10 text-muted"> {{$product->number_order}}</a>
                                                    </div>

                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Btn-->
                                                <a class="btn btn-icon btn-light btn-sm"
                                                   href="{{route('admin.products.edit',$product->id)}}">
														<span class="svg-icon svg-icon-primary">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<rect fill="#000000" opacity="0.3"
                                                                              transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                              x="11" y="5" width="2" height="14"
                                                                              rx="1"/>
																		<path
                                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                </a>
                                                <!--end::Btn-->
                                            </div>
                                    @endforeach

                                @endif
                                <!--end::Item-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 13-->
                        </div>
                    @endcan
                </div>
                <!--end::Row-->
                <!--begin::Row-->

                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            _initMixedWidget16();
        });
        var _initMixedWidget16 = function () {
            var element = document.getElementById("kt_mixed_widget_16_chart");
            var height = parseInt(KTUtil.css(element, 'height'));

            if (!element) {
                return;
            }

            var options = {
                series: [{{$done_avg}}, {{$canceled_avg}}, {{$processing_avg}}, {{$pending_avg}}],
                chart: {
                    height: height,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "30%"
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: false,
                                fontWeight: "700",
                            },
                            value: {
                                color: KTApp.getSettings()['colors']['gray']['gray-700'],
                                fontSize: "18px",
                                fontWeight: "700",
                                offsetY: 10,
                                show: true
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                fontWeight: "bold",
                                formatter: function (w) {
                                    // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                    return '{{$done_avg}}%';
                                }
                            }
                        },
                        track: {
                            background: KTApp.getSettings()['colors']['gray']['gray-100'],
                            strokeWidth: '100%'
                        }
                    }
                },
                colors: [

                    KTApp.getSettings()['colors']['theme']['base']['success'],
                    KTApp.getSettings()['colors']['theme']['base']['danger'],
                    KTApp.getSettings()['colors']['theme']['base']['info'],
                    KTApp.getSettings()['colors']['theme']['base']['warning']
                ],
                stroke: {
                    lineCap: "round",
                },
                labels: ["Progress"]
            };

            var chart = new ApexCharts(element, options);
            chart.render();
            return {
                init: function () {
                    _initMixedWidget16();
                },
            }
        }

        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#FEC72E",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#fcc73a",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#c3a9fc",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#e5b023",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };


    </script>



@endsection
