<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

<?php

require('session.php');
require('connect.php');

// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));

function generateRandomString($length = 20) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if (isset($_POST['btnlogin'])) 
{


  $uname = trim($_POST['uname']);
  $pass = trim($_POST['pass']);

  // $h_pass = sha1($pass); 

  if ($pass == '')
  {
    ?>    
      <script type="text/javascript">
        alert("Password is missing!");
        window.location = "login.php";
      </script>
    <?php
  }
  else 
  {

    //create some sql statement        
    $result = $mysqli->query("SELECT * FROM credentials where uname='$uname'") or die($mysqli->error);   
    // $result = $mysqli->query("SELECT * FROM credentials where uname='$uname' and pass='$pass'") or die($mysqli->error);
    
    if ($result)
    {
      $data = $result->fetch_assoc();
      $attempts_left = $data['attempts']; 

      if($attempts_left > 0) // If there are attempts left!!
      {

        $passhash = $data['pass']; 

        // echo "<br>Hashed: ".$passhash;
        // echo "<br>password: ".$pass;

        if (!password_verify($pass, $passhash)) // Wrong password
        {

          $new_attempts_left = $attempts_left - 1;

          $mysqli->query("UPDATE credentials SET attempts='$new_attempts_left' where uname='$uname'") or die($mysqli->error());

          if($new_attempts_left == 3)
          {

            // $mysqli->query("UPDATE credentials SET attempts='$new_attempts_left' where uname='$uname'") or die($mysqli->error());

            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 3 attempts left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 2)
          {
            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 2 attempts left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 1)
          {
            ?>
              <script type="text/javascript">
                alert("Wrong Password retry! Only 1 attempt left!");
                window.location = "login.php";
              </script>
            <?php
          }
          else if($new_attempts_left == 0)
          {
            ?>
                <script type="text/javascript">
                  alert("Wrong Password! No attempts left! Please Contact Admin and Reset your password!");
                  window.location = "login.php";
                </script>
              <?php
          }
          else
          {
            $temp_attempts_left = 0;
            $mysqli->query("UPDATE credentials SET attempts='$temp_attempts_left' where uname='$uname'") or die($mysqli->error());
            ?>
              <script type="text/javascript">
                alert("Wrong Password! Please Contact Admin and Reset your password!");
                window.location = "login.php";
              </script>
            <?php
          }
        }
        else // Correct password
        {
            $sss_id = $data['s_id'];

            $uname = $data['uname']; 

            if($data['type'] == 'teacher')
            {
                $for_name = $mysqli->query("SELECT * FROM teachers where s_id='$sss_id'") or die($mysqli->error);  
                $datass = $for_name->fetch_assoc();
      
                $t_fname = $datass['t_fname']; 
                $t_grade = $datass['t_grade']; 
                $t_subject = $datass['t_subject'];
                $t_classteacher = $datass['classteacher'];

                $_SESSION['T_GRADE'] = $t_grade; 
                $_SESSION['T_SUBJECT'] = $t_subject;
                $_SESSION['USER_NAME'] = $t_fname;
                $_SESSION['T_CLASSTEACHER'] = $t_classteacher;
            }
            else
            {
                $_SESSION['USER_NAME'] = $data['uname']; 
            }
            
            $_SESSION['MEMBER_ID']  = $data['s_id']; 
            $_SESSION['USER_TYPE'] = $data['type'];
            

            $mysqli->query("UPDATE credentials SET attempts=3 where uname='$uname'") or die($mysqli->error());
            
            if( $data['type'] == 'admin')
            {
                ?>    <script type="text/javascript">
                  //then it will be redirected to index.php
                  window.location = "adminaccess.php";
                    </script>
                <?php 
            }  

            else if( $data['type'] == 'teacher')
            {
                ?>    <script type="text/javascript">
                  //then it will be redirected to index.php
                  window.location = "adminpanel.php";
                    </script>
                <?php 
            }       

            else if( $data['type'] == 'student')
            {
                ?> 
                <script type="text/javascript">
                  window.location = "studentprofile.php?aca_year=current";
                </script> 
                <?php
            }  

            else if( $data['type'] == 'parent')
            {
                ?> 
                <script type="text/javascript">
                  window.location = "studentprofile.php?aca_year=current";
                </script> 
                <?php
            } 

        }
      }
      else // if no attempts left !
      {

        if( $data['type'] == 'admin')
        {
        
          // echo "hello kids!";
          $before_hash = generateRandomString();
          // echo "<br> before_hash: ".$before_hash;

          $hash = password_hash($before_hash, PASSWORD_DEFAULT);
          // $sql = "INSERT INTO users (id, full_name, email, password, username, sign_up_date, activated) VALUES ('', '$full_name', '$email', '$hash', '$username', '$date', '1')";
          // echo "<br> Hash: ".$hash;
          
          $reset_pass = $mysqli->query("INSERT INTO reset_table (time_reset, hash) VALUES ('9:00 PM', '$hash')");

          if($reset_pass)
          {

            ?>
            <script type="text/javascript">
              // alert("Add ifttt mailing password reset!");

              var key = "eK7COfMokP_XkmWpxBHEPHU3Dxkzu7It0wJjBthr2Xs"; // << YOUR KEY HERE
              var message_name = "Magizham_Admin_Password_Reset";    // << YOUR MESSAGE NAME HERE
              var urls = "https://maker.ifttt.com/trigger/" + message_name + "/with/key/" + key;
              
              var text = "<br>http://localhost/magizham/reset_pass.php?id=<?php echo $before_hash;?>";

              // alert("111");

              $.ajax({  
              url: urls,	
              data: { value1: text },
              dataType: "jsonp",
              complete: function(jqXHR, textStatus) {
                // alert("Mail sent! Please check!");
                
                // alert("0 remaining Attempts left! Please Contact Admin and Reset your password !!");
                window.location = "login.php"; 

              } 
              }); 

              // alert("222");
            </script>
            <?php

          }
          else
          {

          }

        }  
        else
        {
          ?>
            <script type="text/javascript">
              alert("0 remaining Attempts left! Please Contact Admin and Reset your password !!");
              window.location = "login.php";
            </script>
          <?php 
        }
      }

    } 
    else
    {
      ?>    <script type="text/javascript">
            alert("Username Not Registered! Contact Your administrator.");
            window.location = "login.php";
            </script>
          <?php
    }
    
  }       
} 

else
{

  if($_GET['from'] == 'teacher')
  {

    $_SESSION['TEACHER_ID']  = $_SESSION['MEMBER_ID'];
    $_SESSION['MEMBER_ID']  = $_GET['stu_id'];
    
    ?> 
    <script type="text/javascript">
      window.location = "studentprofile.php?aca_year=current";
    </script> 
    <?php
  }

  if($_GET['from'] == 'student')
  {
    $_SESSION['MEMBER_ID']  = $_GET['stu_id'];
    
    ?> 
    <script type="text/javascript">
      window.location = "adminpanel.php";
    </script> 
    <?php
  }
    

}
 
?>