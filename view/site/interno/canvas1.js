var canvas = document.getElementById("canvas1");
var section = document.getElementById("section1");
canvas.crossOrigin = "Anonymous";

var outlineImage = new Image();

outlineImage.setAttribute('crossOrigin', 'anonymous');

outlineImage.src = "../../images/corpo_humano.png";
outlineImage.src = "../../images/corpo_humano.png";


var profund = document.getElementById("prof");

var imgDesenhada = outlineImage.clone;

canvas.width = 900;
canvas.height = 800;
/*canvas.width = outlineImage.width;
canvas.height = outlineImage.height;*/

//canvas.width = window.innerWidth - 60;
//canvas.height = window.innerHeight*0.6;

var context = canvas.getContext("2d");
context.fillStyle = "white";
context.fillRect(0, 0, canvas.width, canvas.height);
var restore = new Array();
var resloc = -1;
var strokeColor = 'white';
var strokeWidth = "10";


var imagemURL0 = context.getImageData(0, 0, canvas.width, canvas.height);
var imagemURL1 = context.getImageData(0, 0, canvas.width, canvas.height);
var imagemURL2 = context.getImageData(0, 0, canvas.width, canvas.height);
var imagemURL3 = context.getImageData(0, 0, canvas.width, canvas.height);
var imagemURL4 = context.getImageData(0, 0, canvas.width, canvas.height);
var aux = 0;

context.outline = canvas.getContext("2d");

profund.addEventListener("change", function atualizaCanvas() {
    var valor = parseInt(profund.value);

        switch (aux){
            case 0:
                imagemURL0 = context.getImageData(0, 0, canvas.width, canvas.height);
                break;
            case 1:
                imagemURL1 = context.getImageData(0, 0, canvas.width, canvas.height);
                break;
            case 2:
                imagemURL2 = context.getImageData(0, 0, canvas.width, canvas.height);
                break;
            case 3:
                imagemURL3 = context.getImageData(0, 0, canvas.width, canvas.height);
                break;
            case 4:
                imagemURL4 = context.getImageData(0, 0, canvas.width, canvas.height);
                break;
        }


    context.fillStyle = "white";
    context.clearRect(0, 0, canvas.width, canvas.height);
    context.fillRect(0, 0, canvas.width, canvas.height);
    document.getElementById("SliderValue").innerHTML = 'Profundidade: ' + (valor*25) + '%';

    var imgURL;

    switch (valor) {
        case 0:
            imgURL = imagemURL0;
            break;
        case 1:
            imgURL = imagemURL1;
            break;
        case 2:
            imgURL = imagemURL2;
            break;
        case 3:
            imgURL = imagemURL3;
            break;
        case 4:
            imgURL = imagemURL4;
            break;

    }
    context.putImageData(imgURL, 0, 0, 0, 0, canvas.width, canvas.height);

    zerinho(event);
    aux = valor;
}, false);

function zerinho(event) {
    context.outline.drawImage(outlineImage, 0, 0, canvas.width, canvas.height);
    restore.push(context.getImageData(0, 0, canvas.width, canvas.height));
}

function strokeCOLOR(a) {
    strokeColor = a.style.background;
}

function strokeWIDTH(a) {
    strokeWidth = a.innerHTML
}

function strokeWIDTHVal(a) {
    strokeWidth = a
}

function start(event) {
    isDrawing = true;
    context.beginPath();
    context.moveTo(getX(event), getY(event));
    event.preventDefault();
}

function draw(event) {
    if (isDrawing) {
        context.lineTo(getX(event), getY(event));
        context.strokeStyle = strokeColor;
        context.lineWidth = strokeWidth;
        context.lineCap = "round";
        context.lineJoin = "round";
        context.stroke();
    }
    event.preventDefault();
}

function stop(event) {
    if (isDrawing) {
        context.stroke();
        context.closePath();
        isDrawing = false;
    }
    event.preventDefault();
    zerinho();
    restore.push(context.getImageData(0, 0, canvas.width, canvas.height));
    resloc += 1;
}

