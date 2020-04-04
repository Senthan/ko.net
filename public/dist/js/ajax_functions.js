		 //Resetting data fields
		 function reset_data(){

						$("#client_name").val('');
						$("select.targets").val('0');
						$("span.filter-option").text("Nothing selected");
						$("#template_name").val('');
						$("#first_letter_id").val('');
						$("#first_email_id").val('');
						$("#first_sms_id").val('');
						$("#debtordetails_tab").click();
						$(".targets").css("border", "0.5px solid #D2D6DE");
						$(".firstSettings").css("border", "0.5px solid #D2D6DE");

				}

		String.prototype.capitalize = function() {
    		return this.charAt(0).toUpperCase() + this.slice(1);
		}

		//Just for display purpose (Exp: account_no -> Account No)
		function setFormat(word,flag){

			var arr, anotherArr;
			var temp = "", anotherTemp = "";
			if(flag==1){
				arr = word.split("_");
				for(var i = 0; i<arr.length; i++){
					temp = temp + arr[i].capitalize() + " ";
				}
				return temp
			}
			else if(flag==2)
			{
					arr = word.split(",,");
					for(var i = 0; i<arr.length; i++){

						anotherArr = arr[i].split("_");
						for(var j = 0; j<anotherArr.length; j++){
							temp = temp + anotherArr[j].capitalize() + " ";
						}

						if(temp=="0 ")
							temp="- ";

						if(arr.length>4){
							if(i==2 || i==5 || i==8)
								temp = temp + "<br>";
						}
						
						anotherTemp = anotherTemp + temp +"<br>";
						temp = "";
					}
					return anotherTemp;
			}
			else{
					for(var i = 0; i<word.length; i++){
						arr = word[i].split("_");
						for(var j = 0; j<arr.length; j++){
							temp = temp + arr[j].capitalize() + " ";
						}
						word[i] = temp + "<br>";
						temp = "";
					}

					return word;

			}
			
		}

		function GetUnique(inputArray)
		{
			var outputArray = [];
			for (var i = 0; i < inputArray.length; i++)
			{
				if ((jQuery.inArray(inputArray[i], outputArray)) == -1)
				{
					outputArray.push(inputArray[i]);
				}
			}
			return outputArray;
		}


		var html = $('.tbody').html();
		$('.tbody').html('');

		var dataGlobal, dataSize, endGlobal;

		function addClassExcel(row_num){

			$('.excel').addClass('excel'+(row_num-1));
			$('.'+'excel'+(row_num-1)).find('td:nth-child(1)').text(row_num);
			$('.'+'excel'+(row_num-1)).removeClass('excel');
			$('.tbody').append(html);

		}

function alertWarning(){

	$("#alert-icon").removeClass('custom-success');
	$("#alert-icon>i").removeClass('success-color');
	$("#alert-icon").removeClass('custom-failure');
	$("#alert-icon>i").removeClass('failure-color');
	$("#alert-icon").addClass('custom-warning');
	$("#alert-icon>i").addClass('warning-color');

}

function alertFailure(){

	$("#alert-icon").removeClass('custom-success');
	$("#alert-icon>i").removeClass('success-color');
	$("#alert-icon").removeClass('custom-warning');
	$("#alert-icon>i").removeClass('warning-color');
	$("#alert-icon").addClass('custom-failure');
	$("#alert-icon>i").addClass('failure-color');

}

function alertSuccess(){

	$("#alert-icon").removeClass('custom-failure');
	$("#alert-icon>i").removeClass('failure-color');
	$("#alert-icon").removeClass('custom-warning');
	$("#alert-icon>i").removeClass('warning-color');
	$("#alert-icon").addClass('custom-success');
	$("#alert-icon>i").addClass('success-color');

}

