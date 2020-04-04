<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>

<!-- Datatables App -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.fixedColumns.js') }}"></script>

{{--<!-- Table Header Footer fixer -->--}}
{{--<script src="{{ asset('plugins/jQuery/Table-Header-Footer-Fixer/tableHeadFixer.js') }}"></script>--}}

{{--<!-- moment -->--}}
<script src="{{ asset('plugins/moment/moment.js') }}"></script>
{{--<script src="{{ asset('plugins/moment/moment-timezone.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/moment/moment-timezone-with-data.js') }}"></script>--}}


<!-- bootstrap daterangepicker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- bootstrap daterangepicker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
{{--<!-- FastClick -->--}}
{{--<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>--}}

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->


{{--<!-- bootstrap Select -->--}}
{{--<script src="{{ asset('bootstrap/js/bootstrap-select.min.js') }}"></script>--}}
{{--<!-- ajax functions -->--}}

<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<!-- underscorejs -->
<script src="{{ asset('plugins/underscore/underscore.js') }}"></script>

{{--<!-- lightbox -->--}}
{{--<script src="{{ asset('plugins/lightbox/lightbox.js') }}"></script>--}}

<!--x-editable-->
<script src="{{ asset('plugins/x-editable/x-editable.js') }}"></script>

{{--<!--socket.io-->--}}
{{--<script src="{{ asset('plugins/socket/socket.io.js') }}"></script>--}}

<!--angular-->
<script src="{{ asset('plugins/angular/angular.js') }}"></script>

{{--<!--angular-sanitize-->--}}
{{--<script src="{{ asset('plugins/angular/angular-sanitize.js') }}"></script>--}}

{{--<!--sip.js-->--}}
{{--<script src="{{ asset('plugins/sip/sip.js') }}"></script>--}}

<!-- jQueryUI JS -->
<script src="{{ asset('plugins/jQueryUI/jquery-ui-1.12.1/jquery-ui.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('plugins/angular/angular-touch.js') }}"></script>
<script src="{{ asset('plugins/angular/angular-animate.js') }}"></script>
<script src="{{ asset('plugins/angular/angular-local-storage.min.js') }}"></script>

<!--  ui grid -->
<script src="{{ asset('plugins\ui-grid\ui-grid.min.js') }}"></script>


{{--<script src="{{ asset('plugins/csv-js/csv.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/pdfmake/pdfmake.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/pdfmake/build/vfs_fonts.js') }}"></script>--}}

{{--<!--  orgchart -->--}}
{{--<script src="{{ asset('plugins\orgchart\orgchart.min.js') }}"></script>--}}

{{--<!--  angular-hotkeys -->--}}
{{--<script src="{{ asset('plugins\angular-hotkeys\hotkeys.min.js') }}"></script>--}}

<!--  eonasdan-bootstrap-datetimepicker -->
<script src="{{ asset('plugins\eonasdan-bootstrap-datetimepicker\bootstrap-datetimepicker.min.js') }}"></script>

{{--<!-- angular-timer !-->--}}
{{--<script src="{{ asset('plugins/angular-timer/angular-timer.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/angular-timer/humanize-duration.js') }}"></script>--}}

<!-- semantic ui -->
<script src="{{ asset('plugins/semanticui/semantic.js') }}"></script>


<script type="text/javascript">
    var app = angular.module('app', ['ui.grid.infiniteScroll', 'ui.grid', 'ui.grid.selection', 'ui.grid.pagination', 'ui.grid.resizeColumns', 'ui.grid.autoResize',
        'ui.grid.edit', 'ui.grid.exporter', 'ui.grid.resizeColumns', 'ui.grid.moveColumns']);

    var gridOptions = {
        enableSorting: true,
        enableFiltering: true,
        paginationPageSizes: [50, 100, 500, 1000],
        paginationPageSize: 100,
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
        rowHeight: 35,
        multiSelect:false,
        columnDefs: [
        ]
    };
    function deleteAllCookie() {
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++)
            eraseCookie(cookies[i].split("=")[0]);
    }

    function eraseCookie(name) {
        setCookie(name,"",-1);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

</script>








