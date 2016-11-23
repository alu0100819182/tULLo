function brujula(){
  navigator.compass.getCurrentHeading(onSuccess, onError);
}

var opciones = {frequency:3000};

function brujulaCont(){
  navigator.compass.watchHeading(onSucces, onError, opciones);
}

function onSuccess(heading){
  alert("Heading" + heading.magneticHeading);
};

function onError(error){
  alert('ERROR' + error.code);
}

function accelerometro(){
  navigator.accelerometer. getCurrentAcceleration(onAccept, onMistake);
}

function accelerometroCont(){
  navigator.accelerometer.watchAcceleration(onAccept, onMistake, opciones);
}

function onMistake(){
	alert('onError!');
}

function onAccept(acceleration){
alert('Accceleration X:' + acceleration.x + '\n' +
'Acceleration Y: ' + acceleration.y + '\n' + 
'Acceleration Z: ' + acceleration.z + '\n' +
'Timestamp: ' + acceleration.timestamp + '\n');

}

function GPS(){
	navigator.geolocation.getCurrentPosition(siRespuesta, onError);
}
function siRepuesta(position){
	alert('Latitud: ' + position.coords.latitude +'/n'
	'Longitud: ' + position.coords.longitude);
}
