
function set_deadline_open_modal(s_id)
{
    // alert("hell yea!!");

    // document.getElementById("dl_staff_name").value = uname;

    // $('#deadline_modal').modal('show');

     // alert("Hel");
     $(document).ready(function(){ 
			
        // var s_id = 1;
           $.ajax({
                url:"deadline_set.php",  
                method:"POST",  
                data:{deadline_teacher_details:s_id},  
                dataType:"json",  
                success:function(data)
                {  	
                    // alert(data.dd);
                    document.getElementById("dl_staff_name").value = data.t_fname;
                    document.getElementById("dl_staff_sid").value = data.dd;
                    document.getElementById("dl_actual_grade").value = data.t_grade;
                    document.getElementById("dl_actual_subject").value = data.t_subject;

                    if(data.t_grade == "All") 
                    {
                        document.getElementsByName("dl_grade_input")[0].hidden = true;
                        document.getElementsByName("dl_grade_select")[0].hidden = false;

                        // document.getElementsByName("dl_subject_input")[0].hidden = true;
                        // document.getElementsByName("dl_subject_select")[0].hidden = false;

                        document.getElementById("dl_grade_select").readOnly = false;
                        // document.getElementById("dl_subject").readOnly = false;

                    }
                    else
                    {

                        document.getElementById("dl_grade_input").value = data.t_grade;
                        // document.getElementById("dl_subject_input").value = data.t_subject;

                        document.getElementsByName("dl_grade_input")[0].hidden = false;
                        document.getElementsByName("dl_grade_select")[0].hidden = true;

                        // document.getElementsByName("dl_subject_input")[0].hidden = false;
                        // document.getElementsByName("dl_subject_select")[0].hidden = true;

                    }

                    // name="dl_subject_select_skills" id="dl_subject_skills"

                    if(data.t_subject == "All") 
                    {
                            
                        // document.getElementsByName("dl_grade_input")[0].hidden = true;
                        // document.getElementsByName("dl_grade_select")[0].hidden = false;

                        document.getElementsByName("dl_subject_input")[0].hidden = true;
                        document.getElementsByName("dl_subject_select")[0].hidden = false;
                        document.getElementsByName("dl_subject_select_skills")[0].hidden = true;

                        // document.getElementById("dl_grade").readOnly = false;
                        document.getElementById("dl_subject").readOnly = false;
                        
                    }
                    else if(data.t_subject == "Life Skills") 
                    {
                        document.getElementsByName("dl_subject_input")[0].hidden = true;
                        document.getElementsByName("dl_subject_select")[0].hidden = true;
                        document.getElementsByName("dl_subject_select_skills")[0].hidden = false;

                        // document.getElementById("dl_grade").readOnly = false;
                        document.getElementById("dl_subject_skills").readOnly = false;

                    }
                    else
                    {

                        // document.getElementById("dl_grade_input").value = data.t_grade;
                        document.getElementById("dl_subject_input").value = data.t_subject;
                        document.getElementsByName("dl_subject_select_skills")[0].hidden = true;

                        // document.getElementsByName("dl_grade_input")[0].hidden = false;
                        // document.getElementsByName("dl_grade_select")[0].hidden = true;

                        document.getElementsByName("dl_subject_input")[0].hidden = false;
                        document.getElementsByName("dl_subject_select")[0].hidden = true;

                    }
                    
                    // document.getElementById("dl_staff_name").value = data.t_id;
                    $('#deadline_modal').modal('show');
                }  
            });  

    });
    
}


