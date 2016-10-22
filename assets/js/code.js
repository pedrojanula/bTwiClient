$(window).load(function(){
	$("#message").hide();

	$("#btnTweet").click(function(){
		$("#message").hide();
		var tweet = $("#tweetToSend").val();
		if(tweet.length > 140){
			$("#message div").addClass("alert-danger");
			$("#message div").text("The tweet can not exceed 140 characters.");
			$("#message").show();
		}else if(tweet.length == 0){
			$("#message div").addClass("alert-danger");
			$("#message div").text("You must write something.");
			$("#message").show();
		}else if((tweet.length < 141) && (tweet.length > 0)){
			$.ajax({
	  			method: "POST",
	  			url: "sendTweet.php",
	  			data: { status: tweet }
			})

	  		.done(function( msg ) {
	    		if(msg == true){
	    			$("#message div").addClass("alert-success");
					$("#message div").text("The tweet has been sent correctly.");
					$("#message").show();
					$("#tweetToSend").val('');
					$("#characters").css("color", "#777777");
					$("#characters").text("0/140");
					setTimeout(function(){
						$("#message").hide();
					}, 3000);
	    		}else{
	    			$("#message div").addClass("alert-danger");
					$("#message div").text("An error has occurred.");
					$("#message").show();
	    		}
	  		});
		}
	});

	$("#tweetToSend").bind('input propertychange', function(){
		var text = $("#tweetToSend").val();
		if(text.length > 140){
			$("#characters").css("color", "red");
		}else{
			$("#characters").css("color", "#777777");
		}
		$("#characters").text(text.length + "/140");

	});
});