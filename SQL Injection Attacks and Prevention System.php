h3 class="text-center"><span class="label label-danger">
Vulnerable Standard Login</span></h3><br>
      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login1.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-8">
                <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-8">
                <input name="password" type="text" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>S
      <?php
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                             $username,
                             $password);

            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Authenticated as <strong>" . $username . "</strong></p>";

                // ...
                // $_SESSION['logged_user'] = $username;
                // ...
            }
            else
            {
                echo "<p class=\"text-center\">Wrong username/password combination.</p>"  } ?>
#STANDARD LOGIN - Secure
<?php
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                             mysqli_real_escape_string($connection, $username),
                             mysqli_real_escape_string($connection, $password));

            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Authenticated as <strong>" . $username . "</strong></p>";

            }
            else
            {
                echo "<p class=\"text-center\">Wrong username/password combination.</p>";
            }
      ?>
#NUMERIC LOGIN - Vulnerable
<?php
        if ($_GET['attempt'] != 1)
        {
      ?>

      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login3.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
              <div class="col-sm-8">
                <input name="client" type="text" class="form-control" id="inputEmail3" placeholder="Your client ID">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">PIN</label>
              <div class="col-sm-8">
                <input name="pin" type="text" class="form-control" id="inputPassword3" placeholder="Your PIN">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
      <?php
        }
        else
        {
            $client = $_POST['client'];
            $pin = $_POST['pin'];

            $query = sprintf("SELECT * FROM clients WHERE id = %s AND pin = %s;",
                             mysqli_real_escape_string($connection, $client),
                             mysqli_real_escape_string($connection, $pin));

            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Authenticated as <strong>" . $client . "</strong></p>";
            }
            else
            {
                echo "<p class=\"text-center\">Wrong client/PIN combination.</p>";
            } ?>
#NUMERIC LOGIN - Secure
<?php
        if ($_GET['attempt'] != 1)
        {
      ?>

      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login4.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
              <div class="col-sm-8">
                <input name="client" type="text" class="form-control" id="inputEmail3" placeholder="Your client ID">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">PIN</label>
              <div class="col-sm-8">
                <input name="pin" type="text" class="form-control" id="inputPassword3" placeholder="Your PIN">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php
        }
        else
        {
            $client = $_POST['client'];
            $pin = $_POST['pin'];

            if (is_numeric($client) && is_numeric($pin))
            {
                $query = sprintf("SELECT * FROM clients WHERE id = %s AND pin = %s;",
                                 mysqli_real_escape_string($connection, $client),
                                 mysqli_real_escape_string($connection, $pin));

                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0)
                {
                    echo "<p class=\"text-center\">Authenticated as <strong>" . $client . "</strong></p>";

                    // ...
                    // $_SESSION['logged_user'] = $client;
                    // ...
                }
                else
                {
                    echo "<p class=\"text-center\">Wrong client/PIN combination.</p>";
                }
            }
            else
            {
                echo "<p class=\"text-center\">Client ID and PIN must be numeric values.</p>";
            }
      ?>

      <?php } ?>
