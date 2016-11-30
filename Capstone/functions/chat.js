
	var my_updater = 5;
	var running = false;
	var counter = 0;
	function chat_initialize(){
		var user = document.getElementById("chat_user").value
		/*$.post("chat.php", {user: user}, function(data){
			alert(data);
		});*/
		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {stage:"initial",
			user: user},
			success: function(data){

				if(data != "good"){
					alert(data);
				}else{
					//Mark Vassell

					chat_load();
					running = true;
					$('#initial').css('display', 'none');
					$('#primary').css('display', 'inline');
				}

			}
		});

	}

	function chat_update(){
		if(counter == my_updater){
			chat_load();
		}else{
			counter ++;
		}
		if(running == true){
			setTimeout("chat_update();", 10000);
		}
	}
	function chat_load(){
		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {
				stage: "load",
			},
			success: function(data){
				//alert(data);
				$("#window").html(data);
				document.getElementById("chat_text").value = '';
				setTimeout("chat_load();", 1000*my_updater*4);




			}
		});
	}
	function chat_send(){
		var text = document.getElementById("chat_text").value
		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {
				stage: "send",
				IM: text
			},
			success: function(data){
				//alert(data);
				//$("#window").html($("#window").html()+data);
				//document.getElementById("chat_text").value = '';
				if (data == "good"){
					chat_load();

				}else{
					alert(data);
				}


			}
		});

	}
	function $_GET(q,s) {
	    s = (s) ? s : window.location.search;
	    var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
	    return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
	}
