
let pin = document.getElementById('pin');
let pinSearch = document.getElementById('pinSearch');
let respuesta;
let pageNum;
let busqueda;
let numberFinal;
let numPagina;

$(document).ready(function () {
    function Hide_Load() {
        setTimeout(() => {
            numberFinal = parseInt($('#final').val());
            busqueda = $('#search').val();
        }, 500);
    };
    $("#pagination").load("dist/models/model-pagination_pin.php?pin=", Hide_Load());
    $("#content").load("dist/models/model-pagination_data.php?page=1&pin=", Hide_Load());
    pageNum = 1;
    if(pageNum == 1){
        $('#previous').addClass('disabled');
    }
    $('#search').keyup(function () {
        busqueda = $(this).val();
        $("#pagination").load("dist/models/model-pagination_pin.php?pin=" + busqueda);
        $("#content").load("dist/models/model-pagination_data.php?page=1&pin=" + busqueda);
        setTimeout(() => {
            numberFinal = parseInt($('#final').val());
            if(numberFinal == 1){
                $('#previous').addClass('disabled');
                $('#next').addClass('disabled');
                $('#last').addClass('disabled');
            }else {
                $('#previous').removeClass('disabled');
                $('#next').removeClass('disabled');
                $('#last').removeClass('disabled');
            }
        }, 500);
        setTimeout(() => {
            $("#pagination li").click(function () { 
                pageNum = parseInt(this.id);
                $("#content").load("dist/models/model-pagination_data.php?page=" + pageNum + "&pin=" + busqueda);
                if(pageNum == 1){
                    $('#previous').addClass('disabled');
                    $('#next').removeClass('disabled');
                    $('#last').removeClass('disabled');
                    
                }else if(pageNum == numberFinal){
                    $('#next').addClass('disabled');
                    $('#last').addClass('disabled');
                    $('#previous').removeClass('disabled');
                }else {
                    $('#previous').removeClass('disabled');
                    $('#next').removeClass('disabled');
                    $('#last').removeClass('disabled');
                }
            });
        }, 550);
    });
    //Pagination Click
    setTimeout(() => {
        $("#pagination li").click(function () { 
            pageNum = parseInt(this.id);
            $('#pagination li').children().removeClass('colors');
            let selector = '#' + pageNum;
            $(selector).children().addClass('colors');
            $("#content").load("dist/models/model-pagination_data.php?page=" + pageNum + "&pin=" + busqueda);
            if(pageNum == 1){
                $('#previous').addClass('disabled');
                $('#next').removeClass('disabled');
                $('#last').removeClass('disabled');
            }else if(pageNum == numberFinal){
                $('#next').addClass('disabled');
                $('#last').addClass('disabled');
                $('#previous').removeClass('disabled');
            }else {
                $('#previous').removeClass('disabled');
                $('#next').removeClass('disabled');
                $('#last').removeClass('disabled');
            }
        });
    }, 550);
    $("#next").click(function () {
        if(pageNum !== numberFinal){
            pageNum = pageNum + 1;
            $("#content").load("dist/models/model-pagination_data.php?page=" + pageNum + "&pin=" + busqueda);
            $('#previous').removeClass('disabled');
            $('#pagination li').children().removeClass('colors');
            let selector = '#' + pageNum;
            $(selector).children().addClass('colors');
        }
        if(pageNum == numberFinal){
            $(this).addClass('disabled');
            $('#last').addClass('disabled');
        }
    });

    $("#previous").click(function () {
        if(pageNum !== 1){
            pageNum = pageNum - 1;
            $("#content").load("dist/models/model-pagination_data.php?page=" + pageNum + "&&pin=" + busqueda);
            $('#pagination li').children().removeClass('colors');
            let selector = '#' + pageNum;
            $(selector).children().addClass('colors');
        }
        if(pageNum == 1){
            $(this).addClass('disabled');
        }
        $('#next').removeClass('disabled');
        $('#last').removeClass('disabled');
    });
    $("#last").click(function () {
        pageNum = numberFinal;
        $("#content").load("dist/models/model-pagination_data.php?page=" + numberFinal + "&&pin=" + busqueda);
        $('#next').addClass('disabled');
        $('#last').addClass('disabled');
        $('#previous').removeClass('disabled');
        $('#pagination li').children().removeClass('colors');
        let selector = '#' + pageNum;
        $(selector).children().addClass('colors');
    });
});

document.getElementById("your-id").addEventListener("click", function () {

    if(pin.value === ''){
        console.log('vacio');
    }else {
        let data = new FormData();

        data.append('pin', pin.value);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'dist/models/model-pin.php', true);
        xhr.onload = function () {
            if (this.status === 200) {
                var respuestaAdd = JSON.parse(xhr.responseText);
                //  si la respuesta es correcta
                if (respuestaAdd.status === '1') {
                    // si es un nuevo usuario
                    alert('Pin registrado exitosamente');
                } else {
                    alert("Pin ya existe")
                }
            }
        }
        xhr.send(data);
    }
});

document.getElementById('re').addEventListener('click', function(){
    if(pin.value != ''){
        window.location.reload();
    }
});