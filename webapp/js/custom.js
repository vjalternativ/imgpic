function toggle(ele) {

	

$(ele).toggle();	

}


function show(ele) {

	

$(ele).show();	

}





function hide(ele) {

	

$(ele).hide();	

}



function removeElement(ele) {

$(ele).remove();	

	

}





function closemodal(id){

	
	$("#"+id).modal('hide');
	
	//$("#"+id).removeClass("show");

	//$("#"+id).addClass("hide");

	



	

}



function showmodal(id) {

			
		$("#"+id).modal('show');
		//$("#"+id).removeClass("hide");	
		//$("#"+id).addClass("show");

	

		}

		

		function hideshowmodal(a,b)

		{

		closemodal(a);

		showmodal(b);

		}