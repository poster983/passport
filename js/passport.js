/*

The MIT License (MIT)

Copyright (c) Tue Nov 1 2016 Joseph Hassell joseph@thehassellfamily.net

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
/*VARS*/


$.fn.formClear = function() {
  return this.each(function() {
    var formtype = this.type, formtag = this.tagName.toLowerCase();
    if (formtag == 'form') {
      return $(':input',this).formClear();
    }
    if (formtype == 'text' || formtag == 'textarea') {
      this.value = '';
    }
    else if (formtype == 'checkbox' || formtype == 'radio') {
      this.checked = false;
    }
    else if (formtag == 'select') {
      this.selectedIndex = -1;
    }
  });
};


$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
$("#sao").change(function() {
    if(this.checked) {
      $('#passrequestAdvanced').show();
        $('#passrequestAdvanced').animateCss('bounceIn');
        $('#subPassAdv').html(" (Using Advanced Options) <i class='material-icons right'>error_outline</i>");
    } else {
      $('#passrequestAdvanced').animateCss('bounceOut');
      $('#passrequestAdvanced').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
    function(e) {
      $('#passrequestAdvanced').hide();
      $('#subPassAdv').html("<i class='material-icons right'>send</i>");
    });
    }
});


/*Overlay function*/
/*open*/
function openFullOverlay(id) {
    document.getElementById(id).style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeFullOverlay(id, delay) {
  setTimeout(function(){
    document.getElementById(id).style.width = "0%";
  }, delay);
}



/*FOR /students/index.php */

depLock = 0;
dateshowLock = 0;
selVal = 0;

passSubmitReady = 0;
depReady = false;
reasonReady = false;
dateReady = false;
function carsonRau(){
  $(document.body).css('background-image', 'url(/passport/image/cork-board.jpg)');
  $('#PassCard').addClass("animated infinite jello");
  $('#navBar').addClass("animated infinite rubberBand");
  console.log("There You Go Carson");
}
function showDatePicker() {
  if(dateshowLock == 0) {
  $('#datePicker').show();

    dateshowLock = 1;
  }
}
function dateVal() {

      dateReady = true;

  checkPassSubmit();

}
    function depToReasonAJAX(depart, perd) {



      if(depLock == 0) {
        selVal +=1;
        depLock = 1;
        depReady = true;
      }
      dateshowLock = 0;
      reasonReady = false;
      dateReady = false;
      checkPassSubmit();

      $('#ReasonAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
      $.ajax({
    url: '/passport/students/ajaxGetReasonsAndBlackout.php',
    data: {'dep': depart, 'per': perd},
    type: 'get',
    success: function(data) {
      $('#ReasonAJAX').html(data);
    },
    error: function(xhr, desc, err) {
    console.log(xhr);
    console.log("Details: " + desc + "\nError:" + err);
    $('#ReasonAJAX').html("There was an error.  Please check the console for more details.");
    }
  })
  $( document ).ajaxComplete(function() {

    $('select').material_select();
    if(selVal == 1) {
      $("#depDiv input[type=text]").addClass('valid');
    } else if(selVal ==2) {
      $("#shPer input[type=text]").addClass('valid');
    } else if(selVal == 3) {
      $("#shPer input[type=text]").addClass('valid');
      $("#stYear input[type=text]").addClass('valid');
    }

  });
  };

  function submitPassToAjax(id, depart, reason, day, isDebug) {
    $('#behindCard').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
    $.ajax({
  url: '/passport/students/ajaxSubmit.php',
  data: {'sAccID': id, 'dep': depart, 'reason': reason, 'day': day, 'isDebug': isDebug},
  type: 'get',
  success: function(data) {
    $('#behindCard').html("");

    depLock = 0;
    dateshowLock = 0;
    selVal = 0;

    dateshowLock = 0;
    depReady = false;
    reasonReady = false;
    dateReady = false;
    console.log("AJAX");
    $('#ReasonAJAX').html("");
    $('#submitPass').attr("disabled",true);
    $('#datePicker').hide();
    $('#passForm').formClear();
    $('#PassCard').show();
    $('#PassCard').animateCss('fadeInLeft');
    $('#PassCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
  function(e) {
  $('select').material_select();
  if(!depReady || !reasonReady || !dateReady){
    console.log("json_encode");
    console.log(data);
  if (data.status == "error") {
    if(data.code == "8001") {
      openFullOverlay("confirmOver");

          console.warn("Limit Reached");
          $( "#checkmarkAnimationfull" ).html("<span class='Xleft'></span><span class='Xright'></span>")
          $('#ConfirmOverlayWords').html("Limit Reached");
          closeFullOverlay("confirmOver", 4000);

    }
    if(data.code == "5002") {
      openFullOverlay("confirmOver");

          console.warn("You Have Already Requested A Pass");
          $( "#checkmarkAnimationfull" ).html("<span class='Xleft'></span><span class='Xright'></span>")
          $('#ConfirmOverlayWords').html("You Have Already Requested A Pass");
          closeFullOverlay("confirmOver", 3000);
    }
  }
  if (data.status == "success") {
    openFullOverlay("confirmOver");
    $('#ConfirmOverlayWords').html("Pass Requested");
    setTimeout(function(){
      $( "#checkmarkAnimationfull" ).html('<svg class="pause-Ani checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path id="checkMarkAni"  class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
      $('#checkMarkAni').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function(e) {
          console.log("done");
        closeFullOverlay("confirmOver", 1000);
        });
    }, 500);
  }

  }
  });

  },
  error: function(xhr, desc, err) {
  console.log(xhr);
  console.error("Details: " + desc + "\nError:" + err);
  console.warn(xhr.responseText)
  $('#behindCard').html("There was an error.  Please check the console for more details.");
  }

})};

  function submitPass(id, isDebug) {
    if (passSubmitReady == 1 && dateshowLock == 1){
      passSubmitReady = 0;
      console.log("hi");
      $('#PassCard').animateCss('fadeOutRight');
      $('#PassCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
    function(e) {

      console.log($("input[name=day]:checked").val());
      if($("input[name=day]:checked").val() != undefined) {
        $('#PassCard').hide();
    submitPassToAjax(id,$('#department').val(),$('#ajaxReason').val(),$("input[name=day]:checked").val(), isDebug);
    console.log("byeee");
  } else {
    console.log("aaaaaaaaaaaaa");
  }
  console.log("bysdfsdeee");
    });
    console.log("bye");
    }
  };

  function checkPassSubmit(){
    if(depReady && reasonReady && dateReady){
      $('#submitPass').attr("disabled",false);
      passSubmitReady = 1;
    } else {
      $('#submitPass').attr("disabled",true);
      passSubmitReady = 0;
    }
  };

  function AllStudentmessageAjaxAfterPageLoad() {
    $('#ajaxAllStudentMess').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Checking for Messages</h5>");
    $.ajax({
  url: '/passport/students/ajaxMessage.php',
  success: function(data) {
    $('#ajaxAllStudentMess').html(data);
  },
  error: function(xhr, desc, err) {
  console.log(xhr);
  console.log("Details: " + desc + "\nError:" + err);
  $('#ajaxAllStudentMess').html("There was an error.  Please check the console for more details.");
  }
})};


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
