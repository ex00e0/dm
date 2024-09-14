document.getElementById("plus").addEventListener("click", function () {
    document.getElementById("shadow").style.display = "block";
    document.getElementById("modal").style.display = "grid";
});
document.getElementById("cancel").addEventListener("click", function () {
    document.getElementById("shadow").style.display = "none";
    document.getElementById("modal").style.display = "none";
});

$("#modal").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
    e.preventDefault();
     var form_data = $(this).serialize(); // Собираем все данные из формы
     $.ajax({
         type: "POST", // Метод отправки
         url: "user/add.php", // Путь до php файла отправителя
         data: form_data,
         success: function (html) {
             
             document.getElementById("shadow").style.display = "none";
             document.getElementById("modal").style.display = "none";
             $('#modal'). trigger('reset');
             $("#ajax").html(html);
            //  session_start();
            //  alert("Задача добавлена!");
         }
     });
 });