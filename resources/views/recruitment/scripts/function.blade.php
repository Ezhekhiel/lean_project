<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#formEmailInvitation').hide();
        $('#emailOnlineTest').hide();
        $('#formEmailInformation').hide();
        main();
        $('.filterSelect').on('change',function(){
            var tanggal = $('#id_ts').val();
            var name = $('#id_name').val();
            var age = $('#id_age').val();
            var bd = $('#id_bd').val();
            var email = $('#id_email').val();
            var phone = $('#id_phone').val();
            var cn = $('#id_cn').val();
            var ps = $('#id_ps').val();
            var address = $('#id_address').val();
            var experience = $('#id_experience').val();
            var loe = $('#id_loe').val();
            var referensi = $('#id_reference').val();
            var status = $('#id_status').val();
            var se = $('#id_se').val();
            // alert(se);
            $('.filterSelect').val("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{ route('recruitment.search') }}",
                method:"POST",
                data:{tanggal:tanggal,name:name,age:age,bd:bd,email:email,phone:phone,cn:cn,ps:ps,address:address,experience:experience,loe:loe,referensi:referensi,status:status,se:se},
                dataType:'JSON',
                success:function(output)
                {
                    if(output.success)
                    {
                        $("#tableRecruitment").html(output.tableImport);
                        $("#id_ts").html(output.tanggal);
                        $("#id_name").html(output.name);
                        $("#id_age").html(output.age);
                        $("#id_bd").html(output.b_d);
                        $("#id_email").html(output.email);
                        $("#id_phone").html(output.p_n);
                        $("#id_cn").html(output.n_k);
                        $("#id_ps").html(output.p_p);
                        $("#id_address").html(output.alamat);
                        $("#id_experience").html(output.p_k);
                        $("#id_loe").html(output.l_b);
                        $("#id_reference").html(output.referensi);
                        $("#id_status").html(output.arr_checklist_status);
                        $("#id_se").html(output.arr_checklist_status_email);
                    }
                }
            });
        });
        $('#resetshow').on('click',function(){
            main();
        });
        $('#importExcel').on('submit', function(event){
            $('.modalOpenImport').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('recruitment.import') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.success=="Update Data Successfull!")
                    {
                        resetModalImport();
                        var alert = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        $('.alertSuccess').html(output.success)
                        alert.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                        main();
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
        $('#statusCandidate').on('submit', function(event){
            $('.modalStatusCandidate').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('recruitment.statusCandidate') }}",
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
                        resetModalStatusCandidate();
                        $("#tableRecruitment").html(output.tableImport);
                        var allert_success = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        $('.alertSuccess').html(output.success)
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                    }
                }
            });
        });
        $('#deleteCandidate').on('submit', function(event){
            $('.modalDeleteCandidate').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('recruitment.deleteCandidate') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.alert=="Delete Data Successfull!")
                    {
                        $("#tableRecruitment").html(output.tableImport);
                        var allert_success = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        $('.alertSuccess').html(output.alert)
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                    }else{
                        $("#tableRecruitment").html(output.tableImport);
                        var allert_error = document.getElementById("alert_error");
                        $('#alert_error').css({'opacity' : '' });
                        $('.alertError').html(output.alert);
                        allert_error.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                    }
                }
            });
        });
        $('#sendEmail').on('submit', function(event){
            $('.modalEmail').modal('toggle');
            event.preventDefault();
            $.ajax({
                url:"{{ route('recruitment.sendEmail') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.alert=="Email Data Success!")
                    {
                        // $("#tableRecruitment").html(output.tableImport);
                        var allert_success = document.getElementById("alert_success");
                        $('#alert_success').css({'opacity' : '' });
                        $('.alertSuccess').html(output.alert);
                        allert_success.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_success").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                        main();
                    }
                    else{
                        $("#tableRecruitment").html(output.tableImport);
                        var allert_error = document.getElementById("alert_error");
                        $('#alert_error').css({'opacity' : '' });
                        $('.alertError').html(output.alert);
                        allert_error.style.display="block";
                        window.setTimeout(function() {
                            $("#alert_error").fadeTo(1000, 0).slideUp(1000, function(){
                            });
                        }, 2000);
                    }
                }
            });
        });
        $('input:radio[name=toNameInformation]').change(function() {
            if (this.value == 'Select') {
                $('#valueTo').val("");
                $('#selectCandidateInformation').show();
                $.ajax({
                url:"{{ route('recruitment.showSelectCandidate') }}",
                method:"GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.option)
                    {
                        $("#selectCandidateID").html(output.option);
                    }
                }
            });
            }else if(this.value == 'All'){
                $('#selectCandidateInformation').hide();
                $("#selectCandidateID").html("");
                $('#valueTo').val("All");
            }else{
                $('#selectCandidateInformation').hide();
                $("#selectCandidateID").html("");
                $('#valueTo').val("Candidate has accepted");
            }
        });
    });
    function main(){
        $.ajax({
                url:"{{ route('recruitment.show') }}",
                method:"GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(output)
                {
                    if(output.success)
                    {
                        $("#tableRecruitment").html(output.tableImport);
                        $("#id_ts").html(output.tanggal);
                        $("#id_name").html(output.name);
                        $("#id_age").html(output.age);
                        $("#id_bd").html(output.b_d);
                        $("#id_email").html(output.email);
                        $("#id_phone").html(output.p_n);
                        $("#id_cn").html(output.n_k);
                        $("#id_ps").html(output.p_p);
                        $("#id_address").html(output.alamat);
                        $("#id_experience").html(output.p_k);
                        $("#id_loe").html(output.l_b);
                        $("#id_reference").html(output.referensi);
                        $("#id_status").html(output.arr_checklist_status);
                        $("#id_se").html(output.arr_checklist_status_email);
                    }
                }
            });
    }
    function openMenu()
    {
        $('.modalOpenMenu').modal('toggle');
    }
    function modalOpenImport()
    {
        $('.modalOpenMenu').modal('toggle');
        $('.modalOpenImport').modal('toggle');
    }
    function showMenuName(id,name,id_test)
    {
        $("#btnStatusCandidate").attr("onclick","showName('"+id+"','"+name+"')");
        $("#btnDeleteCandidate").attr("onclick","modalDelete('"+id+"','"+name+"','"+id_test+"')");
        $('.shoMenuName').modal('toggle');
        $('#transfer_nama_candidate').html(name);
    }
    function showName(id,name)
    {
        $('.shoMenuName').modal('toggle');
        $('.modalStatusCandidate').modal('toggle');
        $('#transfer_nama_candidate').html(name);
        $("#candidateID").val(id);
    }
    function modalDelete(id,name,id_test)
    {
        $('.shoMenuName').modal('toggle');
        $('.modalDeleteCandidate').modal('toggle');
        $('#delete_name_candidate').html(name);
        $('#id_test').val(id_test);
        $("#deleteID").val(id);
    }
    function resetModalStatusCandidate()
    {
        $('#selectStatusCandidate').prop('selectedIndex',0);
        $('#candidateID').val("");
        $('#candidateDateAccept').val("");
    }
    function resetModalImport()
    {
        $('#importFile').val("");
    }
    function modalEmail()
    {
        $('.modalOpenMenu').modal('toggle');
        $('.modalEmail').modal('toggle');
    }
    function emailInvitation()
    {
        if($('#formEmailInvitation').css('display') == 'none')
        {
            $('#formEmailInvitation').show();
        }else{
            $('#formEmailInvitation').hide();
        }
        $('#formEmailInformation').hide();
        $('#emailOnlineTest').hide();
        $('#valueTo').val("");
        $('#valueEmail').val("");
        $('#letterNumberEmail').val('');
        $('#perihalEmail').val('');
        $('#dateEmail').val('');
        $('#timeEmail').val('');
        $('#keperluanEmail').val('');
        $('input[name="toName"]').prop('checked', false);
        resetformSendEmail();
    }
    function emailOnlineTest() {
        if($('#emailOnlineTest').css('display') == 'none')
        {
            $('#emailOnlineTest').show();
        }else{
            $('#emailOnlineTest').hide();
        }
        $('#formEmailInvitation').hide();
        $('#formEmailInformation').hide();
        $('#valueTo').val("");
        $('#valueEmail').val("");
        $('#letterNumberEmail').val('');
        $('#perihalEmail').val('');
        $('#dateEmail').val('');
        $('#timeEmail').val('');
        $('#keperluanEmail').val('');
        $('input[name="toName"]').prop('checked', false);
        resetformSendEmail();
    }
    function emailInformation()
    {
        if($('#formEmailInformation').css('display') == 'none')
        {
            $('#formEmailInformation').show();
        }else{
            $('#formEmailInformation').hide();
        }
        $('#formEmailInvitation').hide();
        $('#emailOnlineTest').hide();
        $('input[name="toNameInformation"]').prop('checked', false);
        $('#selectCandidateInformation').hide();
        $('#selectCandidateID').prop('selectedIndex',0);
        $('#textEmailID').val("");
        resetformSendEmail();
    }
    function generateEmail()
    {
        var toEmail = $('input[name=toName]:checked').val();
        var tanggal = $('#dateEmail').val();
        var time = $('#timeEmail').val();
        var letterNo = $('#letterNumberEmail').val();
        var perihal = $('#perihalEmail').val();
        var keperluan = $('#keperluanEmail').val();
        var roomEmail = $('#roomEmail').val();
        var conv = new Date(tanggal).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'});
        $('#menuID').val("1");
        $("#valueTo").val(toEmail);
        $('#timeSend').val(time);
        $('#tanggalSend').val(tanggal);
        $('#letterNoSend').val(letterNo);
        $('#perihalSend').val(perihal);
        $('#keperluanSend').val(keperluan);
        $('#roomEmailSend').val(roomEmail);
        $('#valueEmail').val(
                "No : "+letterNo+"\n"+
                "Perihal : "+perihal+"\n"+
                "\n"+
                "Yth. == NAME EMPLOYES ==\n"+
                "\n"+
                "Menanggapi surat lamaran kerja yang dikirimkan, maka dengan ini kami mengundang Saudara pada : \n"+
                "  Hari, Tanggal  : "+conv+"\n"+
                "  Waktu               : Pukul "+time+" s/d selesai\n"+
                "  Keperluan       : "+keperluan+"\n"+
                "  Tempat            : "+roomEmail+"\n"+
                "\n"+
                "==IMAGE==\n"+
                "\n"+
                "\n"+
                "Saudara wajib membawa dan melengkapi hal-hal berikut:\n"+
                "1. Salinan ijazah dan dokumen penunjang lainnya\n"+
                "2. Alat tulis\n"+
                "3. Berpakaian rapi dan formal\n"+
                "4. Mematuhi protokol Covid-19\n"+
                "5. Membawa sertifikat vaksin\n"+
                "\n"+
                "Demikian surat pemanggilan ini dibuat. Harap konfirmasi kehadiran. Atas perhatian Saudara, saya ucapkan terima kasih.\n"+
                "\n"+
                "\n"+
                "--\n"+
                "Regards.\n"+
                "Team Recruitment");
    }
    function generateEmail2(){
        var valueEmail = $('#textEmailID').val();
        $('#menuID').val("2");
        $('#valueEmail').val(valueEmail);
    }
    function generateEmail3() {
        var toEmail = $('input[name=toName]:checked').val();
        var tanggal = $('#dateEmailOnline').val();
        var time = $('#timeEmailOnline').val();
        var link = $('#linkOnline').val();
        var conv = new Date(tanggal).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'});
        console.log(tanggal);
        $('#menuID').val("3");
        $("#valueTo").val(toEmail);
        $('#timeSend').val(time);
        $('#tanggalSend').val(tanggal);
        $('#linkSend').val(link);
        $('#valueEmail').val(
                "Good Evening "+toEmail+"\n"+
                "\n"+
                "You're invited to join a Microsoft Teams meeting\n"+
                "\n"+
                "Title: Test Online - Recruitment PT. Parkland World Indonesia 2 \n"+
                "\n"+
                "Time: "+conv+" "+time+"\n"+
                "\n"+
                "Join Microsoft Teams Meeting,\n"+
                "\n"+
                "Link URL : Click here to join the meeting\n"+
                "\n"+
                "\n"+
                "--\n"+
                "Regards.\n"+
                "Team Recruitment");
    }
    function resetformSendEmail()
    {
        $('#valueTo').val('');
        $('#tanggalSend').val('');
        $('#timeSend').val('');
        $('#letterNoSend').val('');
        $('#perihalSend').val('');
        $('#keperluanSend').val('');
        $('#roomEmailSend').val('');
    }
    function resetAll()
    {
        emailInvitation();
    }
    function addEmailCandidate()
    {
        var value = $('#valueTo').val();
        var valRadio = $('#selectCandidateID').val();
        if (valRadio != "Select Candidate") {
            if(value=="")
            {
                $('#valueTo').val(valRadio);
                $("#selectCandidateID option[value='"+valRadio+"']").each(function() {
                    $(this).remove();
                });
            }else{
                $('#valueTo').val(value+', '+valRadio);
                $("#selectCandidateID option[value='"+valRadio+"']").each(function() {
                    $(this).remove();
                });
            }
        }
    }
    function deleteTo()
    {
        var value = $("#valueTo").val();
        var arrayValue = value.split(", ");
        // indexs
            var count = arrayValue.length;
            console.log(count);
            if(count == 1)
            {
                $('#valueTo').val("");
                $('#selectCandidateID').append('<option value="'+arrayValue[0]+'" selected="selected">'+arrayValue[0]+'</option>');
                $('#selectCandidateID').prop('selectedIndex',0);
            }else{
                var indexs= count-(count-1);
                //tambah option ke select sebelum hapus
                    $('#selectCandidateID').append('<option value="'+arrayValue[indexs]+'" selected="selected">'+arrayValue[indexs]+'</option>');
                    $('#selectCandidateID').prop('selectedIndex',0);
                arrayValue.splice(indexs, 1);
                var backToString = arrayValue.toString();
                $('#valueTo').val(backToString);
            }
    }
    function deleteAllTo()
    {
        $('#valueTo').val("");
    }
</script>