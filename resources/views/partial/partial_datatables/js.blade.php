<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    $('#exampleModal').css({width:'auto',height:'auto', 'max-height':'100%'});
    })
</script>
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script>
    $("#checkAll2").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script>
    $("#checkAll3").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable7').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.myTable6').DataTable({
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.myTable5').DataTable({
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable4').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable3').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable2').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "scrollY": 800,
            "scrollX": true
        });
    });
</script>

        <script>
            function goBack() {
            window.history.back();
            }
        </script>
