<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<!-- <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script> -->
<!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
<script src="<?php echo e(asset('paper/js/jszip.min.js')); ?>"></script>
 <script src="<?php echo e(asset('paper/js/kendo.all.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.getUsers').select2();
});
// Add Objectives
$( document ).ready(function() {
   $('.addObjective').click(function() {

   		var length_count =  $('.your_accordion').length;
   		var there_count =  $('.their_accordion').length;
   		
   		var your_objective =  '<div id="accordion_'+length_count+'" class="accordion your_accordion radius-1">';
          	your_objective += '<div class="card mb-0">';
            your_objective += '<div class="card-header collapsed" data-toggle="collapse" href="#yourexample'+length_count+'">';
            your_objective += '<a class="card-title"> objective '+(length_count+1)+' </a>';
            your_objective += '</div>';
            your_objective += '<div id="yourexample'+length_count+'" class="card-body collapse show" data-parent="#youraccordion">';
            your_objective += '<div class="form-group form-inline justify-content-between">';
            your_objective += '<label >specific</label> <textarea  name="your_specific[]" id="your_specific_'+length_count+'" class="form-control specific_input"></textarea><span class="error specific_error"></span>';
            // your_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?'; 
            your_objective += '</button>';
            your_objective += '</div>';
            your_objective += '<div class="form-group form-inline justify-content-between">';
            your_objective += '<label >measurable</label> <textarea  name="your_measurable[]" id="your_measurable_'+length_count+'" class="form-control mesaurable_input"></textarea><span class="error"></span>';
            // your_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
             your_objective += '</button>';
            your_objective += '</div>';
            your_objective += '<div class="form-group form-inline justify-content-between">';
            your_objective += '<label >achievable</label> <textarea  name="your_achievable[]" id="your_achievable_'+length_count+'" class="form-control achievable_input"></textarea><span class="error"></span>';
            // your_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
             your_objective += '</button>';
            your_objective += '</div>';
            your_objective += '<div class="form-group form-inline justify-content-between">';
            your_objective += '<label >relevant</label> <textarea  name="your_relevant[]" id="your_relevant_'+length_count+'"  class="form-control relevant_input"></textarea><span class="error"></span>';
            // your_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
            your_objective += '</button>';
            your_objective += '</div>';
            your_objective += '<div class="form-group form-inline justify-content-between">';
            your_objective += '<label >time bound</label> <textarea name="your_time_bound[]" id="your_time_bound_'+length_count+'" class="form-control time_bond_input"></textarea><span class="error"></span>';
            // your_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
           
           
            your_objective += '</button>';
            your_objective += '<a class="remove_objective" data-id="'+length_count+'"><i class="fas fa-times-circle"></i></a>';
            your_objective += '</div>';
            your_objective += '</div>';
            your_objective += '</div>';
            your_objective += '</div>';


        var their_objective  = '<div id="their_accordion_'+there_count+'" class="accordion their_accordion radius-1">';
            their_objective += '<div class="card mb-0">';
            their_objective += '<div class="card-header collapsed OrangeBg" data-toggle="collapse" href="#theirexample'+there_count+'">';
            their_objective += '<a class="card-title"> objective '+(there_count+1)+'</a>';
            their_objective += '</div>';
            their_objective += '<div id="theirexample'+there_count+'" class="card-body collapse show" data-parent="#theiraccordion">';
            their_objective += '<div class="form-group form-inline justify-content-between">';
            their_objective += '<label >specific</label> <textarea name="their_specific[]" id="their_specific_'+there_count+'" class="form-control specific_input"></textarea><span class="error"></span>';
            // their_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
            their_objective += '</button>';
            their_objective += '<input type="hidden" name="obj_id[]" value="" class="obj_id">';
            their_objective += '</div>';
            their_objective += '<div class="form-group form-inline justify-content-between">';
            their_objective += '<label >measurable</label> <textarea  name="their_measurable[]" id="their_measurable_'+there_count+'" class="form-control mesaurable_input"></textarea><span class="error"></span>';
            // their_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
             their_objective += '</button>';
            their_objective += '</div>';
            their_objective += '<div class="form-group form-inline justify-content-between">';
            their_objective += '<label >achievable</label> <textarea name="their_achievable[]" id="their_achievable_'+there_count+'" class="form-control achievable_input"></textarea><span class="error"></span>';
            // their_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
            their_objective += '</button>';
            their_objective += '</div>';
            their_objective += '<div class="form-group form-inline justify-content-between">';
            their_objective += '<label >relevant</label> <textarea  name="their_relevant[]" id="their_relevant_'+there_count+'" class="form-control relevant_input"></textarea><span class="error"></span>';
            // their_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
            their_objective += '</button>';
            their_objective += '</div>';
            their_objective += '<div class="form-group form-inline justify-content-between">';
            their_objective += '<label >time bound</label> <textarea  name="their_time_bound[]" id="their_time_bound_'+there_count+'" class="form-control time_bond_input"></textarea><span class="error"></span>';
            // their_objective += '<button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">?';
            
           
            their_objective += '</button>';
            their_objective += '<a class="remove_objective" data-id="'+there_count+'"><i class="fas fa-times-circle"></i></a>';
            their_objective += '</div>';
            their_objective += '</div>';
            their_objective += '</div>';
            their_objective += '</div>';
            var obj_type = $(this).attr('data-obj-type');
            if(obj_type == "your"){
            	$('.your_objective').append(your_objective);
            }else{
            	$('.their_objective').append(their_objective);	
            }
            
            

   });



	// Remove particular objective box
	$('body').on('click','.remove_objective',function() {
		//$('.loader-gif').show();
		var id = $(this).attr('data-id');

		// $.ajax({
		//         type: "POST",
		//         url: "<?php echo e(url('/')); ?>"+"/"+"delete-objective",
		//         dataType: "json",
		//         data: {
		//           "_token": "<?php echo e(csrf_token()); ?>",
		//            "id" : id,
		//         },
		//         success: function(data) {
		        	
		//             if(data.status == 'success')
		//             {
		//             	$('.loader-gif').hide();
		            	$('#accordion_'+id).remove();
						$('#their_accordion_'+id).remove();
		        //     }
		        //     }
		        // });
		

	});


	$('.SaveObjectives').click(function() {
		var save_only = $(this).attr('only-save');
		//alert(save_only);
		var tab_count = $(this).attr('data-id');

		var count = $('.your_accordion').length;
		var error = "";
		$('.error').text('');

		$('.background_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";

			}
		});

		$('.specific_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";

			}
		});

		$('.mesaurable_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		$('.time_bond_input').each(function() {			
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		$('.relevant_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		$('.achievable_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		$('.internal_rest_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		$('.external_rest_input').each(function() {
			if(!$(this).val())
			{
				$(this).focus();
				$(this).next("span").text('This field is required.');
				error = "error";
			}
		});

		if(error == ""){
			var workflow_id = $('#workflow_id').val();
			var your_specific = [];
			var your_measurable = [];
			var your_time_bound = [];
			var your_relevant = [];
			var your_achievable = [];
			var your_internal_rest = [];
			var your_external_rest = [];
			var their_specific = [];
			var their_measurable = [];
			var their_time_bound = [];
			var their_relevant = [];
			var their_achievable = [];
			/*var their_internal_rest = [];
			var their_external_rest = [];*/
			var obj_id = [];
			var your_obj_id = [];
			var user_id = "<?php echo e(Auth::user()->id); ?>";
			var background='';


		    $('textarea[name="your_specific[]"]').each( function() {
		        your_specific.push(this.value);
		    });
		    
		    $('textarea[name="your_measurable[]"]').each( function() {
		        your_measurable.push(this.value);
		    });
		    
		    $('textarea[name="your_time_bound[]"]').each( function() {
		        your_time_bound.push(this.value);
		    });
		    
		    $('textarea[name="your_relevant[]"]').each( function() {
		        your_relevant.push(this.value);
		    });

		    $('textarea[name="your_achievable[]"]').each( function() {
		        your_achievable.push(this.value);
		    });

		    $('textarea[name="your_internal_rest[]"]').each( function() {
		        your_internal_rest.push(this.value);
		    });

		    $('textarea[name="your_external_rest[]"]').each( function() {
		        your_external_rest.push(this.value);
		    });

		    $('textarea[name="their_specific[]"]').each( function() {
		        their_specific.push(this.value);
		    });
		    
		    $('textarea[name="their_measurable[]"]').each( function() {
		        their_measurable.push(this.value);
		    });
		    
		    $('textarea[name="their_time_bound[]"]').each( function() {
		        their_time_bound.push(this.value);
		    });
		    
		    $('textarea[name="their_relevant[]"]').each( function() {
		        their_relevant.push(this.value);
		    });

		    $('textarea[name="their_achievable[]"]').each( function() {
		        their_achievable.push(this.value);
		    });

		    // $('textarea[name="their_internal_rest[]"]').each( function() {
		    //     their_internal_rest.push(this.value);
		    // });

		    // $('textarea[name="their_external_rest[]"]').each( function() {
		    //     their_external_rest.push(this.value);
		    // });


		    $('input[name="obj_id[]"]').each( function() {
		    	
		        obj_id.push(this.value);
		    });
		    $('input[name="your_obj_id[]"]').each( function() {
		    	
		        your_obj_id.push(this.value);
		    });
		    background = $('textarea[name="background"]').val();
			

		  	$.ajax({
	           	type: "POST",
	           	url: "<?php echo e(url('/')); ?>/saveobjectives",
	           	data: {
	               "_token": "<?php echo e(csrf_token()); ?>",
	               "your_specific": your_specific,
	               "your_measurable": your_measurable,
	               "your_time_bound": your_time_bound,
	               "your_relevant": your_relevant,
	               "your_achievable": your_achievable,	               
	               "their_specific": their_specific,
	               "their_measurable": their_measurable,
	               "their_time_bound": their_time_bound,
	               "their_relevant": their_relevant,
	               "their_achievable": their_achievable,
	               "user_id": user_id,
	               "your_internal_rest": your_internal_rest,
	               "your_external_rest": your_external_rest,	               
	               // "their_internal_rest": their_internal_rest,
	               // "their_external_rest": their_external_rest,               
	               "obj_id": obj_id, 
	               "your_obj_id": your_obj_id, 
	               "workflow_id": workflow_id, 
	               "background":background  ,           
	               
	           	},
	           	cache: false,	   
	           	success: function(result) {
	           	
	           	
	           		if(result.success == 'success')
	           		{
	           			var names = result.id;
	           			var string = names.toString()
	           			var idArray = string.split(',');
	           			console.log(idArray);
	           			var i = 0;
	           			var obj_count = $('.obj_id').length;
	           			
		           		if(obj_count == 0)
		           		{
		           			$('input[name="obj_id[]"]').val(idArray[i]);


		           		} else {
		           			var fist_obj = $('.first_obj').length;
		           			if(fist_obj == 1)
		           			{
		           				i =1;
		           			}
		           			$('.obj_id').each(function() {
		           				if(idArray[i]!='')
		           				{
		           					$(this).val(idArray[i]);
	           					}
		           				i++;
		           			});
	           			}
	           			$('.messages').html('<div class="alert alert-success" role="alert">Objectives saved successfully!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           			if(save_only == '')
	           			{
		           			setTimeout(function(){ 
		           				$('a[href="#power-tab"]').tab('show');
		           			 }, 3000);
	           			}
	           		}
	           		else
	           		{
	           			$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           		}
	           		setTimeout(function(){ 
	           				$('.messages').html('');	           				
	           			 }, 3000);
	           		
	               
	           }
	       	});
		}
				

	});

var yoursum = 0;
///Onchange of your answer count
$('.your_onchange').change(function(){
    yoursum = 0;
    var your_value = "";
    var their_value = "";
    $('.your_onchange').each(function() {
    	//alert(Number($(this).val()));
        yoursum += Number($(this).val());
        var your_val = $(this).val();
        if(your_val == '')
        {
        	your_value = "blank";
        }

    });

    $('.counter_onchange').each(function() {
        var their_val = $(this).val();
        if(their_val == '')
        {
        	their_value = "blank";
        }

    });
   // alert(yoursum);
     $('.your_total').html(yoursum);
     var counter_total = Number($('.counter_total').text());
     var diff = yoursum+counter_total;
     $('.diffrence').text(diff);


     if(diff >= 7)
     {     	
     	$('.more_power').css('background', '#68a2ff');
     	$('.power_shared').css('background', '');
     	$('.less_power').css('background', '');

     	if(your_value == "" && their_value == "")
     	{

	     	$('.mor_power').show();
	     	$('.les_power').hide();
	     	$('.eql_power').hide();
     	}
     }
     else if(diff >= -6  && diff <= 6)
     {     	
     	$('.power_shared').css('background', '#F9CA5F');
     	$('.more_power').css('background', '');
     	$('.less_power').css('background', '');
     	if(your_value == "" && their_value == "")
     	{
	     	$('.mor_power').hide();
	     	$('.les_power').hide();
	     	$('.eql_power').show();
     	}
     } else if(diff <= -7)
     {
     	
     	$('.less_power').css('background', 'red');
     	$('.more_power').css('background', '');
     	$('.power_shared').css('background', '');
     	if(your_value == "" && their_value == "")
     	{
	     	$('.mor_power').hide();
	     	$('.les_power').show();
	     	$('.eql_power').hide();
	     }
     }
});

