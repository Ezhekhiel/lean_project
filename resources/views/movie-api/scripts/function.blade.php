<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $('#srachID').on('click',function () {
        var search = $('#search-input').val();
        $.ajax({
            url:'https://forlap.kemdikbud.go.id/prodi/ajaxGetPT',
            type:'get',
            dataType:'json',
            data:{},
            success:function(result){
                console.log(result);
                // if (result.Response=="True") {
                //     let movies = result.Search;
                //     $.each(movies, function (i, data) {
                //         $('#result-movie').append('<div class="col-md-4"><div class="card"><img class="card-img-top" src="'+data.Poster+'" alt="..."><div class="card-body"><h5 class="card-title">'+data.Title+'</h5><h6 class="card-subtitle mb-2 text-muted">'+data.Year+'</h6><a href="#" class="btbtn-primary">Go somewhere</a></div></div></div>');
                //     });
                // }else{
                //     $('#result-movie').html('<div class="col"><h1 class="text-center">'+result.Error+'</h1></div>');
                // }
            }
        });
    });
    
</script>