function dl_list(value, type)
{
    // alert(value);

    if(type == "subject")
    {
        if(value != "Select Subject")
        {
            document.getElementById("dl_selected_subjects").innerHTML += value + "<br>";
            document.getElementById("dl_selected_subjects_value").value += value + "<br>";
            document.getElementById("selected_subjects").hidden = false;
        }
    }

    else if(type == "grade")
    {
        if(value != "Select Grade")
        {
            document.getElementById("dl_selected_grade").innerHTML += value + "<br>";
            document.getElementById("dl_selected_grade_value").value += value + "<br>";
            document.getElementById("selected_grade").hidden = false;
        }
    }

    else if(type == "date")
    {
        // alert("dated");
        document.getElementById("dl_selected_date").innerHTML = value;
        document.getElementById("selected_date").hidden = false;
    }

    // if(document.getElementById("selected_subjects").hidden == false && document.getElementById("selected_grade").hidden == false && document.getElementById("selected_date").hidden == false)
    // {
    //     document.getElementById("set_dl_button").disabled = false;
    // }
    // else
    // {
    //     document.getElementById("set_dl_button").disabled = true;
    // }
    
}

function past_date_checker()
{   
    var temp = new Date();
    var dummy_mins = String(temp.getMinutes());

    if(dummy_mins.length < 2)
    {
        var minss = "0" + String(temp.getMinutes());
    }
    else
    {
        var minss = temp.getMinutes();
    }

    // alert(minss);

    var temptime = temp.getHours() + ":" + minss;
    // var temptime = "16:34";

    var today = new Date().toISOString().split('T')[0];

    var start = document.getElementById("dl_start_date").value;
    var start_time = document.getElementById("dl_start_time").value;

    if(start < today)
    {
        alert("Can not set PAST DATE as deadline! Please change it...");    
        document.getElementById("dl_start_date").value = "";
        // document.getElementById("dl_start_time").value = "";


    }
    else if(start == today)
    {
        if(start_time < temptime)
        {
            alert("Can not set PAST TIME as deadline! Please change it...");    
            // document.getElementById("dl_start_date").value = "";
            document.getElementById("dl_start_time").value = temptime;
        }
    }

}


function past_date_check()
{
    // alert(value);  
    var start = document.getElementById("dl_start_date").value;
    var end = document.getElementById("dl_end_date").value;

    var start_time = document.getElementById("dl_start_time").value;
    var end_time = document.getElementById("dl_end_time").value;

    var today = new Date().toISOString().split('T')[0];

    var temp = new Date();
    var time = temp.getHours() + ":" + temp.getMinutes() + ":" + temp.getSeconds();
    var temptime = temp.getHours() + ":" + temp.getMinutes();


    var myArray1 = start.split("-");
    var myArray2 = start_time.split(":");
    var dl_start = new Date(myArray1[0],parseInt(myArray1[1])-1,myArray1[2],myArray2[0],myArray2[1]);
    // alert("dl_Start: \n" + dl_start+"\n start: \n" + start+"\n start_time: \n" + start_time);

    var myArray1 = end.split("-");
    var myArray2 = end_time.split(":");
    var dl_end = new Date(myArray1[0],parseInt(myArray1[1])-1,myArray1[2],myArray2[0],myArray2[1]);
    // alert("dl_End: \n" + dl_end+"\n End: \n" + end+"\n End_time: \n" + end_time);
    // alert(start_time+"\n"+time+"\n"+end_time);

    // if(start_time < time)
    // {
    //     // alert("Can not set PAST TIME as start time! Please change it...");    
    //     // document.getElementById("dl_start_time").value = "";
    //     if(start <= today)
    //     {
    //         alert("Can not set PAST TIME as start time! Please change it...");   
    //         document.getElementById("dl_start_time").value = temptime;
    //     }
    // }


    if(start != "" && end != "")
    {
        if (end >= start)
        {    
            // alert("Future");
            
            // var firstdate = new Date(end);
            // var seconddate = new Date(start);

            // const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            // var Difference_In_Time = (firstdate.getTime() - seconddate.getTime())/oneDay;

            // var diff = dl_end - dl_start;
            // alert("New Difference: "+diff);

            if (end_time >= start_time)
            {
                var seconds = Math.floor((dl_end - (dl_start))/1000);
                var minutes = Math.floor(seconds/60);
                var hours = Math.floor(minutes/60);
                var days = Math.floor(hours/24);
                
                var hours = hours-(days*24);
                var minutes = minutes-(days*24*60)-(hours*60);
                var seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

                // alert("Time until new year:\nDays: " + days + " Hours: " + hours + " Minutes: " + minutes + " Seconds: " + seconds);

                var diff = days + " Day(s) " + hours + " Hour(s) " + minutes + " Minute(s) ";
                // alert(Difference_In_Time);

                document.getElementById("set_dl_button").disabled = false;

                dl_list(diff, "date");


            }
            else
            {
                alert("Can not set PAST DATE as deadline! Please change it...");    
                document.getElementById("dl_end_date").value =  document.getElementById("dl_start_date").value;
                document.getElementById("dl_end_time").value = document.getElementById("dl_start_time").value;

                document.getElementById("set_dl_button").disabled = true;
            }
            
        }
        else
        {    
            alert("Can not set PAST DATE as deadline! Please change it...");    
            document.getElementById("dl_end_date").value =  document.getElementById("dl_start_date").value;
            document.getElementById("dl_end_time").value = document.getElementById("dl_start_time").value;

            document.getElementById("set_dl_button").disabled = true;
        }  


    }
    
    

}


