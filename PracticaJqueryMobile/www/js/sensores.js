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

  if((latInfoini >= position.coords.latitude) && (position.coords.latitude >= latInfofin)
    && (lonInfoini <= position.coords.longitude) && (position.coords.longitude <= lonInfofin)) {
        document.getElementById("horario").href = "#horarios-informatica";
        document.getElementById("incidencia").href = "#incidencia-informatica";
        document.getElementById("horariodos").href = "#horarios-informatica";
        document.getElementById("incidenciados").href = "#incidencia-informatica";
        document.getElementById("horariotres").href = "#horarios-informatica";
        document.getElementById("incidenciatres").href = "#incidencia-informatica";
        document.getElementById("horariocuatro").href = "#horarios-informatica";
        document.getElementById("incidenciacuatro").href = "#incidencia-informatica";
        document.getElementById("horariocinco").href = "#horarios-informatica";
        document.getElementById("incidenciainco").href = "#incidencia-informatica";
    }

  if((latfymini >= position.coords.latitude) && (position.coords.latitude >= latfymfin)
    && (lonfymini <= position.coords.longitude) && (position.coords.longitude <= lonfymfin)) {
      document.getElementById("horario").href = "#horarios-matematicas";
      document.getElementById("incidencia").href = "#incidencia-matematica";
      document.getElementById("horariodos").href = "#horarios-matematicas";
      document.getElementById("incidenciados").href = "#incidencia-matematica";
      document.getElementById("horariotres").href = "#horarios-matematicas";
      document.getElementById("incidenciatres").href = "#incidencia-matematica";
      document.getElementById("horariocuatro").href = "#horarios-matematicas";
      document.getElementById("incidenciacuatro").href = "#incidencia-matematica";
      document.getElementById("horariocinco").href = "#horarios-matematicas";
      document.getElementById("incidenciacinco").href = "#incidencia-matematica";
  }

  if((latbioini >= position.coords.latitude) && (position.coords.latitude >= latbiofin)
    && (lonbioini <= position.coords.longitude) && (position.coords.longitude <= lonbiofin)) {
      document.getElementById("horario").href = "#horarios-biologia";
      document.getElementById("incidencia").href = "#incidencia-biologia";
      document.getElementById("horariodos").href = "#horarios-biologia";
      document.getElementById("incidenciados").href = "#incidencia-biologia";
      document.getElementById("horariotres").href = "#horarios-biologia";
      document.getElementById("incidenciatres").href = "#incidencia-biologia";
      document.getElementById("horariocuatro").href = "#horarios-biologia";
      document.getElementById("incidenciacuatro").href = "#incidencia-biologia";
      document.getElementById("horariocinco").href = "#horarios-biologia";
      document.getElementById("incidenciacinco").href = "#incidencia-biologia";
  }
}

function siRespuestaa(position) {
  var elemento = document.getElementById("seis");
  elemento.innerHTML = 'Latitud: ' + position.coords.latitude + '\n' + 'Longitud: ' + position.coords.longitude;
}

function enError(error) {
  alert("Error");
}

///////////////////////////////////////////////////Cámara/////////////////////////////////////////////////////////////

function camera() {
	var cameraOptions = {
		destinationType: Camera.DestinationType.FILE_URI,
		sourceType: Camera.PictureSourceType.CAMERA
	};
	navigator.camera.getPicture(cameraSuccess, cameraError, cameraOptions);
}

function cameraSuccess(imgData) {
	var container = document.getElementById("img_camPH");
	container.src = imgData;
	container.width = 300
	container.height = 300
}

function cameraError(error) {
	alert(error);
}

//////////////////////////////////////////////////Audio//////////////////////////////////////////////////////////////////

function vibrador() {
  navigator.vibrate(2000);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var fichero;

function hacerFoto(){
  navigator.camera.getPicture(onSuccess, onFail, { quality: 50, destinationType: Camera.DestinationType.FILE_URI });
}

function onSuccess(imageURI) {
  var image = document.getElementById('fotoLocal');
  image.src = imageURI;
  subirImagen(imageURI)
}

function onFail(message) {
  alert('Failed because: ' + message);
}

function subirImagen(fileURL) {

  var options = new FileUploadOptions();
  options.fileKey = "imagen";
  options.fileName = fileURL.substr(fileURL.lastIndexOf('/') + 1);

  var ft = new FileTransfer();
  ft.upload(fileURL, encodeURI("http://192.168.1.41:80/PHP/imagen.php"), uploadSuccess, uploadFail, options);
}

function uploadSuccess(r) {
  alert("Code = " + r.responseCode+" Response = " + r.response+" Sent = " + r.bytesSent);
  var image = document.getElementById('fotoServidor');
  image.src = r.response;
}

function uploadFail(error) {
  alert("An error has occurred: Code = " + error.code+ " upload error source " + error.source+" upload error target " + error.target);
}
