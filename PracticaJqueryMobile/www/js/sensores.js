function brujula(){
  navigator.compass.getCurrentHeading(onSuccess, onError);
}

function onSuccess(heading){
  alert("Heading" + heading.magneticHeading);
};

function onError(error){
  alert('ERROR' + error.code);
}
