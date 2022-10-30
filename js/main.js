(function ($) {
  //popup hide code
  var ssdata = "";
  $("#PopUpClose").click(function () {
    $("#popup-container").css("display", "none");
    $(".bdy").css("overflow", "visible");
    location.reload(true);
  });
  //Home page image code.
  $('[data-form="homepage-form"]').each(function () {
    var form = $(this);

    form.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#exampleModalLabel").html("Capturing screenshot ...");
      $(".bdy").css("overflow", "hidden");
      $("#popupLoader").removeClass("d-none");
      $("#resultWrapperPdf").addClass("d-none");
      $(".simple-msg").addClass("d-none");
      $("#downloadLink").addClass("d-none").attr("href", "");
      $("#screenshotImage").addClass("d-none").attr("src", "");
      $("#resultMessage").addClass("d-none").html("");

      ///////////////////////////////////////////////
      $("#popup-container").css("display", "block");
      console.log(form.serializeArray());
      $.ajax({
        url: "ImagePhp.php",
        type: "POST",
        data: form.serializeArray(),
        success: function (data) {
          if (data != 0) {
            SS_count_update();
            $("#exampleModalLabel").html("Your Screenshot is ready...");
            $("#popupLoader").addClass("d-none");
            $(".simple-msg").removeClass("d-none");
            $("#downloadLink").removeClass("d-none").attr("href", data);
            $("#screenshotImage").removeClass("d-none").attr("src", data);
          } else {
            $("#exampleModalLabel").html("Unable to capture screenshot.");
            $("#popupLoader").addClass("d-none");
            $("#resultMessage").removeClass("d-none").html("URL is Invalid");
          }
        },
      });
    });
  });
  // home page pdf code
  $('[data-form="homepage-pdf-form"]').each(function () {
    var form = $(this);
    form.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#exampleModalLabel").html("Converting website to PDF ...");
      $(".bdy").css("overflow", "hidden");
      $("#popupLoader").removeClass("d-none");
      $("#resultWrapperPdf").addClass("d-none");
      $(".simple-msg").addClass("d-none");
      $("#downloadLink").addClass("d-none").attr("href", "");
      $("#screenshotImage").addClass("d-none").attr("src", "");
      $("#resultMessage").addClass("d-none").html("");

      ////////////////////////////////////////////////////////
      $("#popup-container").css("display", "block");
      console.log(form.serializeArray());
      $.ajax({
        url: "PdfPhp.php",
        type: "POST",
        data: form.serializeArray(),
        success: function (data) {
          if (data != 0) {
            SS_count_update();
            $("#exampleModalLabel").html("Your PDF is ready.");
            $("#popupLoader").addClass("d-none");
            $(".simple-msg").removeClass("d-none");
            $("#downloadLink").removeClass("d-none").attr("href", data);
            $("#resultWrapperPdf").removeClass("d-none");
          } else {
            $("#exampleModalLabel").html("Unable to capture screenshot.");
            $("#popupLoader").addClass("d-none");
            $("#resultMessage").removeClass("d-none").html("URL is Invalid");
          }
        },
      });
    });
  });

  /// advanced  image code
  $('[data-form="advanced-image-form"]').each(function () {
    var form = $(this);
    form.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#exampleModalLabel").html("Capturing screenshot ...");
      $(".bdy").css("overflow", "hidden");
      $("#popupLoader").removeClass("d-none");
      $("#resultWrapperPdf").addClass("d-none");
      $(".simple-msg").addClass("d-none");
      $("#downloadLink").addClass("d-none").attr("href", "");
      $("#screenshotImage").addClass("d-none").attr("src", "");
      $("#resultMessage").addClass("d-none").html("");

      ////////////////////////////////////////////////////////////////////////
      $("#popup-container").css("display", "block");
      console.log(form.serializeArray());
      $.ajax({
        url: "AdvancedImage.php",
        type: "POST",
        data: form.serializeArray(),
        success: function (data) {
          if (data != 0) {
            SS_count_update();
            $("#exampleModalLabel").html("Your Screenshot is ready...");
            $("#popupLoader").addClass("d-none");
            $(".simple-msg").removeClass("d-none");
            //$("#downloadLink").removeClass("d-none").attr("href", data);
            $("#screenshotImage").removeClass("d-none").attr("src", data);
          } else {
            $("#exampleModalLabel").html("Unable to capture screenshot.");
            $("#popupLoader").addClass("d-none");
            $("#resultMessage").removeClass("d-none").html("URL is Invalid");
          }
        },
      });
    });
  });

  // advance pdf code
  $('[data-form="generator-pdf-form"]').each(function () {
    var form = $(this);
    form.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#exampleModalLabel").html("Converting website to PDF ...");
      $(".bdy").css("overflow", "hidden");
      $("#popupLoader").removeClass("d-none");
      $("#resultWrapperPdf").addClass("d-none");
      $(".simple-msg").addClass("d-none");
      $("#downloadLink").addClass("d-none").attr("href", "");
      $("#screenshotImage").addClass("d-none").attr("src", "");
      $("#resultMessage").addClass("d-none").html("");

      ////////////////////////////////////////////////////
      $("#popup-container").css("display", "block");
      console.log(form.serializeArray());
      $.ajax({
        url: "AdvancedPhpConverter.php",
        type: "POST",
        data: form.serializeArray(),
        success: function (data) {
          if (data != 0) {
            SS_count_update();
            $("#exampleModalLabel").html("Your PDF is ready.");
            $("#popupLoader").addClass("d-none");
            $(".simple-msg").removeClass("d-none");
            //$("#downloadLink").removeClass("d-none").attr("href", data);
            $("#resultWrapperPdf").removeClass("d-none");
          } else {
            $("#exampleModalLabel").html("Unable to capture screenshot.");
            $("#popupLoader").addClass("d-none");
            $("#resultMessage").removeClass("d-none").html("URL is Invalid");
          }
        },
      });
    });
  });

  // Screenshot Count Update
  function SS_count_update() {
    $.ajax({
      url: "UpdateUserAndRandomValues.php",
    });
  }

  // responsive menu
  $("#navbar").click(function () {
    if ($(".navlinks").css("display") == "none") {
      $(".navlinks").css("display", "flex");
      $(".navbar").addClass("close");
    } else {
      $(".navlinks").css("display", "none");
      $(".navbar").removeClass("close");
    }
  });
  $("#free-sub").click(function () {
    if ($(".submenu").css("display") == "none") {
      $(".submenu").css("display", "block");
    } else {
      $(".submenu").css("display", "none");
    }
  });

  // profile user data image and pdfs
  $(".img-d").addClass("d-active");
  $(".img-d").click(function () {
    $(".img-d").addClass("d-active");
    $(".pdf-d").removeClass("d-active");

    $("#img-u-data").css("display", "flex");
    $("#pdf-u-data").css("display", "none");
  });

  // pdf profile data
  $(".pdf-d").click(function () {
    $(".pdf-d").addClass("d-active");
    $(".img-d").removeClass("d-active");

    $("#pdf-u-data").css("display", "flex");
    $("#img-u-data").css("display", "none");
  });

  //profile details show
  $(".profile-btn").click(function () {
    $(".pro-c").css("display", "block");
  });

  $(".close-p-btn").click(function () {
    $(".pro-c").css("display", "none");
  });
})(jQuery);

