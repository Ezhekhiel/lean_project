<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
{{-- chart script  --}}
    <script>
    $(document).ready(function(){
        $('#formInput').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('erc.save') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.success=="Data uploaded successfully")
                    {
                        $('#AddModal').modal('toggle');
                        resetModal();
                        var alert = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        $('.alertSuccess').html(output.success)
                        alert.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                        location.reload();
                        // main();
                    }else{
                        var alert = document.getElementById("alert_error");
                        $('#alert_error').css({'opacity' : '' });
                        $('.alertError').html(output.success)
                        alert.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                    }
                }
            });
        });
    });
    function show() {  }
    function resetModal() { 
        $('#date').val("");
        $('#target_mp').val("");
        $('#saving_mp').val("");
        $('#saving_cost').val("");
        $('#cum_saving').val("");
     }
        var chart_progress = {
            labels: {!!json_encode($month)!!},
            datasets: [{
                type: 'line',
                label: 'Cumulatif Saving Cost',
                backgroundColor: "#c71b00",
                borderColor: "#c71b00",
                borderWidth: 2,
                fill: false,
                yAxisID: 'B',
                data: {!!json_encode($cumSaving_list)!!}
            },{
                type: 'bar',
                label: 'Total Saving Cost',
                backgroundColor: "#17a2b8",
                borderColor: "#17a2b8",
                borderWidth: 1,
                fill: false,
                yAxisID: 'A',
                data: {!!json_encode($savingCost_list)!!}
            },{
                type: 'line',
                label: 'Target PDP',
                backgroundColor: "#000000",
                borderColor: "#000000",
                borderWidth: 2,
                fill: false,
                yAxisID: 'B',
                data: {!!json_encode($target_pdp)!!}
            }]
        };
        window.onload = function () {
            var ctx_progress = document.getElementById('chart_progress').getContext('2d');
            window.myMixedChart = new Chart(ctx_progress, {
                type: 'bar',
                data: chart_progress,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Summary Progress of Kaizen - ERC (by Month)',
                        fontSize: 40
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        yAxes: [{
                            id: 'A',
                            position: 'left',
                            ticks: {
                                suggestedMin: 0,
                            },
                        },{
                            id: 'B',
                            position: 'right',
                            ticks: {
                                suggestedMin: 0,
                            },
                        }]
                    }
                }
            });
        };
    </script>
{{-- /chart script  --}}