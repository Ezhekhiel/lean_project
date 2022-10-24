<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function(){
        main(0);
        $('#rightArrow').on('click',function(){  
            var pageKe = $('#pageKe').val();
            var next = parseInt(pageKe)+1;
            $('#pageKe').val(next);
            main(next);
        });
        $('#leftArrow').on('click',function(){  
            var pageKe = $('#pageKe').val();
            var next = parseInt(pageKe)-1;
            $('#pageKe').val(next);
            main(next);
        });
        $('#IDsearchName').on('change',function(event){
            event.preventDefault();
            var i = $("#IDsearchName").prop('selectedIndex');
            $('#pageKe').val(i);
            main(i,$(this).val());
        });
    });
    function main(i,id_mt) {  
        $.ajax({
            url:"{{ route('recruitment.result.index') }}",
            method:"get",
            data:{id_mt:id_mt},
            dataType:'JSON',
            success:function(output)
            {
                $('#IDNama').html(output.name[i]);
                if ($('#IDsearchName').has('option').length==0) {
                    for (let y = 0; y < output.name.length; y++) {
                        $("#IDsearchName").append('<option value="'+output.id_mt[y]+'">'+output.name[y]+'</option>')
                    }
                }
                $('#IDsearchName option:eq('+i+')').prop('selected', true);
                $('#IDAge').html(output.age[i]);
                $('#IDEducation').html(output.nama_kampus[i]);
                $('#IDAddress').html(output.alamat[i]);
                $('#IDExperience').html(output.pengalaman_kerja[i]);
                $('#tbodyScore').html(output.table[i]);
                $('#totalScore').html(output.totalScore[i]);
                chartSpider(output.kode_test_chart[i],output.target_chart[i],output.result_chart[i]);
                var lengths = output.name.length;
                if (i==0) {
                    $("#leftArrow").hide();
                    $("#rightArrow").show();
                }else if (lengths-1<=i) {
                    $("#rightArrow").hide();
                    $("#leftArrow").show();
                }else{
                    $("#leftArrow").show();
                    $("#rightArrow").show();
                }
            }
        });
    }
    function chartSpider(kode,target,result) {  
        var marksCanvas = document.getElementById("marksChart");
        var marksData = {
            labels: kode,
            datasets: [{
                    label: "Total Nilai",
                    backgroundColor: "transparent",
                    borderColor: "red",
                    borderWidth: 5,
                    fill: false,
                    pointRadius: 6,
                    pointHitRadius: 12,
                    pointBorderWidth: 3,
                    pointBackgroundColor: "#3268a8",
                    pointBorderColor: "white",
                    pointHoverRadius: 10,
                    pointStyle: "rectangle",
                    data: result
                },
                {
                    label: "Target",
                    backgroundColor: "transparent",
                    borderColor: "#4A7EBB",
                    borderWidth: 5,
                    data: target
                }
            ]
        };
        var chartOptions = {
            plugins: {
                title: {
                    display: true,
                    align: "start",
                    text: "Comparing Candidate Performance",
                    position: "bottom"
                },
                legend: {
                    align: "start",
                    labels: {
                        padding: 30
                    }
                }
                
            },
            scales: {
                r: {
                    max: 50,
                    min: 0,
                    pointLabels: {
                        font: {
                            size: 15
                        }
                    },
                }
            }
        };
        var radarChart = new Chart(marksCanvas, {
            type: "radar",
            data: marksData,
            options: chartOptions
        });
    }
</script>