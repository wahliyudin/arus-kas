"use strict";

// Class definition
var KTBukuBesarsList = function () {
    // Define shared variables
    var datatable;
    var table;

    // Private functions
    var initBukuBesarList = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            dateRow[5].setAttribute('data-order', realDate);
        });

        datatable = $(table).DataTable({
            processing: true,
            order: [[1, 'asc']],
        });

        datatable.on('draw', function () {

        });
    }

    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    return {
        init: function () {
            table = document.querySelector('#buku_besar_table');

            if (!table) {
                return;
            }

            initBukuBesarList();
            handleSearchDatatable();
        }
    }
}();
KTUtil.onDOMContentLoaded(function () {
    KTBukuBesarsList.init();
});