var countersum = 0;
// Onchange of Counter total
$('.counter_onchange').change(function(){
    	countersum = 0;
    	var your_value = "";
    	var their_value = "";
    $('.counter_onchange :selected').each(function() {
        countersum += Number($(this).val());
        var their_val = $(this).val();
        if(their_val == "")
        {
        	their_value = "blank";
        }
    });

     $('.your_onchange').each(function() {
        var your_val = $(this).val();
        if(your_val == '')
        {
        	your_value = "blank";
        }

    });
     $('.counter_total').text(countersum);
     var your_total = Number($('.your_total').html());
     var diff = your_total+countersum;
     $('.diffrence').text(diff);

     if(diff >= 7)
     {     	
     	$('.more_power').css('background', '#68a2ff');
     	$('.power_shared').css('background', '');
     	$('.less_power').css('background', '');
     	if(your_value == "" && their_value == "")
     	{
	     	$('.mor_power').show();
	     	$('.les_power').hide();
	     	$('.eql_power').hide();
	     }
     }
     else if(diff >= -6  && diff <= 6)
     {     	
     	$('.power_shared').css('background', '#F9CA5F');
     	$('.more_power').css('background', '');
     	$('.less_power').css('background', '');
     	if(your_value == "" && their_value == "")
     	{
	     	$('.mor_power').hide();
	     	$('.les_power').hide();
	     	$('.eql_power').show();
     	}
     } else if(diff <= -7)
     {
     	
     	$('.less_power').css('background', 'red');
     	$('.more_power').css('background', '');
     	$('.power_shared').css('background', '');
     	if(your_value == "" && their_value == "")
     	{
	     	$('.mor_power').hide();
	     	$('.les_power').show();
	     	$('.eql_power').hide();
	     }
     }
});


// Save Power form data
$('#powerForm').validate({
	rules: {
	    "your_question1": {
	        required: true,        
	     },
		"your_question2": {
		    required: true,        
		},
		"your_question3": {
		    required: true,        
		},
		"your_question4": {
		    required: true,        
		},
		"your_question5": {
		    required: true,        
		},
		"counter_question1": {
		    required: true,        
		},
		"counter_question2": {
		    required: true,        
		},
		"counter_question3": {
		    required: true,        
		},
		"counter_question4": {
		    required: true,        
		},
		"counter_question5": {
		    required: true,        
		},
		"inhence_think": {
		    required: true,        
		},
		"inhence_how": {
		    required: true,        
		},
		"change_think": {
		    required: true,        
		},
		"change_how": {
		    required: true,        
		},
		"downgrade_think": {
		    required: true,        
		},
		"downgrade_how": {
		    required: true,        
		},
		"explot_think": {
		    required: true,        
		},
		"explot_how": {
		    required: true,        
		},
	  },
	messages: {
	    "your_question1": {
	        required: "Please select an answer.",
	    },
	    "your_question2": {
	        required: "Please select an answer.",
	    },
	    "your_question3": {
	        required: "Please select an answer.",
	    },
	    "your_question4": {
	        required: "Please select an answer.",
	    },
	    "your_question5": {
	        required: "Please select an answer.",
	    },
	    "counter_question1": {
	        required: "Please select an answer.",
	    },
	    "counter_question2": {
	        required: "Please select an answer.",
	    },
	    "counter_question3": {
	        required: "Please select an answer.",
	    },
	    "counter_question4": {
	        required: "Please select an answer.",
	    },
	    "counter_question5": {
	        required: "Please select an answer.",
	    },
	    "inhence_think": {
	        required: "This field is required.",        
	    },
	    "inhence_how": {
	        required: "This field is required.",        
	    },
	    "change_think": {
	        required: "This field is required.",        
	    },
	    "change_how": {
	        required: "This field is required.",      
	    },
	    "downgrade_think": {
	        required: "This field is required.",        
	    },
	    "downgrade_how": {
	        required: "This field is required.",        
	    },
	    "explot_think": {
	        required: "This field is required.",        
	     },
	    "explot_how": {
	        required: "This field is required.",        
	    },
	},
      	submitHandler: function(form) {
      		var workflow_id = $('#workflow_id').val();
			var y_qstn1 = Number($('#your_question1').val());
			var y_qstn2 = Number($('#your_question2').val());
			var y_qstn3 = Number($('#your_question3').val());
			var y_qstn4 = Number($('#your_question4').val());
			var y_qstn5 = Number($('#your_question5').val());
			var c_qstn1 = Number($('#counter_question1').val());
			var c_qstn2 = Number($('#counter_question2').val());
			var c_qstn3 = Number($('#counter_question3').val());
			var c_qstn4 = Number($('#counter_question4').val());
			var c_qstn5 = Number($('#counter_question5').val());
			var inhence_think = $('#inhence_think').val();
			var inhence_how = $('#inhence_how').val();
			var change_think = $('#change_think').val();
			var change_how = $('#change_how').val();
			var downgrage_think = $('#downgrade_think').val();
			var downgrage_how = $('#downgrade_how').val();
			var explot_think = $('#explot_think').val();
			var explot_how = $('#explot_how').val();
			var power_id = $('#power_id').val();
			var user_id = "<?php echo e(Auth::user()->id); ?>";

			$.ajax({
		       	type: "POST",
		       	url: "<?php echo e(url('/')); ?>/savepower",
		       	data: {
		           "_token": "<?php echo e(csrf_token()); ?>",
		           "yq1": y_qstn1,
		           "yq2": y_qstn2,
		           "yq3": y_qstn3,
		           "yq4": y_qstn4,
		           "yq5": y_qstn5,
		           "cq1": c_qstn1,
		           "cq2": c_qstn2,
		           "cq3": c_qstn3,
		           "cq4": c_qstn4,
		           "cq5": c_qstn5,
		           "inh_thnk": inhence_think,
		           "inh_how": inhence_how,
		           "chng_thnk": change_think,
		           "chng_how": change_how,
		           "dwngd_think": downgrage_think,
		           "dwngd_how": downgrage_how,
		           "explt_thnk": explot_think,
		           "explt_how": explot_how,
		           "power_id": power_id,
		           "user_id": user_id,
		           "workflow_id": workflow_id,
		           	},
		       	cache: false,	   
		       	success: function(result) {
		       		var save_only = $('#savePower').attr('only-save');

		       		if(result == 'success')
		       		{
		       			$('.messages').html('<div class="alert alert-success" role="alert">Power saved successfully!</div>');
		       			$("html, body").animate({ scrollTop: 0 }, "slow");
		       			if(save_only == '')
		       			{
			       			setTimeout(function(){ 
			       				$('a[href="#variables-tab"]').tab('show');
			       			 }, 3000);

		       			}

		       			$('#savePower').attr('only-save','');
		       		}
		       		else
		       		{
		       			$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again!</div>');
		       			$("html, body").animate({ scrollTop: 0 }, "slow");
		       		}
		       		setTimeout(function(){ 
	           				$('.messages').html('');	           				
	           			 }, 3000);
		       	}
		   	});
  		}

  	
});
 $('.savePower').click(function() {
 		$('#savePower').attr('only-save','only_save');
        $("#powerForm").submit();
    });
// Clone Rist Sections

$('body').on('click','.clone_risk',function() {
	var length_count = $('.risk_table').length;
	
	var risk = '<div class="tableContainer risk_table" id="risktable_'+(length_count+1)+'">';
		//risk += '<button class="addButton"><i class="fas fa-plus-circle clone_risk"></i></button>';
		risk += '<button class="removeButton removeRiskButton" div-id="'+(length_count+1)+'"><i class="fas fa-times-circle"></i></button>';
		risk += '<table class="table table-bordered  table-responsive-sm"><thead class="thead-orange"><tr><th scope="col" >risk</th><th scope="col">probability % </th><th scope="col" class="text-center">impact on business </th><th scope="col" class="text-center">impact score</th><th scope="col" >risk level</th></tr></thead>';
		risk += '<thead class="">';
		// risk += '<thead class="thead-light">';
		risk += '<tr>';
		risk += '<th scope="col" >risk '+(length_count+1)+'</th>';
		risk += '<th scope="col"><input type="text " class="form-control riskprobability probablty_'+(length_count+1)+'" name="riskprobability[]" data-id="'+(length_count+1)+'"> </th>';
		risk += '<th scope="col"><input type="text" class="form-control text-center riskbusinessimpact impact_'+(length_count+1)+'" name="riskbusinessimpact[]" data-id="'+(length_count+1)+'"> </th>';
		risk += '<th scope="col" ><input type="text" class="form-control text-center riskimpactscore score_'+(length_count+1)+'" name="riskimpactscore[]" data-id="'+(length_count+1)+'" readonly="readonly"></th>';
		risk += '<th class=" risk_lavel_'+(length_count+1)+'"></th>';
		risk += '</tr></thead><input type="hidden" class="risk_id" name="risk_id[]" value="">';
		risk += '<tbody><tr>';
		risk += '<td>  Risk Description</td>';
		risk += '<td colspan="4"><input type="text" class="form-control riskdescription" name="riskdescription[]"></td>';
		risk += '</tr><tr>';                            
		risk += '<td>preventive Description</td>';                            
		risk += '<td colspan="4"><input type="text" class="form-control riskpreventive" name="riskpreventive[]"></td>';       
		risk += '</tr><tr>';                            
		risk += '<td>mitigation action</td>';                            
		risk += '<td colspan="4"><input type="text" class="form-control riskmitigation" name="riskmitigation[]"></td>';
		risk += '</tr></tbody></table>';                            
		risk += '</div>';   

		$('.add_risk').append(risk);                           

});


// Remove particular objective box
	$('body').on('click','.removeRiskButton',function() {
		$('.loader-gif').show();
		var id = $(this).attr('div-id');
		$.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-risk",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            	$('#risktable_'+id).remove();
		            }
		            }
		        });
		
	});

// calculate Risk
$('body').on('change','.riskbusinessimpact	',function(){
	var id = $(this).attr('data-id');
	var probalty = Number($(".probablty_"+id).val());
	var impact = Number($(".impact_"+id).val());
	var score = (probalty*impact)/100;
	$('.score_'+id).val(score);
	if(score >= 0 && score < 2)
	{
		$('.risk_lavel_'+id).css("background-color",'');
		$('.risk_lavel_'+id).text("Very Low");
		$('.risk_lavel_'+id).css("background-color",'green');
		
	}
	else if(score >= 2 && score < 4)
	{
		$('.risk_lavel_'+id).css("background-color",'');
		$('.risk_lavel_'+id).text("Low");
		$('.risk_lavel_'+id).css("background-color",'#007bff');
	}
	else if(score >= 4 && score < 6)
	{
		$('.risk_lavel_'+id).css("background-color",'');
		$('.risk_lavel_'+id).text("Moderate");
		$('.risk_lavel_'+id).css("background-color",'#F1B91D');
	}
	else if(score >= 6 && score < 8)
	{
		$('.risk_lavel_'+id).css("background-color",'');
		$('.risk_lavel_'+id).text("High");
		$('.risk_lavel_'+id).css("background-color",'#F97B3A');
	}
	else if(score >= 8 && score <= 10)
	{
		$('.risk_lavel_'+id).css("background-color",'');
		$('.risk_lavel_'+id).text("Very High");
		$('.risk_lavel_'+id).css("background-color",'red');
	}
	
	
});

// Save Risk Data
$('.risk_save').click(function() {
	var save_only = $(this).attr('save-only');
	var error = "";
	$('.error').text('');
	$('.riskprobability').css('border','0px');
	$('.riskbusinessimpact').css('border','0px');
	$('.riskimpactscore').css('border','0px');
	$('.riskdescription').css('border','0px');
	$('.riskpreventive').css('border','0px');
	$('.riskmitigation').css('border','0px');

	$('.riskprobability').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";

		}
	});
	$('.riskbusinessimpact').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";
		}
	});
	$('.riskimpactscore').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";
		}
	});
	$('.riskdescription').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";
		}
	});
	$('.riskpreventive').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";
		}
	});
	$('.riskmitigation').each(function() {
		if(!$(this).val())
		{	
			$(this).focus();
			$(this).css('border','solid .5px #F00');
			$('.risk_error').text('Please fill required field.');
			error = "error";
		}
	});


	if(error == '')
	{
		var workflow_id = $('#workflow_id').val();
	  	var riskprobability 			= [];
	  	var riskbusinessimpact 			= [];
	  	var riskimpactscore 			= [];
	  	var riskdescription 			= [];
	  	var riskpreventive 				= [];
	  	var riskmitigation 				= [];
	  	var user_id 					= "<?php echo e(Auth::user()->id); ?>";
	  	var risk_id 					= [];

	  	$('input[name="riskprobability[]"]').each( function() {
	        riskprobability.push(this.value);
	    });

	    $('input[name="riskbusinessimpact[]"]').each( function() {
	        riskbusinessimpact.push(this.value);
	    });

	    $('input[name="riskimpactscore[]"]').each( function() {
	        riskimpactscore.push(this.value);
	    });

	    $('input[name="riskdescription[]"]').each( function() {
	        riskdescription.push(this.value);
	    });

	    $('input[name="riskpreventive[]"]').each( function() {
	        riskpreventive.push(this.value);
	    });

	    $('input[name="riskmitigation[]"]').each( function() {
	        riskmitigation.push(this.value);
	    });
	    $('input[name="risk_id[]"]').each( function() {
	        risk_id.push(this.value);
	    });

    	$.ajax({
           	type: "POST",
           	url: "<?php echo e(url('/')); ?>/saverisk",
           	data: {
               	"_token": "<?php echo e(csrf_token()); ?>",
               	"riskprobability": riskprobability,
               	"riskbusinessimpact": riskbusinessimpact,
               	"riskimpactscore": riskimpactscore,
               	"riskdescription": riskdescription,
               	"riskpreventive": riskpreventive,
               	"riskmitigation": riskmitigation,
               	"user_id": user_id,
               	"risk_id": risk_id,
               	"workflow_id": workflow_id,
	           	},
	           	cache: false,	   
	           	success: function(result) {
	           		var names = result.id;
	           			var string = names.toString()
	           			var idArray = string.split(',');
	           			console.log(idArray);
	           			var i = 0;
	           			var risk_count = $('.risk_id').length;

		           		if(risk_count == 0)
		           		{
		           			$('input[name="risk_id[]"]').val(idArray[i]);


		           		} else {
		           			var fist_rk = $('.first_rkid').length;
		           			if(fist_rk == 1)
		           			{
		           				i =1;
		           			}
		           			$('.risk_id').each(function() {
		           				if(idArray[i]!='')
		           				{
		           					$(this).val(idArray[i]);
	           					}
		           				i++;
		           			});
	           			}
	           		if(result.success == 'success')
	           		{
	           			$('.messages').html('<div class="alert alert-success" role="alert">Risks saved successfully!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           			if(save_only == "")
	           			{

		           			setTimeout(function(){ 
		           				$('a[href="#nego-tab"]').tab('show');
		           			 }, 3000);
	           			}
	           		}
	           		else
	           		{
	           			$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           		}
	           		setTimeout(function(){ 
	           				$('.messages').html('');	           				
	           			 }, 3000);
	               
	           }
	       	});
		}


});

