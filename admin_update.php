<?php 

session_start();
error_reporting(E_ERROR | E_PARSE);

require('connect.php');
require('session.php');

 // $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));
 
 // if(!empty($_POST))  
if(isset($_POST['submit']))
{     
      
  $s_id = $_SESSION['MEMBER_ID'];
  $type = get_user_type();

  $name = $_POST["name"];
  $roll_no = $_POST["roll_no"];
  $grade = $_POST["grade"];
  $number = $_POST["number"];

  $counter = $_POST["attcounter"]; 


  // Physical quotient
  $height1pq = $_POST["height1pq"];
  $height2pq = $_POST["height2pq"];
  $height3pq = $_POST["height3pq"];

  $weight1pq = $_POST["weight1pq"];
  $weight2pq = $_POST["weight2pq"];
  $weight3pq = $_POST["weight3pq"];

  $eating1pq = $_POST["eating1pq"];
  $eating2pq = $_POST["eating2pq"];
  $eating3pq = $_POST["eating3pq"];

  $toilet1pq = $_POST["toilet1pq"];
  $toilet2pq = $_POST["toilet2pq"];
  $toilet3pq = $_POST["toilet3pq"];

  $finemotor1pq = $_POST["finemotor1pq"];
  $finemotor2pq = $_POST["finemotor2pq"];
  $finemotor3pq = $_POST["finemotor3pq"];

  $grossmotor1pq = $_POST["grossmotor1pq"];
  $grossmotor2pq = $_POST["grossmotor2pq"];
  $grossmotor3pq = $_POST["grossmotor3pq"];


  // Thinking quotient
  $selfawareness1 = $_POST["selfawareness1"];
  $selfawareness2 = $_POST["selfawareness2"];
  $selfawareness3 = $_POST["selfawareness3"];

  $creativethinking1 = $_POST["creativethinking1"];
  $creativethinking2 = $_POST["creativethinking2"];
  $creativethinking3 = $_POST["creativethinking3"];

  $criticalthinking1 = $_POST["criticalthinking1"];
  $criticalthinking2 = $_POST["criticalthinking2"];
  $criticalthinking3 = $_POST["criticalthinking3"];

  $problemsolving1 = $_POST["problemsolving1"];
  $problemsolving2 = $_POST["problemsolving2"];
  $problemsolving3 = $_POST["problemsolving3"];

  $decisionmaking1 = $_POST["decisionmaking1"];
  $decisionmaking2 = $_POST["decisionmaking2"];
  $decisionmaking3 = $_POST["decisionmaking3"];


  // Social quotient
  $empathy1 = $_POST["empathy1"];
  $empathy2 = $_POST["empathy2"];
  $empathy3 = $_POST["empathy3"];

  $communicationskills1 = $_POST["communicationskills1"];
  $communicationskills2 = $_POST["communicationskills2"];
  $communicationskills3 = $_POST["communicationskills3"];

  $interpersonal1 = $_POST["interpersonal1"];
  $interpersonal2 = $_POST["interpersonal2"];
  $interpersonal3 = $_POST["interpersonal3"];



  // Intellectual quotient
  $stress1 = $_POST["stress1"];
  $stress2 = $_POST["stress2"];
  $stress3 = $_POST["stress3"];

  $emotions1 = $_POST["emotions1"];
  $emotions2 = $_POST["emotions2"];
  $emotions3 = $_POST["emotions3"];



  //                  0        1        2            3      4           5               6    
  $tables = array("lang1", "lang2", "mathematics","evs","science","socialstudies","vocational");

  // $category = array("list", "speak", "general","creative","reading","comprehension","spelling","grammar","conversation");



  // LANGUAGE I & LANGUAGE II
  $lang_cat = array("list", "speak", "mistake","lesson", "general","creative","reading","spelling","understand","comprehension","grammar","conversation");

  $catLength = count($lang_cat);

  $i = 0;
  while ($i < $catLength)
  { 
      // LANG I
      $t = $tables[0].$lang_cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[0].$lang_cat[$i]."2";
      // echo "--> ".$t."<br>";
      ${$t} = $_POST[$t];


      $t = $tables[0].$lang_cat[$i]."3";
      // echo "--> ".$t."<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      //LANG II
      $t = $tables[1].$lang_cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[1].$lang_cat[$i]."2";
      // echo "--> ".$t."<br>";
      ${$t} = $_POST[$t];


      $t = $tables[1].$lang_cat[$i]."3";
      // echo "--> ".$t."<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];

      $i++;
  } 


// MATEMATICS
  $math_cat = array("concept", "procedure", "mentalability","tables", "activity");

  $catLength = count($math_cat);

  $i = 0;
  while ($i < $catLength)
  { 

      $t = $tables[2].$math_cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[2].$math_cat[$i]."2";
      // echo "--> ".$t."<br>";
      ${$t} = $_POST[$t];


      $t = $tables[2].$math_cat[$i]."3";
      // echo "--> ".$t."<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      $i++;
  } 


// EVS
  $cat = array("observation", "interaction", "prev_knowledge","analyse", "cooperation", "presentation");

  $catLength = count($cat);

  $i = 0;
  while ($i < $catLength)
  { 

      $t = $tables[3].$cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[3].$cat[$i]."2";
      // echo "--> ".$t."<br>";
      ${$t} = $_POST[$t];


      $t = $tables[3].$cat[$i]."3";
      // echo "--> ".$t."<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      $i++;
  } 


  // SCIENCE
  $cat = array("oralinteraction", "writteninteraction", "observation", "curiosity", "criticalthinking", "writingquality", "oraltests", "writtentests", "diagrams", "experience" , "openendedquestions", "scientificterms");

  $catLength = count($cat);

  $i = 0;
  while ($i < $catLength)
  { 

      $t = $tables[4].$cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[4].$cat[$i]."2";
      // echo "--> ".$t."<br>";
      ${$t} = $_POST[$t];


      $t = $tables[4].$cat[$i]."3";
      // echo "--> ".$t."<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      $i++;
  } 


  // SS
  $cat = array("observation", "interaction", "prev_knowledge","analyse", "cooperation", "presentation");

  $catLength = count($cat);

  $i = 0;
  while ($i < $catLength)
  { 

      $t = $tables[5].$cat[$i]."1";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[5].$cat[$i]."2";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[5].$cat[$i]."3";
      // echo "'$".$t."'<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      $i++;
  } 



  // Vocational
  $cat = array("interest", "creativity", "enthusiasm","taste", "aroma", "appearance");

  $catLength = count($cat);

  $i = 0;
  while ($i < $catLength)
  { 

      $t = $tables[6].$cat[$i]."1";
      echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[6].$cat[$i]."2";
      // echo "'$".$t."'<br>";
      ${$t} = $_POST[$t];


      $t = $tables[6].$cat[$i]."3";
      // echo "'$".$t."'<br>";
      // ${$tables[$i].$category[$j]."3"} = $_POST[$t];
      ${$t} = $_POST[$t];


      $i++;
  } 







  // QUERY STARTS
  if($type == 'student')
  {
    $mysqli->query("UPDATE assessment SET height='$height1pq', weight='$weight1pq', appetite='$eating1pq', toilet='$toilet1pq', finemotor='$finemotor1pq', grossmotor='$grossmotor1pq', selfawareness='$selfawareness1', creativethinking='$creativethinking1', criticalthinking='$criticalthinking1', problemsolving='$problemsolving1', decisionmaking='$decisionmaking1', empathy='$empathy1', communication='$communicationskills1', interpersonal='$interpersonal1', copingwithstress='$stress1', managingemotion='$emotions1'  where s_id='$s_id' and who='self'") or die($mysqli->error());



    $mysqli->query("UPDATE lang1 SET listening='$lang1list1',speaking='$lang1speak1',writingmistake='$lang1mistake1',writinglesson='$lang1lesson1',writinggeneral='$lang1general1',writingcreative='$lang1creative1',reading='$lang1reading1',understand='$lang1understand1',comprehension='$lang1comprehension1',spelling='$lang1spelling1',grammar='$lang1grammar1',conversation='$lang1conversation1' where s_id='$s_id' and who='self'") or die($mysqli->error());


    $mysqli->query("UPDATE lang2 SET listening='$lang2list1',speaking='$lang2speak1',writingmistake='$lang2mistake1',writinglesson='$lang2lesson1',writinggeneral='$lang2general1',writingcreative='$lang2creative1',reading='$lang2reading1',understand='$lang2understand1',comprehension='$lang2comprehension1',spelling='$lang2spelling1',grammar='$lang2grammar1',conversation='$lang2conversation1' where s_id='$s_id' and who='self'") or die($mysqli->error());

    $mysqli->query("UPDATE mathematics SET concept='$mathematicsconcept1',procedures='$mathematicsprocedure1',mentalability='$mathematicsmentalability1',tables='$mathematicstables1',activity='$mathematicsactivity1' where s_id='$s_id' and who='self'") or die($mysqli->error());


   $mysqli->query("UPDATE evs SET observation='$evsobservation1',interaction='$evsinteraction1',prev_knowledge='$evsprev_knowledge1',analyse='$evsanalyse1',cooperation='$evscooperation1',presentation='$evspresentation1' where s_id='$s_id' and who='self'") or die($mysqli->error());


   $mysqli->query("UPDATE science SET oralinteraction='$scienceoralinteraction1',writteninteraction='$sciencewritteninteraction1',observation='$scienceobservation1',curiosity='$sciencecuriosity1',criticalthinking='$sciencecriticalthinking1',writingquality='$sciencewritingquality1',oraltests='$scienceoraltests1',writtentests='$sciencewrittentests1',diagrams='$sciencediagrams1',experience='$scienceexperience1',openendedquestions='$scienceopenendedquestions1',scientificterms='$sciencescientificterms1' where s_id='$s_id' and who='self'") or die($mysqli->error());


   $mysqli->query("UPDATE socialstudies SET observation='$socialstudiesobservation1',interaction='$socialstudiesinteraction1',prev_knowledge='$socialstudiesprev_knowledge1',analyse='$socialstudiesanalyse1',cooperation='$socialstudiescooperation1',presentation='$socialstudiespresentation1' where s_id='$s_id' and who='self'") or die($mysqli->error());


   $mysqli->query("UPDATE vocational SET interest='$vocationalinterest1',creativity='$vocationalcreativity1',enthusiasm='$vocationalenthusiasm1', taste='$vocationaltaste1', aroma='$vocationalaroma1', appearance='$vocationalappearance1' where s_id='$s_id' and who='self'") or die($mysqli->error());


  }


  else if($type == 'parent')
  {
    $mysqli->query("UPDATE assessment SET height='$height2pq', weight='$weight2pq', appetite='$eating2pq', toilet='$toilet2pq', finemotor='$finemotor2pq', grossmotor='$grossmotor2pq', selfawareness='$selfawareness2', creativethinking='$creativethinking2', criticalthinking='$criticalthinking2',problemsolving='$problemsolving2', decisionmaking='$decisionmaking2', empathy='$empathy2', communication='$communicationskills2', interpersonal='$interpersonal2', copingwithstress='$stress2', managingemotion='$emotions2'  where s_id='$s_id' and who='parent'") or die($mysqli->error());


   $mysqli->query("UPDATE lang1 SET listening='$lang1list2',speaking='$lang1speak2',writingmistake='$lang1mistake2',writinglesson='$lang1lesson2',writinggeneral='$lang1general2',writingcreative='$lang1creative2',reading='$lang1reading2',understand='$lang1understand2',comprehension='$lang1comprehension2',spelling='$lang1spelling2',grammar='$lang1grammar2',conversation='$lang1conversation2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


    $mysqli->query("UPDATE lang2 SET listening='$lang2list2',speaking='$lang2speak2',writingmistake='$lang2mistake2',writinglesson='$lang2lesson2',writinggeneral='$lang2general2',writingcreative='$lang2creative2',reading='$lang2reading2',understand='$lang2understand2',comprehension='$lang2comprehension2',spelling='$lang2spelling2',grammar='$lang2grammar2',conversation='$lang2conversation2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


    $mysqli->query("UPDATE mathematics SET concept='$mathematicsconcept2',procedures='$mathematicsprocedure2',mentalability='$mathematicsmentalability2',tables='$mathematicstables2',activity='$mathematicsactivity2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


    $mysqli->query("UPDATE evs SET observation='$evsobservation2',interaction='$evsinteraction2',prev_knowledge='$evsprev_knowledge2',analyse='$evsanalyse2',cooperation='$evscooperation2',presentation='$evspresentation2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


    $mysqli->query("UPDATE science SET oralinteraction='$scienceoralinteraction2',writteninteraction='$sciencewritteninteraction2',observation='$scienceobservation2',curiosity='$sciencecuriosity2',criticalthinking='$sciencecriticalthinking2',writingquality='$sciencewritingquality2',oraltests='$scienceoraltests2',writtentests='$sciencewrittentests2',diagrams='$sciencediagrams2',experience='$scienceexperience2',openendedquestions='$scienceopenendedquestions2',scientificterms='$sciencescientificterms2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


    $mysqli->query("UPDATE socialstudies SET observation='$socialstudiesobservation2',interaction='$socialstudiesinteraction2',prev_knowledge='$socialstudiesprev_knowledge2',analyse='$socialstudiesanalyse2',cooperation='$socialstudiescooperation2',presentation='$socialstudiespresentation2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


     $mysqli->query("UPDATE vocational SET interest='$vocationalinterest2',creativity='$vocationalcreativity2',enthusiasm='$vocationalenthusiasm2', taste='$vocationaltaste2', aroma='$vocationalaroma2', appearance='$vocationalappearance2' where s_id='$s_id' and who='parent'") or die($mysqli->error());


  }

  else if($type == 'teacher')
  {
      // NEED THE ENROLLMENT FORM UI FOR EDITING STUDENT PERSONAL DETAILS.


    // Attendance updation 
    for ($x = 1; $x < $counter; $x++)
    {
      $tt = "year".$x;
      $year = $_POST[$tt];

      $tt = "june".$x;
      $june = $_POST[$tt];

      $tt = "july".$x;
      $july = $_POST[$tt];

      $tt = "aug".$x;
      $aug = $_POST[$tt];

      $tt = "sept".$x;
      $sept = $_POST[$tt];

      $tt = "oct".$x;
      $oct = $_POST[$tt];

      $tt = "nov".$x;
      $nov = $_POST[$tt];

      $tt = "december".$x;
      $december = $_POST[$tt];

      $tt = "jan".$x;
      $jan = $_POST[$tt];

      $tt = "feb".$x;
      $feb = $_POST[$tt];

      $tt = "mar".$x;
      $mar = $_POST[$tt];

      $tt = "apr".$x;
      $apr = $_POST[$tt];

      $tt = "may".$x;
      $may = $_POST[$tt];

      $total = 0;
      $total = (int)$june + (int)$july + (int)$aug + (int)$sept + (int)$oct + (int)$nov + (int)$december + (int)$jan + (int)$feb + (int)$mar + (int)$apr + (int)$may;

      // echo "Total: ".$total."<br>";


      $mysqli->query("UPDATE attendance SET jan='$jan',feb='$feb',mar='$mar',apr='$apr',may='$may',june='$june',july='$july',aug='$aug',sept='$sept',oct='$oct',nov='$nov',december='$december',total='$total' where s_id='$s_id' and year='$year'") or die($mysqli->error());

    }



    $mysqli->query("UPDATE assessment SET height='$height3pq', weight='$weight3pq', appetite='$eating3pq', toilet='$toilet3pq', finemotor='$finemotor3pq', grossmotor='$grossmotor3pq', selfawareness='$selfawareness3', creativethinking='$creativethinking3', criticalthinking='$criticalthinking3',problemsolving='$problemsolving3', decisionmaking='$decisionmaking3', empathy='$empathy3', communication='$communicationskills3', interpersonal='$interpersonal3', copingwithstress='$stress3', managingemotion='$emotions3'  where s_id='$s_id' and who='teacher'") or die($mysqli->error());

    
   $mysqli->query("UPDATE lang1 SET listening='$lang1list3',speaking='$lang1speak3',writingmistake='$lang1mistake3',writinglesson='$lang1lesson3',writinggeneral='$lang1general3',writingcreative='$lang1creative3',reading='$lang1reading3',understand='$lang1understand3',comprehension='$lang1comprehension3',spelling='$lang1spelling3',grammar='$lang1grammar3',conversation='$lang1conversation3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());


   $mysqli->query("UPDATE lang2 SET listening='$lang2list3',speaking='$lang2speak3',writingmistake='$lang2mistake3',writinglesson='$lang2lesson3',writinggeneral='$lang2general3',writingcreative='$lang2creative3',reading='$lang2reading3',understand='$lang2understand3',comprehension='$lang2comprehension3',spelling='$lang2spelling3',grammar='$lang2grammar3',conversation='$lang2conversation3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());


   $mysqli->query("UPDATE mathematics SET concept='$mathematicsconcept3',procedures='$mathematicsprocedure3',mentalability='$mathematicsmentalability3',tables='$mathematicstables3',activity='$mathematicsactivity3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());


   $mysqli->query("UPDATE evs SET observation='$evsobservation3',interaction='$evsinteraction3',prev_knowledge='$evsprev_knowledge3',analyse='$evsanalyse3',cooperation='$evscooperation3',presentation='$evspresentation3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());


   $mysqli->query("UPDATE science SET oralinteraction='$scienceoralinteraction3',writteninteraction='$sciencewritteninteraction3',observation='$scienceobservation3',curiosity='$sciencecuriosity3',criticalthinking='$sciencecriticalthinking3',writingquality='$sciencewritingquality3',oraltests='$scienceoraltests3',writtentests='$sciencewrittentests3',diagrams='$sciencediagrams3',experience='$scienceexperience3',openendedquestions='$scienceopenendedquestions3',scientificterms='$sciencescientificterms3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());


    $mysqli->query("UPDATE socialstudies SET observation='$socialstudiesobservation3',interaction='$socialstudiesinteraction3',prev_knowledge='$socialstudiesprev_knowledge3',analyse='$socialstudiesanalyse3',cooperation='$socialstudiescooperation3',presentation='$socialstudiespresentation3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());
    

    $mysqli->query("UPDATE vocational SET interest='$vocationalinterest3',creativity='$vocationalcreativity3',enthusiasm='$vocationalenthusiasm3', taste='$vocationaltaste3', aroma='$vocationalaroma3', appearance='$vocationalappearance3' where s_id='$s_id' and who='teacher'") or die($mysqli->error());




   // echo $abcd;

  }

  $_SESSION['message'] = "Record has been updated!";
  $_SESSION['msg_type'] = "success";

  header("location: studentprofile.php?aca_year=current");



}  

else if(isset($_POST["nyear"]))  
{ 
    $year = $_POST["nyear"];
    $data = [];

    $out = $mysqli->query("INSERT INTO attendance (s_id, year, jan, feb, mar, apr, may, june, july, aug, sept, oct, nov, december, total) SELECT distinct s_id, '$year', 0,0,0,0,0,0,0,0,0,0,0,0,0 from student where 1");

    if($out == 1)
    {
      $data += array('res' => 'Success!');
      
      $_SESSION['message'] = "New year has been added successfully!";
			$_SESSION['msg_type'] = "success";
    }
    else
    {
      $data += array('res' => 'Error! Please try again...');

      $_SESSION['message'] = "New year could not be added! Try again...";
			$_SESSION['msg_type'] = "danger";
    }
    

    echo json_encode($data);  
}

else
{
  header("location: studentprofile.php?aca_year=current");
}


 ?>




