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
        area: area,
      },
      success: function (response) {
        $(".dark-layer").html(response);
        closeAppliedForm();
      },
    });
  });
});
// Проверяем, что все поля важные заполнены
$(".form-button").on("click", function () {
  inputAuthorization();
});
// Так как окно после отправки я генерирую сам, мне нужно его закрывать, поэтому функция вызывается, когда только появляется окно
function closeAppliedForm() {
  const closeAppliedForm = document.getElementById("closeAppliedForm");
  const closeAppliedFormButton = document.getElementById(
    "closeAppliedFormButton"
  );
  closeAppliedForm.addEventListener("click", () => {
    darkLayer.classList.toggle("js--hidden");
  });
  closeAppliedFormButton.addEventListener("click", () => {
    darkLayer.classList.toggle("js--hidden");
  });
}
// Сама функция проверки полей и добавления дополнительных свойств полю
function inputAuthorization() {
  const inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach((input) => {
    if (!input.value) {
      const span = addWarningEmptySpan();
      input.classList.add("form-input--warning");
      const inputID = input.id;
      const inputLabel = document.querySelector(`[for=${inputID}]`);
      inputLabel.appendChild(span);
    }
  });
}

// Не хотел перегружать функция проверки и прочее, поэтому создание отдельного спана вынес отдельно
function addWarningEmptySpan() {
  const warningEmptySpan = document.createElement("span");
  warningEmptySpan.classList.add("empty--input");
  return warningEmptySpan;
}
// Как только пользователь решился ввести данные, если было предупреждение я удаляю предупреждения всякие
function deleteWarningSpans() {
  const inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach((input) => {
    input.addEventListener("input", () => {
      const inputID = input.id;
      const inputLabel = document.querySelector(`[for=${inputID}]`);
      if (inputLabel.querySelector(".empty--input")) {
        const certainSpan = inputLabel.querySelector(".empty--input");
        certainSpan.remove();
        input.classList.remove("form-input--warning");
      }
    });
  });
}

deleteWarningSpans();
