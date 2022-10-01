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

$("#province").change(function (){
    $('#district').html('<option value="">เลือกอำเภอ</option>');
    let province_id = $("#province").val();
    $.get('backend/api/get_district.php?province_id=' + province_id, function(data){
        let result = JSON.parse(data);
        $.each(result, function(index, item){
            $('#district').append(
                $('<option></option>').val(item.district_id).html(item.district_name)
            );
        });
    });
});

$("#district").change(function (){
    $('#subDistrict').html('<option value="">เลือกตำบล</option>');
    let district_id = $("#district").val();
    $.get('backend/api/get_subDistrict.php?district_id=' + district_id, function(data){
        let result = JSON.parse(data);
        $.each(result, function(index, item){
            $('#subDistrict').append(
                $('<option></option>').val(item.subdistrict_id).html(item.subdistrict_name)
            );
        });
    });
});

$("#subDistrict").change(function (){
    // $('#zipcode').html('<option value="">เลือกรหัสไปรษณีย์</option>');
    let subdistrict_id = $("#subDistrict").val();
    $.get('backend/api/get_zipcode.php?subdistrict_id=' + subdistrict_id, function(data){
        let result = JSON.parse(data);
        $.each(result, function(index, item){
            $('#zipcode').html(
                $('<option></option>').val(item.zipcode_id).html(item.zipcode)
            );
        });
    });
});




