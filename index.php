<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа по Web-программированию №1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div class="box">
    <h2>
        Костюк Александр, Поляков Даниил<br>Группа P33212 <br>Вариант: 16213
    </h2>
    <img
            src="image.png"
            alt="Не удалось не получилось">

<div class="form_container">
    <form id="form" method="post" onsubmit="return false">
        Выберите X:
        <select name="x">
            <option value="-3">-3</option>
            <option value="-2">-2</option>
            <option value="-1">-1</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        Введите Y:
            <input type="text"  placeholder="-5..5" name="y" >
        <br>
        Выберите R:
            <input type="radio" checked="checked" name="r" value="1">1
            <input type="radio" name="r" value="2">2
            <input type="radio" name="r" value="3">3
            <input type="radio" name="r" value="4">4
            <input type="radio" name="r" value="5">5
        <br>
        <input type="submit" id="submit">
    </form>
    <br>
    <span id="error"></span>
</div>
<script>
    $("document").ready(function (){
        $("form").on("submit", function (){
            let dataForm = $(this).serialize()

            $.ajax({
                url: '/input.php',         /* Куда отправить запрос */
                method: 'post',             /* Метод запроса (post или get) */
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                data: dataForm,     /* Данные передаваемые в массиве */
                success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                    console.log(data) /* В переменной data содержится ответ от index.php. */
                }
            });
        })
    })
</script>

<table id="result-table">
    <tr class="table-header">
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Локальное время</th>
        <th>Время исполнения</th>
        <th>Результат</th>
    </tr>
</table>
</div>
</body>
</html>