//form option change
var formWebSS = document.getElementById("webScreenShot");
var formPdf = document.getElementById("screenshotPdf");

var optionImg = document.getElementById("imageOption");
var optionPdf = document.getElementById("pdfOption");
// option js
optionImg.classList.toggle("activeOption"); //active css
optionImg.addEventListener("click", function () {
  optionImg.classList.toggle("activeOption");
  optionPdf.classList.toggle("activeOption");

  formWebSS.style.display = "block";
  formPdf.style.display = "none";
});
optionPdf.addEventListener("click", function () {
  optionImg.classList.toggle("activeOption");
  optionPdf.classList.toggle("activeOption");

  formWebSS.style.display = "none";
  formPdf.style.display = "block";
});

// ********Advanced form js starts form here***************
//change value of input field
function changeScreenshotHeight() {
  if ($("#inputHeightFull").is(":checked")) {
    $("#inputHeight").val("full");
    $("#inputHeight").prop("readonly", true);
  } else {
    $("#inputHeight").val("");
    $("#inputHeight").prop("readonly", false);
  }
}

// Device options

function changeScreenshotDimension(el) {
  var selectedDevice = el.value;
  var width = $("input[name=width]");
  var height = $("input[name=height]");
  if ("phone" == selectedDevice) {
    width.val("480");
    if (!$("#inputHeightFull").is(":checked")) {
      height.val("800");
    }
  } else if ("tablet" == selectedDevice) {
    width.val("800");
    if (!$("#inputHeightFull").is(":checked")) {
      height.val("1280");
    }
  } else {
    width.val("1024");
    if (!$("#inputHeightFull").is(":checked")) {
      height.val("768");
    }
  }
}
