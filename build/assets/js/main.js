"use strict";

// AJAX-запрос для отправки сообщений на почту, которая указана в админке сайта
$(function () {
  $("#applyForm").on("submit", function (e) {
    e.preventDefault();
    var name = $("#userName").val();
    var phone = $("#userPhone").val();
    var company = $("#userCompany").val();
    var area = $("#userArea").val();
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "ajax_form",
        name: name,
        phone: phone,
        company: company,
        area: area
      },
      success: function success(response) {
        $(".dark-layer").html(response);
        closeAppliedForm();
      }
    });
  });
});
// Проверяем, что все поля важные заполнены
$(".form-button").on("click", function () {
  inputAuthorization();
});
// Так как окно после отправки я генерирую сам, мне нужно его закрывать, поэтому функция вызывается, когда только появляется окно
function closeAppliedForm() {
  var closeAppliedForm = document.getElementById("closeAppliedForm");
  var closeAppliedFormButton = document.getElementById("closeAppliedFormButton");
  closeAppliedForm.addEventListener("click", function () {
    darkLayer.classList.toggle("js--hidden");
  });
  closeAppliedFormButton.addEventListener("click", function () {
    darkLayer.classList.toggle("js--hidden");
  });
}
// Сама функция проверки полей и добавления дополнительных свойств полю
function inputAuthorization() {
  var inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach(function (input) {
    if (!input.value) {
      var span = addWarningEmptySpan();
      input.classList.add("form-input--warning");
      var inputID = input.id;
      var inputLabel = document.querySelector("[for=".concat(inputID, "]"));
      inputLabel.appendChild(span);
    }
  });
}

// Не хотел перегружать функция проверки и прочее, поэтому создание отдельного спана вынес отдельно
function addWarningEmptySpan() {
  var warningEmptySpan = document.createElement("span");
  warningEmptySpan.classList.add("empty--input");
  return warningEmptySpan;
}
// Как только пользователь решился ввести данные, если было предупреждение я удаляю предупреждения всякие
function deleteWarningSpans() {
  var inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach(function (input) {
    input.addEventListener("input", function () {
      var inputID = input.id;
      var inputLabel = document.querySelector("[for=".concat(inputID, "]"));
      if (inputLabel.querySelector(".empty--input")) {
        var certainSpan = inputLabel.querySelector(".empty--input");
        certainSpan.remove();
        input.classList.remove("form-input--warning");
      }
    });
  });
}
deleteWarningSpans();
var wrapperZoom = document.querySelector('.wrapperZoom');
var initZoom = 1;
function reportWindowSize() {
  var currentWidth = window.innerWidth;
  var initWidth = 0;
  var zoomLevelPerPixel = 0;
  var zoomLevel = 0;
  if (currentWidth > 1399) {
    initWidth = 1440;
    zoomLevelPerPixel = 0.0005;
    calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel);
  }
  if (currentWidth <= 1399 && currentWidth >= 961) {
    zoomLevelPerPixel = 0.0007;
    initWidth = 1440;
    calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel);
  }
  if (currentWidth <= 960 && currentWidth > 639) {
    initZoom = 1;
    zoomLevelPerPixel = 0.0012;
    initWidth = 640;
    calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel);
  }
  if (currentWidth <= 639) {
    initZoom = 1.5;
    zoomLevelPerPixel = 0.002;
    initWidth = 639;
    calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel);
  }
}
function calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel) {
  var zoomLevel = initZoom - (initWidth - currentWidth) * zoomLevelPerPixel;
  wrapperZoom.style.zoom = zoomLevel;
}
window.addEventListener('resize', reportWindowSize);
document.addEventListener('DOMContentLoaded', reportWindowSize);