$(document).ready(function(){
	$(".info-avatar").hide();
	$(".info-info").hide();
	$(".info-books").hide();
	$(".info-activity").hide();
	$(".info-work").hide();
	$(".info-mail").hide();
	$(".avatar").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-avatar").show("slow");
		$(".info-info").hide();
		$(".info-books").hide();
		$(".info-activity").hide();
		$(".info-work").hide();
		$(".info-mail").hide();
	},function(){
		$(".info-avatar").hide("drop", { direction: "down" }, "fast");
	});
	$(".info").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-info").show("slow");
		$(".info-avatar").hide();
		$(".info-books").hide();
		$(".info-activity").hide();
		$(".info-work").hide();
		$(".info-mail").hide();
	},function(){
		$(".info-info").hide("drop", { direction: "down" }, "fast");
	});
	$(".books").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-books").show("slow");
		$(".info-info").hide();
		$(".info-avatar").hide();
		$(".info-activity").hide();
		$(".info-work").hide();
		$(".info-mail").hide();
	},function(){
		$(".info-books").hide("drop", { direction: "down" }, "fast");
	});
	$(".activity").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-activity").show("slow");
		$(".info-info").hide();
		$(".info-avatar").hide();
		$(".info-books").hide();
		$(".info-work").hide();
		$(".info-mail").hide();
	},function(){
		$(".info-activity").hide("drop", { direction: "down" }, "fast");
	});
	$(".work").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-work").show("slow");
		$(".info-info").hide();
		$(".info-avatar").hide();
		$(".info-activity").hide();
		$(".info-books").hide();
		$(".info-mail").hide();
	},function(){
		$(".info-work").hide("drop", { direction: "down" }, "fast");
	});
	$(".mail").hover(function(){
		$(".info-default").hide("drop", { direction: "down" }, "fast");
		$(".info-mail").show("slow");
		$(".info-info").hide();
		$(".info-avatar").hide();
		$(".info-activity").hide();
		$(".info-books").hide();
		$(".info-work").hide();
	},function(){
		
	});
});