function showWarning(){
	var msg = "";

						if($("#client_name").val()==""){

							msg = msg+"<br><b>Client Name</b>";

						}

						if($("#template_name").val()==""){

							msg = msg+"<br><b>Template Name</b>";
						}

						if($("#name").val()=="0"){

							msg = msg+"<br><b>Name (Debtor Details)</b>";
						}

						if($("#ic_regno").val()=="0"){

							msg = msg+"<br><b>IC Reg No (Debtor Details)</b>";
						}

						if($("#invoice_card_no").val()=="0"){

							msg = msg+"<br><b>Invoice Card No. (Debtor Invoice)</b>";
						}

						if($("#interest_percent").val()!="0" && $("#interest_type").val()=="0"){

							msg = msg+"<br><b>Interest Percent Type (Debtor Invoice)</b>";
						}

						msg="Provide the following(s)."+msg;

						swal({ title: "Warning", text: msg, type: "warning", html: true });
}

var failed_match = "";
var success_import = "";

		function saveUpdateFormat(){
				if($("#client_name").val()!="" && $("#template_name").val()!="" && $("#name").val()!="0" &&  $("#ic_regno").val()!="0" && $("#invoice_card_no").val()!="0"){

					if(($("#interest_percent").val()!="0" && $("#interest_type").val()!="0") || ($("#interest_percent").val()=="0" && $("#interest_type").val()=="0")){
								
							if($('#agreement').is(':checked')){
								$.ajaxSetup({
						            headers: {
						                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
						            }
			        			});

								var target= new Array();
								var detailMemo = new Array();
								var invoiceMemo = new Array();
								var all_target = new Array();
								var holding_period = $('#holding_period').val();
								var interest_type = $('#interest_type').val();

								for(var i=0;i<=column_header.length;i++){
									if(i==(column_header.length-7)){
										target[i]= "address1,,address2,,postal_code";
									}
									else if(i==(column_header.length-6)){
										target[i]= $("#address1a").val() +",," + $("#address1b").val() +",," + $("#address1c").val();
									}
									else if(i==(column_header.length-5)){
										target[i]= $("#address2a").val() +",," + $("#address2b").val() +",," + $("#address2c").val();
									}
									else if(i==(column_header.length-4)){
										target[i]= $("#postal_code1").val() +",," + $("#postal_code2").val() +",," + $("#postal_code3").val();
									}
									else if(i==(column_header.length-3)){
										target[i]= "mobile,,home,,office,,other";
									}
									else if(i==(column_header.length-2)){
										target[i]= $("#phone_number1a").val() +",," + $("#phone_number2a").val() +",," + $("#phone_number3a").val() +",," + $("#phone_number1b").val() +",," + $("#phone_number2b").val() +",," + $("#phone_number3b").val() +",," +$("#phone_number1c").val() +",," + $("#phone_number2c").val() +",," + $("#phone_number3c").val() +",," +$("#phone_number1d").val() +",," + $("#phone_number2d").val() +",," + $("#phone_number3d").val();
									}
									else if(i==(column_header.length-1)){
										target[i]= $("#email1").val() +",," + $("#email2").val() +",," + $("#email3").val() +",," + $("#email4").val();
									}
									else{
										
										if(i==15){
											target[i] = null;
											detailMemo = $("select.targets:eq("+i+")").val();
										}
										else if(i==44){
											target[i] = null;
											invoiceMemo = $("select.targets:eq("+i+")").val();
										}
										else{
											target[i] = $("select.targets:eq("+i+")").val();
										}
									}
									
								}

								for(var i=0;i<allTargets.length;i++){
									all_target[i] = allTargets[i];
								}

								var formData ={
									column_header: column_header,
									target: target,
									detailMemo: detailMemo,
									invoiceMemo: invoiceMemo,
									holding_period: holding_period,
									interest_type: interest_type,
									client_id: $("#client_name").val(),
									template_name: $("#template_name").val(),
									template_id: templateId,
									alltarget: all_target,
									template_type: 'assignment',
									actionPlan: $("#actionPlan").val(),
									first_letter_id: $("#first_letter_id").val(),
									first_email_id: $("#first_email_id").val(),
									first_sms_id: $("#first_sms_id").val(),
								};

								$.ajax({
								      url:'save_template',
								      data: formData,
								      dataType:'json',
								      type:'POST',
								      success:function(response){
								      	
								      	if(response!=false){
									      	swal({ title: "Success",text: response,type: "success" , html: true }, function(){
								              window.location.href = "/create_template";
								            });	
								      	}
								      	else{
								      		swal({ title: "Error", text: "Template Name exists, please try with a different name.", type: "error" }, function(){
								            	$("#template_name").focus();
								        	});
								      	}
								      	
								        
								      },
								      error:function(response){
								      	swal({ title: "Error",text: response,type: "error" }, function(){
								            window.location.href = "/create_template";
								        });
								      },

								});

							}
							else{
								swal({ title: "Warning", text: "Please go to First Template Setting and click the CheckBox.", type: "warning", html: true });
							}
						}
						else{
							showWarning();
						}
					}
					else{

						showWarning();
					}
		}

		function deleteFormat(templateId){
			$.ajaxSetup({
				        headers: {
				                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
				            }
	        			});

						var formData ={
							template_id: templateId
						};

						$.ajax({
						      url:'delete_template',
						      data: formData,
						      dataType:'json',
						      type:'POST',
						      success:function(response){
						      	
							    swal({ title: "Success",text: response, type: "success" }, function(){
						            window.location.href = "/create_template";
						        });							        
						      },
						      error:function(response){
						      	swal({ title: "Error",text: response,type: "error" }, function(){
						            window.location.href = "/create_template";
						        });
						      },
						});
		}

			$(document).ready(function(){

	            //Saving template with respective profile for reuse done here (Create Template)
				$("#save_format").click(function(){ 
					templateId = '';
					saveUpdateFormat();

				 });

				$("#update_format").click(function(){ 

					saveUpdateFormat();

				 });

				$(".deleteBtn").click(function(){
					var tempId = $(this).parent().parent().find('td:nth-child(1)').text();
					swal({
		              title: "Are you sure?",
		              text: "Please comfirm to delete",
		              type: "warning",
		              showCancelButton: true,
		              confirmButtonColor: "#DD6B55",
		              confirmButtonText: "Yes",
		              cancelButtonText: "No",
		              closeOnConfirm: true,
		              closeOnCancel: true
		            },
		            function(isConfirm){
		              if (isConfirm) {
						deleteFormat(tempId);
		              } 
		            });
				})
		 		//Retrieving Template id options on selecting Client Profile
		 		$("#client-profile").change(function(){
		 			
		 				var profile_id = $(this).val();
						var type = $('#templateType').val();

						$.ajaxSetup({
				            headers: {
				                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
				            }
	        			});
						$.ajax({
									url: 'template_id',
									data: {client_id: profile_id, type: type},
									type: 'POST',
									dataType: 'json',
									success: function(template){
										debtorTemplateGlobal = template;
										$("#template").html('');
										$("#template").html('<option value="" selected>Select</option>');
										/*console.log("Template", debtorTemplateGlobal);*/
										$.each(template, function(key,value) {
											$("#template").append("<option value='"+value['id'].toString()+"'>"+value['template_name'].toString()+"</option>");
										});

									}, 
									error: function(e){ console.log(e.responseText); } 
						});
									

		 		});


		 		//display Template Preview on Selecting template 
		 		// $("#template").change(function(){

		 		// 	//getTemplatePreview();
				
		 		// });

		 		/*$( "#import-form" ).submit(function( event ) {

		 			//$("#myLoader").modal("show");
		 			$('#myLoader').modal({
					    backdrop: 'static',
					    keyboard: false  // to prevent closing with Esc button (if you want this too)
					});
		 		});*/

		 		$( "#import-payment" ).submit(function( event ) {

		 			//$("#myLoader").modal("show");
		 			$('#myLoader').modal({
					    backdrop: 'static',
					    keyboard: false  // to prevent closing with Esc button (if you want this too)
					});
		 		});

		 		$("#reset").click(function(){
		 			reset_data();
		 		});


		 		$("div.input-group-addon").click(function(){
		 			$("#datepicker").focus();
		 		});

		 		if(failed_match!=""){

		 			alertFailure();
		 			$("#saveTemplateSuccess").html(failed_match);
		 			$("#commonModal").modal('show');
		 		}

		 		if(success_import!=""){

		 			alertSuccess();
		 			$("#saveTemplateSuccess").html(success_import);
		 			$("#commonModal").modal('show');
		 		}

	        });


	        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
