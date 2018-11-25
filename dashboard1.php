<?php
  require "header.php";
?>

<main>
  <div class="container content-frame border rounded">
      <br>
      <h1 class="col">Gateway Dashboard</h1>
      <hr class="hr-header">
      <div class="div-dictionary">
        <form  action="dictionary.php" method="get">


        <?php
          require "./includes/dbh.inc.php";

          $sql = "SELECT * FROM users";
          // $sql = "SELECT * FROM dictionary";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {  //connection failed
            header("Location: dashboard.php?error=sqlerror");
            exit();
          } else {  //no errors, show dictionary buttons
            mysqli_stmt_execute($stmt);
            if ($result = mysqli_stmt_get_result($stmt)) { //true: there are results to display
              while ($row = mysqli_fetch_assoc($result)) { //display results as dictionary buttons
                $dictionaryID = $row['uidUsers'];
                print "<button type=\"submit\" class=\"btn btn-primary btn-block btn-dictionary text-left truncate\" name=\"dictionaryID\" value=$dictionaryID> Dictionary ";
                print_r($dictionaryID);
                print "</button>";
              } //end of while: display results as dictionary buttons
            }//end of if: there are results to display
          }//end of if: connection failed
        ?>

        </form>
      </div>
      <br>
  </div>
</main>

<?php
  require "footer.php";
?>