function deadline_select_content(type)
{   
    document.getElementById("new_tab_dl").classList.remove("active");
    document.getElementById("history_tab_dl").classList.remove("active");

    document.getElementById("new_tab_dl").style.color = "white";
    document.getElementById("history_tab_dl").style.color = "white";

    document.getElementById("new_tab_dl").style.backgroundColor = "black";
    document.getElementById("history_tab_dl").style.backgroundColor = "black";

    document.getElementById("deadline_new_content").hidden = true;
    document.getElementById("deadline_history_content").hidden = true;

    if(type == 'new')
    {
        document.getElementById("deadline_new_content").hidden = false;
        document.getElementById("new_tab_dl").classList.add("active");
        document.getElementById("new_tab_dl").style.color = "black";
        document.getElementById("new_tab_dl").style.backgroundColor = "white";
    }
    else
    {
        document.getElementById("deadline_history_content").hidden = false;
        document.getElementById("history_tab_dl").classList.add("active");
        document.getElementById("history_tab_dl").style.color = "black";
        document.getElementById("history_tab_dl").style.backgroundColor = "white";
    }
}


function set_deadline()
{
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    var dl_staff_name = document.getElementById("dl_staff_name").value;
    var dl_selected_grade = document.getElementById("dl_selected_grade").innerHTML;
    var dl_selected_subjects = document.getElementById("dl_selected_subjects").innerHTML;
    var dl_start_date = document.getElementById("dl_start_date").value;
    var dl_start_time = document.getElementById("dl_start_time").value;
    var dl_end_date = document.getElementById("dl_end_date").value;
    var dl_end_time = document.getElementById("dl_end_time").value;

    // alert(today+"\n"+dl_staff_name+"\n"+dl_selected_grade+"\n"+dl_selected_subjects+"\n"+dl_start_date+"\n"+dl_start_time+"\n"+dl_end_date+"\n"+dl_end_time);

}


