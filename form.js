$("#submit").on('click', function (){
    let x = $('select[name=x]').val();
    let y = $('input[name=y]').val().trim();
    let r = $('input[name=r]:checked').val();
    let date = choseDate();

    if (y === ""){
        $("#error").text("Переменная Y не задана");
        return false;
    } else if (y <= -5 || y >= 5){
        $("#error").text("Переменная Y должна быть в диапазоне (-5 ... 5)");
        return false;
    } else if (!isNumber(y)){
        $("#error").text("Переменная Y должна быть числом");
        return false;
    }

    $("#error").text("");

    let startTime = performance.now();
    $.ajax({
        url: 'query.php',
        method: 'get',
        data: {'x':x,'y':y,'r':r}, //данные передваваемые в query.php
        dataType: 'html',
        success: function (data){
            let time = (performance.now() - startTime).toFixed(1);

            let Table=document.getElementById('result-table');
            let tr=document.createElement('tr');
            if (data == false) {
                tr.innerHTML = '<td>' + x + '</td><td>' + y + '</td><td>' + r + '</td><td>' + date + '</td><td>' +
                    time + " мс" + '</td><td style="background: crimson">' + "Наводчик кантужен" + '</td>'
            } else {
                tr.innerHTML = '<td>' + x + '</td><td>' + y + '</td><td>' + r + '</td><td>' + date + '</td><td>' +
                    time + " мс" + '</td><td style="background: green">' + "Есть пробитие" + '</td>'
            }
            Table.appendChild(tr);
            console.log(data);
        }
    });
});

$("#reset").on('click', function (){
    let tableHeaderRowCount = 1;
    let table = document.getElementById('result-table');
    let rowCount = table.rows.length;
    for (let i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
    }
});

function choseDate(){
    let date = new Date();
    let res_date = date.getHours() +":"+ date.getMinutes() +":"+ date.getSeconds() +" "+ date.getDate() +"."+
        (date.getMonth() + 1) +"."+ date.getFullYear();
    if (date.getMinutes() < 10 && date.getSeconds() < 10) {
        res_date = date.getHours() + ":0" + date.getMinutes() + ":0" + date.getSeconds() + " " + date.getDate() + "." +
            (date.getMonth() + 1) + "." + date.getFullYear();
    } else if (date.getMinutes() < 10) {
        res_date = date.getHours() + ":0" + date.getMinutes() + ":" + date.getSeconds() + " " + date.getDate() + "." +
            (date.getMonth() + 1) + "." + date.getFullYear();
    } else if (date.getSeconds() < 10){
        res_date = date.getHours() + ":" + date.getMinutes() + ":0" + date.getSeconds() + " " + date.getDate() + "." +
            (date.getMonth() + 1) + "." + date.getFullYear();
    }
    return res_date;
}

function isNumber(n) { return !isNaN(parseFloat(n)) && !isNaN(n - 0) }