// Clone Negotiate-----
$('body').on('click','.add_negotiate',function() {
	var negotiate_count = $('.negotiate_count').length;

		var negotiate = '<div class="tableContainer negotiate_count" id="negotiation_'+(negotiate_count+1)+'">';
	  		//negotiate +='<button class="addButton"><i class="fas fa-plus-circle add_negotiate"></i></button>';
	  		negotiate +='<button class="removeButton"><i class="fas fa-times-circle remove_negotiate" div-id="'+(negotiate_count+1)+'"></i></button>';
	  		negotiate +='<table class="table table-bordered  table-responsive-sm">';
	    	negotiate +='<thead class="thead-orange">';
	        negotiate +='<th colspan="2">offer '+(negotiate_count+1)+'</th>';
	     	negotiate +='</thead>';
	     	negotiate +='<thead class="thead-light">';
	        negotiate +='<tr>';
	        negotiate +='<th scope="col" >If you (Takes)</th>';
	        negotiate +='<th scope="col" >Then we (Gives)</th>';
	        negotiate +='</tr>';
	     	negotiate +='</thead>';
	     	negotiate +='<tbody>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate1[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate1[]"></td>';
	        negotiate +='</tr>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate2[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate2[]"></td>';
	        negotiate +='</tr>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate3[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate3[]"></td>';
	        negotiate +='</tr>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate4[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate4[]"></td>';
	        negotiate +='</tr>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate5[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate5[]"></td>';
	        negotiate +='</tr>';
	        negotiate +='<tr>';
	        negotiate +='<td><input type="text" class="form-control take_negotiate" name="take_negotiate6[]"></td>';
	        negotiate +='<td><input type="text" class="form-control give_negotiate" name="give_negotiate6[]"></td>';
	        negotiate +='</tr><input type="hidden" class="negotiate_id" name="negotiate_id[]" value="">';
	     	negotiate +='</tbody>';
	  		negotiate +='</table>';
			negotiate +='</div>';

			if (negotiate_count % 2 === 0) {
				$('.clone_negotiate_left').append(negotiate);
			}else {
				$('.clone_negotiate_right').append(negotiate);
			}

});

// Remove negotiate
	$('body').on('click','.remove_negotiate',function() {
		var id = $(this).attr('div-id');
		$.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-negotiate",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            	$('#negotiation_'+id).remove();
		            }
		            }
		        });
		
	});


});