function teacher_subject_select(s_id, subject)
{
    var item_id = "";
    var life_skills = [];

    // For attendance
    var table_id = document.getElementById('studentdata');
    var inputNodes = table_id.getElementsByClassName('teacontrol');         
    for(var k = 0; k < inputNodes.length; ++k)
    {
        var inputNode = inputNodes[k];
        inputNode.readOnly = false;
    }

    switch(subject)
    {   
        //Life Skills
        case "Life Skills":
            life_skills = ["pq_deadline_counter", "tq_deadline_counter", "sq_deadline_counter", "eq_deadline_counter"];
            item_id = 'Life_Skills';
            break;
        
        case "All":
            life_skills = ["pq_deadline_counter", "tq_deadline_counter", "sq_deadline_counter", "eq_deadline_counter","lang1_deadline_counter","lang2_deadline_counter","math_deadline_counter","evs_deadline_counter","science_deadline_counter","ss_deadline_counter","art_deadline_counter"];
            item_id = 'All';
            break;

        case "Language I":
            item_id = 'lang1_deadline_counter';
            break;

        case "Language II":
            item_id = 'lang2_deadline_counter';
            break;

        case "Mathematics":
            item_id = 'math_deadline_counter';
            break;

        case "EVS":
            item_id = 'evs_deadline_counter';
            break;

        case "Science":
            item_id = 'science_deadline_counter';
            break;

        case "Social Studies":
            item_id = 'ss_deadline_counter';
            break;

        case "Arts, Crafts & Vocational":
            item_id = 'art_deadline_counter';
            break;

        default:
            item_id = 'error_deadline';
    }

    

    if(item_id == 'error_deadline')
    {
        console.log("Error in Subject Name!");
    }
    else if(item_id == 'Life_Skills')
    {
        for (let i = 0; i < life_skills.length; i++)
        {
            item_id = life_skills[i];
            var table_id = document.getElementById(item_id+"_table");
            var inputNodes = table_id.getElementsByClassName('teacontrol');         
            for(var k = 0; k < inputNodes.length; ++k)
            {
                var inputNode = inputNodes[k];
                inputNode.readOnly = false;
            }
        }
    }
    else if(item_id == 'All')
    {
        for (let i = 0; i < life_skills.length; i++)
        {
            item_id = life_skills[i];
            var table_id = document.getElementById(item_id+"_table");
            var inputNodes = table_id.getElementsByClassName('teacontrol');         
            for(var k = 0; k < inputNodes.length; ++k)
            {
                var inputNode = inputNodes[k];
                inputNode.readOnly = false;
            }
        }
    }
    else
    {
        var table_id = document.getElementById(item_id+"_table");
        var inputNodes = table_id.getElementsByClassName('teacontrol');         
        for(var k = 0; k < inputNodes.length; ++k)
        {
            var inputNode = inputNodes[k];
            inputNode.readOnly = false;
        }
    }
    


}

function check_deadline(s_id, user_type)
{
    // alert("Hel");
    $(document).ready(function(){ 
			
        // var s_id = 1;
           $.ajax({
                url:"deadline_check.php",  
                method:"POST",  
                data:{check_dl:s_id},  
                dataType:"json",  
                success:function(data)
                {  	
                    // $('#student_id').val(data.student_id);
                    // $('#name').val(data.name);
                    // $('#dob').val(data.dob);
                    // $('#age').val(data.check);

                    // alert(data.check);
                    // alert("OK");

                    if(data.check == "YES")
                    {   
                        // alert("yes!11");

                        $dl_start_date = data.dl_start_date;
                        $dl_start_time = data.dl_start_time;
                        $dl_end_date = data.dl_end_date;
                        $dl_end_time = data.dl_end_time;
                        $dl_selected_subjects = data.dl_selected_subjects;

                        const dl_start = [];
                        const dl_end = [];
                        const diff = [];
                        const dl_subjects = [];
                        
                        for (let i = 0; i < $dl_selected_subjects.length; i++)
                        {
                            dl_subjects.push($dl_selected_subjects[i]);

                            var myArray1 = $dl_start_date[i].split("-");
                            var myArray2 = $dl_start_time[i].split(":");
                            var start_temp = new Date(myArray1[0],parseInt(myArray1[1])-1,myArray1[2],myArray2[0],myArray2[1]);
                            dl_start.push(start_temp);
                            // alert("dl_Start: \n" + dl_start+"\n start: \n" + start+"\n start_time: \n" + start_time);

                            var myArray1 = $dl_end_date[i].split("-");
                            var myArray2 = $dl_end_time[i].split(":");
                            var end_temp = new Date(myArray1[0],parseInt(myArray1[1])-1,myArray1[2],myArray2[0],myArray2[1]);
                            dl_end.push(end_temp);

                            // Difference between end and start date
                            var seconds = Math.floor((end_temp - (start_temp))/1000);
                            var minutes = Math.floor(seconds/60);
                            var hours = Math.floor(minutes/60);
                            var days = Math.floor(hours/24);
                            
                            var hours = hours-(days*24);
                            var minutes = minutes-(days*24*60)-(hours*60);
                            var seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

                            // alert("Time until new year:\nDays: " + days + " Hours: " + hours + " Minutes: " + minutes + " Seconds: " + seconds);

                            var diff_temp = days + " Day(s) " + hours + " Hour(s) " + minutes + " Minute(s) ";
                            // alert(diff_temp);
                            diff.push(diff_temp);

                            // alert("123!");
                        }

                        // alert("Start: " + dl_start + "\n End: " + dl_end + "\n" + diff);

                        deadline_ensure(dl_start, dl_end, diff, dl_subjects, user_type);

                        // alert("sddsfsdf");
                    }

                }  
                });  
    });


}

