<footer class="footer">

    <div class="container">

        <p>&copy; uConnect Blog</p>

    </div>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>


<script>

    $(".toggleFollow").click(function() {

        var id = $(this).attr("data-userId");

        $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userId=" + id,
            success: function(result) {

                if (result == "1") {

                    $("a[data-userId='" + id + "']").html("Follow");

                } else if (result == "2") {

                    $("a[data-userId='" + id + "']").html("Unfollow");

                }
            }

        })

    })

    $("#postBlogButton").click(function() {

        $.ajax({
            type: "POST",
            url: "actions.php?action=postBlog",
            data: "tweetContent=" + $("#tweetContent").val(),
            success: function(result) {

                if (result == "1") {

                    $("#tweetSuccess").show();
                    $("#tweetFail").hide();

                } else if (result != "") {

                    $("#tweetFail").html(result).show();
                    $("#tweetSuccess").hide();

                }
            }

        })

    })

</script>


  </body>
</html>
