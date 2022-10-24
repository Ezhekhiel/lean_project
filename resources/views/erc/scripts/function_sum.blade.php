{{-- script tampil data --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script type="text/javascript">
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        getData(page);
                    }
                }
            });
            
            $(document).ready(function()
            {
                $(document).on('click', '.pagination a',function(event)
                {
                    event.preventDefault();
        
                    $('li').removeClass('active');
                    $(this).parent('li').addClass('active');
        
                    var myurl = $(this).attr('href');
                    var page=$(this).attr('href').split('page=')[1];
        
                    getData(page);
                });
        
            });
            $('#month').change(function(){
                    if($(this).val() != '')
                    {
                        var month = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        // alert(_token);
                        $.ajax({
                            url:"{{ route('erc.live_search.action_show_data') }}",
                            method:"get",
                            data:{month:month, _token:_token},
                        }).done(function(data){
                            $("#tag_container").empty().html(data);
                        }).fail(function(jqXHR, ajaxOptions, thrownError){
                            alert('No response from server');
                        });
                    }
                    $('#month').change(function(){
                        $('#result').val('');
                    });
                });
        
            function getData(page){
                $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html"
                }).done(function(data){
                    $("#tag_container").empty().html(data);
                    location.hash = page;
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                });
            }
        </script>