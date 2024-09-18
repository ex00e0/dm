
document.getElementById("plus").addEventListener("click", function () {
    document.getElementById("shadow").style.display = "block";
   if ( window.innerHeight > document.getElementById("body").scrollHeight) {
    document.getElementById("shadow").style.height = `${window.innerHeight}px`;
   }
  else {
    document.getElementById("shadow").style.height = `${document.getElementById("body").scrollHeight}px`;
  }
    document.getElementById("modal").style.display = "grid";
});


document.getElementById("cancel").addEventListener("click", function () {
    document.getElementById("shadow").style.display = "none";
    document.getElementById("modal").style.display = "none";
});

// $("#modal").off('submit').on('submit', function (e) { 
//     e.preventDefault();
//     var form_data = $(this).serialize();
//     let request_data = $("#search").val();

//     $.ajax({
//         type: "POST",
//         url: "user/add.php",
//         data: {search: request_data, 
//             form: [form_data.slice(form_data.indexOf('title=')+6, form_data.indexOf('&')), form_data.slice(form_data.indexOf('description=')+12)]},
//         success: function (html) {
//             document.getElementById("shadow").style.display = "none";
//             document.getElementById("modal").style.display = "none";
//             $('#modal').trigger('reset');
//             $("#main").append(html);
//         }
//     });
// });
$("#modal").off('submit').on('submit', function (e) { 
    e.preventDefault();
    var form_data = $(this).serialize();
    // let request_data = $("#search").val();

    $.ajax({
        type: "POST",
        url: "user/add.php",
        data: form_data,
        success: function (html) {
            document.getElementById("shadow").style.display = "none";
            document.getElementById("modal").style.display = "none";
            document.getElementById("detective").style.display = "none";
            document.getElementById("empty").style.display = "none";
            document.getElementById("vh_empty").style.display = "none";
           
            $('#modal').trigger('reset');
            $("#main").append(html);
            setInterval(func, 4000);
        }
    });
});

$("#modal_edit").off('submit').on('submit', function (e) { 
    e.preventDefault();
    var form_data = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "user/edit.php",
        data: form_data,
        success: function (html) {
            document.getElementById("shadow").style.display = "none";
            document.getElementById("modal_edit").style.display = "none";
            // $('#modal').trigger('reset');
            $("#main").html(html);
            setInterval(func, 4000);
        }
    });
});
//     $("#modal").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
//     e.preventDefault();
//      var form_data = $(this).serialize(); // Собираем все данные из формы
//      $.ajax({
//          type: "POST", // Метод отправки
//          url: "user/add.php", // Путь до php файла отправителя
//          data: form_data,
//          success: function (html) {
             
//              document.getElementById("shadow").style.display = "none";
//              document.getElementById("modal").style.display = "none";
//              $('#modal'). trigger('reset');
//              $("#main").html(html);
//             //  session_start();
//             //  alert("Задача добавлена!");
//          }
//      });
//  });

