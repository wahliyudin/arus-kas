<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Keen - Multi-demo Bootstrap 5 HTML Admin Dashboard Template by Keenthemes</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../../../assets/media/logos/favicon.ico" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="../../../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--begin::Header-->
            @include('layouts.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('layouts.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">

                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                                    <!--begin::Title-->
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Customer Listing
                                    </h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="../../../index.html" class="text-muted text-hover-primary">
                                                Home </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            eCommerce </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            Customers </li>
                                        <!--end::Item-->

                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <!--begin::Filter menu-->
                                    <div class="d-flex">
                                        <select name="campaign-type" data-control="select2" data-hide-search="true"
                                            class="form-select form-select-sm bg-body border-body w-175px">
                                            <option value="Twitter" selected="selected">Select Campaign</option>
                                            <option value="Twitter">Twitter Campaign</option>
                                            <option value="Twitter">Facebook Campaign</option>
                                            <option value="Twitter">Adword Campaign</option>
                                            <option value="Twitter">Carbon Campaign</option>
                                        </select>

                                        <a href="#" class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                                            <i class="ki-duotone ki-plus fs-2"></i>
                                        </a>
                                    </div>
                                    <!--end::Filter menu-->
                                    <!--begin::Secondary button-->
                                    <!--end::Secondary button-->
                                    <!--begin::Primary button-->
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-xxl ">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                                <input type="text" data-kt-customer-table-filter="search"
                                                    class="form-control form-control-solid w-250px ps-13"
                                                    placeholder="Search Customers" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end"
                                                data-kt-customer-table-toolbar="base">
                                                <!--begin::Filter-->
                                                <div class="w-150px me-3">
                                                    <!--begin::Select2-->
                                                    <select class="form-select form-select-solid" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Status"
                                                        data-kt-ecommerce-order-filter="status">
                                                        <option></option>
                                                        <option value="all">All</option>
                                                        <option value="active">Active</option>
                                                        <option value="locked">Locked</option>
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Filter-->

                                                <!--begin::Export-->
                                                <button type="button" class="btn btn-light-primary me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                                                    <i class="ki-duotone ki-exit-up fs-2"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    Export
                                                </button>
                                                <!--end::Export-->

                                                <!--begin::Add customer-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_customer">
                                                    Add Customer
                                                </button>
                                                <!--end::Add customer-->
                                            </div>
                                            <!--end::Toolbar-->

                                            <!--begin::Group actions-->
                                            <div class="d-flex justify-content-end align-items-center d-none"
                                                data-kt-customer-table-toolbar="selected">
                                                <div class="fw-bold me-5">
                                                    <span class="me-2"
                                                        data-kt-customer-table-select="selected_count"></span>
                                                    Selected
                                                </div>

                                                <button type="button" class="btn btn-danger"
                                                    data-kt-customer-table-select="delete_selected">
                                                    Delete Selected
                                                </button>
                                            </div>
                                            <!--end::Group actions-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_customers_table">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                data-kt-check="true"
                                                                data-kt-check-target="#kt_customers_table .form-check-input"
                                                                value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-125px">Customer Name</th>
                                                    <th class="min-w-125px">Email</th>
                                                    <th class="min-w-125px">Status</th>
                                                    <th class="min-w-125px">IP Address</th>
                                                    <th class="min-w-125px">Created Date</th>
                                                    <th class="text-end min-w-70px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Emma
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">smith@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        178.61.30.73 </td>
                                                    <td>
                                                        25 Oct 2023, 11:05 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Melody
                                                            Macy</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">melody@altbox.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        215.53.53.163 </td>
                                                    <td>
                                                        20 Jun 2023, 9:23 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Max
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">max@kt.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        114.68.88.222 </td>
                                                    <td>
                                                        19 Aug 2023, 6:43 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Sean
                                                            Bean</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">sean@dellito.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        156.74.73.132 </td>
                                                    <td>
                                                        22 Sep 2023, 6:05 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Brian
                                                            Cox</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">brian@exchange.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        160.76.57.177 </td>
                                                    <td>
                                                        24 Jun 2023, 2:40 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Mikaela
                                                            Collins</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">mik@pex.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        124.61.21.185 </td>
                                                    <td>
                                                        22 Sep 2023, 2:40 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Francis
                                                            Mitcham</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">f.mit@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        177.79.65.165 </td>
                                                    <td>
                                                        24 Jun 2023, 6:43 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Olivia
                                                            Wild</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">olivia@corpmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        100.61.22.136 </td>
                                                    <td>
                                                        20 Jun 2023, 9:23 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Neil
                                                            Owen</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">owen.neil@gmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        107.62.50.95 </td>
                                                    <td>
                                                        25 Jul 2023, 8:43 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Dan
                                                            Wilson</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">dam@consilting.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        121.71.46.36 </td>
                                                    <td>
                                                        21 Feb 2023, 8:43 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Emma
                                                            Bold</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">emma@intenso.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        210.70.90.80 </td>
                                                    <td>
                                                        20 Jun 2023, 2:40 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Ana
                                                            Crown</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">ana.cf@limtel.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        101.51.79.196 </td>
                                                    <td>
                                                        19 Aug 2023, 11:05 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Robert
                                                            Doe</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">robert@benko.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        119.80.53.82 </td>
                                                    <td>
                                                        24 Jun 2023, 10:10 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">John
                                                            Miller</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">miller@mapple.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        192.59.73.90 </td>
                                                    <td>
                                                        24 Jun 2023, 11:05 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Lucy
                                                            Kunic</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">lucy.m@fentech.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        202.67.65.234 </td>
                                                    <td>
                                                        21 Feb 2023, 6:43 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Emma
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">smith@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        128.54.39.221 </td>
                                                    <td>
                                                        05 May 2023, 10:30 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Melody
                                                            Macy</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">melody@altbox.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        202.62.31.188 </td>
                                                    <td>
                                                        22 Sep 2023, 8:43 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Max
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">max@kt.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        142.80.32.210 </td>
                                                    <td>
                                                        25 Jul 2023, 5:20 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Sean
                                                            Bean</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">sean@dellito.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        135.75.37.203 </td>
                                                    <td>
                                                        22 Sep 2023, 11:05 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Brian
                                                            Cox</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">brian@exchange.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        185.52.33.185 </td>
                                                    <td>
                                                        25 Jul 2023, 9:23 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Mikaela
                                                            Collins</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">mik@pex.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        192.55.44.229 </td>
                                                    <td>
                                                        05 May 2023, 2:40 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Francis
                                                            Mitcham</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">f.mit@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        214.68.55.232 </td>
                                                    <td>
                                                        05 May 2023, 6:43 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Olivia
                                                            Wild</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">olivia@corpmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        198.69.36.120 </td>
                                                    <td>
                                                        05 May 2023, 10:10 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Neil
                                                            Owen</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">owen.neil@gmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        140.73.49.192 </td>
                                                    <td>
                                                        05 May 2023, 5:30 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Dan
                                                            Wilson</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">dam@consilting.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        211.74.50.102 </td>
                                                    <td>
                                                        20 Dec 2023, 10:30 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Emma
                                                            Bold</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">emma@intenso.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        175.79.55.125 </td>
                                                    <td>
                                                        20 Jun 2023, 10:30 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Ana
                                                            Crown</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">ana.cf@limtel.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        211.50.63.98 </td>
                                                    <td>
                                                        05 May 2023, 5:20 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Robert
                                                            Doe</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">robert@benko.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        121.75.86.30 </td>
                                                    <td>
                                                        20 Jun 2023, 11:05 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">John
                                                            Miller</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">miller@mapple.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        135.79.75.12 </td>
                                                    <td>
                                                        22 Sep 2023, 5:30 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Lucy
                                                            Kunic</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">lucy.m@fentech.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        208.56.76.144 </td>
                                                    <td>
                                                        05 May 2023, 6:05 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Emma
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">smith@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        113.76.66.95 </td>
                                                    <td>
                                                        20 Dec 2023, 2:40 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Melody
                                                            Macy</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">melody@altbox.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        138.65.31.89 </td>
                                                    <td>
                                                        15 Apr 2023, 10:10 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Max
                                                            Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">max@kt.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        155.77.61.142 </td>
                                                    <td>
                                                        25 Jul 2023, 6:43 am </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Sean
                                                            Bean</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">sean@dellito.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        129.79.54.95 </td>
                                                    <td>
                                                        22 Sep 2023, 8:43 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Brian
                                                            Cox</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">brian@exchange.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        151.65.75.139 </td>
                                                    <td>
                                                        24 Jun 2023, 5:30 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Mikaela
                                                            Collins</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">mik@pex.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        106.57.29.53 </td>
                                                    <td>
                                                        25 Jul 2023, 9:23 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Francis
                                                            Mitcham</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">f.mit@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        127.71.73.94 </td>
                                                    <td>
                                                        21 Feb 2023, 9:23 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Olivia
                                                            Wild</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">olivia@corpmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        213.70.32.179 </td>
                                                    <td>
                                                        10 Mar 2023, 5:20 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Neil
                                                            Owen</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">owen.neil@gmail.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Locked</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        178.58.75.68 </td>
                                                    <td>
                                                        22 Sep 2023, 5:20 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="details.html"
                                                            class="text-gray-800 text-hover-primary mb-1">Dan
                                                            Wilson</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary mb-1">dam@consilting.com</a>
                                                    </td>
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Active</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <td>
                                                        202.56.58.240 </td>
                                                    <td>
                                                        05 May 2023, 10:10 pm </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="../../customers/view.html"
                                                                    class="menu-link px-3">
                                                                    View
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">
                                                                    Delete
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->

                                <!--begin::Modals-->
                                <!--begin::Modal - Customers - Add-->
                                <div class="modal fade" id="kt_modal_add_customer" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Form-->
                                            <form class="form" action="#" id="kt_modal_add_customer_form"
                                                data-kt-redirect="../../customers/list.html">
                                                <!--begin::Modal header-->
                                                <div class="modal-header" id="kt_modal_add_customer_header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold">Add a Customer</h2>
                                                    <!--end::Modal title-->

                                                    <!--begin::Close-->
                                                    <div id="kt_modal_add_customer_close"
                                                        class="btn btn-icon btn-sm btn-active-icon-primary">
                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                class="path1"></span><span
                                                                class="path2"></span></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->

                                                <!--begin::Modal body-->
                                                <div class="modal-body py-10 px-lg-17">
                                                    <!--begin::Scroll-->
                                                    <div class="scroll-y me-n7 pe-7"
                                                        id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                        data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                                        data-kt-scroll-offset="300px">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fs-6 fw-semibold mb-2">Name</label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text"
                                                                class="form-control form-control-solid"
                                                                placeholder="" name="name" value="Sean Bean" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold mb-2">
                                                                <span class="required">Email</span>


                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Email address must be active">
                                                                    <i
                                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span></i></span> </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="email"
                                                                class="form-control form-control-solid"
                                                                placeholder="" name="email"
                                                                value="sean@dellito.com" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-15">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold mb-2">Description</label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text"
                                                                class="form-control form-control-solid"
                                                                placeholder="" name="description" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Billing toggle-->
                                                        <div class="fw-bold fs-3 rotate collapsible mb-7"
                                                            data-bs-toggle="collapse"
                                                            href="#kt_modal_add_customer_billing_info"
                                                            role="button" aria-expanded="false"
                                                            aria-controls="kt_customer_view_details">
                                                            Shipping Information
                                                            <span class="ms-2 rotate-180">
                                                                <i class="ki-duotone ki-down fs-3"></i> </span>
                                                        </div>
                                                        <!--end::Billing toggle-->

                                                        <!--begin::Billing form-->
                                                        <div id="kt_modal_add_customer_billing_info"
                                                            class="collapse show">
                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold mb-2">Address
                                                                    Line 1</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="" name="address1"
                                                                    value="101, Collins Street" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Address Line
                                                                    2</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="" name="address2"
                                                                    value="" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="required fs-6 fw-semibold mb-2">Town</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="" name="city"
                                                                    value="Melbourne" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="row g-9 mb-7">
                                                                <!--begin::Col-->
                                                                <div class="col-md-6 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fs-6 fw-semibold mb-2">State
                                                                        / Province</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input-->
                                                                    <input class="form-control form-control-solid"
                                                                        placeholder="" name="state"
                                                                        value="Victoria" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Col-->

                                                                <!--begin::Col-->
                                                                <div class="col-md-6 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="required fs-6 fw-semibold mb-2">Post
                                                                        Code</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input-->
                                                                    <input class="form-control form-control-solid"
                                                                        placeholder="" name="postcode"
                                                                        value="3000" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span class="required">Country</span>


                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Country of origination">
                                                                        <i
                                                                            class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span></i></span>
                                                                </label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <select name="country" aria-label="Select a Country"
                                                                    data-control="select2"
                                                                    data-placeholder="Select a Country..."
                                                                    data-dropdown-parent="#kt_modal_add_customer"
                                                                    class="form-select form-select-solid fw-bold">
                                                                    <option value="">Select a Country...
                                                                    </option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AX">Aland Islands</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AG">Antigua and Barbuda
                                                                    </option>
                                                                    <option value="AR">Argentina</option>
                                                                    <option value="AM">Armenia</option>
                                                                    <option value="AW">Aruba</option>
                                                                    <option value="AU">Australia</option>
                                                                    <option value="AT">Austria</option>
                                                                    <option value="AZ">Azerbaijan</option>
                                                                    <option value="BS">Bahamas</option>
                                                                    <option value="BH">Bahrain</option>
                                                                    <option value="BD">Bangladesh</option>
                                                                    <option value="BB">Barbados</option>
                                                                    <option value="BY">Belarus</option>
                                                                    <option value="BE">Belgium</option>
                                                                    <option value="BZ">Belize</option>
                                                                    <option value="BJ">Benin</option>
                                                                    <option value="BM">Bermuda</option>
                                                                    <option value="BT">Bhutan</option>
                                                                    <option value="BO">Bolivia, Plurinational
                                                                        State of
                                                                    </option>
                                                                    <option value="BQ">Bonaire, Sint Eustatius and
                                                                        Saba
                                                                    </option>
                                                                    <option value="BA">Bosnia and Herzegovina
                                                                    </option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean
                                                                        Territory
                                                                    </option>
                                                                    <option value="BN">Brunei Darussalam</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic
                                                                    </option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands
                                                                    </option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="CI">Côte d'Ivoire</option>
                                                                    <option value="HR">Croatia</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CW">Curaçao</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands (Malvinas)
                                                                    </option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="PF">French Polynesia</option>
                                                                    <option value="GA">Gabon</option>
                                                                    <option value="GM">Gambia</option>
                                                                    <option value="GE">Georgia</option>
                                                                    <option value="DE">Germany</option>
                                                                    <option value="GH">Ghana</option>
                                                                    <option value="GI">Gibraltar</option>
                                                                    <option value="GR">Greece</option>
                                                                    <option value="GL">Greenland</option>
                                                                    <option value="GD">Grenada</option>
                                                                    <option value="GU">Guam</option>
                                                                    <option value="GT">Guatemala</option>
                                                                    <option value="GG">Guernsey</option>
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="VA">Holy See (Vatican City
                                                                        State)
                                                                    </option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran, Islamic Republic of
                                                                    </option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IE">Ireland</option>
                                                                    <option value="IM">Isle of Man</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JE">Jersey</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KP">Korea, Democratic People's
                                                                        Republic of</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Lao People's Democratic
                                                                        Republic
                                                                    </option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macao</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia, Federated
                                                                        States of
                                                                    </option>
                                                                    <option value="MD">Moldova, Republic of
                                                                    </option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="ME">Montenegro</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="MP">Northern Mariana Islands
                                                                    </option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PW">Palau</option>
                                                                    <option value="PS">Palestinian Territory,
                                                                        Occupied
                                                                    </option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russian Federation</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="BL">Saint Barthélemy</option>
                                                                    <option value="KN">Saint Kitts and Nevis
                                                                    </option>
                                                                    <option value="LC">Saint Lucia</option>
                                                                    <option value="MF">Saint Martin (French part)
                                                                    </option>
                                                                    <option value="VC">Saint Vincent and the
                                                                        Grenadines
                                                                    </option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="ST">Sao Tome and Principe
                                                                    </option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="RS">Serbia</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SX">Sint Maarten (Dutch part)
                                                                    </option>
                                                                    <option value="SK">Slovakia</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="KR">South Korea</option>
                                                                    <option value="SS">South Sudan</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syrian Arab Republic
                                                                    </option>
                                                                    <option value="TW">Taiwan, Province of China
                                                                    </option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania, United Republic
                                                                        of
                                                                    </option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago
                                                                    </option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands
                                                                    </option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates
                                                                    </option>
                                                                    <option value="GB">United Kingdom</option>
                                                                    <option value="US" selected>United States
                                                                    </option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VE">Venezuela, Bolivarian
                                                                        Republic of
                                                                    </option>
                                                                    <option value="VN">Vietnam</option>
                                                                    <option value="VI">Virgin Islands</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Wrapper-->
                                                                <div class="d-flex flex-stack">
                                                                    <!--begin::Label-->
                                                                    <div class="me-5">
                                                                        <!--begin::Label-->
                                                                        <label class="fs-6 fw-semibold">Use as a
                                                                            billing
                                                                            adderess?</label>
                                                                        <!--end::Label-->

                                                                        <!--begin::Input-->
                                                                        <div class="fs-7 fw-semibold text-muted">If
                                                                            you
                                                                            need more info, please check budget planning
                                                                        </div>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <!--end::Label-->

                                                                    <!--begin::Switch-->
                                                                    <label
                                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input"
                                                                            name="billing" type="checkbox"
                                                                            value="1"
                                                                            id="kt_modal_add_customer_billing"
                                                                            checked="checked" />
                                                                        <!--end::Input-->

                                                                        <!--begin::Label-->
                                                                        <span
                                                                            class="form-check-label fw-semibold text-muted"
                                                                            for="kt_modal_add_customer_billing">
                                                                            Yes
                                                                        </span>
                                                                        <!--end::Label-->
                                                                    </label>
                                                                    <!--end::Switch-->
                                                                </div>
                                                                <!--begin::Wrapper-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <!--end::Billing form-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <!--end::Modal body-->

                                                <!--begin::Modal footer-->
                                                <div class="modal-footer flex-center">
                                                    <!--begin::Button-->
                                                    <button type="reset" id="kt_modal_add_customer_cancel"
                                                        class="btn btn-light me-3">
                                                        Discard
                                                    </button>
                                                    <!--end::Button-->

                                                    <!--begin::Button-->
                                                    <button type="submit" id="kt_modal_add_customer_submit"
                                                        class="btn btn-primary">
                                                        <span class="indicator-label">
                                                            Submit
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Modal footer-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - Customers - Add-->
                                <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_customers_export_modal" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Export Customers</h2>
                                                <!--end::Modal title-->

                                                <!--begin::Close-->
                                                <div id="kt_customers_export_close"
                                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                                    <i class="ki-duotone ki-cross fs-1"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->

                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_customers_export_form" class="form" action="#">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Label-->
                                                        <label class="fs-5 fw-semibold form-label mb-5">Select Export
                                                            Format:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select name="country" data-control="select2"
                                                            data-placeholder="Select a format"
                                                            data-hide-search="true" name="format"
                                                            class="form-select form-select-solid">
                                                            <option value="excell">Excel</option>
                                                            <option value="pdf">PDF</option>
                                                            <option value="cvs">CVS</option>
                                                            <option value="zip">ZIP</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Label-->
                                                        <label class="fs-5 fw-semibold form-label mb-5">Select Date
                                                            Range:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid"
                                                            placeholder="Pick a date" name="date" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Row-->
                                                    <div class="row fv-row mb-15">
                                                        <!--begin::Label-->
                                                        <label class="fs-5 fw-semibold form-label mb-5">Payment
                                                            Type:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Radio group-->
                                                        <div class="d-flex flex-column">
                                                            <!--begin::Radio button-->
                                                            <label
                                                                class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" checked="checked"
                                                                    name="payment_type" />
                                                                <span
                                                                    class="form-check-label text-gray-600 fw-semibold">
                                                                    All
                                                                </span>
                                                            </label>
                                                            <!--end::Radio button-->

                                                            <!--begin::Radio button-->
                                                            <label
                                                                class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="2" checked="checked"
                                                                    name="payment_type" />
                                                                <span
                                                                    class="form-check-label text-gray-600 fw-semibold">
                                                                    Visa
                                                                </span>
                                                            </label>
                                                            <!--end::Radio button-->

                                                            <!--begin::Radio button-->
                                                            <label
                                                                class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="3" name="payment_type" />
                                                                <span
                                                                    class="form-check-label text-gray-600 fw-semibold">
                                                                    Mastercard
                                                                </span>
                                                            </label>
                                                            <!--end::Radio button-->

                                                            <!--begin::Radio button-->
                                                            <label
                                                                class="form-check form-check-custom form-check-sm form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="4" name="payment_type" />
                                                                <span
                                                                    class="form-check-label text-gray-600 fw-semibold">
                                                                    American Express
                                                                </span>
                                                            </label>
                                                            <!--end::Radio button-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Row-->

                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" id="kt_customers_export_cancel"
                                                            class="btn btn-light me-3">
                                                            Discard
                                                        </button>

                                                        <button type="submit" id="kt_customers_export_submit"
                                                            class="btn btn-primary">
                                                            <span class="indicator-label">
                                                                Submit
                                                            </span>
                                                            <span class="indicator-progress">
                                                                Please wait... <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Card-->
                                <!--end::Modals-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    @include('layouts.footer')
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="../../../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../../../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
</body>
<!--end::Body-->

</html>
