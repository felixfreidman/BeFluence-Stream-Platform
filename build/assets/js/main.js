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
if (document.querySelector('main').classList.contains('editPage')) {
  // Textarea Limit Control

  var commentTextarea = document.querySelector('.editContainer__formTextarea');
  var commentTextareaSymbolCounter = document.querySelector('.editContainer__formTextareaSymbolCounter');
  var maxValue = 580;
  commentTextarea.addEventListener('input', function () {
    commentTextareaSymbolCounter.textContent = maxValue - commentTextarea.value.length;
    if (parseInt(commentTextareaSymbolCounter.textContent) <= 50) {
      commentTextareaSymbolCounter.classList.add('lowSymbols');
      commentTextareaSymbolCounter.classList.remove('noSymbols');
    } else if (parseInt(commentTextareaSymbolCounter.textContent) > 50) {
      commentTextareaSymbolCounter.classList.remove('noSymbols');
      commentTextareaSymbolCounter.classList.remove('lowSymbols');
    }
    if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
      commentTextareaSymbolCounter.classList.remove('lowSymbols');
      commentTextareaSymbolCounter.classList.add('noSymbols');
    }
  });
  commentTextarea.addEventListener('keydown', function (event) {
    var key = event.keyCode || event.charCode;
    if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
      if (key !== 8 && key !== 46) {
        event.preventDefault();
      }
    }
  });
}
if (document.querySelector('main').classList.contains('mainPage')) {
  var parentFilterContainer = document.querySelector('.mainPage__filterContainer');
  var filerDarkLayer = parentFilterContainer.querySelector('.filterContainer__darkLayer');
  var filterContainer = parentFilterContainer.querySelector('.filterContainer__filters');
  var closeFilterButton = parentFilterContainer.querySelector('.filterContainer__closeButton');
  var openFilterButton = document.querySelector('.openFilters');
  openFilterButton.addEventListener('click', function () {
    parentFilterContainer.classList.remove('jsHidden');
    setTimeout(function () {
      filerDarkLayer.classList.add('anim__fadeIn');
    }, 100);
    setTimeout(function () {
      filterContainer.classList.add('anim__translateIn');
    }, 200);
  });
  closeFilterButton.addEventListener('click', function () {
    filterContainer.classList.remove('anim__translateIn');
    setTimeout(function () {
      filerDarkLayer.classList.remove('anim__fadeIn');
    }, 200);
    setTimeout(function () {
      parentFilterContainer.classList.add('jsHidden');
    }, 300);
  });
  filerDarkLayer.addEventListener('click', function () {
    filterContainer.classList.remove('anim__translateIn');
    setTimeout(function () {
      filerDarkLayer.classList.remove('anim__fadeIn');
    }, 200);
    setTimeout(function () {
      parentFilterContainer.classList.add('jsHidden');
    }, 300);
  });
}
if (document.querySelector('main').classList.contains('mainPage')) {
  var setTableButton = document.querySelector('.setTable');
  var setGridButton = document.querySelector('.setGrid');
  var layoutTable = document.querySelector('.mainPage__layoutTable');
  var layoutGrid = document.querySelector('.mainPage__layoutGrid');
  setTableButton.addEventListener('click', function () {
    setTableButton.classList.add('layoutContainer__buttonActive');
    setGridButton.classList.remove('layoutContainer__buttonActive');
    layoutTable.classList.add('mainPage__layoutActive');
    layoutGrid.classList.remove('mainPage__layoutActive');
    localStorage.setItem('lauout_pref', 'table');
  });
  setGridButton.addEventListener('click', function () {
    setGridButton.classList.add('layoutContainer__buttonActive');
    setTableButton.classList.remove('layoutContainer__buttonActive');
    layoutGrid.classList.add('mainPage__layoutActive');
    layoutTable.classList.remove('mainPage__layoutActive');
    localStorage.setItem('lauout_pref', 'grid');
  });
}
window.addEventListener('load', function () {
  if (document.querySelector('main').classList.contains('mainPage')) {
    initLayout();
  }
  if (document.querySelector('main').classList.contains('editPage')) {
    initFormInactive();
    initCountTextareaValue();
  }
});
function initLayout() {
  var layoutPref = localStorage.getItem('lauout_pref');
  var setTableButton = document.querySelector('.setTable');
  var setGridButton = document.querySelector('.setGrid');
  var layoutTable = document.querySelector('.mainPage__layoutTable');
  var layoutGrid = document.querySelector('.mainPage__layoutGrid');
  switch (layoutPref) {
    case "table":
      setTableButton.classList.add('layoutContainer__buttonActive');
      setGridButton.classList.remove('layoutContainer__buttonActive');
      layoutTable.classList.add('mainPage__layoutActive');
      layoutGrid.classList.remove('mainPage__layoutActive');
      break;
    case "grid":
      setGridButton.classList.add('layoutContainer__buttonActive');
      setTableButton.classList.remove('layoutContainer__buttonActive');
      layoutGrid.classList.add('mainPage__layoutActive');
      layoutTable.classList.remove('mainPage__layoutActive');
      break;
    default:
      setTableButton.classList.add('layoutContainer__buttonActive');
      setGridButton.classList.remove('layoutContainer__buttonActive');
      layoutTable.classList.add('mainPage__layoutActive');
      layoutGrid.classList.remove('mainPage__layoutActive');
      break;
  }
}
function initCountTextareaValue() {
  var commentTextareaSymbolCounter = document.querySelector('.editContainer__formTextareaSymbolCounter');
  var commentTextarea = document.querySelector('.editContainer__formTextarea');
  var maxValue = 580;
  commentTextareaSymbolCounter.textContent = maxValue - commentTextarea.value.length;
  if (parseInt(commentTextareaSymbolCounter.textContent) <= 50) {
    commentTextareaSymbolCounter.classList.add('lowSymbols');
  }
  if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
    commentTextareaSymbolCounter.classList.add('noSymbols');
  }
}
function initFormInactive() {
  var editDataForm = document.querySelector('.editContainer__form');
  var allPersonalInputs = editDataForm.querySelectorAll('input');
  var personalTextarea = editDataForm.querySelectorAll('textarea');
  setFormInactive(allPersonalInputs);
  setFormInactive(personalTextarea);
}
function setFormInactive(nodeList) {
  nodeList.forEach(function (node) {
    node.setAttribute('readonly', true);
    node.setAttribute('disabled', true);
    node.setAttribute('placeholder', 'Пока тут пусто :(');
    node.classList.add('showModeActive');
  });
}