const userAction = async () => {
    const response = await fetch('http://api.geonames.org/timezoneJSON?lat=12.74&lng=77.82&username=balaganeshbaskar');
    const myJson = await response.json(); //extract JSON from the http response
    // do something with myJson
    // console.log(myJson);
    // alert(myJson["time"]);
    return myJson["time"];
  }


// function get_current_internet_time()
// {
//     $(document).ready(function(){ 
//         $.ajax({
//             url:"http://api.geonames.org/timezoneJSON?lat=12.74&lng=77.82&username=balaganeshbaskar",  
//             method:"POST",  
//             // data:{check_dl:s_id},  
//             dataType:"json",  
//             success:function(data)
//             { 
//                 // $time = data.time;
//                 console.log(data.time);
//                 // return data.time;
//             }  
//         });  
//     });  

//     // return $time

// }
  


function deadline_ensure(start, end, diff, subjects, user_type)
{
    // var internet_time = get_current_internet_time();

    // console.log(internet_time);
    // alert(internet_time);
    // ;(async () => {
    //     const datss = await userAction();
    //     current_time_internet = datss;
    //     console.log(datss)
    //   })()



    // alert(start + "\n" + end + "\n" + diff + "\n"+ subjects);
    // alert(subjects);

    var today = new Date();
    // var today1 = new Date ( today );
    // today1.setMinutes ( today.getMinutes() - 30 );

    var start_check = 0;
    var notstart_check = 0;
    var scounter = 1;
    var nscounter = 1;

    for (let i = 0; i < start.length; i++)
    {

        const subjects_split = subjects[i].split("<br>");

        for (let j = 0; j < subjects_split.length; j++)
        {   
            if(subjects_split[j] != "")
            {
                if(today > start[i] && today < end[i])
                {
                    start_check = 1;

                    var new_row =   '<div id="started'+scounter+'">'+
                                        '<span id="ssno'+scounter+'"></b>'+scounter+') </b></span>'+
                                        // '<span><b>SUBJECT: </b></span>'+
                                        '<span id="ssubject'+scounter+'"><b>'+subjects_split[j]+'</b></span>'+
                                        '<span> ENDS: </span>'+
                                        '<span id="send'+scounter+'"><b>'+end[i]+'</b></span>'+
                                        '<span> REMAINING: </span>'+
                                        '<span id="sremaining'+scounter+'"><b>'+diff[i]+'</b></span>'+
                                    '</div>';
                    
                    $('#deadline_started').append(new_row);

                    deadline_countdown(end[i], subjects_split[j], "sremaining"+scounter, user_type);

                    scounter =  scounter + 1;
                }
                else if(today < start[i])
                {
                    notstart_check = 1;

                    var new_row =   '<div id="notstarted'+nscounter+'">'+
                                        '<span id="nssno'+nscounter+'">'+nscounter+') </b></span>'+
                                        // '<span><b>SUBJECT: </b></span>'+
                                        '<span id="nssubject'+nscounter+'"><b>'+subjects_split[j]+'</b></span>'+
                                        '<span> STARTS: </span>'+
                                        '<span id="nsstart'+nscounter+'"><b>'+start[i]+'</b></span>'+
                                        '<span> ENDS: </span>'+
                                        '<span id="nsend'+nscounter+'"><b>'+end[i]+'</b></span>'+
                                    '</div>';
                    
                    $('#deadline_notstarted').append(new_row);

                    nscounter =  nscounter + 1;
                }

            }
        }
    }

    if(start_check == 1)
    {
        document.getElementById("deadline_started").hidden = false;
    }

    if(notstart_check == 1)
    {
        document.getElementById("deadline_notstarted").hidden = false;
    }

}