function getX(event) {
    if (event.pageX == undefined) {
        return event.targetTouches[0].pageX - canvas.offsetLeft
    }
    else {
        return event.pageX - canvas.offsetLeft
    }
}


function getY(event) {
    if (event.pageY == undefined) {
        return event.targetTouches[0].pageY - canvas.offsetTop
    }
    else {
        return event.pageY - canvas.offsetTop
    }
}

canvas.addEventListener("touchstart", start, false);
canvas.addEventListener("touchmove", draw, false);
canvas.addEventListener("touchend", stop, false);
canvas.addEventListener("mousedown", start, false);
canvas.addEventListener("mousemove", draw, false);
canvas.addEventListener("mouseup", stop, false);
canvas.addEventListener("mouseout", stop, false);

function Restore() {
    if (resloc <= 0) {
        Clear()
    } else {
        resloc += -1;
        restore.pop();
        context.putImageData(restore[resloc], 0, 0);
    }
}

function transfere(prof0, prof25, prof50, prof75, prof100){
    prof0 = imagemURL0;
    prof25 = imagemURL1;
    prof50= imagemURL2;
    prof75 = imagemURL3;
    prof100 = imagemURL4;
}

function Save(a) {
    switch (aux){
        case 0:
            imagemURL0 = context.getImageData(0, 0, canvas.width, canvas.height);
            break;
        case 1:
            imagemURL1 = context.getImageData(0, 0, canvas.width, canvas.height);
            break;
        case 2:
            imagemURL2 = context.getImageData(0, 0, canvas.width, canvas.height);
            break;
        case 3:
            imagemURL3 = context.getImageData(0, 0, canvas.width, canvas.height);
            break;
        case 4:
            imagemURL4 = context.getImageData(0, 0, canvas.width, canvas.height);
            break;
    }

    context.putImageData(imagemURL0, 0, 0, 0, 0, canvas.width, canvas.height);
    var img0 = canvas.toDataURL("image/png");
    console.log(img0);
    context.putImageData(imagemURL1, 0, 0, 0, 0, canvas.width, canvas.height);
    var img1 = canvas.toDataURL("image/png");
    console.log(img1);
    context.putImageData(imagemURL2, 0, 0, 0, 0, canvas.width, canvas.height);
    var img2 = canvas.toDataURL("image/png");
    console.log(img2);
    context.putImageData(imagemURL3, 0, 0, 0, 0, canvas.width, canvas.height);
    var img3 = canvas.toDataURL("image/png");
    console.log(img3);
    context.putImageData(imagemURL4, 0, 0, 0, 0, canvas.width, canvas.height);
    var img4 = canvas.toDataURL("image/png");
    console.log(img4);
    zerinho(event);

    var form = document.createElement("form");
    form.setAttribute("name","registrar");
    form.setAttribute("enctype","multipart/form-data");
    form.setAttribute("method","GET");
    form.setAttribute("target","_self");
    form.innerHTML = '<input type="hidden" name="image0" value="'+img0+'"/>';
    form.innerHTML += '<input type="hidden" name="image1" value="'+img1+'"/>';
    form.innerHTML += '<input type="hidden" name="image2" value="'+img2+'"/>';
    form.innerHTML += '<input type="hidden" name="image3" value="'+img3+'"/>';
    form.innerHTML += '<input type="hidden" name="image4" value="'+img4+'"/>';
    document.body.appendChild(form);
    console.log("Form appendado!");
    //form.submit();

    var imgURL;

    switch (aux) {
        case 0:
            imgURL = imagemURL0;
            break;
        case 1:
            imgURL = imagemURL1;
            break;
        case 2:
            imgURL = imagemURL2;
            break;
        case 3:
            imgURL = imagemURL3;
            break;
        case 4:
            imgURL = imagemURL4;
            break;

    }
    context.putImageData(imgURL, 0, 0, 0, 0, canvas.width, canvas.height);

}

function Clear() {
    var confirmClear = confirm('Tem certeza que deseja reiniciar a profundidade atual?');
    if (confirmClear == true) {
        context.fillStyle = "white";
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.fillRect(0, 0, canvas.width, canvas.height);
        restore = new Array();
        resloc = -1;
    } else {
    }
    zerinho();
}

