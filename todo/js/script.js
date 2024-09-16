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
console.log ( document.getElementsByClassName("done"));
Object.keys(document.getElementsByClassName("done")).forEach(function(item, index, array) {
    console.log(item);
    document.getElementsByClassName("done")[item].addEventListener("click", function () {
       
        document.getElementsByClassName("done")[item].submit(function (e) { // Устанавливаем событие отправки для формы с id=form
            e.preventDefault();
             var form_data = $(this).serialize(); // Собираем все данные из формы
             $.ajax({
                 type: "POST", // Метод отправки
                 url: "user/change.php", // Путь до php файла отправителя
                 data: form_data,
                 success: function (html) {
                     
                    document.getElementsByClassName("done")[item].classList.remove('done');
                    document.getElementsByClassName("done")[item].classList.add('not_done');
                    //  $('#modal'). trigger('reset');
                     $("#main").html(html);
                    //  session_start();
                    //  alert("Задача добавлена!");
                 }
             });
         });
       
    } );
  });