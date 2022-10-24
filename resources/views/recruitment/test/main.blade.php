<!doctype html>
<html lang="en">
  <head>
    @include('partial.head')
    <style>
      .reload{
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <section class="content">
      <div class="container-fluid">
        <nav class="navbar bg-light">
          <div class="container-fluid">
            <a class="navbar-brand reload" href="#">
              <img src="{{ asset('dist/img/Logo PWI.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
              {{ $user }}
              <input type="hidden" id="id_mt" value="{{ $id_mt }}">
              <h4 id="timer"></h4>
            </a>

          </div>
        </nav> 
        <div id="main" class="row m-4">

          <div class="card col-6">
            <div class="card-header bg-secondary" id="Card_1">
              <h2>Quick Count</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">Quick Count Test 5 Minutes After Start</h5>
              <p class="card-text">make sure the connection is good</p>
              <p class="card-text text-danger fw-bolder">You can't repeat the test when you started it</p>
              <button class="btn btn-primary" id="btnTest_1" onclick="ConfirmTest('Quick Count')">Start</button>
            </div>
          </div>

          <div class="card col-6">
            <div class="card-header bg-secondary" id="Card_2">
              <h2>English Test</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">English Test 10 Minutes After Start</h5>
              <p class="card-text">make sure the connection is good</p>
              <p class="card-text text-danger fw-bolder">You can't repeat the test when you started it</p>
              <button class="btn btn-primary" id="btnTest_2" onclick="ConfirmTest('English Test')">Start</button>
            </div>
          </div>
          
          <div class="card col-6">
            <div class="card-header bg-secondary" id="Card_3">
              <h2>Aritmatika Test</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">Aritmatika Test 10 Minutes After Start</h5>
              <p class="card-text">make sure the connection is good</p>
              <p class="card-text text-danger fw-bolder">You can't repeat the test when you started it</p>
              <button class="btn btn-primary" id="btnTest_3" onclick="ConfirmTest('Aritmatika Dasar')">Start</button>
            </div>
          </div>

          <div class="card col-6">
            <div class="card-header bg-secondary" id="Card_4">
              <h2>Psychology Test</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">Psikotest 10 Minutes After Start</h5>
              <p class="card-text">make sure the connection is good</p>
              <p class="card-text text-danger fw-bolder">You can't repeat the test when you started it</p>
              <button class="btn btn-primary" id="btnTest_4" onclick="ConfirmTest('Psikotest')">Start</button>
            </div>
          </div>
          
        </div>
        <div class="mt-4" id="soalCard" style="display: none">
            <div class="text-center">
              <h2 id="titleSoal"></h2>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                  </li>
                    <ul class="pagination justify-content-center" id="noSoal">
                    </ul>
                  <li class="page-item">
                  </li>
                </ul>
              </nav>
              <div class="d-flex justify-content-center">
                <div id="toggle-example" class="card collapse" style="width: 30%;">
                  <div class="alert alert-success" id="alertSave" role="alert" style="display: none">
                  </div>
                    <div class="card-header">
                        No <a id="testsoal"></a>
                    </div>
                    <div class="card-body">
                      <div style="width:">
                      </div>
                      <div id="soal"></div>
                      <div id="pilihan" class="text-left"></div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" id="saveJawaban">Save</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div id="invitationCard" style="display: none">
          <div class="mt-4 d-flex justify-content-center">
            <div class="text-center card p-4">
                <h1 class="font-weight-bold text-primary">Congratulation</h1>
                <h3 class="fst-italic">You have completed all the tests</h3>
                <div class="text-left">
                    <strong>Next Test</strong>
                    <ul>
                      <li>Online Interview - Recruitment PT. Parkland World Indonesia 2</li>
                      <li class="text-danger font-weight-bold" id="timeOnlineInterview"></li>
                    </ul>
                </div>
                <h4 class="font-weight-bold">Join Microsoft Teams Meeting, </h4>
                <p>Link URL : <a class="card-link" href="#" id="link_ms_teams" target="_blank" data-saferedirecturl=''><u>Click here to join the meeting</u></a></p>
                <br><br>
                <div class="text-left mt-4">
                    <h5>Best Regards,</h5>
                    <h5>Recruitment Teams,</h5>
                      <h5 class="font-weight-bold">PT. Parkland World Indonesia 2.</h5>
                </div>
            </div>
          </div>
        </div>
        <div id="expiredCard" style="display: none">
          <div class="mt-4 d-flex justify-content-center">
            <div class="text-center card p-4">
                <h1 class="font-weight-bold text-danger">Your Account Expired</h1>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body about text-justify">
            <strong style="color: red">Important, before starting the test are required to read the following rules!</strong>
            <ul class="mt-2 mb-2">
              <li>TEST TIME FOR <a id="timeTest"></a> MINUTES</li>
              <li>TIME WILL CONTINUE TO WALK EVEN WEB PAGE IS RESTART</li>
              <li>ANSWERS CAN BE UPDATED BY RE-SAVE WITH NEW ANSWERS</li>
              <li>Each number that has been answered will be marked in blue on the number tab</li>
              <li>EVERY NUMBER THAT HAS BEEN ANSWERED WILL BE A BLUE MARK ON THE NUMBER TAB</li>
              <li>IF THE START BUTTON IS PRESSED, IT MEANS YOU ARE READY TO DO THE TEST</li>
              <li>YOU CAN ONLY DO ONE TEST IN ONE TIME</li>
              <li>MAKE SURE YOU USE THE BEST CONNECTION</li>
              <li style="font-size: 110%"><a style="color: red">TEST CANNOT BE REPEAT!</a></li>
            <ul>
          </div>
          <div class="modal-footer">
            <div class="form-check">
              <input class="form-check-input checkbox_check" type="checkbox" value="done" id="checkboxConfirm">
              <label class="form-check-label" for="flexCheckDefault">
                I've read all the rules above
              </label>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="startTest" class="btn btn-primary">START</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
  <script>
    var id_mt = $('#id_mt').val();
    $(document).ready(function(){
      main();
      $('.reload').on('click',function(){
          location.reload();
      });
      $('#saveJawaban').on('click',function(){
        const val = $('input[name=jawaban]:checked').val();
        var no = $('#testsoal').text();
        $.ajax({
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          url:"{{ route('recruitment.test.save') }}",
          method:"POST",
          data:{no:no,val:val,id_mt:id_mt},
          dataType:'JSON',
          success:function(output)
          {
              if(output.alert=='Failed')
              {
                $('#alertSave').text(output.alert);
                $('#alertSave').addClass('alert-danger');
                $("#alertSave").fadeTo(2000, 500).slideUp(500, function() {
                  $("#alertSave").slideUp(500);
                });
              }else{
                $('#alertSave').text(output.alert);
                $('#alertSave').addClass('alert-success');
                main();
                $("#alertSave").fadeTo(2000, 500).slideUp(500, function() {
                  $("#alertSave").slideUp(500);
                });
              }
          }
        });
      });
      $('#noSoal').on('click','.collapsePage',function(event){
        event.preventDefault();
        var no = $(this).text();
        var test = $('#titleSoal').text();
        $('#testsoal').html(no);
        $('#toggle-example').collapse('show');
        $.ajax({
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          url:"{{ route('recruitment.show.soal_jawaban') }}",
          method:"POST",
          data:{no:no,test:test,id_mt:id_mt},
          dataType:'JSON',
          success:function(output)
          {
              if(output.soal)
              {
                  $('#soal').html(output.soal)
                  $('#pilihan').html(output.pilihan)
                  var radio = $('input:radio[name=jawaban]');
                  radio.filter('[value='+output.jawaban+']').prop('checked', true);
              }
          }
        });
      })
      $('#startTest').on('click',function(event){
        var test = $('#modalTitle').text();
        var timeTest = $('#timeTest').text();
        if ($('input.checkbox_check').is(':checked')) {
          $.ajax({
            headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
            url:"{{ route('recruitment.show.quis') }}",
            method:"POST",
            data:{test:test,id_mt:id_mt},
            dataType:'JSON',
            success:function(output)
            {
                if (output.alert=='no') {
                  alert('You must finish 1 test on 1 time');
                }
                $('#modalConfirm').modal('toggle');
                $("#noSoal").html(output.noSoal);
                $('#soalCard').show(); 
                $('#main').hide(); 
                coutdown(test,timeTest);
                $('#titleSoal').html(test);
                main();
            }
          });
        }else{
          alert("You haven't checked");
        } 
      });
    });
    function coutdown(test,timeTest)
    {
      $.ajax({
        url:"{{ route('recruitment.check.time') }}",
        method:"get",
        data:{id_mt:id_mt,test:test},
        dataType:'JSON',
        success:function(output)
        {
          var dateFinish = moment(new Date(output.timeTest).getTime()).add(timeTest, 'm').toDate();
          var x = setInterval(function() {
            var dateStart = new Date().getTime();
            var distance = dateFinish - dateStart;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $('#timer').text(minutes + "m " + seconds + "s ");
            if (distance < 0) {
              $('#timer').text("Done");
              clearInterval(x);
              removeTestTime();
            }
          }, 1000);
        }
      });
    }
    function main() {
      //check sedang menjalani test atau belum
      $.ajax({
        url:"{{ route('recruitment.check.done') }}",
        method:"get",
        data:{id_mt:id_mt},
        dataType:'JSON',
        success:function(output)
        {
          if (output.alert) {
            $('#expiredCard').show();
            $('#invitationCard').remove();
            $('#main').remove(); 
            $('#soalCard').remove(); 
            return;
          }
          if (output.bagian!='') {
            $("#noSoal").html(output.noSoal);
            $('#soalCard').show(); 
            $('#main').hide();
            $('#titleSoal').html(output.bagian);
            if (output.bagian==='Quick Count') {
              var time = 5;
            }else{
              var time = 10;
            }
            coutdown(output.bagian,time);
          }
          for (let i = 0; i < output.done.length; i++) {
            $('#page-no-'+output.done[i]).addClass('bg-success');
          }
          if (output.doneBagian.length==4) {
            $('#invitationCard').show();
            $('#main').remove(); 
            $('#soalCard').remove(); 
            $('#expiredCard').remove();
            showDataTestOnline();
          }
          for (let i = 0; i < output.doneBagian.length; i++) {
            if (output.doneBagian[i]=='Quick Count') {
              var ke = 1;
            }else if(output.doneBagian[i]=='English Test'){
              var ke = 2;
            }else if(output.doneBagian[i]=='Aritmatika Dasar'){
              var ke = 3;
            }else{
              var ke = 4;
            }
            $('#Card_'+ke).addClass('bg-success');
            $('#btnTest_'+ke).prop('disabled',true);
          }
        }
      });
    }
    function ConfirmTest(test) {
        $('#modalConfirm').modal('toggle');
        $('#modalTitle').text(test);
        if (test==='Quick Count') {
          var time = 5;
        }else{
          var time = 10;
        }
        $('#timeTest').text(time);
    }
    function removeTestTime() {  
      $.ajax({
        url:"{{ route('recruitment.remove.time') }}",
        method:"get",
        data:{id_mt:id_mt},
        dataType:'JSON',
      });
      location.reload();
    }
    function showDataTestOnline() {  
      $.ajax({
        url:"{{ route('recruitment.show.testOnline') }}",
        method:"get",
        data:{id_mt:id_mt},
        dataType:'JSON',
        success:function(output)
        {
          $('#timeOnlineInterview').html(output.time);
          $("#link_ms_teams").attr("href",output.link);
        }
      });
    }
</script>
</html>