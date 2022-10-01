// Class definition

var KTSummernoteDemo = function () {
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 150,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']],
                ['height', ['height']]
            ]
        });
    }

    return {
        // public functions
        init: function() {
            demos();

        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTSummernoteDemo.init();

});

$(function (){
    $('#tbView').dataTable({
        "bAutoWidth": false,
        "order": [],
        fixedColumns: true,
        "scrollY": "550px",
        "ordering": false,
        "columnDefs": [{
            "targets"  : 'no-sort',
            "orderable": false,
        }]
    });

    $('.select2').select2({
        placeholder: 'กรุณาเลือก',
        width: '100%'
    });

    $(".numberOnly").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
})

$('.datepicker').datepicker({
    rtl: KTUtil.isRTL(),
    todayHighlight: true,
    orientation: "bottom left",
    autoclose: true,
    templates: arrows,
    format:'dd/mm/yyyy'
});




