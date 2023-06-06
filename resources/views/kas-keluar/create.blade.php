@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Create Kas Keluar
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Transaksi</li>
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
        <div class="card-body">
            <form class="form-kas-keluar">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label class="required fs-6 fw-semibold mb-2">Kode</label>
                        <input type="text" readonly value="{{ $kode }}" class="form-control form-control-solid"
                            placeholder="Kode" name="kode" />
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="required fs-6 fw-semibold mb-2">Akun</label>
                        <select class="form-select form-select-solid" name="kode_akun" data-control="select2"
                            data-placeholder="Akun">
                            <option></option>
                            @foreach ($akuns as $akun)
                                <option value="{{ $akun->kode }}">{{ $akun->kode . ' - ' . $akun->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="required fs-6 fw-semibold mb-2">Tanggal</label>
                        <input class="form-control form-control-solid" value="{{ now()->format('Y-m-d') }}"
                            placeholder="Tanggal" name="tanggal" id="tanggal" />
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="required fs-6 fw-semibold mb-2">Penerima</label>
                        <select class="form-select form-select-solid" name="penerima" data-control="select2"
                            data-placeholder="Penerima">
                            <option></option>
                            @foreach (\App\Enums\Penerima::cases() as $penerima)
                                <option value="{{ $penerima->value }}">{{ $penerima->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 siswa" style="display: none;">
                        <label class="required fs-6 fw-semibold mb-2">Siswa</label>
                        <select class="form-select form-select-solid" name="siswa_id" data-control="select2"
                            data-placeholder="Siswa">
                            <option></option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->getKey() }}">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 pemasok" style="display: none;">
                        <label class="required fs-6 fw-semibold mb-2">Pemasok</label>
                        <select class="form-select form-select-solid" name="pemasok_id" data-control="select2"
                            data-placeholder="Pemasok">
                            <option></option>
                            @foreach ($pemasoks as $pemasok)
                                <option value="{{ $pemasok->getKey() }}">{{ $pemasok->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 guru" style="display: none;">
                        <label class="required fs-6 fw-semibold mb-2">Guru</label>
                        <select class="form-select form-select-solid" name="guru_id" data-control="select2"
                            data-placeholder="Guru">
                            <option></option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->getKey() }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="required fs-6 fw-semibold mb-2">Keterangan</label>
                        <textarea name="keterangan" class="form-control form-control-solid"></textarea>
                    </div>
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
                            <td style="width: 22%;">
                                <div class="col-md-12 akun">
                                    <select class="form-select form-select-solid" name="kode_akun" data-control="select2"
                                        data-kt-repeater="akun" data-placeholder="Akun" data-dropdown-parent=".akun">
                                        <option></option>
                                        @foreach ($akuns as $akun)
                                            <option value="{{ $akun->kode }}">{{ $akun->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td style="width: 22%;">
                                <div class="col-md-12 klasifikasi">
                                    <select class="form-select form-select-solid" name="klasifikasi_id"
                                        data-control="select2" data-kt-repeater="klasifikasi" data-placeholder="Klasifikasi"
                                        data-dropdown-parent=".klasifikasi">
                                        <option></option>
                                        @foreach ($klasifikasis as $klasifikasi)
                                            <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td style="width: 22%;">
                                <div class="col-md-12">
                                    <input class="form-control form-control-solid uang debet" name="debet"
                                        placeholder="Debet" id="debet" />
                                </div>
                            </td>
                            <td style="width: 22%;">
                                <div class="col-md-12">
                                    <input class="form-control form-control-solid uang kredit" name="kredit"
                                        placeholder="Kredit" id="kredit" />
                                </div>
                            </td>
                            <td style="width: 10%;">
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
                                    <input readonly class="form-control form-control-solid uang" name="total_debet"
                                        id="total_debet" value="0" />
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12">
                                    <input readonly class="form-control form-control-solid uang" name="total_kredit"
                                        id="total_kredit" value="0" />
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
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success simpan">
                        <span class="indicator-label">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ki-duotone ki-save-2 fs-3">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                </i>
                                <span>Simpan</span>
                            </div>
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tanggal").flatpickr();

            $('select[name="penerima"]').change(function(e) {
                e.preventDefault();
                var value = $(this).val();
                if (value == "{{ \App\Enums\Penerima::SISWA }}") {
                    $('.siswa').show();
                    $('.pemasok').hide();
                    $('.guru').hide();
                } else if (value == "{{ \App\Enums\Penerima::PEMASOK }}") {
                    $('.pemasok').show();
                    $('.siswa').hide();
                    $('.guru').hide();
                } else if (value == "{{ \App\Enums\Penerima::GURU }}") {
                    $('.guru').show();
                    $('.pemasok').hide();
                    $('.siswa').hide();
                } else {
                    $('.siswa').hide();
                    $('.pemasok').hide();
                    $('.guru').hide();
                }
            });

            $('#detail-kas-keluar').repeater({
                initEmpty: false,
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
                        var debet = $(element).val();
                        var tr = $(element).parent().parent().parent();
                        if (debet) {
                            $($(tr).find('.kredit')).attr('readonly', true);
                            $($(tr).find('.kredit')).val(0);
                        } else {
                            $($(tr).find('.kredit')).attr('readonly', false);
                            $($(tr).find('.kredit')).val('');
                        }
                        total();
                    });
                });
                $('.kredit').each(function(index, element) {
                    $(element).keyup(function(e) {
                        var kredit = $(element).val();
                        var tr = $(element).parent().parent().parent();
                        if (kredit) {
                            $($(tr).find('.debet')).attr('readonly', true);
                            $($(tr).find('.debet')).val(0);
                        } else {
                            $($(tr).find('.debet')).attr('readonly', false);
                            $($(tr).find('.debet')).val('');
                        }
                        total();
                    });
                });
            }

            function initUang() {
                $('.uang').mask('0.000.000.000', {
                    reverse: true
                });
            }

            $('.simpan').click(function(e) {
                e.preventDefault();
                var target = this;
                $(this).attr('data-kt-indicator', 'on');
                var postData = new FormData($(".form-kas-keluar")[0]);
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
                        $(target).removeAttr('data-kt-indicator');
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
        });
    </script>
@endpush
