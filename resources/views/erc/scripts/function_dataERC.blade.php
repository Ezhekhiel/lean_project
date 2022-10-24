{{-- script tampil data --}}
<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.year').change(function(){
            if($(this).val() != '')
            {
                var year = $(this).val();
                var _token = $('input[name="_token"]').val();
                // alert(_token);
                $.ajax({
                    url:"{{ route('erc.live_search.action_show_data_erc') }}",
                    method:"POST",
                    data:{year:year, _token:_token},
                    success:function(result)
                    {
                        $('#result').html(result);
                    }
                })
            }
        });
        $('#year').change(function(){
            $('#result').val('');
        });
    });
</script>
{{-- script Save --}}
<script>
    $(document).ready(function(){
         $('#formInput').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('erc.data_save') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#success').empty();
                    document.getElementById("loading").style.visibility = "visible";
                    document.getElementById("Save").disabled = true;
                    document.getElementById("Close").disabled = true;
                },
                uploadProgress:function(event, position, total, percentComplete)
                {
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%');
                },
                success:function(data)
                {
                    if(data.errors)
                    {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                        document.getElementById("loading").style.visibility = "hidden";
                        document.getElementById("Save").disabled = false;
                        document.getElementById("Close").disabled = false;
                    }
                    if(data.success)
                    {
                        $datasukses=data.success;
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                        document.getElementById("loading").style.visibility = "hidden";
                        document.getElementById("Save").disabled = false;
                        document.getElementById("Close").disabled = false;
                        document.getElementById("formInput").reset();
                        $('#Close').hide();
                        $('#ButtonClose').show();
                    }
                }
            })
         });
        $('#ButtonClose').on('click',function(){
            window.location.reload();
        });
    });
</script>