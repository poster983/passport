<?
include("common.php");
checklogin();
$msg = "";
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
include "nav.php"; ?>
<style>
.fullPhotoCon {
  position: relative;
    width: 100%;
    height: 30%;
    margin:-20px
}
.fullPhoto {
      max-width: 100%;
      max-height: 300px;
}
.tableLinkArrow:hover > td > i.contentLinkArrow::after {
  content: "keyboard_arrow_right";
  z-index: 10;

}
</style>
<nav>
    <div class="nav-wrapper">
      <!--<form>-->
        <div class="input-field red lighten-2">
          <input id="searchStudents" placeholder="Search by Name, Student ID, or Email" type="search" required>
          <label for="searchStudents"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      <!--</form>-->
    </div>
  </nav>
        <div class="container">
          <div id="ajaxReturnDom">


        </div>
        <div id="ajaxMultiReturnDom"></div>
        <div class="section" id="allStudentSettings">
          <div class="row">
            <div class="col s12">
              <div class="card-panel grey lighten-4">
                <div class="row">
                  <div class="col s12">
                    <span class="card-title">Multi-Student Actions</span>
                    <div class="input-field col s12">
                      <br>
                      <select id="selector">
                        <option value="" disabled>Choose your Selector</option>
                        <option value="1" selected>All Students</option>
                        <option value="9">Freshmen</option>
                        <option value="10">Sophomores</option>
                        <option value="11">Juniors</option>
                        <option value="12">Seniors</option>

                      </select>
                      <label>Refine Your Action</label>

                      <div class="divider"></div>
                      <br>
                      <a class="waves-effect waves-light btn" onclick="multiaccountUpdateModel();">Force Account Updates</a>
                      <a class="waves-effect waves-light btn disabled">Archive Accounts</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Modal-->
      <div id="MultiAccUpdate" class="modal">
        <div class="modal-content">
          <h4>Are You Sure?</h4>
          <p>This will make <b><span id="selConf"></span></b> update their Study-Hall Teacher and Period the next time they login.</p>
          <p>If you made a mistake, please click "Restore" to cancel the forced update</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" onclick="multiaccountUpdateSend('go');">Yes</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-blue btn-flat" onclick="multiaccountUpdateSend('restore');">Restore</a>
        </div>
      </div>

        <!--Scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>
        <script src="/passport/js/PICS.js"></script>
        <script>
          $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

            $('.modal-trigger').leanModal({
                dismissible: true,
                opacity: 0.5,
                in_duration: 300,
                out_duration: 200,
                ready: function() {
                    if($(".lean-overlay").length > 1) {
                        $(".lean-overlay:not(:first)").each(function() {
                            $(this).remove();
                        });
                    }
                },
                complete: function() {
                    $(".lean-overlay").each(function() {
                        $(this).remove();
                    });
                }
            });
             $('select').material_select();
          });
          function modelActOpen(id) {
            $('#' + id).openModal();
          }
          function modelActClose(id) {
            $('#' + id).closeModal();
          }
          $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 2, // Creates a dropdown of 2 years to control year
            formatSubmit: 'yyyy-mm-dd',
            hiddenName: true,
            onOpen: function() {
              $('.modal').addClass('modal-fixed-footer');
            },
            onClose: function() {
              $('.modal').removeClass('modal-fixed-footer');
            }
          });

          //listen for enter

          $("#searchStudents").keyup(function(event){
              if(event.keyCode == 13){
                  searchStudent($('#searchStudents').val());
              }
          });

          $('#searchStudents').submit(function() {
            //searchStudent($('#searchStudents').val());
            return false;
          });
          //Search Ajax Request
          function searchStudent(value) {
            if(value == ""){
              console.warn("No Value in search");
            } else {

            $('#ajaxReturnDom').html("    <div class=\"preloader-wrapper big active\">\r\n      <div class=\"spinner-layer spinner-blue\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-red\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-yellow\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-green\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n    <\/div> <h5 class='center'>Loading</h5>");
            $.ajax({
          url: 'studentAJAX/search.php',
          data: {'value': value},
          type: 'get',
          success: function(data) {
            $('#ajaxReturnDom').html(data);

            $('.modal-trigger').leanModal({
                dismissible: true,
                opacity: 0.5,
                in_duration: 300,
                out_duration: 200,
                ready: function() {
                    if($(".lean-overlay").length > 1) {
                        $(".lean-overlay:not(:first)").each(function() {
                            $(this).remove();
                        });
                    }
                },
                complete: function() {
                    $(".lean-overlay").each(function() {
                        $(this).remove();
                    });
                }
            });

            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 2, // Creates a dropdown of 2 years to control year
              formatSubmit: 'yyyy-mm-dd',
              hiddenName: true,
              onOpen: function() {
                $('.modal').addClass('modal-fixed-footer');
              },
              onClose: function() {
                $('.modal').removeClass('modal-fixed-footer');
              }
            });

          },
          error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
          $('#ajaxReturnDom').html("There was an error.  Please check the console for more details.");
          }
        })}
      };
      function multiaccountUpdateModel() {
        modelActOpen("MultiAccUpdate");

        if($('#selector').val() == 1) {
          $('#selConf').html('every student')
        } else if($('#selector').val() == 9) {
          $('#selConf').html('every Freshmen')
        } else if($('#selector').val() == 10) {
          $('#selConf').html('every Sophomore')
        } else if($('#selector').val() == 11) {
          $('#selConf').html('every Junior')
        } else if($('#selector').val() == 12) {
          $('#selConf').html('every Senior')
        }
      }

      function multiaccountUpdateSend(action) {


        $('#ajaxMultiReturnDom').html("    <div class=\"preloader-wrapper big active\">\r\n      <div class=\"spinner-layer spinner-blue\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-red\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-yellow\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-green\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n    <\/div> <h5>Loading</h5>");
        $.ajax({
      url: 'studentAJAX/multiStudentActions.php',
      data: {'whatToDo':"update",'action':action,'selector':$('#selector').val()},
      type: 'post',
      success: function(data) {
        $('#ajaxMultiReturnDom').html(" ");
        //console.log("Students Affected: " + data.rowsAff);
        var returnPICS = PICS(data);
        var resultReturn = returnPICS.result;

        Materialize.toast(returnPICS.text, 15000);
      },
      error: function(xhr, desc, err) {
        console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
        console.log(xhr);
        console.error("Details: " + desc + "\nError:" + err);
        console.warn(xhr.responseText)
      $('#ajaxMultiReturnDom').html("There was an error.  Please check the console for more details.");
      }
    })};

    function singleAccountBan(action, stuID) {
      if($("input[name='datepickerBanHammer']").val() != "" || action == "unban") {
      modelActClose('moreBanned');
      $('#banHamIcon').html("    <div class=\"preloader-wrapper small active\">\r\n      <div class=\"spinner-layer spinner-blue\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-red\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-yellow\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-green\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n    <\/div>");
      $.ajax({
    url: 'studentAJAX/studentActionAJAX.php',
    data: {'whatToDo':"ban",'action':action,'banUntil':$("input[name='datepickerBanHammer']").val(),'sendEmail':$("#SendEmailBanHam").is(':checked'),'emailMessage':$("#BanHamReason").val(),'stuID':stuID},
    type: 'post',
    success: function(data) {
      //$('#banHamIcon').html("<i class=\"small material-icons\">gavel</i>");
      //console.log("Students Affected: " + data.rowsAff);
      var returnPICS = PICS(data);
      if (returnPICS.result == false) {
        $('#banHamIcon').html("<i class=\"small material-icons\">error_outline</i>");
      } else {
        if(action == "unban"){
          $('#banHamTxt').html("Not Banned <i onclick=\"modelActOpen('moreBanned')\" class='contentLinkArrow waves-effect right small material-icons'></i>")
        } else {
          $('#banHamTxt').html("Banned <i onclick=\"modelActOpen('moreBanned')\" class='contentLinkArrow waves-effect right small material-icons'></i>")
        }
        $('#banHamIcon').html("<i class=\"small material-icons\">done</i>");
        setTimeout(function(){
          $('#banHamIcon').html("<i class=\"small material-icons\">gavel</i>");
        }, 5000);
      }

      Materialize.toast(returnPICS.text, 15000);
    },
    error: function(xhr, desc, err) {
      console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
      console.log(xhr);
      console.error("Details: " + desc + "\nError:" + err);
      console.warn(xhr.responseText)
    $('#ajaxReturnDom').html("There was an error.  Please check the console for more details.");
    $('#banHamIcon').html("<i class=\"small material-icons\">error_outline</i>");
    setTimeout(function(){
      $('#banHamIcon').html("<i class=\"small material-icons\">gavel</i>");
    }, 5000);
    }
  })} else {
    Materialize.toast('Please Pick A Date', 5000);
  }};

  function singleResetPassword(stuID, resetTo) {
    modelActClose('moreBanned');
    $('#resetIcon').html("    <div class=\"preloader-wrapper small active\">\r\n      <div class=\"spinner-layer spinner-blue\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-red\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-yellow\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-green\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n    <\/div>");
    $.ajax({
  url: 'studentAJAX/studentActionAJAX.php',
  data: {'whatToDo':"resetPassword",'stuID':stuID,'adminPassword':$("#resetStPassAdminPass").val(),'resetTo':resetTo},
  type: 'post',
  success: function(data) {
    //$('#banHamIcon').html("<i class=\"small material-icons\">gavel</i>");
    //console.log("Students Affected: " + data.rowsAff);
    var returnPICS = PICS(data);
    if (returnPICS.result == false) {
      $('#resetIcon').html("<i class=\"small material-icons\">error_outline</i>");
    } else {
      $('#resetIcon').html("<i class=\"small material-icons\">done</i>");
      setTimeout(function(){
        $('#resetIcon').html("<i class=\"small material-icons\">restore</i>");
      }, 5000);
    }

    Materialize.toast(returnPICS.text, 15000);
  },
  error: function(xhr, desc, err) {
    console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
    console.log(xhr);
    console.error("Details: " + desc + "\nError:" + err);
    console.warn(xhr.responseText)
  $('#ajaxReturnDom').html("There was an error.  Please check the console for more details.");
  $('#resetIcon').html("<i class=\"small material-icons\">error_outline</i>");
  setTimeout(function(){
    $('#resetIcon').html("<i class=\"small material-icons\">restore</i>");
  }, 5000);
  }
})};
        </script>
