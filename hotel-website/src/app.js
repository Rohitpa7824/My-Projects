var app=angular.module('hotel',[]);

app.controller('review',function($scope){
	var newcname;
	var newrev;
	$scope.newrev=[];
	$scope.newr={};
	$scope.reviews=[
		{
			Cname:"Alex",
			Review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga consequuntur ipsam ipsum perferendis, similique adipisci porro velit, temporibus sit. Itaque, recusandae, autem. Mollitia beatae repudiandae asperiores iure molestiae."
		},
		{
			Cname:"Rani",
			Review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga consequuntur ipsam ipsum perferendis, similique adipisci porro velit, temporibus sit. Itaque, recusandae, autem. Mollitia beatae repudiandae asperiores iure molestiae maiores velit sequi nemo quidem similique, consequatur, voluptates, nobis iusto repellendus! Officia."
		},
		{
			Cname:"Maria",
			Review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga consequuntur ipsam ipsum perferendis, similique adipisci porro velit, temporibus sit."
		},
		{
			Cname:"Rajan",
			Review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga consequuntur ipsam ipsum perferendis, similique adipisci porro velit, temporibus sit. Itaque, recusandae, autem. Mollitia beatae repudiandae asperiores iure molestiae maiores velit sequi nemo quidem similique, consequatur, voluptates, nobis iusto repellendus! Officia."
		}
	]
	$scope.add=function(){
		//$scope.newr={Cname: $scope.newr.name, Review: $scope.newr.review};
		//$scope.reviews[4]=$scope.rewr;
		//$scope.reviews.push($scope.newrev);
		//$scope.newr={Cname: $scope.newcname, Review: $scope.newrev};
		//$scope.reviews[4]=$scope.rewr;
		$scope.reviews.push({Cname: $scope.newcname, Review: $scope.newrev});
		$scope.newcname="";
		$scope.newrev="";
		//console.log($scope.reviews[3]);
		//console.log($scope.reviews[4]);
		
	}
})

app.controller('menuitem',function($scope){
	$scope.items=[
		{
			item:"Maggi",
			url:"../img/maggi.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Biryani",
			url:"../img/biryani.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Dalwada",
			url:"../img/dalwada.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Pani-Puri",
			url:"../img/panipuri.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Pasta",
			url:"../img/pasta.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Pizza",
			url:"../img/pizza.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		},
		{
			item:"Utthapam",
			url:"../img/utthapam.jpg",
			disp:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, voluptate cum accusantium distinctio commodi voluptatem et molestias sint odio maxime."
		}
	]
})