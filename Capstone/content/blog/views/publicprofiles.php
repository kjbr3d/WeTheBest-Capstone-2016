<div class="container mainContainer">

    <div class="row">
  <div class="col-md-8">

      <?php
        if (isset($_GET['userid'])) {


       displayBlogs($_GET['userid']);

       } else {

        echo '<h2>Active Users</h2>';

         displayUsers();

       } ?>

    </div>

  </div>

</div>
