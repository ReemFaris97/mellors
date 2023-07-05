/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Component: Datatable
*
*/

var handleDataTableButtons = function() {
    "use strict";
    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
        dom: "Bfrtip",
        "columnDefs": [
            { "orderable": false, "targets": '_all'}
          ],
        // "aoColumnDefs": [
        //     { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
        //     { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
        // ],
        searching:true ,
        "bPaginate": true,
        language:{
            url:'//cdn.datatables.net/plug-ins/1.10.25/i18n/English.json'
        },
        buttons: true,
        responsive: !0
    })
},
TableManageButtons = function() {
    "use strict";
    return {
        init: function() {
            handleDataTableButtons()
        }
    }
}();