/// save negotiation
$('.saveNegotiation').click(function() {
	var save_only = $(this).attr('save-only');
	var error = "";
 	var your_input_offer = true;
  	var their_input_offer = true;

	$('.error').text('');
	$('.take_negotiate').css('border','0px');
	$('.give_negotiate').css('border','0px');

	// $('.give_negotiate').each(function() {
	// 	if(!$(this).val())
	// 	{	
	// 		$(this).focus();
	// 		$(this).css('border','solid .5px #F00');
	// 		$('.negotiation_error').text('Please fill required field.');
	// 		error = "error";

	// 	}
	// });
	// $('.take_negotiate').each(function() {
	// 	if(!$(this).val())
	// 	{
	// 		$(this).focus();
	// 		$(this).css('border','solid .5px #F00');
	// 		$('.negotiation_error').text('Please fill required field.');
	// 		error = "error";

	// 	}
	// });

	$('#yourTableBody').find('tr input').each(function(){
		    if($(this).val() == ""){
		        your_input_offer = false; 
		    }
		  });
   	$('#theirTableBody').find('tr input').each(function(){
	    if($(this).val() == ""){
	        their_input_offer = false; 
	    }
  	});
	if(error == "")
	//if(your_input_offer && their_input_offer && error == "")
	{
	

		var workflow_id = $('#workflow_id').val();
		var take_negotiate1    = [];
		var take_negotiate2    = [];
		var take_negotiate3    = [];
		var take_negotiate4    = [];
		var take_negotiate5    = [];
		var take_negotiate6    = [];
		var give_negotiate1    = [];
		var give_negotiate2    = [];
		var give_negotiate3    = [];
		var give_negotiate4    = [];
		var give_negotiate5    = [];
		var give_negotiate6    = [];
		var negotiate_id       = [];
		var user_id 	      = "<?php echo e(Auth::user()->id); ?>";

		$('input[name="take_negotiate1[]"]').each( function() {
	        take_negotiate1.push(this.value);
	    });
	    $('input[name="take_negotiate2[]"]').each( function() {
	        take_negotiate2.push(this.value);
	    });
	    $('input[name="take_negotiate3[]"]').each( function() {
	        take_negotiate3.push(this.value);
	    });
	    $('input[name="take_negotiate4[]"]').each( function() {
	        take_negotiate4.push(this.value);
	    });
	    $('input[name="take_negotiate5[]"]').each( function() {
	        take_negotiate5.push(this.value);
	    });
	    $('input[name="take_negotiate6[]"]').each( function() {
	        take_negotiate6.push(this.value);
	    });

	    $('input[name="give_negotiate1[]"]').each( function() {
	        give_negotiate1.push(this.value);
	    });
	    $('input[name="give_negotiate2[]"]').each( function() {
	        give_negotiate2.push(this.value);
	    });
	    $('input[name="give_negotiate3[]"]').each( function() {
	        give_negotiate3.push(this.value);
	    });
	    $('input[name="give_negotiate4[]"]').each( function() {
	        give_negotiate4.push(this.value);
	    });
	    $('input[name="give_negotiate5[]"]').each( function() {
	        give_negotiate5.push(this.value);
	    });
	    $('input[name="give_negotiate6[]"]').each( function() {
	        give_negotiate6.push(this.value);
	    });

	    $('input[name="negotiate_id[]"]').each( function() {
	        negotiate_id.push(this.value);
	    });

		your_store_offer = [];
  		their_store_offer = [];
  		$("#yourTableBody tr").each(function(index, tr){
			  	your_offer = {};
				if (this.id) {
					var row_id = this.id;
					var offer_length = $(this).find(".your_offer").length;
				  	for(var i=0;i<offer_length;i++) {
				  		your_offer['offer'+i] = $(this).find(".your_offer").eq(i).val();
				  	}
		            your_offer['id'] = this.id;
		            your_offer['variable'] = $(this).find("#your_variable"+row_id).val();
		            your_offer['aligned'] = $(this).find("#your_aligned"+row_id).val();
		            your_offer['status'] = 'your';
		            if(your_offer['variable'] != '')
		            {		            	
		   				your_store_offer.push(your_offer);
		            }
				} else {
					var offer_length = $(this).find(".your_offer").length;
				  	for(var i=0;i<offer_length;i++) {
				  		your_offer['offer'+i] = $(this).find(".your_offer").eq(i).val();
				  	}
		            your_offer['id'] = this.id;
		            your_offer['variable'] = $(this).find("#your_variable1").val();
		            your_offer['aligned'] = $(this).find("#your_aligned1").val();
		            your_offer['status'] = 'your';
		            if(your_offer['variable'] != '')
		            {		            	
		   				your_store_offer.push(your_offer);
		            }
				}
	         });

  		$("#theirTableBody tr").each(function(index, tr){
			  	your_offer = {};	
			  	if (this.id) {
			  		var row_id = this.id;
			  		var offer_length = $(this).find(".their_offer").length;
				  	for(var i=0;i<offer_length;i++) {
				  		your_offer['offer'+i] = $(this).find(".their_offer").eq(i).val();
				  	}
		            your_offer['id'] = this.id;
		            your_offer['variable'] = $(this).find("#their_variable"+row_id).val();
		            your_offer['aligned'] = $(this).find("#their_aligned"+row_id).val();
		            your_offer['status'] = 'their';
		   			
		   			if(your_offer['variable'] != '')
		            {		            	
		   				their_store_offer.push(your_offer);
		            }
			  	} else {
			  		var offer_length = $(this).find(".their_offer").length;
				  	for(var i=0;i<offer_length;i++) {
				  		your_offer['offer'+i] = $(this).find(".their_offer").eq(i).val();
				  	}
		            your_offer['id'] = this.id;
		            your_offer['variable'] = $(this).find("#their_variable1").val();
		            your_offer['aligned'] = $(this).find("#their_aligned1").val();
		            your_offer['status'] = 'their';
		   			if(your_offer['variable'] != '')
		            {		            	
		   				their_store_offer.push(your_offer);
		            }
			  	}
	         });

	    $.ajax({
           	type: "POST",
           	url: "<?php echo e(url('/')); ?>/savenegotiations",
           	data: {
               	"_token": "<?php echo e(csrf_token()); ?>",
               	"take_negotiate1": take_negotiate1,
               	"take_negotiate2": take_negotiate2,
               	"take_negotiate3": take_negotiate3,
               	"take_negotiate4": take_negotiate4,
               	"take_negotiate5": take_negotiate5,
               	"take_negotiate6": take_negotiate6,
               	"give_negotiate1": give_negotiate1,               	
               	"give_negotiate2": give_negotiate2,               	
               	"give_negotiate3": give_negotiate3,               	
               	"give_negotiate4": give_negotiate4,               	
               	"give_negotiate5": give_negotiate5,               	
               	"give_negotiate6": give_negotiate6,               	
               	"negotiate_id": negotiate_id,               	
               	"user_id": user_id,
           	 	"your_data" : your_store_offer,
	           	"their_data" : their_store_offer,
               	"workflow_id": workflow_id,
	           	},
	           	cache: false,	   
	           	success: function(result) {
	           			var names = result.id;
	           			var string = names.toString()
	           			var idArray = string.split(',');
	           			console.log(idArray);
	           			var i = 0;
	           			var neg_count = $('.negotiate_id').length;
		           		if(neg_count == 0)
		           		{
		           			$('input[name="negotiate_id[]"]').val(idArray[i]);


		           		} else {
		           			var fist_ng = $('.first_ngid').length;
		           			if(fist_ng == 1)
		           			{
		           				i =1;
		           			}
		           			$('.negotiate_id').each(function() {
		           				if(idArray[i]!='')
		           				{
		           					$(this).val(idArray[i]);
	           					}
		           				i++;
		           			});
	           			}
	           		if(result.success == 'success')
	           		{
	           			$('.messages').html('<div class="alert alert-success" role="alert">Negotiations saved successfully!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           			//$('input').val('');
	           			if(save_only == "")
	           			{

		           			setTimeout(function(){ 
		           				$('a[href="#execute-tab"]').tab('show');
		           			 }, 3000);
	           			}
	           		}
	           		else
	           		{
	           			$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           		}
	           		setTimeout(function(){ 
	           				$('.messages').html('');	           				
	           			 }, 3000);
	           		
	               
	           }
	       	});
	}
	else
	{
		$('.messages').html('<div class="alert alert-danger" role="alert">Please complete all fields before continuing.</div>');
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}
});


// skip tab functionality
$('.skip').click(function() {
	var id = $(this).attr('data-id');
	if(id == 1)
	{
		$('a[href="#power-tab"]').tab('show');
	} else if(id == 2)
	{
		$('a[href="#variables-tab"]').tab('show');
	}else if(id == 3) {
		$('a[href="#comm-tab"]').tab('show');
	}else if(id == 4) {
		$('a[href="#time-tab"]').tab('show');
	}else if(id == 5) {
		$('a[href="#risk-tab"]').tab('show');
	}else if(id == 6) {
		$('a[href="#nego-tab"]').tab('show');
	}else if(id == 7) {
		$('a[href="#execute-tab"]').tab('show');
	}
})






/**
     * @Created  By Gaurav Bisht
     * @Created  Date 07 January 2020
     * to add more variable fields and remove them one by one.
     */
$(function(){
    $('#addMore').on('click', function() {
              
              var data = $("#VariableTable tr:eq(0)").clone(true).appendTo("#VariableTable");
              var rowCount = $('#VariableTable tr').length;
              data.find('td:first-child').html(rowCount);
              data.attr('id',rowCount);
              data.find("input").val('');
              data.find("select").val('');
              data.find("select").attr('id',rowCount);

              data.find('option:eq(0)').prop('selected', true);
              data.find('#select1 div').removeClass().addClass('select givesucess');
              data.find("#take-value1 select").prop('disabled', true);
              data.find("#take-cost1 select").prop('disabled', true);
              data.find("#give-value1 select").prop('disabled', true);
              data.find("#give-cost1 select").prop('disabled', true);

              data.attr('class','row'+rowCount);
              data.find('#select1').attr('id','select'+rowCount);
              data.find('#variable1').attr('id','variable'+rowCount);
              data.find('#take-value1').attr('id','take-value'+rowCount).removeClass().addClass('givedefault');
              data.find('#take-cost1').attr('id','take-cost'+rowCount).removeClass().addClass('givedefault');
              data.find('#give-value1').attr('id','give-value'+rowCount).removeClass().addClass('givedefault');
              data.find('#give-cost1').attr('id','give-cost'+rowCount).removeClass().addClass('givedefault');

              data.find('#take-value'+rowCount+' '+'select').html('');
              data.find('#take-cost'+rowCount+' '+'select').html('');
              data.find('#give-value'+rowCount+' '+'select').html('');
              data.find('#give-cost'+rowCount+' '+'select').html('');
              data.find('#your-breakpoint1').attr('id','your-breakpoint'+rowCount);
              data.find('#their-breakpoint1').attr('id','their-breakpoint'+rowCount);
     });
     $(document).on('click', '.RemoveVariable', function() {
     	$('.loader-gif').show();
     	var id = $(this).closest("tr").attr('id');
     	var trIndex = $(this).closest("tr").index();
     	
	           		
		            if(trIndex>=1) {
		            	$.ajax({
					        type: "POST",
					        url: "<?php echo e(url('/')); ?>"+"/"+"delete-variable",
					        dataType: "json",
					        data: {
					          "_token": "<?php echo e(csrf_token()); ?>",
					           "id" : id,
					        },
					        success: function(data) {
					        	
					            if(data.status == 'success')
					            {
					            	$('.loader-gif').hide();
					            }
					            }
					        });
		             $(this).closest("tr").remove();
		           } else {
		           	$('.loader-gif').hide();
		             $('html, body').animate({ scrollTop: 0 }, 0);
		             $('.messages').html('<div class="alert alert-danger" role="alert">You can not remove first row.');
		             setTimeout(function(){ 
			           				$('.messages').html('');	           				
			           			 }, 3000);
		           }
     	
         
      });

      /**
     * @Created  By Gaurav Bisht
     * @Created  Date 07 January 2020
     * to change the color and disable input field on dropdown selection.
     */
$("body").on('change','.give_take_drop', function(){

    var index = this.id;
    var type = $(this).val();
    switch(type) {
      case 'take':
        $(this).closest('tr').find("#take-value"+index+" select").prop('disabled',false);
        $(this).closest('tr').find("#take-value"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#take-cost"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#take-cost"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#give-cost"+index).removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-cost"+index+" select").prop('disabled', true);
        $(this).closest('tr').find("#give-cost"+index+" select").html('');
        $(this).closest('tr').find("#give-value"+index+" select").html('');
        $(this).closest('tr').find("#give-cost"+index+" select").val('');
        $(this).closest('tr').find("#give-value"+index).removeClass().addClass('givedefault');
        $(this).closest('tr').find("#give-value"+index+" select").val('');
        $(this).closest('tr').find("#give-value"+index+" select").prop('disabled', true);
        $(this).closest('tr').find("#take-value"+index).removeClass().addClass('takedanger');
        $(this).closest('tr').find("#take-cost"+index).removeClass().addClass('takedanger');
        $(this).closest('div').removeClass().addClass('select takedanger');
      break;
     
      case 'give':
        $(this).closest('tr').find("#give-cost"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#give-cost"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#give-value"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#give-value"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#give-cost"+index).removeClass().addClass('givesucess');
        $(this).closest('tr').find("#give-value"+index).removeClass().addClass('givesucess');
        $(this).closest('tr').find("#take-value"+index).removeClass().addClass('givedefault');
        $(this).closest('tr').find("#take-value"+index+" select").prop('disabled', true);
        $(this).closest('tr').find("#take-value"+index+" select").html('');
        $(this).closest('tr').find("#take-value"+index+" select").val('');
        $(this).closest('tr').find("#take-cost"+index).removeClass().addClass('givedefault');
        $(this).closest('tr').find("#take-cost"+index+" select").prop('disabled', true);
        $(this).closest('tr').find("#take-cost"+index+" select").html('');
        $(this).closest('tr').find("#take-cost"+index+" select").val('');
        $(this).closest('div').removeClass().addClass('select givesucess');
      break;
      
      case 'take-give':
        $(this).closest('tr').find("#give-cost"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#give-value"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#take-value"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#take-cost"+index+" select").prop('disabled', false);
        $(this).closest('tr').find("#give-cost"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#give-value"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#take-cost"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#take-value"+index+" select").html('<option value="">Select</option><option value="low">Low</option><option value="Medium">Medium</option><option value="High">High</option>');
        $(this).closest('tr').find("#take-value"+index).removeClass().addClass('takedanger');
        $(this).closest('tr').find("#take-cost"+index).removeClass().addClass('takedanger');
         $(this).closest('tr').find("#give-cost"+index).removeClass().addClass('givesucess');
        $(this).closest('tr').find("#give-value"+index).removeClass().addClass('givesucess');
        $(this).closest('div').removeClass().addClass('select takegive'); 
      break;
    }
  }); 
});     





    /**
     * @Created  By Gaurav Bisht
     * @Created  Date 07 January 2020
     * to add variables.
     */
 $('.addVariable').click(function(){
 	var save_only = $(this).attr('save-only');
  var validate = true;
  var select_validate = true;
   $('#VariableTable').find('tr input:enabled').each(function(){
    if($(this).val() == ""){
        validate = false; 
    }
  });

   $('#VariableTable').find('tr select:enabled').each(function(){
   	//alert($(this).val());
    if($(this).val() == null){
        select_validate = false; 
    }
  });
   if(validate && select_validate){
      store_data = [];
    var row_no = $('#VariableTable tr').length;
    for (var index = 1 ; index <= row_no ; index++ ) {
      content = {};
      content['workflow_id'] =  $('#workflow_id').val();
      content['id'] = $(".row"+index).attr("id");
      content['variable'] = $('#VariableTable').find("#variable"+index).val();
      content['take_give_status'] = $('#VariableTable').find("#select"+index+" select").val();
      content['take_value'] = $('#VariableTable').find("#take-value"+index+" select").val();
      content['take_cost'] = $('#VariableTable').find("#take-cost"+index+" select").val();
      content['give_cost'] = $('#VariableTable').find("#give-cost"+index+" select").val();
      content['give_value'] =  $('#VariableTable').find("#give-value"+index+" select").val();
      content['your_breakpoint'] = $('#VariableTable').find("#your-breakpoint"+index).val();
      content['their_breakpoint'] = $('#VariableTable').find("#their-breakpoint"+index).val();
      store_data.push(content);
    }
    
$.ajax({
        type: "POST",
        url: "<?php echo e(url('/')); ?>"+"/"+"store-variable",
        dataType: "json",
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
           "data" : store_data,
        },
        success: function(data) {
        	
            if(data.status == 'success')
	           		{
	           			$('.messages').html('<div class="alert alert-success" role="alert">Variables saved successfully!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           			if(save_only == "")
	           			{

		           			setTimeout(function(){ 
		           				$('a[href="#comm-tab"]').tab('show');
		           			 }, 3000);
	           			}
	           		}
	           		else
	           		{
	           			$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again!</div>');
	           			$("html, body").animate({ scrollTop: 0 }, "slow");
	           		}
            }
        });
    
    } else {
      $('html, body').animate({ scrollTop: 0 }, 0);
      $('.messages').html('<div class="alert alert-danger" role="alert">Please fill all the fields.</div>');
      return false;

    }
    setTimeout(function(){ 
		$('.messages').html('');	           				
 	}, 3000);
    });


// Time page js

function convert(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [date.getFullYear(), mnth, day].join("-");
}


$(".showGraph").click(function() {



    var input_validate = true;
    var select_validate = true;

    $('#TimeTable').find('tr input').each(function() {
        if ($(this).val() == "") {
            input_validate = false;
        }
    });
    $('#TimeTable').find('tr select').each(function() {
        if ($(this).val() == null) {
            select_validate = false;
        }
    });
    if (input_validate && select_validate) {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        var event_date = new Array();
       // console.log(event_date);
        event_date.push(start_date);
        event_date.push(end_date);
        $("#TimeTable tr").each(function(index, tr) {
            data = {};
            var count = index + 1;
            data['date'] = $("#date" + count).val();
            console.log(data);
            event_date.push(data);
        });

console.log(event_date);

        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/')); ?>" + "/" + "create-graph",
            dataType: "json",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "data": event_date,
            },
            success: function(data) {
            	//debugger
                var all_date = data[0];
                // console.log(all_date+"Date printing");
                var match_date = data[1];

                // console.log(match_date);
                var all_day = new Date(new Date(all_date[Object.keys(all_date).length - 1]) - new Date(all_date[0])) / (1000 * 60 * 60 * 24);
                //debugger
                console.log(all_day);
                var one_day = 100 / all_day;
                // var total_event = match_date.length;
                // var per_event = 
                $(".timeline").empty();

                var html_data ='<ul>';
                var num = 0;
                var a = 3.45;
                var b = 0;
                var previous_date = all_date[0];
                for (var j = 0; j < Object.keys(all_date).length; j++) {
                    for (var i = 0; i < Object.keys(all_date).length; i++) {
                    	// console.log(match_date[j]+"Match Date");
                    	// console.log(all_date[i]+"All Date");

                    	// if(j ==0 && i == 0){
                    	// 	match_date[j] = start_date;
                    	// 	console.log(match_date[j]);
                    	// }
                    	// if( (j ==0 && i == 0)){
                    	// 	match_date[j]
                    	// }
                        if ((match_date[j] == all_date[i])) { 
                            if (previous_date != '') {
                                var days = new Date(new Date(all_date[i]) - new Date(previous_date)) / (1000 * 60 * 60 * 24);
                                // console.log(Math.round(days));
                                // console.log(all_date[i]);
                                previous_date = match_date[j];

                            } else {
                                days = 0;
                                previous_date = match_date[j];
                            }
                            var row_no = $('#TimeTable tr').length;
                            for (var index = 1; index <= row_no; index++) {
                                content = {};
                                var new_date = $('#TimeTable').find("#date" + index).val();
                                if (new_date == match_date[j]) {
                                    var event_type = $('#TimeTable').find("#select_event" + index + " select").val();
                                console.log(event_type);
                                    switch (event_type) {
                                        case 'email':
                                            var event = "Email";
                                            var event_class = "email";
                                            break;

                                        case 'phone_call':
                                            var event = "Phone Call";
                                            var event_class = "phonecall";
                                            break;

                                        case 'face_to_face':
                                            var event = "F2F";
                                            var event_class = "f2f";
                                            break;

                                        case 'others':
                                            var event = "Others";
                                            var event_class = " ";
                                            break;
                                    }
                                }
                            }

                            var date = new Date(match_date[j]);
                            var monthNames = [
                                "Jan", "Feb", "Mar",
                                "Apr", "May", "Jun", "Jul",
                                "Aug", "Sep", "Oct",
                                "Nov", "Dec"
                            ];
                            

                            var day = date.getDate() + 1;
                            var monthIndex = date.getMonth();
                            var show_date = day + ' ' + monthNames[monthIndex];
                            // if (i == 0) {
                            //     html_data += '<li style="margin-left: 0;">';
                            // } else {
                            	//alert(start_date);
                            	//alert(end_date);
                            	//var dateFormat = ('MM-dd',new Date(start_date));

                            	//alert(dateFormat);
                            	  
                                html_data += '<li style="margin-left: ' + days * one_day + '%;">';
                            // }

                            html_data += '<span class="date">' + show_date + '</span>';
                            html_data += '<div class="dot"></div>';
                            html_data += '<span class="vr-type ' + event_class + '">' + event + '</span></li>';
                           
                            break;
                        } else {
                            //html_data += '&nbsp';
                            // b = i;
                            // console.log(b);

                            //alert(match_date[j]+'-'+all_date[i]);
                        }
                    }
                }
                html_data += '</ul>';
                 html_data += '<span class="start_date">' +start_date+'</span>'
                html_data += '<span class="end_date">' +end_date+'</span>';
                $(".timeline").append(html_data);
            }
        });
    } else {
        $('html, body').animate({
            scrollTop: 0
        }, 0);
        $('.messages').html('<div class="alert alert-info" role="alert">Complete Key Events to view graph.</div>');
        return false;
        setTimeout(function() {
            $('.messages').html('');
        }, 3000);
    }
});



    /**
     * @Created  By Gaurav Bisht
     * @Created  Date 09 January 2020
     * to add more rows one by one.
     */
$(function(){
    $('body').on('click','.addTimeButton', function() {

              var data = $("#TimeTable tr:eq(0)").clone(true).appendTo("#TimeTable");
              var rowCount = $('#TimeTable tr').length;
              data.find('td:first-child').html(rowCount);
              data.attr('id',rowCount);
              data.attr('class','row'+rowCount);
              data.find("input").val('');

              data.find("select").attr('id',rowCount);
              data.find('#date1').attr('id','date'+rowCount);
              data.find('#who1').attr('id','who'+rowCount);
              data.find('#what1').attr('id','what'+rowCount);
              data.find('#select_event1').attr('id','select_event'+rowCount);
     });
    $(document).on('click', '#removeButton', function() {
    	$('.loader-gif').show();
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
            	$.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-event",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            }
		            }
		        });
             $(this).closest("tr").remove();
           } else {
           	$('.loader-gif').hide();
           	$('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-danger" role="alert">First row cannot be deleted. Timeline must have at least 1 key event.</div>');
		          
           	setTimeout(function(){ 
				$('.messages').html('');	           				
		 	}, 3000);
             
           }
      });

    $("body").on('change','.select_key_event', function(){

    var index = this.id;
    var type = $(this).val();
    switch(type) {
      case 'face_to_face':
      	$(this).closest('tr').find("#select_event"+index).css('background','');
        $(this).closest('tr').find("#select_event"+index).attr('class','f2f');
      break;
     
      case 'email':
      $(this).closest('tr').find("#select_event"+index).css('background','');
        $(this).closest('tr').find("#select_event"+index).attr('class','email-td');
      break;
      
      case 'phone_call':
      $(this).closest('tr').find("#select_event"+index).css('background','');
        $(this).closest('tr').find("#select_event"+index).attr('class','phone-call');
      break;

      case 'others':
      $(this).closest('tr').find("#select_event"+index).css('background','');
        $(this).closest('tr').find("#select_event"+index).attr('class','others-event');
      break;
    }
  }); 
});


    /**
     * @Created  By Gaurav Bisht
     * @Created  Date 09 January 2020
     * to add events.
     */
 $('.addEvent').click(function(){
 	var save_only = $(this).attr('save-only');
	var input_validate = true;
	var select_validate = true;

   $('#TimeTable').find('tr input').each(function(){
    if($(this).val() == ""){
        input_validate = false; 
    }
  });
   $('#TimeTable').find('tr select').each(function(){
    if($(this).val() == null){
        select_validate = false; 
    }
  });
    if (input_validate && select_validate) {
    	debugger;

      store_event = [];
      var row_no = $('#TimeTable tr').length;
      for (var index = 1 ; index <= row_no ; index++ ) {
        content = {};
        content['workflow_id'] = $('#workflow_id').val();
        content['id'] = $(".row"+index).attr("id");
        console.log(content['id']);
        content['event_type'] = $('#TimeTable').find("#select_event"+index+" select").val();
        content['date'] = $('#TimeTable').find("#date"+index).val();
        content['who'] = $('#TimeTable').find("#who"+index).val();
        content['what'] = $('#TimeTable').find("#what"+index).val();
        content['start_date'] = $('#start_end_date').find("#start_date").val();
        content['end_date'] = $('#start_end_date').find("#end_date").val();
        store_event.push(content);
      }
console.log(store_event);
      $.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"store-event",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "data" : store_event,
              },
              success: function(data) {

                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
      					$('.messages').html('<div class="alert alert-success" role="alert">Events saved successfully.</div>');
      					if(save_only == '')
      					{

	      					setTimeout(function(){ 
		           				$('a[href="#risk-tab"]').tab('show');
		           			 }, 3000);
      					}
                      } else {
                          	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again.</div>');
                      }
                      
                  }
              });
    
         } else {
          $('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-info" role="alert">Please complete all fields before continuing.</div>');
          return false;
         }
         setTimeout(function(){ 
	           				$('.messages').html('');
	           			 }, 3000);
    });



 /*
 *
 * Communication tab js
 */


 $('body').on('click','.addComm', function() {
 			if ($('.getUsers').data('select2')) {
			   $('.getUsers').select2('destroy');
			 }
          	var data = $("#CommTable tr:eq(0)").clone(true).appendTo("#CommTable");
          	var rowCount = $('#CommTable tr').length;
          	data.find('td:first-child').html(rowCount);
          	data.attr('id',rowCount);
          	data.attr('class','row'+rowCount);
          	data.find("input").val('');             
          	data.find('#title1').attr('id','title'+rowCount);
          	data.find('.show_graph').attr('graph-id',rowCount);
          	data.find('#whoComm1').attr('id','whoComm'+rowCount);
          	//data.find('#linkedin1').attr('id','linkedin'+rowCount);
          	data.find('#personality1').attr('id','personality'+rowCount);
          	data.find('#decisionMaker1').attr('id','decisionMaker'+rowCount);
          	data.find('#decisionCheck1').attr('id','decisionCheck'+rowCount);
          	data.find("#decisionCheck"+rowCount).prop("checked", false);
           	data.find("#decisionType1").attr('id','decisionType'+rowCount);
           	data.find("#influenceBy1").attr('id','influenceBy'+rowCount);
           	data.find('#influenceBy'+rowCount).attr('data-select2-id','influenceBy'+rowCount);
           	data.find("#relationStatus1").attr('id','relationStatus'+rowCount);
           	data.find("#rank1").attr('id','rank'+rowCount);
           	$('#whoComm'+rowCount).removeAttr('value');
           	//$("#influenceBy"+rowCount).find(".select2").remove();
           	 $('.getUsers').select2();
          	
     });

      $('body').on('click','.addExtMsg', function() {

          	var data = $("#extMsgTable tr:eq(0)").clone(true).appendTo("#extMsgTable");
          	var rowCount = $('#extMsgTable tr').length;
          	data.find('td:first-child').html(rowCount);
          	data.attr('id',rowCount);
          	data.attr('class','row'+rowCount);
          	data.find("input").val('');   
          	
          	data.find('#exMsg1').attr('id','exMsg'+rowCount);
          	data.find('#exHowSay1').attr('id','exHowSay'+rowCount);
          	data.find('#exrecpnt1').attr('id','exrecpnt'+rowCount);
          	data.find('#exByWhom1').attr('id','exByWhom'+rowCount);
          	data.find('#exWhen1').attr('id','exWhen'+rowCount);
          	
     });

      $('body').on('click','.addIntMsg', function() {

          	var data = $("#intMsgTable tr:eq(0)").clone(true).appendTo("#intMsgTable");
          	var rowCount = $('#intMsgTable tr').length;
          	data.find('td:first-child').html(rowCount);
          	data.attr('id',rowCount);
          	data.attr('class','row'+rowCount);
          	data.find("input").val('');             
          	
          	data.find('#intMsg1').attr('id','intMsg'+rowCount);
          	data.find('#intHowSay1').attr('id','intHowSay'+rowCount);
          	data.find('#intrecpnt1').attr('id','intrecpnt'+rowCount);
          	data.find('#intByWhom1').attr('id','intByWhom'+rowCount);
          	data.find('#intWhen1').attr('id','intWhen'+rowCount);
          	
     });
      $('body').on('click','.ques', function() {
          	var data = $("#queTable tr:eq(0)").clone(true).appendTo("#queTable");
          	var rowCount = $('#queTable tr').length;
          	data.find('td:first-child').html(rowCount);
          	data.attr('id',rowCount);
          	data.attr('class','row'+rowCount);
          	data.find("textarea").val('');  
          	data.find('#ques1').attr('id','ques'+rowCount);
          	data.find('#who_to_ask1').attr('id','who_to_ask'+rowCount);
          	data.find('#how_you_ask_it1').attr('id','how_you_ask_it'+rowCount);
          	          	
     });
    $(document).on('click', '.RemoveComm', function() {
    	$('.loader-gif').show();
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
            	$.ajax({
			        type: "POST",
			        url: "<?php echo e(url('/')); ?>"+"/"+"delete-communication",
			        dataType: "json",
			        data: {
			          "_token": "<?php echo e(csrf_token()); ?>",
			           "id" : id,
			        },
			        success: function(data) {
			        	
			            if(data.status == 'success')
			            {
			            	$('.loader-gif').hide();
			            }
			            }
			        });
             $(this).closest("tr").remove();
           } else {
           	$('.loader-gif').hide();
           	$('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-danger" role="alert">First row cannot be deleted. Timeline must have at least 1 key event.</div>');
		          
           	setTimeout(function(){ 
				$('.messages').html('');	           				
		 	}, 3000);
             
           }
      });

     $(document).on('click', '.RemoveIntMsg', function() {
     	$('.loader-gif').show();
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
            	$.ajax({
			        type: "POST",
			        url: "<?php echo e(url('/')); ?>"+"/"+"delete-int-msg",
			        dataType: "json",
			        data: {
			          "_token": "<?php echo e(csrf_token()); ?>",
			           "id" : id,
			        },
			        success: function(data) {
			        	
			            if(data.status == 'success')
			            {
			            	$('.loader-gif').hide();
			            }
			            }
			        });
             $(this).closest("tr").remove();
           } else {
           	$('.loader-gif').hide();
           	$('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-danger" role="alert">First row cannot be deleted. Timeline must have at least 1 key event.</div>');
		          
           	setTimeout(function(){ 
				$('.messages').html('');	           				
		 	}, 3000);
             
           }
      });
     $(document).on('click', '.RemoveExtMsg', function() {
     	$('.loader-gif').show();
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
             $(this).closest("tr").hide();
             $.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-ext-msg",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            }
		            }
		        });
           } else {
           	$('.loader-gif').hide();
           	$('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-danger" role="alert">First row cannot be deleted. Timeline must have at least 1 key event.</div>');
		          
           	setTimeout(function(){ 
				$('.messages').html('');	           				
		 	}, 3000);
             
           }
      });

      $(document).on('click', '.RemoveQues', function() {
     	$('.loader-gif').show();
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
             $(this).closest("tr").hide();
             $.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-ques",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            }
		            }
		        });
           } else {
           	$('.loader-gif').hide();
           	$('html, body').animate({ scrollTop: 0 }, 0);
      		$('.messages').html('<div class="alert alert-danger" role="alert">First row cannot be deleted. Timeline must have at least 1 key event.</div>');
		          
           	setTimeout(function(){ 
				$('.messages').html('');	           				
		 	}, 3000);
             
           }
      });
