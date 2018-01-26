var imgpicExtBaseUrl = "https://imgpic.org/";

  console.log(chrome.storage);
function mouseOver() {
    console.log("test");
   }
   
   function mouseOut() {
       
   }

function initImgPicChromeExt() {

  var images =  $("img");
console.log(images);
    console.log("hello worldp");

//var images = document.images;    
var length = images.length;
console.log(length);
for(var i=0;i<length;i++) {
 //   console.log(images[i]);
}
   

}

function imgpicAjaxCall(url,data,callback) {
    console.log("going to call ajax");
    var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         callback(this.responseText);
        }
      };
    xmlhttp.open("POST", url);
    //xmlhttp.setRequestHeader("Content-Type", "application/json");
    /*
    
    */
    xmlhttp.send(data);
}
function imgpicAppendHtml(el, str) {
    var div = document.createElement('div');
    div.innerHTML = str;
    while (div.children.length > 0) {
      el.appendChild(div.children[0]);
    }
  }
  


  function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
(function(){
//    console.log(chrome.cookies.getAllCookieStores());
    var sessionId = "";
    sessionId = getCookie("imgpic_session_id");

    console.log(sessionId);
        var url = imgpicExtBaseUrl+"chrome/init/"+sessionId;
            imgpicAjaxCall(url,{},function(res){
            imgpicAppendHtml(document.body, res);
        });
})();


function resizeDcsModal(id) {
    var modalele = document.getElementById(id);
    
    
    var windowwidth = window.innerWidth;
    var modalwidth = windowwidth*0.6;
    var left  = (windowwidth / 2) - (modalwidth / 2);
    
    console.log("left");
    
    console.log(left);
    modalele.style.left = left+"px";
}


function imgpicRemoveClass(id,className) {
    element = document.getElementById(id);
    element.classList.remove(className);
}
function initDcsModal(id) {
    resizeDcsModal(id);
    imgpicRemoveClass(id,"hide");
    
}


function imgpicChomeLogin(oFormElement,e) {
    e.preventDefault();
    var username = document.getElementById("imgpic_chrome_username").value;
    var password = document.getElementById("imgpic_chrome_password").value;
    var url = imgpicExtBaseUrl+"chrome/login";
    var data = {imgpic_username:username,imgpic_password:password};
    console.log(data);
    imgpicAjaxCall(url,new FormData (oFormElement),function(res){
            var result = JSON.parse(res);
            if(result.status=="pass") {
                var session = {imgpic_session_id:result.session_id};
                chrome.cookies.set(session);
                 console.log(session);   
                //window.navigator.webkitPersistentStorage.imgpic_session_id = result.session_id;
                //console.log(window.navigator.webkitPersistentStorage.imgpic_session_id);
                // Put the object into storage
              //  setCookie("imgpic_session_id",result.session_id,30);
               // localStorage.setItem('imgpic_session_id', result.session_id);
                //localStorage.removeItem('getSessionStorage', 'foobar');
                  
            }
    });
   // return false;
}
