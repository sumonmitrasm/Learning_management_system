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
            url:"/user/register",
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
    
});