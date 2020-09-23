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
            <h3>variables</h3>
         </div>
    <div class="stepTable">
    <table class="table table-bordered table-variables table-responsive-sm" id="tb">
    <thead class="thead-orange">    
    <tr>
      <th scope="col" colspan="3"></th>
      <th scope="col" colspan="2" class="text-center">take</th>
      <th scope="col" colspan="2" class="text-center">give</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <thead class="thead-light">
    <tr>
      <th scope="col"><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Variable"><span class="fas fa-plus-circle"></span></a></th>
      <th scope="col">variables </th>
      <th scope="col">Take/Give </th>
      <th scope="col">value<span class="subText">your</span></th>
      <th scope="col">cost<span class="subText">their</span></th>
      <th scope="col">cost<span class="subText">your</span></th>
      <th scope="col">value<span class="subText">their</span></th>
      <th scope="col">your breakpoint</th>
      <th scope="col">their breakpoint</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="myTable">
    @if ($variable_data->isEmpty()) 
      <tr class="row1" id="1">
        <td>1</td>
        <td><input type="text" id="variable1" class="form-control"> </td>
        <td id="select1"><div class="select givesucess"><span class="select_icon"><img src="{{ asset('uploads/images/detail_page_icons')}}/dropdownicon.svg" alt=""></span><select name="" id class="form-control"><option disabled selected value>Select Option</option><option value="give">Give</option><option value="take">Take</option><option value="take-give">Take/Give</option> </select></div></td>
        <td id="take-value1" class="givedefault"><input type="text" disabled class="form-control"> </td>
        <td id="take-cost1" class="givedefault"><input type="text" disabled class="form-control"> </td>
        <td id="give-cost1" class="givedefault"><input type="text" disabled class="form-control"> </td>
        <td id="give-value1" class="givedefault"><input type="text" disabled class="form-control"> </td>
        <td ><input type="text" id="your-breakpoint1" class="form-control"> </td>
        <td ><input type="text" id="their-breakpoint1" class="form-control"> </td>
        <td><a href='javascript:void(0);' title="Remove Variable"  class='remove'><span class="fas fa-times-circle"></span></a></td>
      </tr>
    @else
      @foreach ($variable_data as $data)
        <tr class="row{{$data->id}}" id="{{$data->id}}">
        <td>{{$data->id}}</td>
        <td><input type="text" id="variable{{$data->id}}" value="{{$data->variables}}" class="form-control"> </td>
        <td id="select{{$data->id}}">
          @if($data->take_give_status == 'take') <div class="select takedanger"> 
          @elseif($data->take_give_status == 'give') <div class="select givesucess">
          @else <div class="select takegive"> @endif
            <span class="select_icon">
              <img src="{{ asset('uploads/images/detail_page_icons')}}/dropdownicon.svg" alt="">
            </span>
            <select name="" id class="form-control">
              <option disabled selected value>Select Option</option>
              <option value="give" @if($data->take_give_status=='give') selected='selected' @endif>Give</option>
              <option value="take" @if($data->take_give_status=='take') selected='selected' @endif>Take</option>
              <option value="take-give" @if($data->take_give_status=='take-give') selected='selected' @endif>Take/Give</option> 
            </select>
          </div>
        </td>
       
        @if(!empty($data->take_value) && empty(!$data->take_cost) && empty(!$data->give_cost) && empty(!$data->give_value))
        <td id="take-value{{$data->id}}" class="givedefault"><input type="text" value="{{$data->take_value}}"  class="form-control"> </td>
        <td id="take-cost{{$data->id}}" class="givedefault"><input type="text" value="{{$data->take_cost}}" class="form-control"> </td>
        <td id="give-cost{{$data->id}}" class="givedefault"><input type="text" value="{{$data->give_cost}}" class="form-control"> </td>
        <td id="give-value{{$data->id}}" class="givedefault"><input type="text" value="{{$data->give_value}}" class="form-control"> </td>

        @elseif(!empty($data->take_value) && !empty($data->take_cost))
         <td id="take-value{{$data->id}}" class="takedanger"><input type="text" value="{{$data->take_value}}" class="form-control"> </td>
        <td id="take-cost{{$data->id}}" class="takedanger"><input type="text" value="{{$data->take_cost}}" class="form-control"> </td> 
        <td id="give-value{{$data->id}}" class="givedefault"><input type="text" disabled  class="form-control"> </td>
        <td id="give-cost{{$data->id}}" class="givedefault"><input type="text" disabled class="form-control"> </td> 
     
        @elseif(!empty($data->give_cost) && empty(!$data->give_value))
        <td id="take-value{{$data->id}}" class="givedefault"><input type="text" disabled  class="form-control"> </td>
        <td id="take-cost{{$data->id}}" class="givedefault"><input type="text" disabled class="form-control"> </td> 
        <td id="give-cost{{$data->id}}" class="givesucess"><input type="text" value="{{$data->give_cost}}" class="form-control"> </td>
        <td id="give-value{{$data->id}}" class="givesucess"><input type="text" value="{{$data->give_value}}" class="form-control"> </td>
        @endif

        <td ><input type="text" id="your-breakpoint{{$data->id}}" value="{{$data->your_breakpoint}}"class="form-control"> </td>
        <td ><input type="text" id="their-breakpoint{{$data->id}}" value="{{$data->their_breakpoint}}" class="form-control"> </td>
        <td><a href='javascript:void(0);' title="Remove Variable"  class='remove'><span class="fas fa-times-circle"></span></a></td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
    </div>
      </div>
      <div class="col-md-12 actionButtons">
               <div class="divider"></div>
               <a href="#" id="addVariable" class="btn btn-default btn-md btn-block-sm">Next</a>
               <a href="#" class="btn btn-border btn-md">skip</a>
            </div>

                </div>
                </div>
                </div>
