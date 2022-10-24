<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script type="text/javascript">
    var i = 0;

    $("#add").click(function(){

        ++i;
        $("#dynamicTable").append('<tr class="exampleTambah" id="baris'+i+'"><td><input type="file" name="image[]" placeholder="Enter Image" accept="image/x-png,image/gif,image/jpeg"/></td><td><select name="cell[]" class="form-control">@foreach($list_cell as $a)<option value="{{$a->id_cell}}">{{$a->cell}}</option>@endforeach</select></td><td><input type="text" name="auditor[]" placeholder="Enter Auditor" class="form-control"></td><td><button type="button" onclick="deleteRow('+i+')" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        x=document.querySelectorAll('.example');
        len=x.length;
    });

    function deleteRow(id){
        $('#baris'+id).remove();
    }

</script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"{{ route('event.show') }}",
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $('#wt').html(data.table);
            }
        });

        $('#form_input').on('submit', function(event){
            $('.tambahDataWT').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('event.save') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    if(data.alert=="Image uploaded successfully")
                    {
                        $('#wt').html(data.table);
                        $('.exampleTambah').remove();
                        $('#tambahImage').val('');
                        $('#tambahSelect').prop('selectedIndex',0);
                        $('#tambahAuditor').val('');

                        var allert_success = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                                $(this).remove();
                            });
                        }, 2000);
                    }else{
                        $('#wt').html(data.table);
                        $('.exampleTambah').remove();
                        var allert_success = document.getElementById("alert_error");
                        $('#alert_error').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error").fadeTo(1000, 0).slideUp(1000, function(){
                                $(this).remove();
                            });
                        }, 2000);
                    }
                }
            })
        });

        $('#form_update').on('submit', function(event){
            $('.updateModal').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('event.update') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    if(data.alert=="Image uploaded successfully")
                    {
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_success_update");
                        $('#alert_success_update').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success_update").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }else{
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_error_update");
                        $('#alert_error_update').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error_update").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }
                }
            })
        });
        $('#form_delete').on('submit', function(event){
            $('.deleteModal').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('event.delete') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    if(data.alert=="Delete successfully")
                    {
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_success_delete");
                        $('#alert_success_delete').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success_delete").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }else{
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_error_delete");
                        $('#alert_error_delete').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error_delete").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }
                }
            })
        });
        $('#form_deleteSelect').on('submit', function(event){
            $('.deleteSelectModal').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('event.deleteCheckbox') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    if(data.alert=="Delete successfully")
                    {
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_success_delete");
                        $('#alert_success_delete').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success_delete").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }else{
                        $('#wt').html(data.table);
                        var allert_success = document.getElementById("alert_error_delete");
                        $('#alert_error_delete').css({'opacity' : '' });
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error_delete").fadeTo(1000, 0).slideUp(1000, function(){
                                allert_success.style.display="none";
                            });
                        }, 2000);
                    }
                }
            })
        });
    });
    
    $(document).on('change', '.checkbox', function(){
        var no = document.getElementById('no');
        var btn = document.getElementById('btnDelete');
        var btnUnchecked = document.getElementById('btnUnchecked');
        var checkedNum = $('input[name="select[]"]:checked').length;
        if (!checkedNum) {
            no.style.display = "block";
            btn.style.display = "none";
            btnUnchecked.style.display = "none";
        }else{
            no.style.display = "none";
            btn.style.display = "block";
            btnUnchecked.style.display = "block";
        }
    });
    $(document).on('click','#btnUnchecked',function(){
        $('.checkbox').prop('checked', false);
        $('#no').show();
        $('#btnDelete').hide();
        $('#btnUnchecked').hide();
    });
    $(document).on('click','#updateArea',function(){
        $('#updateArea').attr("value", '');
        $('#updateArea').hide();
        $('#selectArea').show();
        $.ajax({
            url:"{{ route('event.area') }}",
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $('#selectArea').html(data.option); 
            }
        });
    });
    function updateFunction(id)
    {
        $('.updateModal').modal('toggle');
        $.ajax({
            url:"{{ route('event.showUpdate') }}",
            method:"get",
            data:{id:id},
            dataType:'JSON',
            success:function(data)
            {
                $('#updateID').attr("value", data.updateID);
                $('#updateTanggal').attr("value", data.updateTanggal);
                $('#updateJenisEvent').attr("value", data.updateJenisEvent);
                $('#updateNamaEvent').attr("value", data.updateNamaEvent);
                $('#updateAuditor').attr("value", data.updateAuditor);
                $('#selectArea').html(data.updateArea); 
                $('#updateImage').attr("src", data.updateImage);
                $('#updateDescription').val(data.updateDescription);
                $('#updateDueDate').attr("value", data.updateDueDate);
            }
        });
    }
    $(document).on('click','#btnDelete',function(){
        var checkbox = $('input:checkbox:checked.checkbox').map(function () {
            return this.value;
        }).get();
        $('.deleteSelectModal').modal('toggle');
        $.ajax({
            url:"{{ route('event.showSelectDelete') }}",
            method:"get",
            data:{id:checkbox},
            dataType:'JSON',
            success:function(data)
            {
                $('#imageSelectDelete').html(data.imageSelectDelete);
                $('#idSelectDelete').html(data.idSelectDelete);
            }
        });
    });
    function deleteFunction(id)
    {
        $('.deleteModal').modal('toggle');
        $.ajax({
            url:"{{ route('event.showUpdate') }}",
            method:"get",
            data:{id:id},
            dataType:'JSON',
            success:function(data)
            {
                $('#deleteID').attr("value", data.updateID);
                $('#deleteImage').attr("src", data.updateImage);
            }
        });
    }
    
</script>