var collabrate_user_exist = true;

$('body').on('change','.rank',function(){
	var rank = $(this).val();
	var rankint = parseInt(rank,10);
	var id = $(this).closest("tr").attr('id');
	var name = $('#whoComm'+id).val();
	
 var a = 1;
 var rank_array = [];
	// $('.addInfluenceBy').each(function() {
		//var name = $(this).val();	
		// var id = $(this).closest("tr").attr('id');
			$('.addInfluenceBy').each(function() {
			var ids = $(this).closest("tr").attr('id');
			var allname = $(this).val();
			var count = $('.addInfluenceBy').length;			
			var ranks = $('#rank'+ids).val();
			var ranksint = parseInt(ranks,10) || 0;
			if(ranksint != 0)
			{
				rank_array.push(ranksint);
			}
			if(rankint == 1)
			{
				if(allname != name && count !=1 && ranksint == (rankint+1))
				{
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				}else if(count ==1){
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				} 
			} else {
				// debugger;
				if(allname != name && count !=1 && ranksint == (rankint+1) || ranksint == (rankint-1))
				{ 
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
						$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
					}
				}
				// else if(ranksint == (rankint-1)){
				// 	$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
				// }
				else if(count ==1){
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				}
			}
		});
		a++;
	// });

});


/**
     * @Created  By Nishant Kumar
     * @Created  Date 23 January 2020
     * to add Users in influenced by dropdown and check User should not from collabrate team.
     */

$('body').on('change','.addInfluenceBy',function(){
	var current_class = $(this);
	var v = $(this).val();
	$(this).attr('value',v);
	$('.getUsers').html('<option disabled selected value>Select Option</option>');
	$('.rank').html('<option disabled selected value>Select Option</option>');
	// $('.addInfluenceBy').each(function() {
	// 	var name = $(this).val();	
	// 	var id = $(this).closest("tr").attr('id');
		
	// 	$('.addInfluenceBy').each(function() {
	// 		var allname = $(this).val();
	// 		var count = $('.addInfluenceBy').length;			
	// 		if(allname != name && count !=1)
	// 		{
	// 			$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
	// 		}else if(count ==1){
	// 			$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
	// 		}
	// 	});
	// });
var uname = current_class.val();
	$.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"check-user",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "workflow_id" : $('#workflow_id').val(),
		           "name" : uname,
		        },
		        success: function(data) {		        	        	
		            if(data.status == 'exist')
		            {	
		            	collabrate_user_exist = false;
		            	current_class.css('border','solid 1px #F00');
		            	$('html, body').animate({ scrollTop: 0 }, 0);
      					$('.messages').html('<div class="alert alert-info" role="alert">You can not enter the name of collaborate user with this workflow.</div>');		          
			    //        	setTimeout(function(){ 
							// $('.messages').html('');	           				
					 	// }, 3000);
		            	} else if(data.status == 'notexist')
		            	{
		            		$('.messages').html('');
		            		collabrate_user_exist = true;
		            	}
		            }
		        });

});

   $('body').on('change','.addInfluenceBy:last',function() {
     	//alert();
     	var rank =  '<option disabled="" selected="" value="">Select Option</option>';
            rank +='<option value="1">1</option>';
            rank +='<option value="2">2</option>';
            rank+='<option value="3">3</option>';
            rank+='<option value="4">4</option>';
            rank+='<option value="5">5</option>';
            $('.rank').html(rank);

     });
var influence_check = true;
var influencealreadyselected = true;
$(document).ready(function() {
    $('.getUsers').select2().on('change',function(e) {    	
	var id = $(this).closest("tr").attr('id');
	var rank = $('#rank'+id).val();
	var name = $(this).val();
	//alert(name);
	var j;
	var k;
	output = '';
	if(name != null)
	{
		var str = name.toString()
		var output= str.split(',');
	}

	var len = $('#CommTable tr').length;

	// for (j = 1; j <= len; j++) {
	//  var ids = $(".row"+j).closest("tr").attr('id');
	//  var userCheck = $(".row"+ids).find('.getUsers').val();
	//  var ranks = $(".row"+ids).find('.rank').val();
	//  	checkuser = '';
	 	
	// 	if(userCheck != null)
	// 	{
	// 		var str = userCheck.toString()
	// 		var checkuser= str.split(',');
	// 		//alert(checkuser.length);
			//debugger;
	// 		for (k = 0; k <= output.length; ++k) {
	// 			if(output.length == k)
	// 			{
	// 				var selectUserRank = $( "input[value='"+output[k-1]+"']").closest("tr").find('.rank').val();
					
	// 				if(rank <= ranks && output[k-1] == checkuser[k-1] && len != 1 && id != ids)
	// 				{	
	// 					$('.messages').html('<div class="alert alert-info" role="alert">You can not select this user as it is already influenced to other user.</div>');
	// 			 		$('html, body').animate({ scrollTop: 0 }, 0);
	// 			 		$(this).css('border','solid 1px #F00');
	// 			 		influencealreadyselected = false;
	// 			 		return false;
	// 				}
	// 				else
	// 			 	{
	// 			 		$('.messages').html('');
	// 			 		$(this).css('border','solid 0px #F00');
	// 			 		influencealreadyselected = true;
	// 			 	}
	// 			}

	// 		}
	// 	}

	// }
	
	 var i;
	for (i = 0; i < output.length; ++i) {
	 var rankCheck = $( "input[value='"+output[i]+"']").closest("tr").find('.rank').val();
	 var checknear = parseInt(rankCheck,10);
	 var near = parseInt(rank,10);
	 //alert(near+1); alert(rankCheck);
    if(near == 1)
	 {	 
	 	if(checknear != (near+1))
	 	{	
	 		$('.messages').html('<div class="alert alert-info" role="alert">A user can only influence by your nearest rank\'s user</div>');
	 		$('html, body').animate({ scrollTop: 0 }, 0);
	 		$(this).css('border','solid 1px #F00');
	 		influence_check = false;
	 		return false;
	 	}
	 	else
	 	{
	 		$('.messages').html('');
	 		$(this).css('border','solid 0px #F00');
	 		influence_check = true;
	 	}
	 }else
	 {
	 	if(checknear != (near+1) && checknear != (near-1))
	 	{	
	 		$('.messages').html('<div class="alert alert-info" role="alert">A user can only influence by your nearest rank\'s user</div>');	
	 		$('html, body').animate({ scrollTop: 0 }, 0);
	 		$(this).css('border','solid 1px #F00');
	 		influence_check = false;
	 		return false;
	 	}
	 	else
	 	{
	 		$('.messages').html('');
	 		$(this).css('border','solid 0px #F00');
	 		influence_check = true;
	 	}
	 }
	} 
	
	 
    });
});



