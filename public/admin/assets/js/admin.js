$(document).ready(function(){
	$(".sub-slide-item").removeClass("active");
	$(".side-menu__item").removeClass("active");

    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            type:'post',
            url:'/admin/check-current-password',
            data:{current_password:current_password},
            success:function(resp){
                //alert(resp);
                if(resp=="false"){
                    $("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
                }else if(resp=="true"){
                    $("#check_password").html("<font color='green'>Current Password is Correct!</font>");
                }
            },error:function(){
                alert('Error')
            }
        });
    })

    //.......................Admin............................................mistake
	$(document).on("click",".updateadminStatus",function(){
		var status = $(this).children("i").attr("status");
		var admin_id = $(this).attr("admin_id");
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
  			 type:'post',
  			 url:'/admin/update-admin-status',
  			 data:{status:status,admin_id:admin_id},
  			 success:function(resp){
  			 	if (resp['status']==0) {
					$("#admin-"+admin_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#admin-"+admin_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
  			 },error:function(){
  			 	alert("Error");
  			 }
		});
	});
	//.......................Section............................................26
	$(document).on("click",".updatesectionStatus",function(){
		var status = $(this).children("i").attr("status");
		// alert(status);die;
		var section_id = $(this).attr("section_id");
		//alert(section_id);die;
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
  			 type:'post',
  			 url:'/admin/update-section-status',
  			 data:{status:status,section_id:section_id},
  			 success:function(resp){
  			 	if (resp['status']==0) {
					$("#section-"+section_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#section-"+section_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
  			 },error:function(){
  			 	alert("Error");
  			 }
		});
	});

	// delete code.............................................................28
	$(".confirmDelete").click(function(){
		var module = $(this).attr('module');
		var moduleid = $(this).attr('moduleid');
		//alert(moduleid);die;
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		  }).then((result) => {
			if (result.isConfirmed) {
			  Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			  )
			  window.location = "/admin/delete-"+module+"/"+moduleid;
			}
		  })
	});

	//.......................Category............................................26
	$(document).on("click",".updatecategoryStatus",function(){
		var status = $(this).children("i").attr("status");
		// alert(status);die;
		var category_id = $(this).attr("category_id");
		//alert(category_id);die;
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
  			 type:'post',
  			 url:'/admin/update-category-status',
  			 data:{status:status,category_id:category_id},
  			 success:function(resp){
  			 	if (resp['status']==0) {
					$("#category-"+category_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#category-"+category_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
  			 },error:function(){
  			 	alert("Error");
  			 }
		});
	});

	//.................................append category...........................32
	$('#section_id').change(function(){
		var section_id = $(this).val();
		//alert(section_id);die;
		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			 },
			type:'post',
			url:'/admin/append-categories-level',
			data:{section_id:section_id},
			success:function(resp){
				$("#appendCategoriesLevel").html(resp);
			},error:function(){
				alert("Error");
			}
		});
	});

	////..............................course ajax.............................
	$(document).on('submit', "#courseFrom", function(){
		var formData = new FormData(this);
		var id = $('#course_id').val();
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			  data:formData,
				url:'/admin/add-edit-course/' + (id ? id : ''),
				type:'post',
				contentType: false,
				processData: false,
				success:function(resp){
					//alert(data);die;
					if(resp.type=="error"){
						$.each(resp.errors,function(i,error){
							$("#course-"+i).attr('style','color:red');
							$("#course-"+i).html(error);
							setTimeout(function(){
								$("#course-"+i).css({
									'display':'none'
								});
							},10000);
						});
					}else{
						// window.location.href = "/admin/get-course"; 
						Swal.fire({
						position: "top-end",
						icon: "success",
						title: "Your work has been saved",
						showConfirmButton: false, 
						timer: 1500
					  }).then(function () {
						// Reset the form
						$('#courseFrom')[0].reset();
					});
					}
					},error:function(){
						alert("Error");
				}
			});
		})
		//course status ......................
		$(document).on("click",".updateCourseStatus",function(){
			var status = $(this).children("i").attr("status");
			var value_id = $(this).attr("value_id");
			$.ajax({
				headers: {
					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   },
				   type:'post',
				   url:'/admin/update-course-status',
				   data:{status:status,value_id:value_id},
				   success:function(resp){
					   if (resp['status']==0) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
					}else{
						if (resp['status']==1) {
							$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
						}
					}
				   },error:function(){
					   alert("Error");
				   }
			});
		});

