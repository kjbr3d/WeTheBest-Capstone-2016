
	var my_updater = 5;
	var running = false;
	var counter = 0;
	function chat_initialize(sender,receiver){

		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {stage:"initial",
			sender: sender,
			receiver: receiver},
			success: function(data){

				if(data != "good"){
					alert(data);
				}else{

					chat_load();
					running = true;

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

				setTimeout("chat_load();", 1000*my_updater*2);




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
				if (data == "good"){
					document.getElementById("chat_text").value = '';
					chat_load();

				}else{
					alert(data);
				}


			}
		});

	}
	/* Gets the chat participant's names and display it in the div with and ID
	 * of users
	 */
	function get_participants_names(sender , receiver){
		$.ajax({
			type: "POST",
			url: "chat.php",
			data: {
				stage: "get_names",
				sender: sender,
				receiver: receiver
			},
			success: function(data){
				//alert(data);
				$("#users").html(data);

			}
		});
	}
	/* Gets the Users and initiate the chat.
	 * Also loads prvious chats
	 */
	function get_id(sender, receiver){
		var userId = $_GET(receiver);
		get_participants_names(sender, userId);
		chat_load();

	}
	// Function to grab information from the URL
	function $_GET(q,s) {
		s = (s) ? s : window.location.search;
		var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
		return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
	}