function deadline_countdown(enddate, subject, alert_id, user_type)
{
    var item_id = "";
    switch(subject)
    {
        case "Physical Quotient":
            item_id = 'pq_deadline_counter';
        break;

        case "Thinking Quotient":
            item_id = 'tq_deadline_counter';
        break;

        case "Social Quotient":
            item_id = 'sq_deadline_counter';
        break;

        case "Emotional Quotient":
            item_id = 'eq_deadline_counter';
        break;

        case "Intellectual Quotient":
            item_id = 'iq_deadline_counter';
        break;

        case "Language I":
            item_id = 'lang1_deadline_counter';
        break;

        case "Language II":
            item_id = 'lang2_deadline_counter';
        break;

        case "Mathematics":
            item_id = 'math_deadline_counter';
        break;

        case "EVS":
            item_id = 'evs_deadline_counter';
        break;

        case "Science":
            item_id = 'science_deadline_counter';
        break;

        case "Social Studies":
            item_id = 'ss_deadline_counter';
        break;

        case "Arts, Crafts & Vocational":
            item_id = 'art_deadline_counter';
        break;

        default:
            item_id = 'error_deadline';
    }

    // Set the date we're counting down to
    var countDownDate = new Date(enddate).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    

    document.getElementById(item_id).innerHTML = "Deadline: " + days + " Day(s) " + hours + " Hour(s) "
    + minutes + " Minute(s) " + seconds + " Second(s) ";

    document.getElementById(alert_id).innerHTML = "<b>" + days + " Day(s) " + hours + " Hour(s) "
    + minutes + " Minute(s) " + seconds + " Second(s) ";
    
    var table_id = document.getElementById(item_id+"_table");
    
    if(user_type == 'student')
    {
        var inputNodes = table_id.getElementsByClassName('stucontrol');
    }
    else if(user_type == 'parent')
    {
        var inputNodes = table_id.getElementsByClassName('parcontrol');
    }

    for(var k = 0; k < inputNodes.length; ++k)
    {
        var inputNode = inputNodes[k];
        inputNode.readOnly = false;
    }

    // If the count down is finished, write some text
    if (distance < 0)
    {
        clearInterval(x);
        document.getElementById(item_id).innerHTML = "EXPIRED";
        document.getElementById(alert_id).innerHTML = "EXPIRED";

        for(var k = 0; k < inputNodes.length; ++k)
        {
            var inputNode = inputNodes[k];
            inputNode.readOnly = false;
        }
    }

    }, 1000);
}