//category id change for filter
		$(document).on("change","#category_id",function(){
			var category_id = $(this).val();
			$.ajax({
				headers: {
					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   },
				   type:'post',
				   url:'/admin/category-filters',
				   data:{category_id:category_id},
				   success:function(resp){
					   //alert(resp);
					   $(".loadFilters").html(resp.view);
				   },error:function(){
					   alert("Error");
				   }
			});
		});	
		//fild create..................................................................
		var maxFieldABOUT = 210; 
		var field_wrapper = $('.field_wrapper');
		var fieldHTMLABOUT = '<div><div style="height: 5px;"></div><input type="text" name="title[]" class="form-control" style="width: 830px;" placeholder="Enter Title"/>&nbsp;<input type="file" name="video[]" class="form-control" style="width: 830px;" placeholder="Enter Video"/>&nbsp;<textarea name="description[]" class="form-control" style="width: 830px;" placeholder="Enter Description"></textarea><a href="javascript:void(0);" class="remove_about_button" style="color: red;">Delete</a></div>'; //New input field html 
		var x = 1;
		$('.add_button').click(function(){
			if(x < maxFieldABOUT){ 
				x++;
				$(field_wrapper).append(fieldHTMLABOUT); 
			}
		});
		$(field_wrapper).on('click', '.remove_about_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		})
		//fild create for attribute price..................................................................
		var maxFieldABOUT = 210; 
		var field_wrapper_price = $('.field_wrapper_price');
		var fieldHTMLABOUT = '<div><div style="height: 5px;"></div><input type="text" name="size[]" class="form-control" style="width: 830px;" placeholder="Enter Size"/>&nbsp;<input type="text" name="price[]" class="form-control" style="width: 830px;" placeholder="Enter Price"/>&nbsp;<input type="text" name="stock[]" class="form-control" style="width: 830px;" placeholder="Enter Stock"/>&nbsp;<input type="text" name="sku[]" class="form-control" style="width: 830px;" placeholder="Enter SKU"/><a href="javascript:void(0);" class="remove_about_button" style="color: red;">Delete</a></div>'; //New input field html 
		var x = 1;
		$('.add_button').click(function(){
			if(x < maxFieldABOUT){ 
				x++;
				$(field_wrapper_price).append(fieldHTMLABOUT); 
			}
		});
		$(field_wrapper_price).on('click', '.remove_about_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		})

		//attribute price status ......................
		$(document).on("click",".updateAttibusePriceStatus",function(){
			var status = $(this).children("i").attr("status");
			var price_id = $(this).attr("price_id");
			$.ajax({
				headers: {
					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   },
				   type:'post',
				   url:'/admin/update-attributes-price-status',
				   data:{status:status,price_id:price_id},
				   success:function(resp){
					   if (resp['status']==0) {
						$("#price-"+price_id).html("<i style='font-size:150%; color: #efa06b;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
					}else{
						if (resp['status']==1) {
							$("#price-"+price_id).html("<i style='font-size:150%; color: #efa06b;' class='mdi mdi-bookmark-check' status='Active'></i>");
						}
					}
				   },error:function(){
					   alert("Error");
				   }
			});
		});

	//Brand status ......................
	$(document).on("click",".updateBrandsStatus",function(){
		var status = $(this).children("i").attr("status");
		var value_id = $(this).attr("value_id");
		$.ajax({
			headers: {
				 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			   },
			   type:'post',
			   url:'/admin/update-brand-status',
			   data:{status:status,value_id:value_id},
			   success:function(resp){
				   if (resp['status']==0) {
					$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
			   },error:function(){
				   alert("Error");
			   }
		});
	});
	//slider status ......................
	$(document).on("click",".updateSliderStatus",function(){
		var status = $(this).children("i").attr("status");
		var value_id = $(this).attr("value_id");
		$.ajax({
			headers: {
				 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			   },
			   type:'post',
			   url:'/admin/update-slider-status',
			   data:{status:status,value_id:value_id},
			   success:function(resp){
				   if (resp['status']==0) {
					$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
			   },error:function(){
				   alert("Error");
			   }
		});
	});

	//coupon  selector....................................................................122
	$("#ManualCoupon").click(function(){
		$("#couponFild").show();
	});
	$("#AutomaticCoupon").click(function(){
		$("#couponFild").hide();
	});

	//coupon status ......................
	$(document).on("click",".updateCouponStatus",function(){
		var status = $(this).children("i").attr("status");
		var value_id = $(this).attr("value_id");
		$.ajax({
			headers: {
				 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			   },
			   type:'post',
			   url:'/admin/update-coupons-status',
			   data:{status:status,value_id:value_id},
			   success:function(resp){
				   if (resp['status']==0) {
					$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-off fa-lg' status='Inactive'></i>");
				}else{
					if (resp['status']==1) {
						$("#value-"+value_id).html("<i style='font-size:150%; color: #efa06b;' class='fa-solid fa-toggle-on fa-lg 'status='Active'></i>");
					}
				}
			   },error:function(){
				   alert("Error");
			   }
		});
	});


});