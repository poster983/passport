/*

The MIT License (MIT)

Copyright (c) Sat Aug 06 2016 Joseph Hassell joseph@thehassellfamily.net

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

//declare all variables

var whyLock = 0;
var whyVar = "";
var dateLock = 0;
var shTeacherLock = 0;
var perProg = 0;
var perConfirmLock = 0;

/*Overlay function*/
/*open*/
function openFullOverlay() {
    document.getElementById("overlayFull").style.width = "100%";
    document.getElementById("blurg").style.filter = "blur(40px)";
    document.getElementById("blurg").style.webkitFilter = "blur(40px)";
    document.getElementById("blurg").style.mozFilter = "blur(40px)";
    document.getElementById("blurg").style.oFilter = "blur(40px)";
    document.getElementById("blurg").style.msFilter = "blur(40px)";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeFullOverlay() {
    document.getElementById("overlayFull").style.width = "0%";
}



//Sequencial Pass Blocker
function whyChecker(dep, depID) {
  console.log("Clicked on " + dep);
  whyVar = $('#' + depID).find(":selected").text();

  if(whyVar === "--Not Required--") {
    incBlur("why");
  }
  }

  //period Shteacher and confirm checker
  function perTabBundCheck(where) {
    if((where === "shTeacher") && (shTeacherLock == 0)) {
      perProg += 1;
      shTeacherLock = 1;
      console.log("Clicked on SH");
    } else if ((where === "confirm") && (perConfirmLock == 0)) {
      perProg += 1;
      perConfirmLock = 1;
      console.log("Clicked on per");
    }
    if (perProg == 2) {
      $("#finPassSubmitThang").removeClass("blur-sect")
      $("#finPassSubmitThang").addClass("animated bounce")
    }
  }
  function unCheckRadioPer() {
    $('input[name=perTab]').attr('checked',false);

    $("#shTeacherALLSelect select").prop('selectedIndex',0);

    perProg = 0;
    perConfirmLock = 0;
    shTeacherLock = 0;
    if ($("#finPassSubmitThang").hasClass("blur-sect")) {

    } else {
      $("#finPassSubmitThang").addClass("blur-sect")
      $("#finPassSubmitThang").removeClass("animated bounce")
    }
  }

//dep tabs
  //EXECUTIVE function
  document.getElementById("efTab").addEventListener("click", function(){
    whyChecker("efTab", "LECID");
    $("#depCont").removeClass("blur-sect")
  });

  //MATH

document.getElementById("mathTab").addEventListener("click", function(){
  whyChecker("mathTab", "MathDepartmentID");
  $("#depCont").removeClass("blur-sect")
});

//Library
document.getElementById("libTab").addEventListener("click", function(){
  whyChecker("libTab", "LibraryID");
  $("#depCont").removeClass("blur-sect")
});

// helpdesk
document.getElementById("hdTab").addEventListener("click", function(){
  whyChecker("hdTab", "HelpDeskID");
  $("#depCont").removeClass("blur-sect")
});

//writing Lab
document.getElementById("wlTab").addEventListener("click", function(){
  whyChecker("wlTab", "WritingLabID");
  $("#depCont").removeClass("blur-sect")
});

//forign Language
document.getElementById("flTab").addEventListener("click", function(){
  whyChecker("flTab", "ForeignLanguageID");
  $("#depCont").removeClass("blur-sect")
});

//Athletic Mentor
document.getElementById("amTab").addEventListener("click", function(){
  whyChecker("amTab", "AthleticMentorID");
  $("#depCont").removeClass("blur-sect")
});


//period

//A
document.getElementById("aperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//b
document.getElementById("bperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//c
document.getElementById("cperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//d
document.getElementById("dperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//e
document.getElementById("eperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//f
document.getElementById("fperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//g
document.getElementById("gperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});
//h
document.getElementById("hperTab").addEventListener("click", function(){
  $("#shTeacherALLSelect").removeClass("blur-sect")
  unCheckRadioPer();
});



function incBlur(whereProg) {
  if((whereProg === "why") && (whyLock == 0)) {

    whyLock = 1;
    //document.getElementById("genInfoInput").removeClass( "blur-sect", 1000, "easeInBack" );
    $("#genInfoInput").removeClass("blur-sect")

  } else if ((whereProg === "day") && (dateLock==0)) {
    console.log("Next");
    $("#periodTabs").removeClass("blur-sect", 1000, "easeOutExpo")
    dateLock = 1;
  }
}
