@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Data Kas Keluar
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Master</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Kas Keluar</li>
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
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Kas Keluar" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                    <button type="button" class="btn btn-primary ps-4" data-bs-toggle="modal"
                        data-bs-target="#create-kas-keluar">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Kas Keluar
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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kas_keluar_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kas_keluar_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>No Kas Keluar</th>
                        <th>Tanggal</th>
                        <th>Dari</th>
                        <th>Keterangan</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($kasKeluars as $kasKeluar)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $kasKeluar->getKey() }}" />
                                </div>
                            </td>
                            <td>{{ $kasKeluar->no }}</td>
                            <td>{{ $kasKeluar->tanggal }}</td>
                            <td>{{ transaksiDari($kasKeluar) }}</td>
                            <td>{{ $kasKeluar->keterangan }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" data-kas-keluar="{{ $kasKeluar->getKey() }}"
                                        class="btn btn-sm btn-primary ps-4 btn-edit">
                                        <span class="indicator-label">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ki-duotone ki-notepad-edit fs-3">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                </i>Ubah
                                            </div>
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                    <button type="button" data-kas-keluar="{{ $kasKeluar->getKey() }}"
                                        class="btn btn-sm btn-danger ps-4 btn-delete">
                                        <span class="indicator-label">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ki-duotone ki-trash fs-3">
                                                    <i class="path1"></i>
                                                    <i class="path2"></i>
                                                    <i class="path3"></i>
                                                    <i class="path4"></i>
                                                    <i class="path5"></i>
                                                </i>Hapus
                                            </div>
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="create-kas-keluar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form class="form" action="#" id="create-kas-keluar_form">
                    <div class="modal-header" id="create-kas-keluar_header">
                        <h2 class="fw-bold">Tambah Kas Keluar</h2>
                        <div id="create-kas-keluar_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17 row">
                        <div class="col-md-6 mb-7">
                            <label class="required fs-6 fw-semibold mb-2">No Kas Keluar</label>
                            <input type="text" class="form-control form-control-solid" readonly
                                value="{{ $no }}" placeholder="No Kas Keluar" name="no" />
                        </div>
                        <div class="col-md-6 mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal</label>
                            <input class="form-control form-control-solid" value="{{ now()->format('Y-m-d') }}"
                                name="tanggal" placeholder="Tanggal" id="tanggal" />
                        </div>
                        <div class="col-md-6 mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Penerima</label>
                            <select class="form-select form-select-solid" name="penerima" data-control="select2"
                                data-placeholder="Penerima" data-dropdown-parent="#create-kas-keluar">
                                <option></option>
                                @foreach (\App\Enums\Penerima::cases() as $penerima)
                                    <option value="{{ $penerima->value }}">{{ $penerima->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-7 siswa" style="display: none;">
                            <label class="required fs-6 fw-semibold mb-2">Siswa</label>
                            <select class="form-select form-select-solid" name="siswa" data-control="select2"
                                data-placeholder="Siswa" data-dropdown-parent="#create-kas-keluar">
                                <option></option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-7 pemasok" style="display: none;">
                            <label class="required fs-6 fw-semibold mb-2">Pemasok</label>
                            <select class="form-select form-select-solid" name="pemasok" data-control="select2"
                                data-placeholder="Pemasok" data-dropdown-parent="#create-kas-keluar">
                                <option></option>
                                @foreach ($pemasoks as $pemasok)
                                    <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Keterangan</label>
                            <textarea class="form-control form-control-solid" name="keterangan"></textarea>
                        </div>
                        <hr>
                        <table id="detail-kas-keluar" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Akun</th>
                                    <th>Klasifikasi</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody data-repeater-list="detail_transaksi">
                                <tr data-repeater-item>
                                    <td>
                                        <div class="col-md-12 akun">
                                            <select class="form-select form-select-solid" name="akun"
                                                data-control="select2" data-kt-repeater="akun" data-placeholder="Akun"
                                                data-dropdown-parent=".akun">
                                                <option></option>
                                                @foreach ($akuns as $akun)
                                                    <option value="{{ $akun->kode }}">{{ $akun->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12 klasifikasi">
                                            <select class="form-select form-select-solid" name="klasifikasi"
                                                data-control="select2" data-kt-repeater="klasifikasi"
                                                data-placeholder="Klasifikasi" data-dropdown-parent=".klasifikasi">
                                                <option></option>
                                                @foreach ($klasifikasis as $klasifikasi)
                                                    <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input class="form-control form-control-solid uang debet" name="debet"
                                                placeholder="Debet" id="debet" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input class="form-control form-control-solid uang kredit" name="kredit"
                                                placeholder="Kredit" id="kredit" />
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span><span class="path5"></span></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang"
                                                name="total_debet" id="total_debet" value="0" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang"
                                                name="total_kredit" id="total_kredit" value="0" />
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" data-repeater-create class="btn btn-light-primary">
                                            <i class="ki-duotone ki-plus fs-3"></i>
                                            Tambah
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="create-kas-keluar_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="button" data-akun="" id="create-kas-keluar_submit" class="btn btn-primary">
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
    <script src="{{ asset('assets/js/pages/kas-keluar/index.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/kas-keluar/create.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            flatpickr(document.querySelector('#tanggal'), {
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $('#create-kas-keluar_submit').click(function(e) {
                e.preventDefault();
                var target = this;
                $(this).attr('data-kt-indicator', 'on');
                var postData = new FormData($("#create-kas-keluar_form")[0]);
                $.ajax({
                    type: 'POST',
                    url: `/kas-keluar/store`,
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $(target).removeAttr('data-kt-indicator');
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                    }
                });
            });

            $('select[name="penerima"]').change(function(e) {
                e.preventDefault();
                var value = $(this).val();
                if (value == "{{ \App\Enums\Penerima::SISWA }}") {
                    $('.siswa').show();
                    $('.pemasok').hide();
                } else if (value == "{{ \App\Enums\Penerima::PEMASOK }}") {
                    $('.pemasok').show();
                    $('.siswa').hide();
                } else {
                    $('.siswa').hide();
                    $('.pemasok').hide();
                }
            });
            $('#detail-kas-keluar').repeater({
                initEmpty: false,

                // defaultValues: {
                //     'text-input': 'foo'
                // },

                show: function() {
                    $(this).slideDown();
                    $('#detail-kas-keluar .select2-container').remove();
                    $('#detail-kas-keluar [data-kt-repeater="akun"]').each(function(index, element) {
                        $(element).attr('id', `akun${index}`);
                        $(element).select2({
                            width: '100%',
                        });
                    });
                    $('#detail-kas-keluar [data-kt-repeater="klasifikasi"]').each(function(index,
                        element) {
                        $(element).attr('id', `klasifikasi${index}`);
                        $(element).select2({
                            width: '100%',
                        });
                    });
                    total();
                    initKeyUp();
                    initUang();
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    total();
                    initKeyUp();
                    var oldDebet = numberFromString($('input[name="total_debet"]').val());
                    var oldKredit = numberFromString($('input[name="total_kredit"]').val());
                    oldDebet -= numberFromString($($(this).find('.debet')).val());
                    oldKredit -= numberFromString($($(this).find('.kredit')).val());
                    $('input[name="total_debet"]').val(oldDebet).trigger('input');
                    $('input[name="total_kredit"]').val(oldKredit).trigger('input');
                    initUang();
                }
            });
            total();
            initUang();

            function total() {
                var totalDebet = 0;
                var totalKredit = 0;
                $('.debet').each(function(index, element) {
                    totalDebet += numberFromString($(element).val());
                });
                $('.kredit').each(function(index, element) {
                    totalKredit += numberFromString($(element).val());
                });
                $('input[name="total_debet"]').val(totalDebet).trigger('input');
                $('input[name="total_kredit"]').val(totalKredit).trigger('input');
            }

            function numberFromString(s) {
                return typeof s === 'string' ?
                    s.replace(/[\$.]/g, '') * 1 :
                    typeof s === 'number' ?
                    s : 0;
            }
            initKeyUp();

            function initKeyUp() {
                $('.debet').each(function(index, element) {
                    $(element).keyup(function(e) {
                        total();
                    });
                });
                $('.kredit').each(function(index, element) {
                    $(element).keyup(function(e) {
                        total();
                    });
                });
            }

            function initUang() {
                $('.uang').mask('0.000.000.000', {
                    reverse: true
                });
            }

        });
    </script>
@endpush
