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
    
});