// JavaScript Document
var jsReady = false;
function isReady() 
{
 return jsReady;
}
function pageInit() {
 jsReady = true;
// document.forms["form1"].output.value += "\n" + "JavaScript is ready.\n";
}
function thisMovie(movieName) {
 if (navigator.appName.indexOf("Microsoft") != -1) {
	 return window[movieName];
 } else {
	 return document[movieName];
 }
}
function sendToActionScript(value) {
 thisMovie("cobrowsing").sendToActionScript(value);
}
function sendToJavaScript(value) { //alert(value)
 userList=Array();
 //alert(value.split("|"))
 userList=value.split("|");
 //alert(userList)
 $("#userList").empty();
 for(var i=0;i<userList.length;i++)
 {
 	u=userList[i].split(":");
	$("#userList").append("<div id='"+u[0]+"' class=\"userBlock\">"+u[1]+"</div>");
 }
 //$("#framecontent").attr("src",value);
 
 //$("#framecontent").attr("src", value);
 //document.getElementById("framecontent").src=value;
 //document.forms["form1"].output.value += "ActionScript says: " + value + "\n";
}