</body>
</html>

<?
/*
<div class="section">
<!--Main Student Info Card-->
<div class="row">
   <div class="col s12">
     <div class="card-panel grey lighten-4">

         <span>
           <div class="row">
             <div class="col l3 m5 s6">
               <div class="col l12 s2">
                 <img src="badMe.jpg" class="circle">
               </div>

               <div class="col l12 s12">
                 <div class="valign-wrapper">
                   <h4 class="valign grey-text lighten-1 center">Student Name</h4>

                 </div>
               </div>
               <div class="col l12 s12">
               <p class="grey-text lighten-1">Passport UUID: ######</p>
             </div>
             </div>

             <div class="col l9 m7 s12">
               <div class="row">
                <div class="col s12">
                  <div class="card-panel white">
                    <div>
                      <span>
                        <h5 style="display:inline;">Account Info</h5>
                        <i class="right material-icons waves-effect">edit</i>
                      </span>
                      <br>
                    </div>
                    <table class="highlight">


                      <tbody>
                        <tr>
                          <td><i class="small material-icons">email</i></td>
                          <td>Josephh2018@gmail.com</td>
                        </tr>
                        <tr>
                          <td><i class="small material-icons">perm_identity</i></td>
                          <td>05339</td>

                        </tr>
                        <tr>
                          <td><i class="small material-icons">access_time</i></td>
                          <td>E2</td>

                        </tr>
                        <tr>
                          <td><i class="small material-icons">assignment_ind</i></td>
                          <td>Ms. Youngblood</td>
                        </tr>
                        <tr>
                          <td><i class="small material-icons">today</i></td>
                          <td>Junior</td>
                        </tr>
                        <tr class="tableLinkArrow">
                          <td><i class="small material-icons">gavel</i></td>
                          <td>Not Banned/Banned until yy/mm/dd <i onclick="modelActOpen('moreBanned')" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class="tableLinkArrow">
                          <td><i class="small material-icons">restore</i></td>
                          <td>Reset Account <i onclick="modelActOpen('moreReset')" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr class="tableLinkArrow">
                          <td><i class="small material-icons">update</i></td>
                          <td>Update Account <i onclick="modelActOpen('moreUpdate')" class='contentLinkArrow waves-effect right small material-icons'></i></td>
                        </tr>
                        <tr>
                          <td><i class="small material-icons">verified_user</i></td>
                          <td>Email NOT Verified/Email Verified</td>
                        </tr>
                        <tr class="tableLinkArrow">
                          <td><i class="small material-icons">archive</i> <!--or use unarchive --></td>
                          <td>User Is Archived/ User Is Not Archived <i onclick="modelActOpen('moreArchive')" class='contentLinkArrow waves-effect right small material-icons'></i></td>
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
<div id="moreBanned" class="modal">
<form id="theBanHammerModel">
<div class="modal-content">
  <h4>The Ban Hammer</h4>
  <div class="input-field col s12">
    <input type="date" id="datepickerBanHammer" class="datepicker">
    <label for="datepickerBanHammer">Ban Until..</label>
  </div>
</div>
<div class="modal-footer">
  <a href="#!" onclick="modelActClose('moreBanned')" class="waves-effect waves-cyan accent-4 btn-flat">Ban/Unban <i class="material-icons right">gavel</i></a>
</div>
</form>
</div>
<!--Reset Account-->
<div id="moreReset" class="modal">
<form id="theResetSenInfoModel">
<div class="modal-content">
  <h4>Reset Sensitive Information </h4>
</div>
<div class="modal-footer">
  <a href="#!" onclick="modelActClose('moreReset')" class="waves-effect waves-cyan accent-4 btn-flat">Reset Password<i class="material-icons right">vpn_key</i></a>
</div>
</form>
</div>
<!--Update Account-->
<div id="moreUpdate" class="modal">
<form id="theUpadteAccModel">
<div class="modal-content">
  <h4>Update Account</h4>
  <p>This will forse the student, the next time they log on, to update their Study-Hall Teacher, Study-Hall Period, and even their grade level.</p>
  <!-- if needsReset == 1 then the "Forse update" button will become an "Un-Forse Update Button"-->
</div>
<div class="modal-footer">
  <a href="#!" onclick="modelActClose('moreUpdate')" class="waves-effect waves-cyan accent-4 btn-flat">Forse Update<i class="material-icons right">update</i></a>
</div>
</form>
</div>
<!--Archive Account-->
<div id="moreArchive" class="modal">
<form id="theArchiveAccModel">
<div class="modal-content">
  <h4>Archive Account</h4>
  <p>By Archiving an account, you are in essence delting it. The account is still in the database, however, it will no longer be able to login.</p><p>  It is recommended that you don't unarchive an already archived account to avoid conflicts with new accounts as the student id and email have opened up.</p>
  <!-- if archived == 1 then the "Archive" button will become an "Unarchive Button WITH conflict checker"-->
</div>
<div class="modal-footer">
  <a href="#!" onclick="modelActClose('moreArchive')" class="waves-effect waves-cyan accent-4 btn-flat">Archive<i class="material-icons right">archive unarchive</i></a>
</div>
</form>
</div>
<!--Main student info card scripts-->
*/
?>
