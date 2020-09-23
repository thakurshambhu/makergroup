@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<div class="content">
   <div id="messages">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="stepContainer">
               <div class="stepHeader">
                  <h3>time</h3>
               </div>
               <div class="stepTable">
                  <div class="dateSelect d-flex justify-content-between align-items-center my-2">
                     <div id="start_end_date" class=" d-flex">
                        <div class="form-group mr-2">
                           <label for="">Start Date</label>
                           <input type="date" class="form-control"  value="@if(!empty($both_time)){{$both_time[0]['start_date']}}@endif" name="" id="start_date">
                        </div>
                        <div class="form-group ">
                           <label for="">End Date</label>
                           <input type="date" class="form-control" name="" value="@if(!empty($both_time)){{$both_time[0]['end_date']}}@endif" id="end_date">
                        </div>
                     </div>
                     <a href="#" class="btn btn-link showGraph" data-toggle="modal" data-target="#timeGraph">View Graph</a>
                  </div>
                  <table class="table table-bordered table-time table-responsive-sm" id="tb">
                     <thead class="thead-light">
                        <tr>
                           <th scope="col" colspan="2">key event</th>
                           <th scope="col">date </th>
                           <th scope="col">who </th>
                           <th scope="col" colspan="2">what</th>
                        </tr>
                     </thead>
                     <tbody id="myTable">
                        @if($timeevent_data->isEmpty())
                        <tr class="row1" id="1">
                           <td><a href="javascript:void(0);" style="font-size:18px;" class="addButton" title="Add More Event"><span class="fas fa-plus-circle"></span></a></td>



                           <td class="f2f" id="select_event1">
                              <div class="select">
                                 <span class="select_icon"><img src="{{ asset('paper') }}/img/dropdownicon.svg" alt=""></span>
                                 <select name="" id="1"  class="form-control">
                                  <option disabled selected value>Select Event</option>
                                    <option value="face_to_face">Face to Face</option>
                                    <option value="email">Email</option>
                                    <option value="phone_call">Phone Call</option>
                                    <option value="others">Other</option>
                                 </select>
                              </div>
                           </td>
                           <td><input type="date" class="form-control" name="" id="date1"></td>
                           <td><input type="text" class="form-control" name="" id="who1"></td>
                           <td><input type="text" class="form-control" name="" id="what1"></td>
                           <td><a href='javascript:void(0);' title="Remove Event"  id='removeButton'><span class="fas fa-times-circle"></span></a></td>
                        </tr>
                        @else
                        @foreach($timeevent_data as $data)
                        <tr id="{{$data->id}}" class="row{{$data->id}}">
                           <td><a href="javascript:void(0);" style="font-size:18px;" class="addButton" title="Add More Event"><span class="fas fa-plus-circle"></span></a></td>

                           @if($data->event_type == 'face_to_face')
                           <td class="f2f" id="select_event{{$data->id}}">
                           @elseif($data->event_type == 'email')
                           <td class="email-td" id="select_event{{$data->id}}">
                           @elseif($data->event_type == 'phone_call')
                           <td class="phone-call" id="select_event{{$data->id}}">
                           @else
                           <td class="others-event" id="select_event{{$data->id}}">
                           @endif

                           
                              <div class="select">
                                 <span class="select_icon"><img src="{{ asset('paper') }}/img/dropdownicon.svg" alt=""></span>
                                 <select name="" id="{{$data->id}}"  class="form-control">
                                  <option disabled selected value>Select Event</option>
                                    <option value="face_to_face" @if($data->event_type=='face_to_face') selected='selected' @endif>Face to Face</option>
                                    <option value="email" @if($data->event_type=='email') selected='selected' @endif>Email</option>
                                    <option value="phone_call" @if($data->event_type=='phone_call') selected='selected' @endif>Phone Call</option>
                                    <option value="others" @if($data->event_type=='others') selected='selected' @endif>Other</option>
                                 </select>
                              </div>
                           </td>
                           <td><input type="date" value="{{$data->date}}" class="form-control" name="" id="date{{$data->id}}"></td>
                           <td><input type="text" value="{{$data->who}}" class="form-control" name="" id="who{{$data->id}}"></td>
                           <td><input type="text" value="{{$data->what}}" class="form-control" name="" id="what{{$data->id}}"></td>
                           <td><a href='javascript:void(0);' title="Remove Event"  id='removeButton'><span class="fas fa-times-circle"></span></a></td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
               <!-- The Modal -->
            </div>
            <div class="col-md-12 actionButtons">
               <div class="divider"></div>
               <a href="#" id="addEvent" class="btn btn-default btn-md btn-block-sm">Next</a>
               <a href="#" class="btn btn-border btn-md">skip</a>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="timeGraph">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Time Graph</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <section>
               <div class="timeline">
                  
               </div>
            </section>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>