$(document).ready(function() {		
	//$('.getUsers').html('<option disabled selected value>Select Option</option>');
	// $('.addInfluenceBy').each(function() {
	// 	var name = $(this).val();		
	// 	var id = $(this).closest("tr").attr('id');		
	// 	var selected = $(this).closest('tr').find('.getUsers').val();				
	// 	$('.addInfluenceBy').each(function() {
	// 		var allname = $(this).val();
	// 		var count = $('.addInfluenceBy').length;
	// 		if(allname != name && allname != selected && count !=1)
	// 		{
	// 			var selvalue = "";
	// 			if(selected == allname)
	// 			{
	// 				selvalue = 'selected';
	// 			}
	// 			//$('#influenceBy'+id).html('');
	// 			$('#influenceBy'+id).append('<option value="'+allname+'" '+selvalue+'>'+allname+'</option>');
	// 		}
	// 	});
	// });


	$('.rank').each( function(){
	var rank = $(this).val();
	var rankint = parseInt(rank,10);
	var id = $(this).closest("tr").attr('id');
	var name = $('#whoComm'+id).val();
	
 var a = 1;
 var rank_array = [];
	// $('.addInfluenceBy').each(function() {
		//var name = $(this).val();	
		// var id = $(this).closest("tr").attr('id');
			$('.addInfluenceBy').each(function() {
			var ids = $(this).closest("tr").attr('id');
			var allname = $(this).val();
			var count = $('.addInfluenceBy').length;			
			var ranks = $('#rank'+ids).val();
			var ranksint = parseInt(ranks,10) || 0;
			if(ranksint != 0)
			{
				rank_array.push(ranksint);
			}
			if(rankint == 1)
			{
				if(allname != name && count !=1 && ranksint == (rankint+1))
				{
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				}else if(count ==1){
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				} 
			} else {
				// debugger;
				if(allname != name && count !=1 && ranksint == (rankint+1) || ranksint == (rankint-1))
				{ 
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
						$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
					}
				}
				// else if(ranksint == (rankint-1)){
				// 	$('#influenceBy'+id).append('<option value="'+allname+'">'+allname+'</option>');
				// }
				else if(count ==1){
					if(a == 1)
					{
						$('#influenceBy'+ids).append('<option value="'+name+'">'+name+'</option>');
					}
				}
			}
		});
		a++;
	// });

});


});

$("body").on('click',"input[name='decisionmk[]']", function() {
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
      /**
     * @Created  By Gaurav Bisht
     * @Created  Date 09 January 2020
     * to add events.
     */
 $('.addCommunicaton').click(function(){
  var save_only = $(this).attr('save-only');
  var input_validate = true;
  var select_validate = true;
  var userexist = true;
  var influenceBy = true;
  var alreadyselected = true;
  var error = '';
	$('input').css('border','0px');
	$('select').css('border','0px');
  //  $('#CommTable').find('tr input').each(function(){
  //   if($(this).val() == ""){
  //   	$(this).css('border','solid 1px #F00');
  //       input_validate = false; 
  //   }
  // });
if(!collabrate_user_exist)
{
	userexist = false; 
}
if(!influence_check)
{
	influenceBy = false; 
}
if(!influencealreadyselected)
{
	alreadyselected = false; 
}
   $('#CommTable').find('tr select').each(function(){
    if($(this).val() == null){
    	$(this).css('border','solid .5px #F00');
        select_validate = false; 
        error = 'comm select';
    }
  });
   $('#extMsgTable').find('tr input').each(function(){
    if($(this).val() == ""){
    	$(this).css('border','solid 1px #F00');
        input_validate = false; 
        error = 'ext msg';
    }
  });
   $('#intMsgTable').find('tr input').each(function(){
    if($(this).val() == ""){
    	$(this).css('border','solid 1px #F00');
        input_validate = false; 
        error = 'int msg';
    }
  });

    $('#queTable').find('tr input').each(function(){
    if($(this).val() == ""){
    	$(this).css('border','solid 1px #F00');
        input_validate = false; 
        error = 'int msg';
    }
  });

    if (input_validate && select_validate && influenceBy) {
      key_players = [];
      ext_msg = [];
      int_msg = [];
      ques = [];
      var row_no = $('#CommTable tr').length;
      for (var index = 1 ; index <= row_no ; index++ ) {
        content = {};
        content['workflow_id'] = $('#workflow_id').val();
        content['id'] = $(".row"+index).attr("id");
        content['whoComm'] = $('#CommTable').find("#whoComm"+index).val();
        content['title'] = $('#CommTable').find("#title"+index).val();
        //content['linkedin'] = $('#CommTable').find("#linkedin"+index).val();
        content['personality'] = $('#CommTable').find("#personality"+index).val();
        content['decisionMaker'] = "";
        if($('#CommTable').find("#decisionCheck"+index).prop('checked'))
        {	
        	content['decisionMaker'] = $('#CommTable').find("#decisionCheck"+index).val();
        }
        content['decisionType'] = $('#CommTable').find("#decisionType"+index).val();
        content['influenceBy'] = $('#CommTable').find("#influenceBy"+index).val();
        content['relationStatus'] = $('#CommTable').find("#relationStatus"+index).val();
        content['rank'] = $('#CommTable').find("#rank"+index).val();
        key_players.push(content);
      }
//console.log(key_players);
       var extMsgCount = $('#extMsgTable tr').length;
      for (var index = 1 ; index <= extMsgCount ; index++ ) {
        content = {};
        content['workflow_id'] = $('#workflow_id').val();
        content['id'] = $(".row"+index).attr("id");
        content['exMsg'] = $('#extMsgTable').find("#exMsg"+index).val();
        content['exHowSay'] = $('#extMsgTable').find("#exHowSay"+index).val();
        content['exrecpnt'] = $('#extMsgTable').find("#exrecpnt"+index).val();
        content['exByWhom'] = $('#extMsgTable').find("#exByWhom"+index).val();
        content['exWhen'] = $('#extMsgTable').find("#exWhen"+index).val();
        ext_msg.push(content);
      }

      var intMsgCount = $('#intMsgTable tr').length;
      for (var index = 1 ; index <= extMsgCount ; index++ ) {
        content = {};
        content['workflow_id'] = $('#workflow_id').val();
        content['id'] = $(".row"+index).attr("id");
        content['intMsg'] = $('#intMsgTable').find("#intMsg"+index).val();
        content['intHowSay'] = $('#intMsgTable').find("#intHowSay"+index).val();
        content['intrecpnt'] = $('#intMsgTable').find("#intrecpnt"+index).val();
        content['intByWhom'] = $('#intMsgTable').find("#intByWhom"+index).val();
        content['intWhen'] = $('#intMsgTable').find("#intWhen"+index).val();
        int_msg.push(content);
      }

       var queTable = $('#queTable tr').length;
      for (var index = 1 ; index <= extMsgCount ; index++ ) {
        content = {};
        content['workflow_id'] = $('#workflow_id').val();
        content['id'] = $(".row"+index).attr("id");
        content['ques'] = $('#queTable').find("#ques"+index).val();
        content['who_to_ask'] = $('#queTable').find("#who_to_ask"+index).val();
        content['how_you_ask_it'] = $('#queTable').find("#how_you_ask_it"+index).val();
        ques.push(content);
      }
     
 //console.log(ext_msg);return false;
      $.ajax({
              type: "POST",
              url: "<?php echo e(route('store-communication')); ?>",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "key_players" : key_players,
                 "ext_msg" : ext_msg,
                 "int_msg" : int_msg,
                 "ques" : ques,
              },
              success: function(data) {
              	//console.log(data);
              	 location.reload();
                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
      					$('.messages').html('<div class="alert alert-success" role="alert">Communication saved successfully.</div>');

      					if(save_only == '')
      					{

	      					setTimeout(function(){ 
		           				$('a[href="#time-tab"]').tab('show');
		           			 }, 3000);
      					}
                      } else {
                          	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again.</div>');
                      }
                      
                  }
              });
    
         } 
         else if(!userexist){
         	$('html, body').animate({ scrollTop: 0 }, 0);
         	$('.messages').html('<div class="alert alert-info" role="alert">You can not enter the name of collaborate user with this workflow.</div>');
         } 
         else{
         	$('html, body').animate({ scrollTop: 0 }, 0);
         	if(!influenceBy)
         	{
         		$('.messages').html('<div class="alert alert-info" role="alert">A user can only influence by your nearest rank\'s user</div>'); 
         	}else if(!alreadyselected)
         	{
         		$('.messages').html('<div class="alert alert-info" role="alert">You can not select this user as it is already influenced to other user.</div>'); 
         	}
         	else{
	          
	      		$('.messages').html('<div class="alert alert-info" role="alert">Please complete all fields before continuing.</div>'); 
      		}
      		return false;
         }
         setTimeout(function(){ 
	           				$('.messages').html('');
	           			 }, 3000);
    });

