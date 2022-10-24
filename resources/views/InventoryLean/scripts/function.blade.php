<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"{{ route('inventoryLean.show') }}",
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $("#table_database").html(data.table);
            }
        })
    })
    function showLocation(id)
    {
        $("#inventory_id").val(id);
        $.ajax({
            url:"{{ route('inventoryLean.showLocation') }}",
            data:{'id':id},
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $("#table_location").html(data.table);
            }
        })
    }
    function modalAdd()
    {
        var id = $("#inventory_id").val();
        if (id=="") {
            alert("You Must Select");
        }else{
            $("#alocated_inventory").modal('toggle');
            $.ajax({
            url:"{{ route('inventoryLean.showDetailInventory') }}",
            data:{'id':id},
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $("#table_modal_alocated").html(data.table);
            }
        })
        }
    }
    function updateData(id)
    {
        $("#"+id).val("");
    }
    $('#form-location').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"{{ route('InventoryLean.saveLocation') }}",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success:function(data)
            {
                if(data.alert=="success")
                {
                    // toastr.success('Success, your input has been saved !'); 
                    // mainShow();
                    // resetModalForm(data.id_po,data.gender);
                }else{
                    // toastr.error(data.alert); 
                    // mainShow();
                    // start();
                    // resetModalForm(data.id_po,data.gender);
                }
            }
        })
    });
</script>