<script type="text/javascript">
function convert(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [date.getFullYear(), mnth, day].join("-");
}


$(".showGraph").click(function(){
  var input_validate = true;
  var select_validate = true;

   $('#myTable').find('tr input').each(function(){
    if($(this).val() == ""){
        input_validate = false; 
    }
  });

   $('#start_end_date').find('input').each(function(){
    if($(this).val() == ""){
        input_validate = false; 
    }
  });

   $('#myTable').find('tr select').each(function(){
    if($(this).val() == null){
        select_validate = false; 
    }
  });
    if (input_validate && select_validate) {
      var start_date = $("#start_date").val();
  var end_date = $("#end_date").val();

  var event_date = new Array() ;
  event_date.push(start_date);
  event_date.push(end_date);

  $("#myTable tr").each(function(index, tr){
    data = {};
    var count = this.id;
    if (count) {
      data['date'] = $(this).find("#date"+count).val();
    } else {
      data['date'] = $(this).find("#date1").val();
    }
    event_date.push(data);
    });

    $.ajax({
              type: "POST",
              url: "{{url('/')}}"+"/"+"create-graph",
              dataType: "json",
              data: {
                "_token": "{{ csrf_token() }}",
                 "data" : event_date,
              },
              success: function(data) {

                var all_date = data[0];
                var match_date = data[1];
                $(".timeline").empty();
                var html_data = '<ul style="margin:auto;">';
                var num = 0;
                var formula = (100/all_date.length).toFixed(2);
                let upper_date;
                let lower_date;
                let set_margin;
                var store_margin = [];
                var sum = 0;
                var fix_sub;
                var fix_add;
                for (var temp=0;temp<match_date.length;temp++) {
                  var each_margin = {};
                    if (temp == 0) {
                        upper_date = new Date(match_date[temp]); 
                        lower_date = new Date(all_date[0]);
                        each_margin = Math.abs(upper_date - lower_date);
                        diffDays = Math.ceil(each_margin / (1000 * 60 * 60 * 24)); 
                    } 
                    else if (temp == match_date.length) {
                        upper_date = new Date(all_date[all_date.length-1]); 
                        lower_date = new Date(match_date[match_date.length-1]);
                        each_margin = Math.abs(upper_date - lower_date);
                        diffDays = Math.ceil(each_margin / (1000 * 60 * 60 * 24)); 
                    } else {
                      upper_date = new Date(match_date[temp]); 
                      lower_date = new Date(match_date[temp-1]); 
                      each_margin = Math.abs(upper_date - lower_date);
                      diffDays = Math.ceil(each_margin / (1000 * 60 * 60 * 24)); 
                    }
                    sum+=diffDays;
                    store_margin.push(diffDays);
                }
                var total_lenth_of_li = store_margin.length;
                if (sum > 100) {
                  sub_margin = sum-100;
                  fix_sub = Math.round(sub_margin/total_lenth_of_li);
                } else if (sum < 100) {
                  sub_margin = 100-sum;
                  fix_add = Math.round(sub_margin/total_lenth_of_li);
                }
                
                for (var j = 0 ; j < Object.keys(match_date).length ; j++ ) {
                    for (var i = 0 ; i < Object.keys(all_date).length ; i++ ) {
                         if (match_date[j] == all_date[i]) {

                  var row_no = $('#myTable tr').length;
                  $("#myTable tr").each(function(index, tr){
                    content = {};
                    index = this.id;
                    if (index) {
                      var new_date = $(this).find("#date"+index).val();
                    } else {
                      var new_date = $(this).find("#date1").val();
                    }
                    if (new_date == match_date[j]) {
                      if (index) {
                        var event_type = $(this).find("#select_event"+index+" select").val();
                      } else {
                        var event_type = $(this).find("#select_event1 select").val();
                      }
                          switch(event_type){
                              case 'email':
                               event = "Email";
                               event_class = "email";
                              break;

                              case 'phone_call':
                              event = "Phone Call";
                              event_class = "phonecall";
                              break;

                              case 'face_to_face':
                              event = "F2F";
                              event_class = "f2f";
                              break;

                              case 'others':
                              event = "Others";
                              event_class = " ";
                              break;
                          }
                      }
                  });
                 
                            var date = new Date(match_date[j]);
                            var monthNames = [
                              "Jan", "Feb", "Mar",
                              "Apr", "May", "Jun", "Jul",
                              "Aug", "Sep", "Oct",
                              "Nov", "Dec"
                            ];
                          var day = date.getDate();
                          var monthIndex = date.getMonth();
                          var show_date = day + ' ' + monthNames[monthIndex];
                          if (fix_sub) {
                            html_data += '<li style="margin-left:'+parseInt(store_margin[j]-fix_sub)+'%;">';
                          } else if (fix_add) {
                            html_data += '<li style="margin-left:'+parseInt(store_margin[j]+fix_add)+'%;">';
                          }
                          html_data += '<span class="date">'+show_date+'</span>';
                          html_data += '<div class="dot"></div>';
                          html_data += '<span class="vr-type '+event_class+'">'+event+'</span></li>';
                          break;
                         } else {
                          //write code here when date doesn't match.
                        }  
                    }
                }
                html_data += '</ul>';
                $(".timeline").append(html_data);
                  }
              });
    } else {
          $('html, body').animate({ scrollTop: 0 }, 0);
          $("#messages").addClass("alert alert-info")
          $('#messages').html('Complete Key Events to view graph').fadeIn('slow');
          $("#messages").fadeOut(5000)
          return false;
    }
});

