<!--   Core JS Files   -->
<script src="./mine/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="./mine/popper.min.js" type="text/javascript"></script>
<script src="./mine/bootstrap.min.js" type="text/javascript"></script>
<script src="./mine/wow.min.js"> </script>
<script src="./mine/datatables.min.js"> </script>
<script src="./mine/simplebar.min.js"> </script>
<script src="./mine/jQuery.print.js"> </script>
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
new WOW({
    animateClass: 'animate__animated', // default
}).init();
</script>

<script type="text/javascript">
var aneh;
$(document).ready(function() {
    <?php if ($data['link'] == 'KPesanan'): ?>
    $('#diskusi').scrollTop($('#diskusi')[0].scrollHeight);

    <?php endif;?>
    aneh = $('.tb').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: 'column',
                renderer: function(api, rowIdx, columns) {
                    var data = $.map(columns, function(col, i) {
                        return col.hidden ?
                            '<li  class="" data-dtr-index="1" data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                            '<div class="d-flex justify-content-between" >' +

                            '<span class="dtr-title">' + col.title + ':' + '</span> ' +
                            '<span class="dtr-data text-right text-break text-wrap">' + col.data + '</span>' +
                            '</li></div>' :
                            '';
                    }).join('');

                    return data ?
                        $('<ul style="display:block;" class="dtr-details" />').append(data) :
                        false;
                }
            }
        },
        "dom": '<"p-2 d-flex justify-content-between" f>t<"card-body d-flex justify-content-end" p>',
        "lengthMenu": [
            [5, 10, -1],
            [5, 10, "All"]
        ],
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">",
            }
        }
    });



});
</script>
