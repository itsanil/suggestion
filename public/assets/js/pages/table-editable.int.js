$(function() {
    var e = {};
    $(".table-editable").DataTable();
    $(".table-editss tr").editable({
        dropdowns: {
            gender: ["Male", "Female"]
        },
        edit: function(t) {
            $(".edit i", this).removeClass("fa-pencil-alt").addClass("fa-save").attr("title", "Save")
        },
        save: function(t) {
            $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this])
        },
        cancel: function(t) {
            $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this])
        }
    })
});

$(document).ready(function() {
    $("#datatable").DataTable(), $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf", "colvis"]
    }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm")
});