function searchfun() // Filter function for all tab_name
{

    // alert("works!");
    var n,r,a, nfilter, rfilter, afilter, table, tr, td, i, txtValue;

    n = document.getElementById("namesearch");
    nfilter = n.value.toUpperCase();

    r = document.getElementById("rollnosearch");
    rfilter = r.value.toUpperCase();

    a = document.getElementById("attsearch");
    afilter = a.value;

    table = document.getElementById("studentdata");
    tr = table.getElementsByTagName("tr");


    // Showing all rows first
    for (i = 0; i < tr.length; i++) 
    {
        tr[i].style.display = "";   
    }

    // // To clear all checkboxes when filter changed
    // var checkboxes = document.getElementsByName('rows');
    // document.getElementById("selectall").checked = false;
    
    // for (let i = 0; i < checkboxes.length; i++)
    // {
    //     checkboxes[i].checked = false;
    //     tr[i+1].style.backgroundColor= "white";
    // }

    // applying filter
    for (let i = 0; i < tr.length; i++) 
    {
        if(n.value.length > 0)
        {	
            td = tr[i].getElementsByTagName("td")[1];
            if(td)
            {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(nfilter) > -1 && tr[i].style.display == "") 
                {
                    tr[i].style.display = "";
                } 
                else 
                {
                    tr[i].style.display = "none";
                }
            }	
        } 


        if(r.value.length > 0)
        {
            td = tr[i].getElementsByTagName("td")[3];
            if(td)
            {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(rfilter) > -1 && tr[i].style.display == "") 
                {
                    tr[i].style.display = "";
                } 
                else 
                {
                    tr[i].style.display = "none";
                }
            }
        }

        if(a.value.length > 0)
        {
            td = tr[i].getElementsByTagName("td")[6];
            if(td)
            {
                txtValue = td.textContent || td.innerText;

                if((parseInt(txtValue) >=  parseInt(afilter)) && tr[i].style.display == "")
                {
                    tr[i].style.display = "";
                } 
                else 
                {
                    tr[i].style.display = "none";
                }

                // if (txtValue.toUpperCase().indexOf(afilter) > -1 && tr[i].style.display == "") 
                // {
                //     tr[i].style.display = "";
                // } 
                // else 
                // {
                //     tr[i].style.display = "none";
                // }
            }
        }


        // if(a.value != "Amount Receivable")
        // {
        //     td = tr[i].getElementsByTagName("td")[5];
        //     if(td)
        //     {
        //         txtValue = td.textContent;
        //         price = txtValue;
        //         // const myArray = txtValue.split(" ");
        //         // let number = myArray[1];
        //         // const numarray = number.split(",");
        //         // var price = "";
                
        //         // for(let j =0; j < numarray.length; j++)
        //         // {
        //         //     price = price.concat(numarray[j]);
        //         // }

        //         if (a.value == "< ₹ 10,000" && parseInt(price) < 10000 && tr[i].style.display == "") 
        //         {
        //             tr[i].style.display = "";
        //         } 
        //         else if (a.value == "₹ 10k - ₹ 50k" && parseInt(price) > 10000 && parseInt(price) < 50000 && tr[i].style.display == "") 
        //         {
        //             tr[i].style.display = "";
        //         } 
        //         else if (a.value == "₹ 50k - ₹ 1 Lakh" && parseInt(price) > 50000 && parseInt(price) < 100000 && tr[i].style.display == "") 
        //         {
        //             tr[i].style.display = "";
        //         } 
        //         else if (a.value == "₹ 1 Lakh - ₹ 10 Lakh" && parseInt(price) > 100000 && parseInt(price) < 1000000 && tr[i].style.display == "") 
        //         {
        //             tr[i].style.display = "";
        //         } 
        //         else if (a.value == "> ₹ 10 Lakh" && parseInt(price) > 1000000 && tr[i].style.display == "") 
        //         {
        //             tr[i].style.display = "";
        //         } 
        //         else 
        //         {
        //             tr[i].style.display = "none";
        //         }

        //     }
        // }

    }
}	


function clearfilter()
{   
    document.getElementById("namesearch").value = "";
    document.getElementById("rollnosearch").value = "";
    document.getElementById("attsearch").value = "";

    searchfun();
}

function stusetting()
{
    // alert("Create a settings modal to enable password change!");
    $('#settings_modal').modal('show');
    
}



