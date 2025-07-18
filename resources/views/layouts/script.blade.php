<script src="{{asset('template/assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('template/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('template/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/chart.js/chart.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/jsvectormap/world.js')}}"></script>
<script src="{{asset('template/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('template/assets/js/kaiadmin.min.js')}}"></script>
<script src="{{asset('template/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('template/assets/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});

    $("#multi-filter-select").DataTable({
      pageLength: 5,
      initComplete: function () {
        this.api()
          .columns()
          .every(function () {
            var column = this;
            var select = $(
              '<select class="form-select"><option value=""></option></select>'
            )
              .appendTo($(column.footer()).empty())
              .on("change", function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                column
                  .search(val ? "^" + val + "$" : "", true, false)
                  .draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append(
                  '<option value="' + d + '">' + d + "</option>"
                );
              });
          });
      },
    });

    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
      '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function () {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action,
        ]);
      $("#addRowModal").modal("hide");
    });
  });
</script>
