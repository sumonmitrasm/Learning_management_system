//size wise change price..........................
$(document).ready(function(){
	$("#getPrice").change(function(){
		var size = $(this).val();
        //alert(size);
        if (size=="") {
			alert("Please select Size");
			return false;
		}
        var course_id = $(this).attr("course-id");
		//alert(course_id);
        $.ajax({
            headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
              url:'/get-course-price',
              data:{size:size,course_id:course_id},
              type:'post',
              success:function(resp){
                //alert(resp); die;
                if (resp['discount']>0) {
                    //$(".getAttributePrice").html("<del>Rs. "+resp['course_price']+"</del>Rs. "+resp['final_price']);
                     $(".getAttributePrice").html("<div class='product-price'><h4>Rs."+resp['final_price']+"</h4></div> <div class='original-price'><span>Original Price:</span><span><del>Rs."+resp['course_price']+"</span></div></del>"); 
                }else{
                    $(".getAttributePrice").html("<div class='product-price'><h4>Rs."+resp['final_price']+"</h4></div>");
                }
              },error:function(){
				alert("Error");
			}
        });
	});

    //........................................
    $(document).on('change','.updateCartItem',function(){
        var quantity = $(this).val();
        var cartid = $(this).data('cartid');
        alert(cartid);die;  //incomplete
        // Perform validation if needed
        if(quantity < 1) {
            alert("Item quantity must be at least 1!!");
            return false;
        }
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{"cartid":cartid,"qty":quantity},
            url:'/cart/update',
            type:'post',
            success:function(resp){
                $(".totalCartItems").html(resp.totalCartItems);
                if (resp.status==false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
                $("#appendHeaderCartItems").html(resp.headerview);
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //register in fornt..............
    $("#registerForm").submit(function(){
        var formdata = $(this).serialize();
        //alert(formdata);die;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url:"/user-register",
            type:"POST",
            data:formdata,
            success:function(resp){
                //alert(resp);die;
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#register-"+i).attr('style','color:red');
                        $("#register-"+i).html(error);
                        setTimeout(function(){
                            $("#register-"+i).css({
                                'display':'none'
                            });
                        },7000);
                    });
                }else if(resp.type=="success"){
                    $("#register-confirm").attr('style','color:green');
                    $("#register-confirm").html(resp.message);
                    // window.location.href = resp.url;
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    $("#loginForm").submit(function(){
        var formdata = $(this).serialize();
        //alert(formdata);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url:"/user/login",
            type:"POST",
            data:formdata,
            success:function(resp){
                //alert(resp);die; //next.....107
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#login-"+i).attr('style','color:red');
                        $("#login-"+i).html(error);
                        setTimeout(function(){
                            $("#login-"+i).css({
                                'display':'none'
                            });
                        },4000);
                    });
                }else if(resp.type=="incorrect"){
                    //alert(resp.message); //110v
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                }else if(resp.type=="inactive"){
                    //alert(resp.message); //110v
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                }
                else if(resp.type=="success"){
                    window.location.href = resp.url;
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    $(document).on('submit',"#addressAddEditForm",function(){
		var formdata = $("#addressAddEditForm").serialize();
        //alert(formdata); die;
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			  data:formdata,
			  url:'/save-delevery-address',
			  type:'post',
              success: function(resp){
                //alert(resp);die;
                if(resp.type=="error"){
					$.each(resp.errors,function(i,error){
						$("#delivery-"+i).attr('style','color:red');
						$("#delivery-"+i).html(error);
						setTimeout(function(){
							$("#delivery-"+i).css({
								'display':'none'
							});
						},7000);
					});
				}else{
				$("#deliveryAddresses").html(resp.view);
				window.location.href = "checkout";
				Swal.fire({
					position: "top-end",
					icon: "success",
					title: "Your work has been saved",
					showConfirmButton: false,
					timer: 1500
				  });	
				}
              },error:function(){
                alert("Error");
              }
		});
	});

    $(document).on('click','.aditAddress',function(){
        var addressid = $(this).data("addressid");
        //alert(addressid);die;
        $.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			data:{addressid:addressid},
			url:'/get-delivery-address',
			type:'post',
			success:function(resp){
                //alert(resp);die;
				// $("#showdifferent").removeClass("collapse");
				// $(".newAddress").hide();
				// $(".deliveryText").text("Edit Delivery Address");
				$('[name=delivery_id]').val(resp.address['id']);
				$('[name=name]').val(resp.address['name']);
				$('[name=address]').val(resp.address['address']);
				$('[name=city]').val(resp.address['city']);
				$('[name=company_name]').val(resp.address['company_name']);
				$('[name=country]').val(resp.address['country']);
				$('[name=pincode]').val(resp.address['pincode']);
				$('[name=mobile]').val(resp.address['mobile']);
                $('[name=email]').val(resp.address['email']);
			},error:function(){
				alert("Error");
			}
		});
    });

    $(document).on("click",".removeAddress",function(){
		//alert("test");die;
		var addressid = $(this).data('addressid');
		//alert(addressid);
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
			// Update the URL to the correct format, e.g., "http://example.com/cart/delete/123" (replace example.com with your domain)
            
			window.location = "/delevery-address/delete/"+ addressid;
		  }
		});
	});

    $("#ApplyCoupon").submit(function(){
        var user = $(this).attr("user");
        if(user==1){

        }else{
            alert("Please login to apply Coupon!");
            return false;
        }
        var code = $("#code").val();
        //alert(code);die;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'/apply-coupon',
              data:{code:code},
              success:function(resp){
                // alert(resp.message);
                Swal.fire({
                    title: resp.message,
                    showClass: {
                      popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                      `
                    },
                    hideClass: {
                      popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                      `
                    }
                  });
                  $("#appendCartItems").html(resp.view);
                  $(".totalCartItems").html(resp.totalCartItems);
                  if (resp.couponAmount>=0) {
					$(".couponAmount").text("Rs."+resp.couponAmount);
                  }else{
                    $(".couponAmount").text("Rs.0");
                  }
                  if (resp.grand_total>=0) {
					$(".grand_total").text("Rs."+resp.grand_total);
				  }
              },error:function(){
                alert("Error");
            }
        });
    });
    
});