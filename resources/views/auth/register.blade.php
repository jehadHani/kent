<!DOCTYPE html>

<html lang="ar" dir="rtl">
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>تسجيل حساب جديد</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel.
     A large number of settings, additional services and widgets." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development,
     ree admin themes, bootstrap admin, bootstrap dashboard" />
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-dark">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size: 100% 50%; background-image: url(assets/media/misc/outdoor.png)">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="#" class="mb-12">
                <img alt="Logo" src="{{asset('assets/media/logos/logo-2.svg')}}" class="h-45px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">إنشاء حساب جديد</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">لديك حساب بالفعل ؟
                            <a href="{{route('login')}}" class="link-primary fw-bolder">قم بتسجيل الدخول</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->


                    <!--end::Separator-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">الاسم الأول</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first-name" autocomplete="off" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">اسم العائلة</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">البريد الالكتروني</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6">كلمة المرور</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">استخدم 8 أحرف أو أكثر مع مزيج من الأحرف والأرقام والرموز</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">تأكيد كلمة المرور</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">أوافق على
									<a href="#" class="ms-1 link-primary">الأحكام والشروط</a>.</span>
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">إنشاء</span>

                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Authentication - Sign-up-->
</div>
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/authentication/sign-up/general.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>

