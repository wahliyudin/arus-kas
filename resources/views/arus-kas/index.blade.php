@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Arus Kas')

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Arus Kas
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Laporan</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Arus Kas</li>
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
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Kas Masuk" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex align-items-center">
                    <input class="form-control form-control-solid w-100 mw-250px"
                        value="{{ now()->format('m/d/Y') . ' - ' . now()->format('m/d/Y') }}" name="range"
                        id="range" />
                    <button type="button" class="btn btn-info export btn-sm">Export</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="arus-kas_table">
                <tbody class="fw-semibold text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#arus-kas_table').DataTable({
                order: [],
                ajax: {
                    url: "/arus-kas/datatable",
                    type: "POST",
                    data: function(data) {
                        data.range = $('input[name="range"]').val();
                    },
                    dataSrc: function(json) {
                        return json.data;
                    },
                },
                paging: false,
                columns: [{
                        orderable: false,
                        name: 'one',
                        data: 'one',
                    },
                    {
                        orderable: false,
                        name: 'two',
                        data: 'two',
                    },
                    {
                        orderable: false,
                        name: 'three',
                        data: 'three',
                    },
                    {
                        orderable: false,
                        name: 'four',
                        data: 'four',
                    },
                ],
            });

            $('input[name="range"]').daterangepicker();
            $('input[name="range"]').change(function(e) {
                e.preventDefault();
                table.ajax.reload();
            });

            $('.export').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/arus-kas/export",
                    data: {
                        range: $('input[name="range"]').val()
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(data) {
                        var a = document.createElement('a');
                        var url = window.URL.createObjectURL(data);
                        a.href = url;
                        a.download = 'arus-kas.pdf';
                        document.body.append(a);
                        a.click();
                        a.remove();
                        window.URL.revokeObjectURL(url);
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        if (jqXHR.status == 500) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        }
                    }
                });
            });
        });
    </script>
@endpush
