var canvas = document.getElementById("canvas1");
var section = document.getElementById("section1")
canvas.crossOrigin = "Anonymous";

var outlineImage = new Image();
outlineImage.setAttribute('crossOrigin', 'anonymous');
outlineImage.src = "corpo_transp.png";

canvas.width = 600;
canvas.height = 600;

//canvas.width = window.innerWidth - 60;
//canvas.height = window.innerHeight*0.6;
var context = canvas.getContext("2d");
context.fillStyle = "white";
context.fillRect(0, 0, canvas.width, canvas.height);
var restore = new Array();
var resloc = -1;
var strokeColor = 'white';
var strokeWidth = "10";

context.outline = canvas.getContext("2d");

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

function Save(a) {
    var img = canvas.toDataURL("image/png");
    a.href = img;
}

function Clear() {
    var confirmClear = confirm('Are you sure you would like to clear your canvas? This cannot be undone.');
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
