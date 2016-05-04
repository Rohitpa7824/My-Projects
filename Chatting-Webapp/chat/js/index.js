$(document).ready(function(){

var msg,user,other,dataString,i,j;
var count = 'count=0';
var	sender = $('#username').html();
var other = $('#receivername').html();

//To continuously check for replies
setInterval(function(){
	
	$.ajax({
		type:"POST",
		url:"php/checkforreply.php",
		data: count,
		success: function(response){
			if(response['count']>0)
			{
				for(i=1;i<=response['count'];i++)
				{
					if(response[i+'s']!=sender)
					{
						$('.chat-thread').append("<div class='receivedmsg row'><li>" + response[i+'m'] + "</li><br></div>");
						$('.chat-thread').animate({scrollTop: $('.chat-thread').prop("scrollHeight")}, 500);
					}
				}
			}
		},
		error: function(response){
			//console.log("Message not sent");
			//console.log(response);
		}
	});

},3000);

//when submit button is clicked
$('#sendbutton').click(function(){
	msg = $('#msginput').val();

	$('#msginput').val('');
	$('.chat-thread').append("<div class='sentmsg row'><li>" + msg + "</li><br></div>");
	$('.chat-thread').animate({scrollTop: $('.chat-thread').prop("scrollHeight")}, 500);
	dataString = 'msg=' + msg +"&sender=" + sender + "&receiver=" + other;
	$.ajax({
		type: "POST",
		url: "php/msgsent.php",
		data: dataString,
		success: function(data){
			console.log("MSG SENT SUCCESSFUL");
		}
		
	});
	return false;
});

});