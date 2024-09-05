<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .divdiv {
            display:grid;
            width:100%;
            height:100vh;
        }
        #div {
            width:400px;
            height:400px;
            align-self:center;
            justify-self:center;
            background-color: bisque;
            text-align: center;
            line-height:400px;
            font-size:20px;
        }
    </style>
</head>
<body>
    <div class="divdiv">
        <div id="div">

        </div>
    </div>
    
</body>
</html>
<script>
    let div = document.getElementById("div");
let date = new Date;
let month = (date.getMonth()+1);
switch (month) {
    case 9:
        month = 'Сентября';
        break;
        case 10:
        month = 'Октября';
        break;
        case 11:
        month = 'Ноября';
        break;
        case 12:
        month = 'Декабря';
        break;
        case 8:
        month = 'Августа';
        break;
        case 7:
        month = 'Июля';
        break;
        case 6:
        month = 'Июня';
        break;
        case 5:
        month = 'Мая';
        break;
        case 4:
        month = 'Апреля';
        break;
        case 3:
        month = 'Марта';
        break;
        case 2:
        month = 'Февраля';
        break;
        case 1:
        month = 'Января';
        break;
}
    div.innerHTML = date.getDate() + " " + month + " " + date.getFullYear();
//квадрат в центре - дата текущая в русском формате 5 сентября 2024 
</script>