/**
     * @Created  By Nishant Kumar
     * @Created  Date 16 January 2020
     * to get personality data on click of show personality button.
     */
		$('body').on('click','.show_graph',function() {
			$('.loader-gif').show();
		var graph_id = $(this).attr('graph-id');
		var linkedin_url = $('#linkedin'+graph_id).val();
		$.ajax({
           	type: "POST",
           	url: "<?php echo e(url('/')); ?>/personality",
           	data: {
		        "_token": "<?php echo e(csrf_token()); ?>",
		         "linkedin_url" : linkedin_url,
		         
		      },
		      cache: false,
		      success: function(data) {
		      	$('.loader-gif').hide();
		      	var obj = JSON.parse(data);
		         var per_type = '';
		         if(obj.data.personalities.disc_type == 'Di')
		         {
		         	per_type = "Driver";
		         }
		         else if(obj.data.personalities.disc_type == "DI")
		         {
		         	per_type = "Initiator";
		         }
		         else if(obj.data.personalities.disc_type == "Id")
		         {
		         	per_type = "Influencer";
		         }
		         else if(obj.data.personalities.disc_type == "Is")
		         {
		         	per_type = "Encourager";
		         }
				else if(obj.data.personalities.disc_type == "IS")
		         {
		         	per_type = "Harmonizer";
		         }
		         else if(obj.data.personalities.disc_type == "Si")
		         {
		         	per_type = "Counselor";
		         }
		         else if(obj.data.personalities.disc_type == "S")
		         {
		         	per_type = "Supporter";
		         }
				else if(obj.data.personalities.disc_type == "SC")
		         {
		         	per_type = "Stabilizer";
		         }
		         else if(obj.data.personalities.disc_type == "Cs")
		         {
		         	per_type = "Editor";
		         }
		         else if(obj.data.personalities.disc_type == "C")
		         {
		         	per_type = "Analyst";
		         }
		         else if(obj.data.personalities.disc_type == "Cd")
		         {
		         	per_type = "Skeptic";
		         }
		         else if(obj.data.personalities.disc_type == "CD")
		         {
		         	per_type = "Questioner";
		         }
				else if(obj.data.personalities.disc_type == "Dc")
		         {
		         	per_type = "Architech";
		         }
		         else if(obj.data.personalities.disc_type == "D")
		         {
		         	per_type = "Captain";
		         }
		         var i = 0;
		         $('.data-content').each(function() {
		         	if(i==0){
		         		$(this).text(obj.data.content.profile.qualities);
		         	}
		         	if(i==1){
		         		$(this).text(obj.data.content.behavior.phrases);
		         	}if(i==2){
		         		$(this).text(obj.data.content.motivations.phrases);
		         	}if(i==3){
		         		$(this).text(obj.data.content.drains.qualities);
		         	}if(i==4){
		         		$(this).text(obj.data.content.communication.phrases);
		         	}if(i==5){
		         		$(this).text(obj.data.content.meeting.phrases);
		         	}
		         	
		         	i++;
		         });
	            $('.profile_name').text(obj.data.first_name);
	            $('.profile_type').text(per_type);
	            $('.profile_img').attr('src',obj.data.photo_url);
	            $('.personality_graph').attr('src',obj.data.images.disc_map);
		              $('#profileGraph').modal('show'); 
		          }
		      });
		});
		/**
     * @Created  By Nishant Kumar
     * @Created  Date 16 January 2020
     * to get personality type while user input linkedin url.
     */
		$('body').on('change','.get_personality',function(){
			$('.loader-gif').show();
			var id = $(this).attr('data-id');
			var linkedin_url = $(this).val();
			if(linkedin_url != '')
			{
				$.ajax({
           	type: "POST",
           	url: "<?php echo e(url('/')); ?>/personality",
           	data: {
		        "_token": "<?php echo e(csrf_token()); ?>",
		         "linkedin_url" : linkedin_url,
		         
		      },
		      cache: false,
		      success: function(data) {
		      	$('.loader-gif').hide();
		      	var obj = JSON.parse(data);
		         var per_type = '';
		         
		         if(obj.data.personalities.disc_type == 'Di')
		         {
		         	per_type = "Driver";
		         }
		         else if(obj.data.personalities.disc_type == "DI")
		         {
		         	per_type = "Initiator";
		         }
		         else if(obj.data.personalities.disc_type == "Id")
		         {
		         	per_type = "Influencer";
		         }
		         else if(obj.data.personalities.disc_type == "Is")
		         {
		         	per_type = "Encourager";
		         }
				else if(obj.data.personalities.disc_type == "IS")
		         {
		         	per_type = "Harmonizer";
		         }
		         else if(obj.data.personalities.disc_type == "Si")
		         {
		         	per_type = "Counselor";
		         }
		         else if(obj.data.personalities.disc_type == "S")
		         {
		         	per_type = "Supporter";
		         }
				else if(obj.data.personalities.disc_type == "SC")
		         {
		         	per_type = "Stabilizer";
		         }
		         else if(obj.data.personalities.disc_type == "Cs")
		         {
		         	per_type = "Editor";
		         }
		         else if(obj.data.personalities.disc_type == "C")
		         {
		         	per_type = "Analyst";
		         }
		         else if(obj.data.personalities.disc_type == "Cd")
		         {
		         	per_type = "Skeptic";
		         }
		         else if(obj.data.personalities.disc_type == "CD")
		         {
		         	per_type = "Questioner";
		         }
				else if(obj.data.personalities.disc_type == "Dc")
		         {
		         	per_type = "Architech";
		         }
		         else if(obj.data.personalities.disc_type == "D")
		         {
		         	per_type = "Captain";
		         }
		        
		      		$('#personality'+id).val(per_type);
		          }
		      });
			}
		});
		/**
     * @Created  By Nishant Kumar
     * @Created  Date 16 January 2020
     * to Clone workflow form.
     */
		 $('body').on('click','.addworkFlowButton', function() {

          	var data = $("#cloneWorkflow .wokflow_form:eq(0)").clone(true).appendTo("#cloneWorkflow");
          	var rowCount = $('.wokflow_form').length;
          	
          	data.find("input").val('');             
          	data.find('#workflowemail1').attr('id','workflowemail'+rowCount);
          	data.find('#read1').attr('id','read'+rowCount);
          	data.find('.read').val(0);
          	data.find('.write').val(1);
          	data.find('#readlabel1').attr('for','read'+rowCount);
          	data.find('#write1').attr('id','write'+rowCount);
          	data.find('#writelabel1').attr('for','write'+rowCount);
          	data.find('.removeWorkFlowButton').removeClass('hideRemoveButton');


          	var data = $("#ucloneWorkflow .uwokflow_form:eq(0)").clone(true).appendTo("#ucloneWorkflow");
          	var rowCount = $('.uwokflow_form').length;
          	
          	           
          	data.find('#uworkflowemail1').attr('id','workflowemail'+rowCount);
          	data.find('#uread1').attr('id','uread'+rowCount);
          	data.find('.read').val(0);
          	data.find('.write').val(1);
          	data.find('#ureadlabel1').attr('for','uread'+rowCount);
          	data.find('#uwrite1').attr('id','uwrite'+rowCount);
          	data.find('#uwritelabel1').attr('for','uwrite'+rowCount);
          	data.find('.removeWorkFlowButton').removeClass('hideRemoveButton');
          	
     });
	/**
     * @Created  By Nishant Kumar
     * @Created  Date 16 January 2020
     * to Remove workflow form.
     */
	  $(document).on('click', '.removeWorkFlowButton', function() {
         var trIndex = $(this).closest(".wokflow_form").index();
         $(this).closest(".wokflow_form").remove();    
      });
/**
     * @Created  By Nishant Kumar
     * @Created  Date 16 January 2020
     * to Create Workflow.
     */
 $('#createWorkflow').click(function(){
  var input_validate = true;
  var select_validate = true;
  var email = true;
  $('input').css('border','0px');
	$('select').css('border','0px');
   var name = $('#workFlowName').val();
   if(name == '')
   {
   		$('#workFlowName').css('border','solid 1.5px #F00');
   		input_validate = false;
   }
   $('.wokflow_form input:text').each(function(){   	
    if($(this).val() == ''){
    	$(this).css('border','solid 1.5px #F00');
        input_validate = false; 
    }
  });
   $('.email').each(function() {
   	if($(this).val() != ''){
   		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  if(!regex.test($(this).val())) {
			  	$('.workflowmessages').html('<div class="alert alert-info" role="alert">Please enter a valid email.</div>');	      		
		    	$(this).css('border','solid 1.5px #F00');        		
        		setTimeout(function(){ 
	   				$('.workflowmessages').html('');
   			 	}, 3000);
        		email = false;
   			 	// /input_validate = false;
		  }
		}
   });
  //  $('.wokflow_form input:checkbox').each(function(){ 
  //   if($(this).val() == ''){
  //   	$(this).css('border','solid 1.5px #F00');
  //       input_validate = false; 
  //   }
  // });
    if (input_validate && select_validate) {
      store_workflow = [];
      var row_no = $('.wokflow_form').length;
      for (var index = 1 ; index <= row_no ; index++ ) {
      	var read = "";
      	var write = "";
      	if($('#cloneWorkflow').find("#read"+index).is(':checked'))
      	{
      		read = $('#cloneWorkflow').find("#read"+index).val();
      	}
      	if($('#cloneWorkflow').find("#write"+index).is(':checked'))
      	{
      		write = $('#cloneWorkflow').find("#write"+index).val();
      	}
        content = {};        
        content['email'] = $('#cloneWorkflow').find("#workflowemail"+index+"").val();
        content['readaccess'] = read;
        content['writeaccess'] = write;
        
        store_workflow.push(content);
      }
     
// console.log(store_event);return false;
      $.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"store-workflow",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "name" : name,
                 "data" : store_workflow,
              },
              success: function(data) {
                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
      					$('.workflowmessages').html('<div class="alert alert-success" role="alert">Project added, notification sent</div>');
      					$('input').val('');
      					$('checkbox').prop('checked', false);
      					setTimeout(function(){ 
	           				$('.workflowmessages').html('');
	           				location.reload();
	           			 }, 3000);
                      } else if(data.status == "email_not_exist"){

                      	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.workflowmessages').html('<div class="alert alert-danger" role="alert">('+data.email+') This email is not registered with us.</div>');
                      }
                       else {
                          	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.workflowmessages').html('<div class="alert alert-danger" role="alert">Error: Please try again.</div>');
                      }
                      
                      
                  }
              });
    
         } else {
          $('html, body').animate({ scrollTop: 0 }, 0);
          var msg = 'Please complete all fields before continuing.';
          if(!email)
          {
          	msg = "Please enter a valid email."
          }
      		$('.workflowmessages').html('<div class="alert alert-info" role="alert">'+msg+'</div>');
      		setTimeout(function(){ 
	           				$('.workflowmessages').html('');
	           			 }, 3000);
          return false;
         }
         				
    });
	/**
     * @Created  By Nishant Kumar
     * @Created  Date 17 January 2020
     * to delete Workflow.
     */
     $('.delete_workflow').click(function() {
     	var id = $(this).attr('data-id');
 	if (confirm("Are you sure, You want to delete this Workflow ?")) {
     	$.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"delete-workflow",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "id" : id,
              },
              success: function(data) {
                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
      					$('.messages').html('<div class="alert alert-success" role="alert">Workflow has been deleted successfully.</div>');
      					
                      } else {
                          	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again.</div>');
                      }
                      setTimeout(function(){ 
	           				$('.messages').html('');
	           				location.reload();
	           			 }, 2000);
                      
                  }
              });
     }
     });
     /**
     * @Created  By Nishant Kumar
     * @Created  Date 17 January 2020
     * to delete Workflow users.
     */
     $('.delete_work_user').click(function() {
     	var id = $(this).attr('data-id');
 	if (confirm("Are you sure, You want to delete this user ?")) {
     	$.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"delete-workflow-user",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "id" : id,
              },
              success: function(data) {
                  if (data.status == "success") {
                          $('html, body').animate({ scrollTop: 0 }, 0);
      					$('.messages').html('<div class="alert alert-success" role="alert">Workflow has been deleted successfully.</div>');
      					
                      } else {
                          	$('html, body').animate({ scrollTop: 0 }, 0);
  							$('.messages').html('<div class="alert alert-danger" role="alert">Error: Please try again.</div>');
                      }
                      setTimeout(function(){ 
	           				$('.messages').html('');
	           				location.reload();
	           			 }, 2000);
                      
                  }
              });
     }
     });

	/**
     * @Created  By Nishant Kumar
     * @Created  Date 17 January 2020
     * to get workflow by id.
     */
     $('.getWorkflow').click(function() {
     	$('.loader-gif').show();
     	var id = $(this).attr('data-id');
 	
     	$.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"get-workflow",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "id" : id,
              },
              success: function(data) {
                  if (data.success == "success") {
                  			$('.loader-gif').hide();
                          $('#uworkFlowName').val(data.name);
                          $('#workflowid').val(data.id);
      						$('#editworkFlow').modal('show');
      					
                      } 
                      
                      
                  }
              });
     
     });
     /**
     * @Created  By Nishant Kumar
     * @Created  Date 17 January 2020
     * to get workflow by id.
     */
    $('#editWorkflowName').click(function () {
    var status = true;
    var email = true;
    var id = $('#workflowid').val();
    var name = $('#uworkFlowName').val();
    //alert(name);
    if (name == '') {
        status = false;
    }

    $('.uemail').each(function () {
        if ($(this).val() != '') {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test($(this).val())) {
                $('.workflowmessages').html('<div class="alert alert-info" role="alert">Please enter a valid email.</div>');
                $(this).css('border', 'solid 1.5px #F00');
                setTimeout(function () {
                    $('.workflowmessages').html('');
                }, 3000);
                email = false;
                // /input_validate = false;
            }
        }
    });

    if (status) {

        if (email) {
            store_workflow = [];
            var row_no = $('.uwokflow_form').length;
            for (var index = 1; index <= row_no; index++) {
                var read = "";
                var write = "";
                if ($('#ucloneWorkflow').find("#uread" + index).is(':checked')) {
                    read = $('#ucloneWorkflow').find("#uread" + index).val();
                }
                if ($('#ucloneWorkflow').find("#uwrite" + index).is(':checked')) {
                    write = $('#ucloneWorkflow').find("#uwrite" + index).val();
                }
                content = {};
                content['email'] = $('#ucloneWorkflow').find("#uworkflowemail" + index + "").val();
                content['readaccess'] = read;
                content['writeaccess'] = write;

                store_workflow.push(content);
            }
            
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('/')); ?>" + "/" + "edit-workflow-name",
                dataType: "json",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": id,
                    "name": name,
                    "data": store_workflow,
                },
                success: function (data) {
                    if (data.status == "success") {
                        $('.wnamemessages').html('<div class="alert alert-success" role="alert">Users added and Sent notification successfully.</div>');
                        setTimeout(function () {
                            $('.wnamemessages').html('');
                            $('#editworkFlow').modal('hide');
                            location.reload();
                        }, 2000);
                    }

                    if(data.status=="error"){
                    	$('.wnamemessages').html('<div class="alert alert-danger" role="alert">User not available</div>');
                        setTimeout(function () {
                            $('.wnamemessages').html('');
                            // location.reload();
                        }, 2000);

                    }


                }
            });
        }
    } else {
        $('.wnamemessages').html('<div class="alert alert-info" role="alert">Please enter the name befor continuing.</div>');
        setTimeout(function () {
            $('.wnamemessages').html('');
        }, 2000);
    }

});
    
      /**
     * @Created  By Nishant Kumar
     * @Created  Date 20 January 2020
     * to get workflow user by id.
     */
     $('.getWorkflowUser').click(function() {
     	$('.loader-gif').show();
     	var id = $(this).attr('data-id');
 	
     	$.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"get-workflow-user",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "id" : id,
              },
              	success: function(data) {
              		$('.loader-gif').hide();
                  	if (data.success == "success") {
	                  	if(data.readaccess == 0)
	                  	{
	                  		$('#read').prop('checked', true);
	                  	}
	                  	if(data.writeaccess == 1)
	                  	{
	                  		$('#write').prop('checked', true);
	                  	}     
	                  	$('#workflowuserid').val(data.id);
						$('#editworkFlowUser').modal('show');
      					
                  	} 
                      
                      
                  }
              });
     });
     /**
     * @Created  By Nishant Kumar
     * @Created  Date 20 January 2020
     * to edit workflow user by id.
     */
     $('#editWorkflowUser').click(function() {
     	status = true;
     	var read = "";
      	var write = "";
      	var id = $('#workflowuserid').val();
      	if($("#read").is(':checked'))
      	{
      		read = $("#read").val();
      		
      	}
      	if($("#write").is(':checked'))
      	{
      		write = $("#write").val();
      		
      	}
 		if(read == '' || write == '')
 		{
 			status = false;
 		}
 		if(status)
 		{
     	$.ajax({
              type: "POST",
              url: "<?php echo e(url('/')); ?>"+"/"+"edit-workflow-user",
              dataType: "json",
              data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                 "id" : id,
                 "read" : read,
                 "write" : write,
              },
              success: function(data) {
                  if (data.status == "success") {
						$('.wnamemessages').html('<div class="alert alert-success" role="alert">Workflow updated successfully.</div>');
						
      					setTimeout(function(){
      					 $('.wnamemessages').html('');
      					 $('#editworkFlow').modal('hide');
      					 location.reload();
      					  }, 2000);
                      } 
                      
                      
                  }
              });
     	}
     	else
     	{
     		$('.wnamemessages').html('<div class="alert alert-info" role="alert">Please select access rights.</div>');
     		setTimeout(function(){ $('.wnamemessages').html(''); }, 2000);
     	}
     	
     });



     /**
     * @Created  By Gaurav Bisht
     * @Created  Date 17 January 2020
     * add js for execute tab section.
     */