</div>
<script type="text/javascript">
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tbody tr:eq(0)").clone(true).appendTo("#tb tbody");
              var rowCount = $('#myTable tr').length;

              var max = 0;
              $('#myTable tr').each(function() {
                  max = Math.max(this.id, max);
              });

              data.find('td:first-child').html(parseInt(max)+1);
              data.attr('id','');
              data.attr('class','');
              data.find("input").val('');

              data.find('option:eq(0)').prop('selected', true);
              data.find('#select1 div').removeClass().addClass('select givesucess');
              data.find("#take-value1 input").prop('disabled', true);
              data.find("#take-cost1 input").prop('disabled', true);
              data.find("#give-value1 input").prop('disabled', true);
              data.find("#give-cost1 input").prop('disabled', true);

              data.find('#take-value1').removeClass().addClass('givedefault');
              data.find('#take-cost1').removeClass().addClass('givedefault');
              data.find('#give-value1').removeClass().addClass('givedefault');
              data.find('#give-cost1').removeClass().addClass('givedefault');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>=1) {
             $(this).closest("tr").remove();
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $("#messages").addClass("alert alert-danger")
             $('#messages').html('You can not remove first row.').fadeIn('slow');
             $("#messages").fadeOut(5000)
           }
      });

$("select").on('change', function(){
    var type = $(this).val();
    switch(type) {
      case 'take':
        $(this).closest('tr').find("#take-value1 input").prop('disabled',false);
        $(this).closest('tr').find("#take-cost1 input").prop('disabled', false);
        $(this).closest('tr').find("#give-cost1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-cost1 input").prop('disabled', true);
        $(this).closest('tr').find("#give-value1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-value1 input").prop('disabled', true);
        $(this).closest('tr').find("#take-value1").removeClass().addClass('takedanger');
        $(this).closest('tr').find("#take-cost1").removeClass().addClass('takedanger');
        $(this).closest('div').removeClass().addClass('select takedanger');
      break;
     
      case 'give':
        $(this).closest('tr').find("#give-cost1 input").prop('disabled', false);
        $(this).closest('tr').find("#give-value1 input").prop('disabled', false);
        $(this).closest('tr').find("#give-cost1").removeClass().addClass('givesucess');
        $(this).closest('tr').find("#give-value1").removeClass().addClass('givesucess');
        $(this).closest('tr').find("#take-value1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#take-value1 input").prop('disabled', true);
        $(this).closest('tr').find("#take-cost1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#take-cost1 input").prop('disabled', true);
        $(this).closest('div').removeClass().addClass('select givesucess');
      break;
      
      case 'take-give':
        $(this).closest('tr').find("#give-cost1 input").prop('disabled', false);
        $(this).closest('tr').find("#give-value1 input").prop('disabled', false);
        $(this).closest('tr').find("#take-value1 input").prop('disabled', false);
        $(this).closest('tr').find("#take-cost1 input").prop('disabled', false);
        $(this).closest('tr').find("#take-value1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#take-cost1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-value1").removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-cost1").removeClass().addClass('givedefault');
        $(this).closest('div').removeClass().addClass('select takegive'); 
      break;
    }
  }); 
});     


 $('#addVariable').click(function(){
  var validate = true;
  var select_validate = true;
   $('#myTable').find('tr input:enabled').each(function(){
    if($(this).val() == ""){
        validate = false; 
    }
  });

   $('#myTable').find('tr select').each(function(){
    if($(this).val() == null){
        select_validate = false; 
    }
  });
   if(validate && select_validate){
      store_data = [];
    var row_no = $('#myTable tr').length;
    $("#myTable tr").each(function(index, tr){
      content = {};
        if (this.id) {
            index = this.id;
            content['id'] = this.id;
            content['variable'] = $(this).find("#variable"+index).val();
            content['take_give_status'] = $(this).find("#select"+index+" select").val();
            content['take_value'] = $(this).find("#take-value"+index+" input").val();
            content['take_cost'] = $(this).find("#take-cost"+index+" input").val();
            content['give_cost'] = $(this).find("#give-cost"+index+" input").val();
            content['give_value'] =  $(this).find("#give-value"+index+" input").val();
            content['your_breakpoint'] = $(this).find("#your-breakpoint"+index).val();
            content['their_breakpoint'] = $(this).find("#their-breakpoint"+index).val();
            store_data.push(content);
        } else {
            index = this.id;
            content['id'] = this.id;
            content['variable'] = $(this).find("#variable1").val();
            content['take_give_status'] = $(this).find("#select1 select").val();
            content['take_value'] = $(this).find("#take-value1 input").val();
            content['take_cost'] = $(this).find("#take-cost1 input").val();
            content['give_cost'] = $(this).find("#give-cost1 input").val();
            content['give_value'] =  $(this).find("#give-value1 input").val();
            content['your_breakpoint'] = $(this).find("#your-breakpoint1").val();
            content['their_breakpoint'] = $(this).find("#their-breakpoint1").val();
            store_data.push(content);
        }
    });

$.ajax({
        type: "POST",
        url: "{{url('/')}}"+"/"+"store-variable",
        dataType: "json",
        data: {
          "_token": "{{ csrf_token() }}",
           "data" : store_data,
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
      $('#messages').html('Please fill all the fields.').fadeIn('slow');
      $("#messages").fadeOut(5000)
      return false;

    }
    });
</script>

@endsection