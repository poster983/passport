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
      <form>
        <div class="input-field red lighten-2">
          <input id="searchStudents" placeholder="Search by Name, Student ID, or Email" type="search" required>
          <label for="searchStudents"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
        <div class="container">
          <div id="ajaxReturnDom">
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
                                      <td>Not Banned/Banned until yy/mm/dd <i class='contentLinkArrow waves-effect right small material-icons'></i></td>
                                    </tr>
                                    <tr class="tableLinkArrow">
                                      <td><i class="small material-icons">restore</i></td>
                                      <td>Reset Account <i class='contentLinkArrow waves-effect right small material-icons'></i></td>
                                    </tr>
                                    <tr class="tableLinkArrow">
                                      <td><i class="small material-icons">update</i></td>
                                      <td>Update Account <i class='contentLinkArrow waves-effect right small material-icons'></i></td>
                                    </tr>
                                    <tr>
                                      <td><i class="small material-icons">verified_user</i></td>
                                      <td>Email NOT Verified/Email Verified</td>
                                    </tr>
                                    <tr class="tableLinkArrow">
                                      <td><i class="small material-icons">archive</i> <!--or use unarchive --></td>
                                      <td>User Is Archived/ User Is Not Archived <i class='contentLinkArrow waves-effect right small material-icons'></i></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                        </div>
                     </div>
                   </span>

                   <!--
                     <div class="card-action">
                       <a href="#">This is a link</a>
                       <a href="#">This is a link</a>

                   </div>
                 -->
                 </div>
               </div>
             </div>

            <!--End main student info card-->
          </div>
        </div>
      </div>
    </div>
        <!--Scripts-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="/passport/js/materialize.js"></script>
        <script src="/passport/js/init.js"></script>
</body>
