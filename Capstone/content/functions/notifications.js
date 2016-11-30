function display_notifications(userId){
    $.ajax({
        type: "POST",
        url: "notification.php",
        data: {
        stage: "display",
        id:userId},
        success: function(data){

                $("#notification_list").html(data);

        }
    });

}
function get_notifications(userId){

    $.ajax({
        type: "POST",
        url: "notification.php",
        data: {
        stage: "get",
        id:userId},
        success: function(data){

                display_notifications(userId);
                $("#my_notify").html(data);
                setTimeout(get_notifications, 30000, userId);

        }
    });

}
function update(userId){
    $.ajax({
        type: "POST",
        url: "notification.php",
        data: {
        stage: "update",
        id:userId},
        success: function(data){
            get_notifications(userId);

        }
    });
    return true;
}
