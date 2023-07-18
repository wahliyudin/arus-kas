@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Akun')

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Data Akun
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Master</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Akun</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Akun" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    {{-- <div class="w-150px me-3">
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                            <option></option>
                            <option value="all">All</option>
                            <option value="active">Active</option>
                            <option value="locked">Locked</option>
                        </select>
                    </div> --}}
                    <a href="{{ route('akun.template') }}" class="btn btn-secondary me-3">Download Template</a>

                    <button type="button" class="btn btn-info ps-4 me-3" data-bs-toggle="modal"
                        data-bs-target="#import-akun">
                        <i class="ki-duotone ki-plus fs-2"></i>Import Akun
                    </button>

                    <button type="button" class="btn btn-primary ps-4" data-bs-toggle="modal"
                        data-bs-target="#create-akun">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Akun
                    </button>
                </div>

                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span> Selected
                    </div>

                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="akun_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#akun_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Kode</th>
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">Jenis Akun</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    {{-- <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <a href="details.html" class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">smith@kpmg.com</a>
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
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../customers/view.html" class="menu-link px-3">
                                        View
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="create-akun" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="create-akun_form" data-kt-redirect="../../customers/list.html">
                    <div class="modal-header" id="create-akun_header">
                        <h2 class="fw-bold">Tambah Akun</h2>
                        <div id="create-akun_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Jenis Akun</label>
                            <select class="form-select form-select-solid" name="jenis_akun" data-control="select2"
                                data-placeholder="Jenis Akun" data-dropdown-parent="#create-akun">
                                <option></option>
                                @foreach (\App\Enums\JenisAkun::cases() as $jenisAkun)
                                    <option value="{{ $jenisAkun->value }}">{{ $jenisAkun->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Kode</label>
                            <input type="text" readonly class="form-control form-control-solid" placeholder="Kode"
                                name="kode" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Nama</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                name="nama" />
                        </div>

                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="create-akun_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" data-akun="" id="create-akun_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="import-akun" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <form class="form" action="#" id="import-akun_form">
                    <div class="modal-header" id="import-akun_header">
                        <h2 class="fw-bold">Import Akun</h2>
                        <div id="import-akun_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <form action="" id="import-akun_form">
                            <input type="file" name="file" class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="import-akun_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" data-akun="" id="import-akun_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/akun/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/akun/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="jenis_akun"]').change(function(e) {
                e.preventDefault();
                var jenisAkun = $(this).val();
                $.ajax({
                    type: "POST",
                    url: `/akun/${jenisAkun}/get-number`,
                    dataType: "JSON",
                    success: function(response) {
                        $('input[name="kode"]').val(response.kode);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>
@endpush
