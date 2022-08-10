<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>MIS</b> 13
  </div>
  <strong> โปรเจคระบบรับออเดอร์อาหาร  &copy;  2020
  </strong>
</footer>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/demo.js"></script>
<script src="../bower_components/ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function() {
$('#example1').DataTable( {

});
} );

</script>
<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : false,
'info'        : true,
'autoWidth'   : false
})
})
</script>
<script>
  $(function () {

    CKEDITOR.replace('editor1')

    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
