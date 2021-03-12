const webcamElement = document.getElementById("webcam");
const canvasElement = document.getElementById("queryImgOverlay");
const snapSoundElement = document.getElementById("snapSound");
const imgPlaceHolder = document.querySelector("#imgPlaceholder");
const captureMsg = document.querySelector("#captureMsg");
const webcam = new Webcam(
  webcamElement,
  "user",
  canvasElement,
  snapSoundElement
);

startCam.addEventListener("click", function(event) {
  $('#imgPlaceholder').get(0).src = "";
  $('#queryImgOverlay').attr("width","0");
  $('#queryImgOverlay').attr("height","0");

  webcamElement.classList.remove("d-none");
  imgPlaceHolder.classList.add("d-none");
  captureMsg.classList.add("d-none");
  startCam.disabled = true;
  captureCam.disabled = false;
  webcam
    .start()
    .then((result) => {
      console.log("webcam started");
    })
    .catch((err) => {
      console.log(err);
    });
});

stopCam.addEventListener("click", function() {
  stopCaturing();
});

captureCam.addEventListener("click", function(e) {
  let picture = webcam.snap();
  stopCaturing()
  if (picture) {
    $('#imgPlaceholder').get(0).src = picture
    updateQueryImageResults()
    webcamElement.classList.add("d-none")
    imgPlaceHolder.classList.remove("d-none");
    captureMsg.classList.remove("d-none");
  }
});

function stopCaturing() {
  webcam.stop();
  webcamElement.classList.add("d-none");
  startCam.disabled = false;
  captureCam.disabled = true;
}
