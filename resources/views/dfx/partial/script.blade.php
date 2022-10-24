<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"{{ route('dfx.main') }}",
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $('#season').html(data.selectSeason);
            }
        });
        $('#season').on('change', function() {
            $.ajax({
                url:"{{ route('dfx.changeSeason') }}",
                data:{changeSeason : this.value},
                method:"get",
                dataType:'JSON',
                success:function(data)
                {
                    $('#model_name').html(data.model_name);
                    $('#table').html(data.table);
                }
            });
        });
        $('#model_name').on('change', function() {
            var season = $('#season').find(":selected").val();
            $.ajax({
                url:"{{ route('dfx.changeModel') }}",
                data:{model : this.value,season:season},
                method:"get",
                dataType:'JSON',
                success:function(data)
                {
                    $('#principle').html(data.principle);
                    $('#table').html(data.table);
                }
            });
        });
    });
</script>