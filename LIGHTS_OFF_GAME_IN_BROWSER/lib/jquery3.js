  $(document).ready(function(){ 
	initialize();
	$(".box").hover(function(){
		$(this).css("border-color","white");
		}, function(){
			$(this).css("border-color","black");
	});
	function initialize(){
			var light=[0,1,1,1,0,1,0,1,1,1,0,1,0,1,1,0,1,1,1,0,0,0,0,0,1];
			for(var i=0;i<25;i++){
				if(light[i]==1){
					$('#'+(i+1)).css("backgroundColor","#0f9664")
				}
				else{
					$('#'+(i+1)).css("backgroundColor","rgb(40,40,400)")
				}
			}
	}
	var light=[0,1,1,1,0,1,0,1,1,1,0,1,0,1,1,0,1,1,1,0,0,0,0,0,1];

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
	var clicks=0;
	$(".box").click(function(){
		clicks++;
		
		x=$(this).attr("id");
		if(x==1){
			toggle(1);toggle(2);toggle(6);}
		if(x==2){
			toggle(2);toggle(1);toggle(3);toggle(7);}
		if(x==3){
			toggle(3);toggle(2);toggle(4);;toggle(8);}
		if(x==4){
			toggle(4);toggle(3);toggle(5);toggle(9);}
		if(x==5){
			toggle(5);toggle(4);toggle(10);}
		if(x==6){
			toggle(6);toggle(1);toggle(7);toggle(11);}
		if(x==7){
			toggle(7);toggle(2);toggle(6);toggle(12);toggle(8);}
		if(x==8){
			toggle(8);toggle(3);toggle(7);toggle(9);toggle(13);}
		if(x==9){
			toggle(9);toggle(4);toggle(8);toggle(10);toggle(10);}
		if(x==10){
			toggle(10);toggle(5);toggle(9);toggle(15);}
		if(x==11){
			toggle(11);toggle(6);toggle(12);toggle(16);}
		if(x==12){
			toggle(12);toggle(7);toggle(11);toggle(17);toggle(13);}
		if(x==13){
			toggle(13);toggle(8);toggle(12);toggle(14);toggle(18);}
		if(x==14){
			toggle(14);toggle(9);toggle(13);toggle(15);toggle(19);}
		if(x==15){
			toggle(15);toggle(10);toggle(14);toggle(20);}
		if(x==16){
			toggle(16);toggle(11);toggle(17);toggle(21);}
		if(x==17){
			toggle(17);toggle(12);toggle(16);toggle(18);toggle(22);}
		if(x==18){
			toggle(18);toggle(13);toggle(17);toggle(19);toggle(23);}
		if(x==19){
			toggle(19);toggle(14);toggle(18);toggle(20);toggle(24);}
		if(x==20){
			toggle(20);toggle(15);toggle(19);toggle(25);}
		if(x==21){
			toggle(21);toggle(16);toggle(22);}
		if(x==22){
			toggle(22);toggle(17);toggle(21);toggle(23);}
		if(x==23){
			toggle(23);toggle(18);toggle(22);toggle(24);}
		if(x==24){
			toggle(24);toggle(19);toggle(23);toggle(25);}
		if(x==25){
			toggle(25);toggle(20);toggle(24);}
		$("#counter").html("Clicks : "+clicks);
	if(light[1]==0&&light[2]==0&&light[3]==0&&light[4]==0&&light[5]==0&&light[6]==0&&light[7]==0&&light[8]==0&&light[0]==0&&light[9]==0&&light[10]==0&&light[11]==0&&light[12]==0&&light[13]==0&&light[14]==0&&light[15]==0&&light[16]==0&&light[17]==0&&light[18]==0&&light[19]==0&&light[20]==0&&light[21]==0&&light[22]==0&&light[23]==0&&light[24]==0&&light[25]==0){
	$("#win").css("display","block");}
	});

	}
	
	
);