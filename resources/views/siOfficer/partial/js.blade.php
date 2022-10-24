<!-- core -->
<script src="{{ asset("plugins/jquery/core.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#Smonth').on('change', function(event) {
                event.preventDefault();
                $.ajax({
                    url:"{{ route('SI_.searchEXP') }}",
                    data:{data:$(this).val()},
                    method:"get",
                    dataType:'JSON',
                    success:function(data)
                    {
                        $('#sExp').html(data.option);
                    }
                });
            });
            $('#sExp').on('change', function(event) {
                event.preventDefault();
                $.ajax({
                    url:"{{ route('SI_.sarchData') }}",
                    data:{data:$(this).val()},
                    method:"get",
                    dataType:'JSON',
                    success:function(data)
                    {
                        $('#resultShipment').html(data.table);
                        $("#searchAll").prop('disabled', false);
                    }
                    });
            });
            $('#quantityInspection').on('keyup',function(){
                var balance = $('#modal_balance').val();
                var inspection = this.value;
                if(parseInt(balance)==parseInt(inspection))
                {
                    $('#statusInspection').html("<option value='Passed'>Passed</option><option value='Reject'>Reject</option>");
                }else if(parseInt(balance)<parseInt(inspection))
                {
                    $('#statusInspection').html('');
                }else{
                    $('#statusInspection').html("<option value='On Progress'>On Progress</option>");
                }
            });
            $('#inputInspection').on('submit', function(event){
                var status = $('#statusInspection').val();
                if(!status)
                {
                    alert("Status option must be selected!");
                    return false;
                }else{
                    $('#tambahModal').modal('toggle');
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('SI_.updateInspection') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(output)
                        {
                            if(output.success)
                            {
                                var allert_success = document.getElementById("alert_success");
                                window.setTimeout(function() {
                                    $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                                        $(this).remove();
                                    });
                                }, 2000);
                                $('#resultShipment').html(output.table);
                                $('#statusInspection').html('');
                                $('#quantityInspection').val('');
                            }
                        }
                    });
                }
            });
            $('#searchAll').on('keyup', function(){
                var week_bulan = document.getElementById("week_bulan").value;
                const arrThis = week_bulan.split("/");
                var week = arrThis[0];
                var bulan = arrThis[1];
                $.ajax({
                    url:"{{ route('SI_.searchAll') }}",
                    data:{data_search:this.value,week:week, bulan:bulan},
                    method:"get",
                    dataType:'JSON',
                    success:function(data)
                    {
                        $('#resultShipment').html(data.table);
                        $('#modal_week').val(week);
                        $('#modal_bulan').val(bulan);
                    }
                    });
            });
        });
        function tambahModal(id, po, balance)
        {
            $('#tambahModal').modal('toggle');
            $('#modal_po').html(po);
            $('#modal_id').val(id);
            $('#modal_balance').val(balance);

        }
    </script>