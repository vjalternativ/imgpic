var selectedTopics = {};
var selectedTopicCount = 0;
var webtitle ="";
var pinimageajax =false;
function setTopic(id,ele) {
	//toggle(ele);
	$(ele).toggleClass("opacity-50");
	if(typeof selectedTopics[id] == 'undefined') {
	selectedTopics[id] = id;	
	selectedTopicCount++;
	} else {
	delete selectedTopics[id];
	selectedTopicCount--;
	}
	
	if(selectedTopicCount > 1) {
	$("#saveTopicsBtn").attr( "disabled", false );	
	} else {
	$("#saveTopicsBtn").attr( "disabled", true );		
	} 
	
	}
	
	
	function saveTopics() {
		
		
	var data = {};
	data.topics =  selectedTopics;
	$.post(base_url+'ip_user/saveTopics',data,function(response) {
													   
//	if(response=='passed') {
	$("#topicModal").addClass('hide');
	window.location.href =base_url; 
//	}
	
	});
	
	
	}
	
	function register() {
	window.location.href=base_url+"ip_user/regstration";
	}
	
function profile() {

window.location.href=base_url+sessionusername+"/profile";

}
	
	function createboard() {
		
		$('#selectboard').addClass("hide");
		$('#createboard').removeClass("hide");
		
		$(".createboard-btns").removeClass("hide");
		$(".selectboard-btns").addClass("hide");
		
		
	//hide('#selectboard');
	//show('#createboard');
		
	}
	
	function selectboard() {
	
	$('#createboard').addClass("hide");
	$('#selectboard').removeClass("hide");
	
	$(".selectboard-btns").removeClass("hide");
	$(".createboard-btns").addClass("hide");
			
	//hide('#createboard');
		
	//show('#selectboard');
		
	}
	
	
	function enablesubmit(valid,btnid) {
		
		var name = $("#"+valid).val();
		if(name=="") {
			$( "#"+btnid ).attr( "disabled",true );
			
			} else {
				
			$( "#"+btnid ).attr( "disabled",false );
				
				}
		}
	
	function setsecret(val) {
		
		
		$("#secretslider").toggleClass("on");
		$("#secret").val(val);
		}
		var pinid = "";
		
		
		
	//	var isNew = true;
		function saveimage(id) {
			
		//$("#boardmodal").removeClass("hide");	
			//$("#boardmodal").addClass("show");
			$("#boardmodal").modal('show');
			
			$("#modalimg").attr("src",$("#img-"+id).attr("src"));
			if(id.substr(0,4) != 'http') {
			$("#showdesc").hide();	
			//isNew = false;
			} 
				
			
			$("#previewpin-desc").html($("#img-desc-"+id).html());
			$("#previewpin-desc-field").html($("#img-desc-"+id).html());
			
			$("#pinid").val(id);
			pinid = id;
		}
		
		
		
		
		function ajaxpinboard(bid) {
			
		$("#btnpinboard-"+bid).attr("disabled",true);
		var url = base_url+"ip_user/pinBoard";
		var data = {};
		data.imgsrc = pinid;
		data.website = webtitle;
		data.boardid = bid;
		data.description = $("#previewpin-desc-field").val();
		$.post(url,data,function(result) {
								    
								 console.log(result);
		var response = JSON.parse(result);
		$("#boardmodal").modal('hide');
		$("#btnpinboard-"+bid).attr("disabled",false);
		$("#infobox-type").html(response.type);
		$("#infobox-msg").html(response.msg);
		$("#infobox").removeClass("hide");
		

		//closemodal('boardmodal');
		});
		
		}
		function pinboard(bid) {
		ajaxpinboard(bid);
		}
		
		
	function createboardandpin() {
		$("#creatboardbtn").attr("disabled",true);	
		var url = base_url+'ip_user/createBoard';
		var data = {};
		data.boardName = $("#boardEditName").val();
		data.description = $("#boardEditDescription").val();
		data.category = $("#board_category").val();
		data.secret = $("#secret").val();
		//if(pinimageajax) {
		//data.isnew = 'y';
		//}
		data.imgsrc = $("#pinid").val();
		
		$.post(url,data,function(result){
		console.log(result); 
		$("#creatboardbtn").attr("disabled",false);
		closemodal("boardmodal");
		//if(!pinimageajax) {
		//window.location.href = base_url+sessionusername;
		//}
		
		window.location.href=base_url+sessionusername;
		});
		
		
		}
		
		function secretModal() {
			
			showmodal('createBoardModal');
			setsecret('Yes');
			
		
			
			} 
			
			function loadProfile(tab) {
				
				console.log(base_url+sessionusername+'/'+tab);
			window.location.href=base_url+sessionusername+'/'+tab;
			return;
			$.post(base_url+'ip_user/loadProfile/'+tab,{},function(result){
			
			$("#UserProfileContent").html(result);
			
			});
			
				
			}
			
			
			function pinimage(src,title) {
			pinimageajax = true;
			
				
			$("#boardmodal").modal('show');
			//$("#boardmodal").removeClass("hide");	
			//$("#boardmodal").addClass("show");
			$("#modalimg").attr("src",src);
			$("#pinid").val(src);
			$("#showdesc").show();
			$("#previewpin-desc").show();
			$("#previewpin-desc-field").removeClass("hide");
			$("#previewpin-desc-field").val("");
			$(".btnpinboard").attr("disabled",false);
			pinid = src;
			webtitle = title;
			
		}
		
		
		function zoompin(id,bid) {
			var url = base_url+"ip_user/zoompin/"+id+"/"+bid;
			$.post(url,{id:id},function(result){
										
				$(".appendedContainer").append(result);				
										
										});	
			
	    }
		
		
		
		function deviceUpload() {
			
		closemodal("webordevice");
		showmodal("uploadpin");
		
			
		}
		
		function uploadpin() {
            var fd = new FormData(document.getElementById("uploadpinform"));
           
            $.ajax({
              url: base_url+"ipuser/upPreview",
              type: "POST",
              data: fd,
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
				var file = JSON.parse(data);
				console.log(file);
				
				closemodal("uploadpin");
				
				if(file.status==1) {
				
				pinimage(file.tmp_name,'');
				pinid=file.tmp_name;	
				webtitle ="";	
				} else {
					console.log("Invalid File");
			   }
				
				
				
            });
            return false;
        }
		
		
		
		
		
		
		
		
		function followingtopic(id) {
			
		var url = base_url+"ip_user/followingTopics/"+id;
		
		$.post(url,{},function(result) {
		$("#followingcontent").html(result);							
		});
			
		}
		function followingpeople(id) {
			
		var url = base_url+"ip_user/followingPeople/"+id;
		
		$.post(url,{},function(result) {
		$("#followingcontent").html(result);							
		});
		
		}
		
		
		function followingboard(id) {
		var url = base_url+"ip_user/followingBoard/"+id;	
		$.post(url,{},function(result) {
							   
		$("#followingcontent").html(result);							
		
		
		
	 	});
		
		
		
		}
		
		
		function saveProfile() {
			
			
		var username = $("#user_name").val();
		
		if(username!="") {
			
		url = base_url+'ipuser/checkUserNameExist';
		console.log(username);
		$.post(url,{user_name:username},function(result) {
							   console.log(result);
			var json = JSON.parse(result);
			if(json.error == '1') {
			$("#validationerror").html(json.msg);	
			showmodal("validationpopup");	
			} else {
				
				
			var form = document.getElementById("editprofileform");
			
			form.submit();
			closemodal("editprofile");	
			
			} 
							   
		});
		
		
		
		
		}
		
		
		}
		
		
		
		
		function editpin(id,bid) {
			
			var url = base_url+"ip_user/editpin";
				$.post(url,{id:id,bid:bid},function(result){
					$("#ajaxmodal-content").html(result);
					$("#ajaxmodal").modal("show");
				});
			
			
			
			}
			
			
			
			function savePinInfo() {
				
				var data = {};
				data.id = $("#formpinid").val();
				data.bid = $("#board-id").val();
				
				var description  = $("#pinFormDescription").val();
				if(typeof description !="undefined")
				data.description = description;
				var website = $("#pinFormLink").val();
				if(typeof website !="undefined")
				data.website = website;
				
				
				var url = base_url+"ip_user/savePinInfo";
				
				$.post(url,data,function(result) {
					
				console.log(result);
				closemodal("editpincontent");
				window.location.reload();
				});
				
				
				
				
				
				
			
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			function toggleBoardFollow(id) {
			
			$("#follow-board-btn").toggleClass("btn-danger btn-primary");
			var follow = $("#follow-board-btn").html();
			var text = "Follow";
			if(follow=="Follow") {
			text = "Unfollow";	
			}
			$("#follow-board-btn").html(text);
			var url =base_url+"ip_user/followBoard/"+id;
		$.post(url,{},function(result) {
		console.log(result);							
		});	
		}
		
		
		
		
		function togglePeopleFollow(id) {
			
			$("#follow-people-btn").toggleClass("btn-danger btn-primary");
			var follow = $("#follow-people-btn").html();
			var text = "Follow";
			if(follow=="Follow") {
			text = "Unfollow";	
			}
			$("#follow-people-btn").html(text);
			var url =base_url+"ip_user/followPeople/"+id;
		$.post(url,{},function(result) {
		console.log(result);							
		});	
		}
		
		
		
		
		function toggleLike(id) {
			$("#PinLikeButtonHeart-"+id).toggleClass("text-danger text-default");
			//$("#PinLikeButton-"+id).toggleClass("unlike");
			var url =base_url+"ip_user/toggleLike/"+id;
		$.post(url,{id:id},function(result) {
		console.log(result);							
		});	
		}
		
		
		
		function toggleTopicFollow(id) {
			
			$("#topicFollowBtn-"+id).toggleClass("btn-danger btn-primary");
			var follow = $("#topicFollowBtn-"+id).html();
			var text = "Follow";
			if(follow=="Follow") {
			text = "Unfollow";	
			}
			$("#topicFollowBtn-"+id).html(text);
			var url =base_url+"ip_user/followTopic/"+id;
		$.post(url,{},function(result) {
		console.log(result);							
		});	
		}
		
		
		
		
	/*	
		$(document).ready(function()
{
function last_msg_funtion() 
{ 
var ID=$(".message_box:last").attr("id");
$('div#last_msg_loader').html('<img src="bigLoader.gif">');
$.post("load_data.php?action=get&last_msg_id="+ID,

function(data){
if (data != "") {
$(".message_box:last").after(data); 
}
$('div#last_msg_loader').empty();
});
}; 



$(window).scroll(function(){
if ($(window).scrollTop() == $(document).height() - $(window).height()){
last_msg_funtion();
}
}); 


});
		
	*/	
