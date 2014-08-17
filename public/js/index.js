
$(document).ready(function() {
	var quoteCount;
	$.ajax({
		dataType:"json",
		url:"/quotes/", 
		//semantically that's not right, that from 'index' i return NUMBER of 
		//quotes. I should return an array and calculate the number here.
		//however i don't know how to count array elems in js.. 	
		method:"get",
		success:function(data) {
			var quoteCount = data['count'];
			var randomQuote = Math.floor((Math.random() * quoteCount) + 1); 
			$.ajax({
				contentType:"application/json",
				dataType:"json",
				url:"/quotes/"+randomQuote+"/",
				method:"get",
				success:function(data) {
					$(".taskInput").attr("placeholder", data['content']);
				}
			});
		}
	});
});