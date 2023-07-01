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
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
            { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
        ],
        searching:false ,
        "bPaginate": false,
        language:{
            url:'//cdn.datatables.net/plug-ins/1.10.25/i18n/English.json'
        },
        buttons: false,
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