$(function(){
    if ($("#yourTableBody").find('.your_offer').val()) {
    	$(".addYourMoreOffer").prop('disabled', true);
        $(".removeYourMoreOffer").prop('disabled', true);
    }
    if ($("#theirTableBody").find('.their_offer').val()) {
    	$(".addTheirMoreOffer").prop('disabled', true);
        $(".removeTheirMoreOffer").prop('disabled', true);
    }
    
    $('.addYourMoreOffer').click(function() {	
		var my_rows = $('#yourTableBody tr').length;
		var my_cols = $('#yourTableBody tr td').length;
		var offer = $(".firstRow1 td").length;
		var no_of_offer = offer-1; 
		var cols = my_cols+1;
		$("#yourTableHeaderOuter th").attr('colspan',cols);
		var inner_header = $('#yourTableHeaderInner');
		var innerHeaderContentToAppend = '<th scope="col" class="text-center text-nowrap offer-td"><a class="addYourMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer '+no_of_offer+'<a class="removeYourMoreOffer"><span class="fas fa-times-circle f12"></span></a></th>';
		var table = $('#yourTableBody');
		var rowContentToAppend = '<td><input type="text" id="your_offer'+no_of_offer+'"  class="form-control your_offer"></td>';
		inner_header.find('th').eq(no_of_offer-1).after(innerHeaderContentToAppend);
		table.find("tr").each(function() {
		      $(this).find('td').eq(no_of_offer-1).after(rowContentToAppend); 
		  });
		// $(".firstRow1").attr('id','row'+my_rows);
});
     $(document).on('click', '.removeYourMoreOffer', function() {
         var trIndex = $(this).closest("th").index();
            if(trIndex>1) {
              var colspan = $("#yourTableHeaderOuter th").attr('colspan');
         	  $("#yourTableHeaderOuter th").attr('colspan',colspan-1);
             $(this).closest("th").remove();
             $("#yourTableBody tr").find('td').eq(trIndex).remove(); 
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $(".messages").addClass("alert alert-danger")
             $('.messages').html('You can not remove yours first column.').fadeIn('slow');
             $(".messages").fadeOut(5000)
           }
      });
	$(document).on('click','.addOfferRow', function() {
              var data = $("#yourTableBody tr:eq(0)").clone(true).appendTo("#yourTableBody");
              $(".addYourMoreOffer").prop('disabled', true);
              $(".removeYourMoreOffer").prop('disabled', true);
              data.attr('id','');
              data.attr('class','');
              data.find("input").val('');
     });
    $(document).on('click', '.removeOfferRow', function() {
         var trIndex = $(this).closest("tr").index();
         		if ($("#yourTableBody").find('.your_offer').val()) {
			    	$(".addYourMoreOffer").prop('disabled', true);
			        $(".removeYourMoreOffer").prop('disabled', true);
			    }
			    
            if(trIndex>=1) {	 
              if ((trIndex>=1) && (!$("#yourTableBody").find('.your_offer').val())) {
              	$(".addYourMoreOffer").prop('disabled', false);
              $(".removeYourMoreOffer").prop('disabled', false);
              }
             $(this).closest("tr").remove();
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $(".messages").addClass("alert alert-danger")
             $('.messages').html('Yours First row cannot be deleted.').fadeIn('slow');
             $(".messages").fadeOut(5000)
           }
      });
    //////////////////////////////////////////////////////////
    $('.addTheirMoreOffer').click(function() {
		var my_rows = $('#theirTableBody tr').length;
		var my_cols = $('#theirTableBody tr td').length;
		var offer = $(".firstTheirRow1 td").length;
		var no_of_offer = offer-1; 
		var cols = my_cols+1;
		$("#theirTableHeaderOuter th").attr('colspan',cols);
		var inner_header = $('#theirTableHeaderInner');
		var innerHeaderContentToAppend = '<th scope="col" class="text-center text-nowrap offer-td"><a class="addTheirMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer '+no_of_offer+'<a class="removeTheirMoreOffer"><span class="fas fa-times-circle f12"></span></a></th>';
		var table = $('#theirTableBody');
		var rowContentToAppend = '<td><input type="text" id="their_offer'+no_of_offer+'" class="form-control their_offer"></td>';
		inner_header.find('th').eq(no_of_offer-1).after(innerHeaderContentToAppend);
		table.find("tr").each(function() {
		      $(this).find('td').eq(no_of_offer-1).after(rowContentToAppend); 
		  });
		// $(".firstTheirRow1").attr('id','rowTheir'+my_rows);
});
     $(document).on('click', '.removeTheirMoreOffer', function() {
         var trIndex = $(this).closest("th").index();
        if(trIndex>1) {
          var colspan = $("#theirTableHeaderOuter th").attr('colspan');
     	  $("#theirTableHeaderOuter th").attr('colspan',colspan-1);
         $(this).closest("th").remove();
         $("#theirTableBody tr").find('td').eq(trIndex).remove(); 
       } else {
         $('html, body').animate({ scrollTop: 0 }, 0);
         $(".messages").addClass("alert alert-danger")
         $('.messages').html('You can not remove theirs first column.').fadeIn('slow');
         $(".messages").fadeOut(5000)
       }
      });
	$(document).on('click','.addTheirOfferRow', function() {
              var data = $("#theirTableBody tr:eq(0)").clone(true).appendTo("#theirTableBody");
                 $(".addTheirMoreOffer").prop('disabled', true);
              $(".removeTheirMoreOffer").prop('disabled', true);
              data.attr('id','');
              data.attr('class','');
              data.find("input").val('');
              data.find("input:first").attr('id',' ').attr('id','their_variable1');
              data.find("input:last").attr('id',' ').attr('id','their_aligned1');
              data.find(".their_offer").attr('id',' ').attr('id','their_offer1');
     });
    $(document).on('click', '.removeTheirOfferRow', function() {
         var trIndex = $(this).closest("tr").index();
         		if ($("#theirTableBody").find('.their_offer').val()) {
			    	$(".addTheirMoreOffer").prop('disabled', true);
			        $(".removeTheirMoreOffer").prop('disabled', true);
			    }
            if(trIndex>=1) {
            	if ((trIndex>=1) && (!$("#theirTableBody").find('.their_offer').val())) {
            		$(".addTheirMoreOffer").prop('disabled', false);
			        $(".removeTheirMoreOffer").prop('disabled', false);
            	}
             $(this).closest("tr").remove();
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $(".messages").addClass("alert alert-danger")
             $('.messages').html('Theirs First row cannot be deleted.').fadeIn('slow');
             $(".messages").fadeOut(5000)
           }
      });
    $(".addMoreOffer").click(function(){
    	  var save_only = $(this).attr('save-only');
		  var steps_input_offer = true;
		  var workflow_id = $('#workflow_id').val();
		  var worked_well = $('#worked_well').val();
		  var done_better = $('#done_better').val();
		  	$('#stepsTableBody').find('tr input').each(function(){
		    if($(this).val() == ""){
		        steps_input_offer = false; 
		    }
		  	});
		  	if (steps_input_offer) 
		  	{
		  		
		  		steps_offer = [];
			  	
			  	
			  	$("#stepsTableBody tr").each(function(index, tr){
			        steps_content = {};
			        if (this.id) {
			            no = this.id;
			            steps_content['id'] = this.id;
			            steps_content['who'] = $(this).find(".who"+no).val();
			            steps_content['what'] = $(this).find(".what"+no).val();
			            steps_content['when'] = $(this).find(".when"+no).val();
			            steps_content['status'] = 'step';
			            steps_offer.push(steps_content);
			        } else {
			            steps_content['id'] = this.id;
			            steps_content['who'] = $(this).find(".who1").val();
			            steps_content['what'] = $(this).find(".what1").val();
			            steps_content['when'] = $(this).find(".when1").val();
			            steps_content['status'] = 'step';
			            steps_offer.push(steps_content);
			        }
          });
				 $.ajax({
			        type: "POST",
			        url: "<?php echo e(url('/')); ?>"+"/"+"store-offer",
			        dataType: "json",
			        data: {
			        	"_token" : "<?php echo e(csrf_token()); ?>",			           
			           "steps_data" : steps_offer,
			           "worked_well" : worked_well,
			           "done_better" : done_better,
			           "workflow_id" : workflow_id,
			        },
			        success: function(data) {
			            if (data.status == "success") {
			                    $('html, body').animate({ scrollTop: 0 }, 0);
			                    $(".messages").addClass("alert alert-success")
			                    $('.messages').html(data.message).fadeIn('slow');
			                    $(".messages").fadeOut(5000);

			                } else {
			                    $(".messages").addClass("alert alert-danger")
			                    $('.messages').html(data.message).fadeIn('slow');
			                    $(".messages").fadeOut(5000)
			                }
			                if(save_only == "")
			                {

			                	setTimeout(function(){ 
			                    $('.viewSummary').click();
			                	},1000);

				                // setInterval(function() {
				                // window.location.reload()
				                // }, 3000);
			                }
			            }
			        });   
		  	} else {
		  	  $('html, body').animate({ scrollTop: 0 }, 0);
	          $(".messages").addClass("alert alert-info")
	          $('.messages').html('Please complete all fields before continuing').fadeIn('slow');
	          $(".messages").fadeOut(5000)
	          return false;
		  }
    });
$(document).on('click','.addStepsRow', function() {
              var data = $("#stepsTableBody tr:eq(0)").clone(true).appendTo("#stepsTableBody");
              data.attr('id','');
              data.attr('class','');
              data.find("input").val('');
              data.find("input:eq(0)").removeClass().addClass("form-control who1");
              data.find("input:eq(1)").removeClass().addClass("form-control what1");
              data.find("input:eq(2)").removeClass().addClass("form-control when1");
     });
    $(document).on('click', '.removeStepsRow', function() {
         var trIndex = $(this).closest("tr").index();
         var id = $(this).closest("tr").attr('id');
            if(trIndex>=1) {
             //$(this).closest("tr").remove();
             $(this).closest("tr").hide();
              $.ajax({
		        type: "POST",
		        url: "<?php echo e(url('/')); ?>"+"/"+"delete-removeStepsRow",
		        dataType: "json",
		        data: {
		          "_token": "<?php echo e(csrf_token()); ?>",
		           "id" : id,
		        },
		        success: function(data) {
		        	
		            if(data.status == 'success')
		            {
		            	$('.loader-gif').hide();
		            }
		            }
		        });
           } else {
             $('html, body').animate({ scrollTop: 0 }, 0);
             $(".messages").addClass("alert alert-danger")
             $('.messages').html('First Step cannot be deleted.').fadeIn('slow');
             $(".messages").fadeOut(5000)
           }
      });
});

// Download Obj page as pdf
$('#downloadObj').click(function(){
	 setTimeout(function(){
     $('.logo-hidden').show();
	kendo.drawing.drawDOM(".objj-pdf", {
          //forcePageBreak: ".objj-pdf",
          paperSize: "A4",
          margin: "0cm",
          scale: 0.6,
          width:500,
          multiPage: true
        }).then(function(group){
          kendo.drawing.pdf.saveAs(group, "Objectives.pdf");

        })
        $('.logo-hidden').hide();

      

   }, 5000);
	
  //  $('.logo-hidden').show();
  // html2canvas($('.objj-pdf')[0], {
  //               onrendered: function (canvas) {
  //                   var data = canvas.toDataURL();
  //                   var docDefinition = {
  //                       content: [{
  //                           image: data,
  //                           width: 500
  //                       }]
  //                   };
  //                   pdfMake.createPdf(docDefinition).download("Objectives.pdf");
  //                   $('.logo-hidden').hide();
                    
  //               }
  //           });


});



// Download Obj page as pdf
$('#downloadPower').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.pow-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Power.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});
// Download Obj page as pdf
$('#downloadVariable').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.vari-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Variables.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});
// Download Obj page as pdf
$('#downloadComm').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.comm-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Communications.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});

// Download Obj page as pdf
$('#downloadTime').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.time-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Time.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});

$('#downloadRisk').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.risk-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Risks.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});


$('#downloadNego').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.nego-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Negotiations.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});
$('#downloadExecute').click(function(){
	$('.logo-hidden').show();
 html2canvas($('.exe-pdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Execute.pdf");
                    $('.logo-hidden').hide();
                }
            });			

});


// Download Summary page as pdf
$('#downloadSummary').click(function(){
 html2canvas($('#summaryPdf')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Summary.pdf");
                }
            });
	});

// Download Summary page as pdf
// $('#downloadAllPlan').click(function(){
	
// setTimeout(function(){ 
//  html2canvas($('#allPlan')[0], {
//                 onrendered: function (canvas) {
//                     var data = canvas.toDataURL();
//                     var docDefinition = {
//                         content: [{
//                             image: data,
//                             width: 500
//                         }]
//                     };
//                     pdfMake.createPdf(docDefinition).download("Summary.pdf");
//                 }
//             });
// }, 300);
// 	});
 // $("#downloadAllPlan").on("click", function() {
  
 

 //      });
   

      

    


$('#nav-toggle').click(function() {     
        $("body").toggleClass("no-sidebar");     
    });
$(document).ready(function() {
	$("body").addClass("no-sidebar");
});
</script><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/js/planning_tools.blade.php ENDPATH**/ ?>