  $(document).ready(function(){ 
	initialize();
	$(".box").hover(function(){
		$(this).css("border-color","white");
		}, function(){
			$(this).css("border-color","black");
	});
	function initialize(){
			var light=[0,1,1,1,0,1,0,1,1];
			for(var i=0;i<10;i++){
				if(light[i]==1){
					$('#'+(i+1)).css("backgroundColor","#0f9664")
				}
				else{
					$('#'+(i+1)).css("backgroundColor","rgb(40,40,400)")
				}
			}
	}
	var light=[0,1,1,1,0,1,0,1,1];

	function toggle(y){
		
		if(light[y-1]==0){
			$('#'+y).animate({
			backgroundColor: "rgb(15,150,100)"
		});
			light[y-1]=1;
		}
		else if(light[y-1]==1){
			$('#'+y).animate({
			backgroundColor: "rgb(40,40,400)"
		});
			light[y-1]=0;
		}
	}
	$(".box").click(function(){
		x=$(this).attr("id");
		if(x==1){
			toggle(1);toggle(2);toggle(4);}
		if(x==2){
			toggle(2);toggle(1);toggle(3);toggle(5);}
		if(x==3){
			toggle(3);toggle(2);toggle(6);}
		if(x==4){
			toggle(4);toggle(1);toggle(5);toggle(7);}
		if(x==5){
			toggle(5);toggle(2);toggle(4);toggle(6);toggle(8);}
		if(x==6){
			toggle(6);toggle(3);toggle(5);toggle(9);}
		if(x==7){
			toggle(7);toggle(4);toggle(8);}
		if(x==8){
			toggle(8);toggle(5);toggle(7);toggle(9);}
		if(x==9){
			toggle(9);toggle(6);toggle(8);}
	if(light[1]==0&&light[2]==0&&light[3]==0&&light[4]==0&&light[5]==0&&light[6]==0&&light[7]==0&&light[8]==0&&light[0]==0){
	$("#win").css("display","block");}
	});

	}
	
	
);