function check_new_pass_again(content)
{
    // alert(content.value);
    
    var user_new_password, user_new_password_again;

    user_new_password = document.getElementById("user_new_password").value;
    user_new_password_again = document.getElementById("user_new_password_again").value;

    if(user_new_password_again.length > 0)
    {
        if(user_new_password == user_new_password_again)
        {
            document.getElementById("user_new_password_again").style.borderColor = "green";
            document.getElementById("user_new_password_again").style.borderWidth = "2px";

            document.getElementById("update_user_password").disabled = false;
        }
        else
        {
            document.getElementById("user_new_password_again").style.borderColor = "red";
            document.getElementById("user_new_password_again").style.borderWidth = "2px";

            document.getElementById("update_user_password").disabled = true;
        }
    }
    
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

function check_teacher_pass()
{
    // alert(content.value);
    
    var user_new_password, user_new_password_again;

    user_new_password = document.getElementById("t_pass").value;
    user_new_password_again = document.getElementById("t_repass").value;

    document.getElementById("btnsignup").disabled = true;

    if(user_new_password_again.length > 0)
    {
        if(user_new_password == user_new_password_again)
        {
            document.getElementById("t_repass").style.borderColor = "green";
            document.getElementById("t_repass").style.borderWidth = "5px";

            document.getElementById("btnsignup").disabled = false;
        }
        else
        {
            document.getElementById("t_repass").style.borderColor = "red";
            document.getElementById("t_repass").style.borderWidth = "5px";

            document.getElementById("btnsignup").disabled = true;
        }
    }
    
}

function promote_student()
{
    // alert("Promoting Student...");

    $(document).ready(function(){ 

            // var texto = $('#studentdata tr:nth-child(1) td:nth-child(2)').text();
            // alert(texto);
            var arr = [];
            var index = 0;
            $("input:checkbox[name=rows]").each(function(){
                index = index + 1;
                if(this.checked)
                {
                    var texto = $('#studentdata tr:nth-child('+ index + ') td:nth-child(3)').text();
                    // alert(texto);
                    arr.push(texto);
                }
            });
            $.ajax({ 
                url:"admin_fetch.php",  
                method:"POST",
                data:{selectedrolls:arr},
                dataType:"json",
                success:function(data){  
                    location.reload();
                    // alert(data.msg);
                    var arr_success = data.success;
                    alert(arr_success.length+ " Student(s) have been promoted successfully!");
                    var arr_failed = data.failure;
                    alert(arr_failed.length+ " Student(s) have not been promoted due to some error! Try Again!");
                    // alert("Clear roll number of promoted stus also!");
                }  
            });
    
    });

}

function select_all(ele)
{
    // alert("Selecting all students...");
    
    var table, tr, checkboxes, check;
			
    checkboxes = document.getElementsByName("rows");
    table = document.getElementById("studentdata");
    tr = table.getElementsByTagName("tr");
    check = false;

    if (ele.checked)
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = true;
                tr[i+1].style.backgroundColor= "#F5F5F5";
                check = true;
            }  
        }
    } 
    else 
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = false;
                tr[i+1].style.backgroundColor= "white";
                check = false;
            } 
        }
    }

    if(check)
    {
        document.getElementById("promote_btn").disabled = false;
    }
    else
    {
        document.getElementById("promote_btn").disabled = true;
    }		

}

function select_this()
{
    var table, tr, checkboxes, check;
			
    checkboxes = document.getElementsByName('rows');
    table = document.getElementById("studentdata");
    tr = table.getElementsByTagName("tr");
    check = false;

    for (var i = 0; i < checkboxes.length; i++) 
    {
        if(checkboxes[i].checked)
        {
            tr[i+1].style.backgroundColor= "#F5F5F5";
            check = true;
        }
        else
        {
            tr[i+1].style.backgroundColor= "white";
        } 
    }

    if(check)
    {
        // document.getElementById("send_mail").disabled = false;
        document.getElementById("promote_btn").disabled = false;
    }
    else
    {
        // document.getElementById("send_mail").disabled = true;
        document.getElementById("promote_btn").disabled = true;
    }	
}


function get_prev_year_data(data)
{

    // alert("sdfsdf sdfsdf sdf");
    // // On change of academic year, this should change the content of all the entries!
    // d = document.getElementById("aca_year_select").value;


    if(data.value=='current')
    {
        // alert("Displaying current aca year data!");
        // alert(d);
        window.location.href = 'studentprofile.php?aca_year=current';
    }
    else
    {
        // alert("Displaying prev aca year data!");
        // alert(d);
        window.location.href = 'studentprofile.php?aca_year='+data.value;
    }
}