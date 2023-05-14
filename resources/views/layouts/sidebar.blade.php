<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="../../../index.html">
            <img alt="Logo" src="../../../assets/media/logos/default-dark.svg"
                class="h-30px app-sidebar-logo-default" />
        </a>
        <!--end::Logo image-->

        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate "
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">

            <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span
                    class="path2"></span></i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-category fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span class="menu-title">Dashboards</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="../../../index.html"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Default</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="../../../dashboards/projects.html"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Projects</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="../../../dashboards/ecommerce.html"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">eCommerce</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="../../../dashboards/marketing.html"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Marketing</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-inner flex-column collapse " id="kt_app_sidebar_menu_dashboards_collapse">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link" href="../../../dashboards/social.html"><span
                                        class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Social</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link" href="../../../dashboards/bidding.html"><span
                                        class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Bidding</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link"
                                    href="../../../dashboards/online-courses.html"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span class="menu-title">Online
                                        Courses</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link"
                                    href="../../../dashboards/logistics.html"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Logistics</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-gray-500 btn-icon-gray-400 d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                                    data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse"
                                    data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">Show 4 More</span> <i
                                        class="ki-duotone ki-minus-square toggle-on fs-2 me-0 pe-0"><span
                                            class="path1"></span><span class="path2"></span></i><i
                                        class="ki-duotone ki-plus-square toggle-off fs-2 me-0 pe-0"><span
                                            class="path1"></span><span class="path2"></span><span
                                            class="path3"></span></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
