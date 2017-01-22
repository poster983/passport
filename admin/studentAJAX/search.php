<?
include("../common.php");
checklogin();
$msg = "";
date_default_timezone_set('America/Chicago');
include "../../medooconnect.php";
/*

The MIT License (MIT)

Copyright (c) Thu May 26 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

$rawValue = $_GET['value'];

//check for dupes
$rowCount = $medooDB->count("studentaccount", array(
	"OR" => array(
		"student_id" => $rawValue,
		"firstname" => $rawValue,
		"lastname" => $rawValue,
		"email" => $rawValue
	)
));
echo $rowCount;

if ($rowCount == 0) {
  echo "<div class=\"row\">
      <div class=\"col s12\">
        <div class=\"hoverable card-panel grey lighten-4\">
          <h5 class='center'>No Student Found</h5>
        </div>
      </div>
    </div>";
} else if ($rowCount == 1) {

  $studentRawData = $medooDB->select("studentaccount", array(
  	"id",
    "firstname",
    "lastname",
    "email",
    "student_id",
    "sh_period",
    "sh_teacher_ID",
    "student_year",
    "email_Verify_Status",
    "banned_until_date",
    "needsReset",
    "archived"
  ), array(
    "OR" => array(
      "student_id" => $rawValue,
      "firstname" => $rawValue,
      "lastname" => $rawValue,
      "email" => $rawValue
    )
  ));

  foreach($studentRawData as $data)
  {
  	echo "Name :" . $data["firstname"] . " - email:" . $data["email"] . "<br/>";
    $passportId = $data["id"];
    $firstname = $data["firstname"];
    $lastname = $data["lastname"];
    $email = $data["email"];
    $student_id = $data["student_id"];
    $sh_period = $data["sh_period"];
    $sh_teacher_ID = $data["sh_teacher_ID"];
    $student_year = $data["student_year"];
    $email_Verify_Status = $data["email_Verify_Status"];
  }



  $teacherRawData = $medooDB->select("teachers", array(
    "name_title",
    "firstname",
    "lastname"
  ), array(
    "id" => $sh_teacher_ID
  ));
  echo $teacherRawData;
  foreach($teacherRawData as $data)
  {
    $tename_title = $data["name_title"];
    $tefirstname = $data["firstname"];
    $telastname = $data["lastname"];
  }

  switch ($student_year) {
    case "9":
      $student_year = "Freshman";
      break;
    case "10":
      $student_year = "Sophomore";
      break;
    case "11":
      $student_year = "Junior";
      break;
    case "12":
      $student_year = "Senior";
      break;
    default:
      $student_year = "Unknown";
      break;
  }
  if ($email_Verify_Status == 0) {
    $email_Verify_Status_txt = "Email NOT Verified";
  } else {
    $email_Verify_Status_txt = "Email Verified";
  }



echo "<div class=\"section\">
<!--Main Student Info Card-->
<div class=\"row\">
   <div class=\"col s12\">
     <div class=\"card-panel grey lighten-4\">

         <span>
           <div class=\"row\">
             <div class=\"col l3 m5 s6\">
               <div class=\"col l12 s2\">
                 <img src=\"badMe.jpg\" class=\"circle\">
               </div>

               <div class=\"col l12 s12\">
                 <div class=\"valign-wrapper\">
                   <h4 class=\"valign grey-text lighten-1 center\">" . $firstname . " " . $lastname . "</h4>

                 </div>
               </div>
               <div class=\"col l12 s12\">
               <p class=\"grey-text lighten-1\">Passport UUID: " . $passportId . "</p>
             </div>
             </div>

             <div class=\"col l9 m7 s12\">
               <div class=\"row\">
                <div class=\"col s12\">
                  <div class=\" hoverable card-panel white\">
                    <div>
                      <span>
                        <h5 style=\"display:inline;\">Account Info</h5>
                        <i class=\"right material-icons waves-effect\">edit</i>
                      </span>
                      <br>
                    </div>
                    <table class=\"highlight\">


                      <tbody>
                        <tr>
                          <td><i class=\"small material-icons\">email</i></td>
                          <td>" . $email . "</td>
                        </tr>
                        <tr>
                          <td><i class=\"small material-icons\">perm_identity</i></td>
                          <td>" . $student_id . "</td>

                        </tr>
                        <tr>
                          <td><i class=\"small material-icons\">access_time</i></td>
                          <td> " . $sh_period . "</td>

                        </tr>
                        <tr>
                          <td><i class=\"small material-icons\">assignment_ind</i></td>
                          <td>" . $tename_title . " " . $tefirstname . " " . $telastname . "</td>
                        </tr>
                        <tr>
                          <td><i class=\"small material-icons\">today</i></td>
                          <td>" . $student_year . "</td>
                        </tr>
                        <tr class=\"tableLinkArrow\">
                          <td><i class=\"small material-icons\">gavel</i></td>
                          <td>Not Banned/Banned until yy/mm/dd <i onclick=\"modelActOpen('moreBanned')\" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class=\"tableLinkArrow\">
                          <td><i class=\"small material-icons\">restore</i></td>
                          <td>Reset Account <i onclick=\"modelActOpen('moreReset')\" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class=\"tableLinkArrow\">
                          <td><i class=\"small material-icons\">update</i></td>
                          <td>Update Account <i onclick=\"modelActOpen('moreUpdate')\" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class=\"tableLinkArrow\">
                          <td><i class=\"small material-icons\">verified_user</i></td>
                          <td>" . $email_Verify_Status_txt . "<i onclick=\"modelActOpen('moreVeri')\" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class=\"tableLinkArrow\">
                          <td><i class=\"small material-icons\">archive</i>
                          <td>User Is Archived/ User Is Not Archived <i onclick=\"modelActOpen('moreArchive')\" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
         </div>
       </span>


     </div>
   </div>
 </div>

<!--End main student info card-->
</div>
<!--Main Student info card Model-->
<!--Ban Hammer-->
<div id=\"moreBanned\" class=\"modal\">
  <form id=\"theBanHammerModel\">
  <div class=\"modal-content\">
    <h4>The Ban Hammer</h4>
    <div class=\"input-field col s12\">
      <input type=\"date\" id=\"datepickerBanHammer\" class=\"datepicker\">
      <label for=\"datepickerBanHammer\">Ban Until..</label>
    </div>
  </div>
  <div class=\"modal-footer\">
    <a href=\"#!\" onclick=\"modelActClose('moreBanned')\" class=\"waves-effect waves-cyan accent-4 btn-flat\">Ban/Unban <i class=\"material-icons right\">gavel</i></a>
  </div>
  </form>
</div>
<!--Reset Account-->
<div id=\"moreReset\" class=\"modal\">
  <form id=\"theResetSenInfoModel\">
  <div class=\"modal-content\">
    <h4>Reset Sensitive Information </h4>
  </div>
  <div class=\"modal-footer\">
    <a href=\"#!\" onclick=\"modelActClose('moreReset')\" class=\"waves-effect waves-cyan accent-4 btn-flat\">Reset Password<i class=\"material-icons right\">vpn_key</i></a>
  </div>
  </form>
</div>
<!--Update Account-->
<div id=\"moreUpdate\" class=\"modal\">
  <form id=\"theUpadteAccModel\">
  <div class=\"modal-content\">
    <h4>Update Account</h4>
    <p>This will force the student, the next time they log on, to update their Study-Hall Teacher, Study-Hall Period, and even their grade level.</p>
    <!-- if needsReset == 1 then the \"Force update\" button will become an \"Un-Force Update Button\"-->
  </div>
  <div class=\"modal-footer\">
    <a href=\"#!\" onclick=\"modelActClose('moreUpdate')\" class=\"waves-effect waves-cyan accent-4 btn-flat\">Forse Update<i class=\"material-icons right\">update</i></a>
  </div>
  </form>
</div>
<!--Archive Account-->
<div id=\"moreArchive\" class=\"modal\">
  <form id=\"theArchiveAccModel\">
  <div class=\"modal-content\">
    <h4>Archive Account</h4>
    <p>By Archiving an account, you are in essence delting it. The account is still in the database, however, it will no longer be able to login.</p><p>  It is recommended that you don't unarchive an already archived account to avoid conflicts with new accounts as the student id and email have opened up.</p>
    <!-- if archived == 1 then the \"Archive\" button will become an \"Unarchive Button WITH conflict checker\"-->
  </div>
  <div class=\"modal-footer\">
    <a href=\"#!\" onclick=\"modelActClose('moreArchive')\" class=\"waves-effect waves-cyan accent-4 btn-flat\">Archive<i class=\"material-icons right\">archive unarchive</i></a>
  </div>
  </form>
</div>
<!--Verify More-->
<div id=\"moreVeri\" class=\"modal\">
  <form id=\"theVerifyAccModel\">
  <div class=\"modal-content\">
    <h4>Verify Account</h4>
    <p>If the student never received the verification email, you can resend it here.</p>
  </div>
  <div class=\"modal-footer\">
    <a href=\"#!\" onclick=\"modelActClose('moreVeri')\" class=\"waves-effect waves-cyan accent-4 btn-flat\">Send<i class=\"material-icons right\">send</i></a>
  </div>
  </form>
</div>
";
} else {
  echo "<div class=\"row\">
      <div class=\"col s12\">
        <div class=\"hoverable card-panel grey lighten-4\">
          <h5 class='center'>More Than One Student Avalable</h5>
          <p class='center'>Chooser Coming Soon</p>
        </div>
      </div>
    </div>";
}
 ?>
