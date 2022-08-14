

function stusetting()
{
    // alert("Create a settings modal to enable password change!");
    $('#settings_modal').modal('show');
    
}

function check_new_pass_again_teacher(content)
{
    
    var user_new_password, user_new_password_again;

    user_new_password = document.getElementById("user_new_password").value;
    user_new_password_again = document.getElementById("user_new_password_again").value;

    if(user_new_password_again.length > 0)
    {
        if(user_new_password == user_new_password_again)
        {
            document.getElementById("user_new_password_again").style.borderColor = "green";
            document.getElementById("user_new_password_again").style.borderWidth = "2px";

            document.getElementById("update_teacher_password").disabled = false;
        }
        else
        {
            document.getElementById("user_new_password_again").style.borderColor = "red";
            document.getElementById("user_new_password_again").style.borderWidth = "2px";

            document.getElementById("update_teacher_password").disabled = true;
        }
    }
    
}


function add_new_staff()
{
    document.getElementById("new_Staff_modal_title").innerHTML = "Adding New Staff";

    document.getElementById("t_fname").value = "";
    document.getElementById("t_fname").readOnly = false;
    document.getElementById("t_sname").value = "";
    document.getElementById("t_sname").readOnly = false;
    document.getElementById("t_grade").value = "Select Grade";
    document.getElementById("t_subject").value = "Select Subject";
    document.getElementById("t_id").value = "";
    document.getElementById("t_id").readOnly = false;
    document.getElementById("no").checked = true;

    document.getElementById("new_staff_update").hidden = true;
    document.getElementById("new_staff_remove").hidden = true;
    document.getElementById("new_staff_signup").hidden = false;

    

    $('#new_staff_modal').modal('show');
}

function edit_Staff(s_id)
{

    $(document).ready(function(){ 
        // var s_id = 1;
           $.ajax({
                url:"adminaccess_fetch.php",  
                method:"POST",  
                data:{edit_staff_details:s_id},  
                dataType:"json",
                success:function(data)
                {  	
                    // alert("success muchacho!");
                    document.getElementById("new_Staff_modal_title").innerHTML = "Updating Staff Data";

                    document.getElementById("t_fname").value = data.t_fname;
                    document.getElementById("t_fname").readOnly = true;
                    document.getElementById("t_sname").value = data.t_sname;
                    document.getElementById("t_sname").readOnly = true;
                    document.getElementById("t_grade").value = data.t_grade;
                    document.getElementById("t_subject").value = data.t_subject;
                    document.getElementById("t_id").value = data.t_id;
                    document.getElementById("t_id").readOnly = true;
                    
                    // alert(data.t_classteacher);

                    if(data.t_classteacher == "yes")
                    {
                        document.getElementById("yes").checked = true;
                    }
                    else
                    {
                        document.getElementById("no").checked = true;
                    }

                    document.getElementById("s_s_id").value = data.s_s_id;
                    document.getElementById("staff_remove_btn").value = data.s_s_id;
                    
                    
                    document.getElementById("new_staff_update").hidden = false;
                    document.getElementById("new_staff_remove").hidden = false;
                    document.getElementById("new_staff_signup").hidden = true;

                    $('#new_staff_modal').modal('show');
                }  
            });  

    });

}

function delete_staff_account()
{
    var s_id = document.getElementById("staff_remove_btn").value;
    // alert(id);

    $(document).ready(function(){ 
        // var s_id = 1;
           $.ajax({
                url:"adminaccess_fetch.php",  
                method:"POST",  
                data:{delete_staff_details:s_id},  
                dataType:"json",
                success:function(data)
                {  	
                    // document.getElementById("t_fname").value = data.t_fname;


                    // $('#new_staff_modal').modal('hide');

                    // location.reload();

                    location.href = "../magizham/adminaccess.php";
                }  
            });  

    });

}


function reset_pass_modal(s_id_type)
{
    // alert(s_id);
    document.getElementById("hidden_info").value = s_id_type;
    document.getElementById("reset_pass_yes").value = s_id_type;
    
    $('#reset_pass_modal').modal('show');
    
}


function reset_pass_confirm()
{
    var s_id_type = document.getElementById("hidden_info").value;
    // alert(s_id_type);
    
    // $('#reset_pass_modal').modal('show');

    $(document).ready(function(){ 
        // var s_id = 1;
           $.ajax({
                url:"adminaccess_fetch.php",  
                method:"POST",  
                data:{reset_pass:s_id_type},  
                dataType:"json",
                success:function(data)
                {  	
                    // $('#reset_pass_modal').modal('hide');
                    alert(data.type);
                    // location.href = "../magizham/adminaccess.php";
                    location.reload();
                }  
            });  

    });
}