Object.keys(document.getElementsByClassName("done")).forEach(function(item, index, array) {
    // console.log(document.getElementsByClassName("done")[item]);
    document.getElementsByClassName("done")[item].addEventListener("click", function sendAjax () {
        let request_data = $("#search").val();
        let request_data2 = $("#filter").val();
            // alert("submit!");
    
             var form_data = $(this).serialize();
            
             $.ajax({
                 type: "POST", // Метод отправки
                 url: "user/change.php", // Путь до php файла отправителя
                 data: {
                    search: request_data,   
                    filter: request_data2,
                    form: [form_data.slice(form_data.indexOf('id=')+3, form_data.indexOf('&')), form_data.slice(form_data.indexOf('checkbox=')+9)]},
                 success: function (html) {
               
                    // document.getElementsByClassName("done")[item].classList.remove('done');
                    // document.getElementsByClassName("done")[item].classList.add('not_done');
                    // //  $('#modal'). trigger('reset');
                     $("#main").html(html);
                     setInterval(func, 4000);
                    //  session_start();
                    //  alert("Задача добавлена!");
                 }
             });
       
    } );
  });
  Object.keys(document.getElementsByClassName("not_done")).forEach(function(item, index, array) {
    // console.log(document.getElementsByClassName("done")[item]);
    document.getElementsByClassName("not_done")[item].addEventListener("click", function sendAjax2 () {
        let request_data = $("#search").val();
        let request_data2 = $("#filter").val();
            // alert("submit!");
    
             var form_data2 = $(this).serialize();

            //  console.log(form_data2);
             $.ajax({
                 type: "POST", // Метод отправки
                 url: "user/change.php", // Путь до php файла отправителя
                 data: {
                search: request_data,   
                filter: request_data2,
                form: [form_data2.slice(form_data2.indexOf('id=')+3, form_data2.indexOf('&')), form_data2.slice(form_data2.indexOf('checkbox=')+9)]},
                 success: function (html) {
                    
                    // document.getElementsByClassName("done")[item].classList.remove('done');
                    // document.getElementsByClassName("done")[item].classList.add('not_done');
                    // //  $('#modal'). trigger('reset');
                     $("#main").html(html);
                     setInterval(func, 4000);
                    //  session_start();
                    //  alert("Задача добавлена!");
                 }
             });
       
    } );
  });


$(document).ready(function() {
  $('#search').on('keyup', searchAjax);
//   $('#selectFilter').on('change', getDishes);
});

var searchAjax = function(){
    let request_data = $("#search").val();
    let request_data2 = $("#filter").val();

$.ajax({
    url: 'user/search.php',         /* Куда отправить запрос */
    method: 'post',             /* Метод запроса (post или get) */
    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
    data: {search: request_data, filter: request_data2},     /* Данные передаваемые в массиве */
    success: function(data){
        $("#main").html(data);
    }
}); 
}
$(document).ready(function() {
    $('#filter').on('change', filterAjax);
  //   $('#selectFilter').on('change', getDishes);
  });
  
  var filterAjax = function(){
    let request_data = $("#search").val();
      let request_data2 = $("#filter").val();
      document.getElementById("filter_val").value = $("#filter").val();
      document.getElementById("search_val").value = $("#search").val();
    //   $("#filter_val").val() = 
  
  $.ajax({
      url: 'user/search.php',         /* Куда отправить запрос */
      method: 'post',             /* Метод запроса (post или get) */
      dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
      data: {search: request_data, filter: request_data2},     /* Данные передаваемые в массиве */
      success: function(data){
          $("#main").html(data);
      }
  }); 
  }
function sendDelete(id) {
    let request_data = $("#search").val();
    let request_data2 = $("#filter").val();
    document.getElementById("filter_val").value = $("#filter").val();
    document.getElementById("search_val").value = $("#search").val();

    $.ajax({
        type: "POST", // Метод отправки
        url: "user/delete.php", // Путь до php файла отправителя
        data: {
           search: request_data,   
           filter: request_data2,
           delete: id},
        success: function (html) {
      
           // document.getElementsByClassName("done")[item].classList.remove('done');
           // document.getElementsByClassName("done")[item].classList.add('not_done');
           // //  $('#modal'). trigger('reset');
            $("#main").html(html);
            setInterval(func, 4000);
           //  session_start();
           //  alert("Задача добавлена!");
        }
    });
}

function getEdit(id) {
    let request_data = $("#search").val();
    let request_data2 = $("#filter").val();
            
    $.ajax({
        type: "POST", // Метод отправки
        url: "user/get_edit.php", // Путь до php файла отправителя
        data: {
            search: request_data,   
            filter: request_data2,
            get: id},
        success: function (html) {
            document.getElementById("shadow").style.display = "block";
            document.getElementById("shadow").style.height = `${document.getElementById("body").scrollHeight}px`;;
            
           // document.getElementsByClassName("done")[item].classList.remove('done');
           // document.getElementsByClassName("done")[item].classList.add('not_done');
           // //  $('#modal'). trigger('reset');
            $("#ajax").html(html);
            document.getElementById("modal_edit").style.display = "grid";
            
        }
    });
}