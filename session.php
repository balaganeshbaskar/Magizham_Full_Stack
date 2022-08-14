<?php
//before we store information of our member, we need to start first the session

session_start();

//create a new function to check if the session variable member_id is on set
function logged_in() {
return isset($_SESSION['MEMBER_ID']);

}
//this function if session member is not set then it will be redirected to index.php
function confirm_logged_in()
{
	if (!logged_in())
		{ ?>;
			<script type="text/javascript">;
			window.location = "login.php";
			</script>

		<?php
		}
}

//this function if session member is not set then it will be redirected to index.php
function confirm_logged_in_teacher()
{
	if(logged_in())
	{
		if(get_user_type() != 'teacher')
		{
			?>;
			<script type="text/javascript">;
			window.location = "login.php";
			</script>

			<?php

		}
	}
	if (!logged_in())
		{ ?>;
			<script type="text/javascript">;
			window.location = "login.php";
			</script>

		<?php
		}
}


function logged_out()
{
	if (!logged_in())
	{ 
		return True;
	}
	else
	{
		return False;
	}
}


//function to return the type of user
function get_user_type()
{
	return $_SESSION['USER_TYPE'];
}

?>