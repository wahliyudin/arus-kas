@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Guru')

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Data Guru
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Master</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Guru</li>
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
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Guru" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-primary ps-4 me-4" data-bs-toggle="modal"
                        data-bs-target="#import">
                        <i class="ki-duotone ki-file-up fs-2">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>Import
                    </button>
                    <button type="button" class="btn btn-primary ps-4" data-bs-toggle="modal"
                        data-bs-target="#create-guru">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Guru
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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="guru_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#guru_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">Jenis Kelamin</th>
                        <th class="min-w-125px">No HP</th>
                        <th class="min-w-125px">Alamat</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="create-guru" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="create-guru_form" data-kt-redirect="../../customers/list.html">
                    <div class="modal-header" id="create-guru_header">
                        <h2 class="fw-bold">Tambah Guru</h2>
                        <div id="create-guru_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Nama</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                name="nama" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">No HP</label>
                            <input type="number" class="form-control form-control-solid" placeholder="No HP"
                                name="no_hp" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Jenis Kelamin</label>
                            <select class="form-select form-select-solid" name="jenis_kelamin" data-control="select2"
                                data-placeholder="Jenis Kelamin" data-dropdown-parent="#create-guru">
                                <option></option>
                                @foreach (\App\Enums\JenisKelamin::cases() as $jenisKelamin)
                                    <option value="{{ $jenisKelamin->value }}">{{ $jenisKelamin->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Alamat</label>
                            <textarea class="form-control form-control-solid" placeholder="Alamat" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="create-guru_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" data-akun="" id="create-guru_submit" class="btn btn-primary">
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
    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="import_form">
                    <div class="modal-header" id="import_header">
                        <h2 class="fw-bold">Import Guru</h2>
                        <div id="import_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">File Excel</label>
                            <input type="file" class="form-control form-control-solid" name="file" />
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="import_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="button" id="import_submit" class="btn btn-primary">
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
    <script src="{{ asset('assets/js/pages/guru/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/guru/create.js') }}"></script>
@endpush
