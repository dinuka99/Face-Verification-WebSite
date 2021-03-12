<!DOCTYPE html>
<html>
<head>
  <script src="js/face-api.js"></script>
  <script src="js/faceDetectionControls.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<body>
  <div class="center-content page-container">

    <p> Reference Image: </p>
    <div style="position: relative" class="margin">
      <img id="refImg" src="" style="max-width: 800px;" />
      <canvas id="refImgOverlay" class="overlay"/>
    </div>

    <div class="row side-by-side">
      <!-- image_selection_control -->
      <div class="row">
        <label>Upload Image:</label>
        <div>
          <input id="refImgUploadInput" type="file" class="" onchange="uploadRefImage()" accept=".jpg, .jpeg, .png">
        </div>
      </div>
      <div class="row">
        <label for="refImgUrlInput">Get image from URL:</label>
        <input id="refImgUrlInput" type="text" class="bold">
      </div>
      <!-- image_selection_control -->
    </div>

    <p> Query Image: </p>
    <div style="position: relative" class="margin">
      <img id="queryImg" src="" style="max-width: 800px;" />
      <canvas id="queryImgOverlay" class="overlay"/>
    </div>

    <div class="row side-by-side">
      <!-- image_selection_control -->
      <div class="row">
        <label>Upload Image:</label>
        <div>
          <input id="queryImgUploadInput" type="file" class="" onchange="uploadQueryImage()" accept=".jpg, .jpeg, .png">
        </div>
      </div>
      <div class="row">
        <label for="queryImgUrlInput">Get image from URL:</label>
        <input id="queryImgUrlInput" type="text" class="bold">
      </div>
      <!-- image_selection_control -->
    </div>

    <h3 id = 'result'></h3> <br> <br>

  </body>

  <script>
    let faceMatcher = null

    //Reference image upload method
    async function uploadRefImage(e) {
      const imgFile = $('#refImgUploadInput').get(0).files[0]
      const img = await faceapi.bufferToImage(imgFile)
      $('#refImg').get(0).src = img.src
      updateReferenceImageResults()
    }

    //Matching image upload method
    async function uploadQueryImage(e) {
      const imgFile = $('#queryImgUploadInput').get(0).files[0]
      const img = await faceapi.bufferToImage(imgFile)
      $('#queryImg').get(0).src = img.src
      updateQueryImageResults()
    }

    async function updateReferenceImageResults() {
      const inputImgEl = $('#refImg').get(0)
      const canvas = $('#refImgOverlay').get(0)

      const fullFaceDescriptions = await faceapi
        .detectAllFaces(inputImgEl, getFaceDetectorOptions())
        .withFaceLandmarks()
        .withFaceDescriptors()

      if (!fullFaceDescriptions.length) {
        return
      }

      // create FaceMatcher with automatically assigned labels
      // from the detection results for the reference image
      faceMatcher = new faceapi.FaceMatcher(fullFaceDescriptions)

      faceapi.matchDimensions(canvas, inputImgEl)
      // resize detection and landmarks in case displayed image is smaller than
      // original size
      const resizedResults = faceapi.resizeResults(fullFaceDescriptions, inputImgEl)
      // draw boxes with the corresponding label as text
      const labels = faceMatcher.labeledDescriptors
        .map(ld => ld.label)
      resizedResults.forEach(({ detection, descriptor }) => {
        const label = faceMatcher.findBestMatch(descriptor).toString()
        const options = { label }
        // const drawBox = new faceapi.draw.DrawBox(detection.box, options)
        // drawBox.draw(canvas)
      })
    }

    async function updateQueryImageResults() {
      if (!faceMatcher) {
        return
      }

      const inputImgEl = $('#queryImg').get(0)
      const canvas = $('#queryImgOverlay').get(0)

      const results = await faceapi
        .detectAllFaces(inputImgEl, getFaceDetectorOptions())
        .withFaceLandmarks()
        .withFaceDescriptors()

      faceapi.matchDimensions(canvas, inputImgEl)
      // resize detection and landmarks in case displayed image is smaller than
      // original size
      const resizedResults = faceapi.resizeResults(results, inputImgEl)

      resizedResults.forEach(({ detection, descriptor }) => {
        const label = faceMatcher.findBestMatch(descriptor)
        console.log(label)
        if (label._distance > 0.5) {
          var text = "Not Matched"
          var color = 'red'
          console.log('if')
        }
        else{
          var color = 'blue'
          var text = "Matched"
          console.log('else')
        }
        console.log(text)
        document.getElementById("result").textContent = text;
        document.getElementById("result").style.color = color;
        const options = { text }
        const drawBox = new faceapi.draw.DrawBox(detection.box, text)
        drawBox.draw(canvas)
      })
    }

    async function run() {
      // load face detection, face landmark model and face recognition models
        console.log("Inside run() method")
      await changeFaceDetector(selectedFaceDetector)
      await faceapi.loadFaceLandmarkModel('/')
      await faceapi.loadFaceRecognitionModel('/')
    }

    $(document).ready(function() {
      initFaceDetectionControls();
      console.log("Before run() method")
      run();
        console.log("After run() method")
    })
  </script>
</body>
</html>