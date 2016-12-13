var opciones = {frequency:1000};

function brujula() {
  navigator.compass.getCurrentHeading(onSuccess, onError);
}

function brujulaCont() {
  navigator.compass.watchHeading(onSucces, onError, opciones);
}

function onSuccess(heading) {
  var elemento = document.getElementById("uno");
  elemento.innerHTML = 'Grados con respecto al norte: ' + heading.magneticHeading;
};

function onSucces(heading) {
  var elemento = document.getElementById("dos");
  elemento.innerHTML = 'Grados con respecto al norte: ' + heading.magneticHeading;
};

function onError(error) {
  alert('ERROR ' + error.code);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function acelerometro(){
  navigator.accelerometer. getCurrentAcceleration(onAccept, onMistake);
}

function acelerometroCont(){
  navigator.accelerometer.watchAcceleration(onAccep, onMistake, opciones);
}

function onAccept(acceleration) {
  var elemento = document.getElementById("tres");
  elemento.innerHTML = 'Accceleration X:' + acceleration.x + '\n' +
                       'Acceleration Y: ' + acceleration.y + '\n' +
                       'Acceleration Z: ' + acceleration.z + '\n' +
                       'Timestamp: ' + acceleration.timestamp + '\n';
}

function onAccep(acceleration) {
  var elemento = document.getElementById("cuatro");
  elemento.innerHTML = 'Accceleration X:' + acceleration.x + '\n' +
                       'Acceleration Y: ' + acceleration.y + '\n' +
                       'Acceleration Z: ' + acceleration.z + '\n' +
                       'Timestamp: ' + acceleration.timestamp + '\n';
}

function onMistake(){
	alert('onError!');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var latInfoini = 28.483647;
var lonInfoini = -16.322654;
var latInfofin = 28.482525;
var lonInfofin = -16.321164;

var latfymini = 28.482457;
var lonfymini = -16.321143;
var latfymfin = 28.481570;
var lonfymfin = -16.320200;

var latbioini = 28.480932;
var lonbioini = -16.320637;
var latbiofin = 28.479647;
var lonbiofin = -16.319512;

var latpruebaini = 28.483647;
var lonpruebaini = -16.323367;
var latpruebafin = 28.483163;
var lonpruebafin = -16.322967;

function GPS() {
	navigator.geolocation.getCurrentPosition(siRespuesta, enError);
}

function GPSCont() {
	navigator.geolocation.watchPosition(siRespuestaa, enError, opciones);
}

function siRespuesta(position) {
  var elemento = document.getElementById("localizacion");

  if((latInfoini >= position.coords.latitude) && (position.coords.latitude >= latInfofin)
    && (lonInfoini <= position.coords.longitude) && (position.coords.longitude <= lonInfofin)) {
      elemento.innerHTML = 'Te encuentras en la Escuela Superior de Ingeniería y Tecnología. ¿de qué carrera quieres saber información?' + "<br>";
      var boton = document.createElement("button");
      boton.innerHTML = 'Ingeniería Informática';
      boton.onclick = function MyFuncion () {
        alert("Informatica");
      }
      var botonDos = document.createElement("button");
      botonDos.innerHTML = 'Ingeniería Mecánica';
      botonDos.onclick = function MyFuncion () {
        alert("Hola");
      }
      var botonTres = document.createElement("button");
      botonTres.innerHTML = 'Ingeniería Electrónica';
      botonTres.onclick = function MyFuncion () {
        alert("Hola");
      }
      elemento.appendChild(boton);
      elemento.appendChild(botonDos);
      elemento.appendChild(botonTres);
  }

  if((latfymini >= position.coords.latitude) && (position.coords.latitude >= latfymfin)
    && (lonfymini <= position.coords.longitude) && (position.coords.longitude <= lonfymfin)) {
      elemento.innerHTML = 'Te encuentras en la Facultad de Matemáticas y Física. ¿de qué carrera quieres saber información?' + "<br>";
      var botonCuatro = document.createElement("button");
      boton.innerHTML = 'Matemáticas';
      boton.onclick = function MyFuncion () {
        alert("Informatica");
      }
      var botonCinco = document.createElement("button");
      botonDos.innerHTML = 'Física';
      botonDos.onclick = function MyFuncion () {
        alert("Hola");
      }
      elemento.appendChild(botonCuatro);
      elemento.appendChild(botonCinco);
  }

  if((latbioini >= position.coords.latitude) && (position.coords.latitude >= latbiofin)
    && (lonbioini <= position.coords.longitude) && (position.coords.longitude <= lonbiofin)) {
      elemento.innerHTML = 'Te encuentras en la Facultad de Biología. ¿de qué carrera quieres saber información?' + "<br>";
      var botonSeis = document.createElement("button");
      boton.innerHTML = 'Biología';
      boton.onclick = function MyFuncion () {
        alert("Informatica");
      }
      elemento.appendChild(botonSeis);
  }

}

function siRespuestaa(position) {
  var elemento = document.getElementById("seis");
  elemento.innerHTML = 'Latitud: ' + position.coords.latitude + '\n' + 'Longitud: ' + position.coords.longitude;
}

function enError(error) {
  var elemento = document.getElementById("localizacion");
  elemento.innerHTML = 'Fallo';
}

///////////////////////////////////////////////////Cámara/////////////////////////////////////////////////////////////

function camera(){
	var cameraOptions ={
		destinationType: Camera.DestinationType.FILE_URI,
		sourceType: Camera.PictureSourceType.CAMERA
	};
	navigator.camera.getPicture(cameraSuccess, cameraError, cameraOptions);
}

function cameraSuccess(imgData){
	var container = document.getElementById("img_camPH");
	container.src = imgData;
	container.width = 300
	container.height = 300
}

function cameraError(error){
	alert(error);
}

//////////////////////////////////////////////////Audio//////////////////////////////////////////////////////////////////

function audio(){
	navigator.device.capture.captureAudio(audioSuccess, audioError, {limit: 2});
}

function audioSuccess(mediaFiles){
	var i, path, len;
    for (i = 0, len = mediaFiles.length; i < len; i += 1) {
        path = mediaFiles[i].fullPath;
		var container = document.getElementById("micro");
		container.src = path;

    }
}

function audioError(error){
	navigator.notification.alert('Error code: ' + error.code, null, 'Capture Error');
}

/////////////////////////////////////////////////Video/////////////////////////////////////////////////////////////////////////

function video(){
	navigator.device.capture.captureVideo(captureSuccess, captureError, {limit:2});
}

function captureSuccess(mediaFiles) {
    var i, path, len;
    for (i = 0, len = mediaFiles.length; i < len; i += 1) {
        path = mediaFiles[i].fullPath;
		var container = document.getElementById("video");
		container.src = path;
		container.width = 300
		container.height = 300
    }
}

function captureError(error) {
    navigator.notification.alert('Error code: ' + error.code, null, 'Capture Error');
}