$(function(){
    $('.addButton').on('click', function() {
              var data = $("#myTable tr:eq(0)").clone(true).appendTo("#myTable");
              data.attr('id','');
              data.attr('class','');
              data.find("input").val('');

              data.find('option:eq(0)').prop('selected', true);
              data.find('#select_event1').removeClass().addClass('f2f');
     });
    $(document).on('click', '#removeButton', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>=1) {
             $(this).closest("tr").remove();
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $("#messages").addClass("alert alert-danger")
             $('#messages').html('First row cannot be deleted. Timeline must have at least 1 key event.').fadeIn('slow');
             $("#messages").fadeOut(5000)
           }
      });

    $("select").on('change', function(){
    var index = this.id;
    var type = $(this).val();
    switch(type) {
      case 'face_to_face':
        $(this).closest('tr').find("#select_event"+index).attr('class','f2f');
      break;
     
      case 'email':
        $(this).closest('tr').find("#select_event"+index).attr('class','email-td');
      break;
      
      case 'phone_call':
        $(this).closest('tr').find("#select_event"+index).attr('class','phone-call');
      break;

      case 'others':
        $(this).closest('tr').find("#select_event"+index).attr('class','others-event');
      break;
    }
  }); 
});

 $('#addEvent').click(function(){
  var input_validate = true;
  var select_validate = true;

   $('#myTable').find('tr input').each(function(){
    if($(this).val() == ""){
        input_validate = false; 
    }
  });

   $('#start_end_date').find('input').each(function(){
    if($(this).val() == ""){
        input_validate = false; 
    }
  });


   $('#myTable').find('tr select').each(function(){
    if($(this).val() == null){
        select_validate = false; 
    }
  });
    if (input_validate && select_validate) {
      store_event = [];
      var row_no = $('#myTable tr').length;

      $("#myTable tr").each(function(index, tr){
        content = {};
        if (this.id) {
            no = this.id;
            content['id'] = this.id;
            content['event_type'] = $(this).find("#select_event"+no+" select").val();
            content['date'] = $(this).find("#date"+no).val();
            content['who'] = $(this).find("#who"+no).val();
            content['what'] = $(this).find("#what"+no).val();
            content['start_date'] = $('#start_end_date').find("#start_date").val();
            content['end_date'] = $('#start_end_date').find("#end_date").val();
            store_event.push(content);
        } else {
          
            content['id'] = this.id;
            content['event_type'] = $(this).find("#select_event1 select").val();
            content['date'] = $(this).find("#date1").val();
            content['who'] = $(this).find("#who1").val();
            content['what'] = $(this).find("#what1").val();
            content['start_date'] = $('#start_end_date').find("#start_date").val();
            content['end_date'] = $('#start_end_date').find("#end_date").val();
            store_event.push(content);
        }
          });
     
      $.ajax({
              type: "POST",
              url: "{{url('/')}}"+"/"+"store-event",
              dataType: "json",
              data: {
                "_token": "{{ csrf_token() }}",
                 "data" : store_event,
              },
              success: function(data) {
                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
                          $("#messages").addClass("alert alert-success")
                          $('#messages').html(data.message).fadeIn('slow');
                          $("#messages").fadeOut(5000)
                      } else {
                          $("#messages").addClass("alert alert-danger")
                          $('#messages').html(data.message).fadeIn('slow');
                          $("#messages").fadeOut(5000)
                      }
                      setInterval(function() {
                      window.location.reload()
                      }, 3000);
                  }
              });
    
         } else {
          $('html, body').animate({ scrollTop: 0 }, 0);
          $("#messages").addClass("alert alert-info")
          $('#messages').html('Please complete all fields before continuing').fadeIn('slow');
          $("#messages").fadeOut(5000)
          return false;
         }
    });
</script>

@endsection