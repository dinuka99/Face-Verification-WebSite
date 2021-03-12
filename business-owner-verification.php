<?php
  session_start();
  $currentPage = "business-owners";

  require("./util/standardfunctions.php");
  require("./util/check-session.php");

  // checkBusinessOwner();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
  <title>In The Black - Business Owner Dashboard | Verify Account</title>
    <script src="js/face-api.js"></script>
    <script src="js/faceDetectionControls.js"></script>
  <!-- Bootstrap Core CSS -->
  <link href="assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- This is for the animation CSS -->
  <link href="assets/node_modules/aos/dist/aos.css" rel="stylesheet" />
  <!-- This page CSS -->
  <link href="assets/node_modules/owl.carousel/dist/assets/owl.theme.green.css" rel="stylesheet" />
  <link href="assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css" rel="stylesheet" media="all" />
  <link href="assets/jquery-smartwizard/dist/css/smart_wizard_all.min.css" rel="stylesheet">
  <!-- Common style CSS -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
  <link href="css/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/headers1-10.css" />
  <link rel="stylesheet" href="css/headers11-20.css" />
  <link href="css/yourstyle.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css" integrity="sha512-AyOHI/tIMgoG+32apAs3OdqFowPSDqiz5vLcD2wdhBJ4J/xF1PI6UITcyhS5HCmsiioapRaONqYBvimxzFfnoA==" crossorigin="anonymous" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <![endif]-->

    <script src='js/tesseract.min.js'></script>
    <script src="js/face-api.js"></script>
    <script src="js/faceDetectionControls.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

<body class="">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
      <p class="loader__label">In The Black</p>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <div class="topbar">
      <!-- ============================================================== -->
      <!-- Header 4  -->
      <!-- ============================================================== -->
      <div class="header11 po-relative">
        <div class="container">
          <!-- Header 1 code -->
          <?php include('includes/navbar.php') ?>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Header 4  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Banner -->
        <!-- ============================================================== -->

        <div class="bg-light">
          <!-- ============================================================== -->
          <!-- Statcic Slider 10 -->
          <!-- ============================================================== -->
          <div class="banner-innerpage" style="background-image:url(assets/images/innerpage/banner-bg.jpg)">
            <div class="bs-slider-overlay"></div>
            <div class="container">
              <!-- Row  -->
              <div class="row justify-content-center ">
                <!-- Column -->
                <div class="col-md-6 align-self-center text-center aos-init aos-animate" data-aos="fade-down" data-aos-duration="1200">
                  <h1 class="title">Business Owners Dashboard</h1>
                  <h6 class="subtitle op-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
                </div>
                <!-- Column -->
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Statcic Slider 10 -->
          <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
        <!-- End Banner -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Dash board Area 1  -->
        <!-- ============================================================== -->
        <div class="spacer bg-light">
          <div class="container">

            <!-- Dashboard Nav -->
            <?php include('./includes/business-owner-dashboard-nav.php'); ?>

        
            <!-- Modal -->
            <div class="modal fade" id="processing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  </div>
                  <div class="modal-body">
                    <h3 style="font-size: 15px;" class="text-center">Processing..... This will take few seconds.</h3>
                    <i class="text-center fas fa-spinner fa-pulse fa-5x" style="margin: auto; width: 100%;"></i> 
                  </div>
                </div>
              </div>
            </div>

            <!-- Verify Account Area -->
            <div class="card card-shadow">
              <div class="card-header">
                <h3>Verify Account</h3>
              </div>
              <div class="card-body">
                <!-- Smart Wizard Area -->
                <div id="smartwizard">
                  <ul class="nav">
                     <li>
                         <a class="nav-link" href="#step-1">
                            Step 1
                            <h5>Basic Verification</h5>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-2">
                            Step 2
                            <h5>ID Verification</h5>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-3">
                            Step 3
                            <h5>Photo Verification</h5>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-4">
                            Step 4
                            <h5>Complete Verification</h5>
                         </a>
                     </li>
                  </ul>

                  <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel">
                      <!-- Header -->
                      <div class="py-2 px-4 mb-4 border-bottom bg-light shadow">
                        <h4>Verify Your Identity</h4>
                      </div>
                      <!-- form area -->
                      <div class="px-5">
                        <form method="post">
                          <div class="form-group">
                            <p class="lead">Select identification document</p>
                            <div class="row align-items-center m-t-10">
                              <label class="custom-control custom-radio mx-3">
                                <input id="radio1" name="radio" type="radio" class="custom-control-input" required>
                                <span class="custom-control-label">
                                  Driver License
                                </span>
                              </label>
                              <label class="custom-control custom-radio mx-3">
                                <input id="radio2" name="radio" type="radio" class="custom-control-input" required>
                                <span class="custom-control-label">
                                  Passport
                                </span>
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="documentId">Document ID Nnumber</label>
                              <input type="text" class="form-control" id="documentId" name="documentId" placeholder="ID number" required>
                          </div>
                          <div class="form-group">
                              <label for="documentOwnerName">Name on Document</label>
                              <input type="text" class="form-control" id="documentOwnerName" name="documentOwnerName" placeholder="Name" required>
                          </div>
                          <div class="form-group">
                              <label for="documentOwnerAddress">Address on Document</label>
                              <input type="text" class="form-control" id="documentOwnerAddress" name="documentOwnerAddress" placeholder="Address" required>
                          </div>
                          <div class="form-group">
                              <label for="documentIssuedDate">Date Issued</label>
                              <input type="date" class="form-control" id="documentIssuedDate" name="documentIssuedDate" required>
                          </div>
                          <div class="form-group">
                              <label for="documentExpiryDate">Expiry Date</label>
                              <input type="date" class="form-control" id="documentExpiryDate" name="documentExpiryDate" required>
                          </div>
                          <div class="form-group">
                              <label for="residenceCountry">Country Of Residence</label>
                              <input type="text" class="form-control" id="residenceCountry" name="residenceCountry" placeholder="Country of residence" required>
                          </div>
                        </form>
                      </div>
                     </div>
                     <div id="step-2" class="tab-pane" role="tabpanel">
                       <!-- step 3 header -->
                       <div class="py-2 px-4 mb-4 border-bottom bg-light shadow">
                         <h4>Verification Result</h4>
                       </div>
                       <!-- Result Area -->
                       <div class="px-5">
                         <div class="row justify-content-center align-items-center">
                           <div class="col-md-9 col-lg-8 mb-4">
                             <div class="d-flex flex-column justify-content-center align-items-center">

                                 <div class="px-5">
                                     <div class="row justify-content-center align-items-center">
                                         <div class="mx-auto border rounded shadow d-flex justify-content-center align-items-center" style="width: 460px; min-height: 350px;">
                                             <div style="position: relative" class="margin">
                                                 <img id="refImg" src="" style="max-width: 400px;"/>
                                                 <img id="refImg2" src="" style="display: none;"/>
                                                 <canvas id="refImgOverlay" class="overlay"/>
                                             </div>
                                         </div>
                                     </div><br>
                                     <div class="d-flex flex-column justify-content-center align-items-center">
                                         <div class="row">
                                             <label>Upload Image:</label>
                                             <div>
                                                 <input id="refImgUploadInput" type="file" class="bold" onchange="uploadRefImage()" accept=".jpg, .jpeg, .png">
                                             </div>
                                             <p style="display: none;" id="status">OpenCV.js is loading...</p>

                                            <div class="inputoutput" style="display: none;">
                                                <canvas id="canvasOutputhiddent"></canvas>
                                                <div class="caption">canvasOutput</div>
                                            </div>
                                            <p style="display: none;" id="text_data"></p>
                                            <div style="display: none;" id="log"></div>
                                         </div>
                                         <br>
                                         <div class="row">
                                          <p>Name Occurences: <span id="name_occurences"></span></p>
                                         </div>
                                         <div class="row">
                                          <p>Address Occurences: <span id="add_occurences"></span></p>
                                         </div>
                                         <div class="row">
                                          <p>ID Occurences: <span id="id_occurences"></span></p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div id="step-3" class="tab-pane" role="tabpanel">
                       <!-- step 2 header11 -->
                       <div class="py-2 px-4 mb-4 border-bottom bg-light shadow">
                         <h4>Upload a selfie of yourself</h4>
                       </div>
                        <!-- Capture use Image Area -->
                        <div class="px-5">
                          <div class="row justify-content-center align-items-center">
                            <div class="col-md-9 col-lg-8 mb-4">
                              <div class="mx-auto border rounded shadow d-flex justify-content-center align-items-center web-cam-image" style="width: 460px; min-height: 350px;">
<!--                                  <img id="imgPlaceholder" src="" style="" />-->
                                  <img id="imgPlaceholder" src="" alt="captured image" class="d-none">
                                <video
                                id="webcam"
                                autoplay
                                playsinline
                                width="440"
                                height="330"
                                ></video>

<!--                              <div style="position: absolute;" class="margin">-->

                                  <canvas id="queryImgOverlay" class="d-none"/>
<!--                              </div>-->
                              </div>

                            </div>
                          </div>
                          <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="web-cam-options">
                              <button id="startCam" class="btn btn-inverse waves-effect waves-light">Start Camera</button>
                              <button id="stopCam" class="btn btn-danger waves-effect waves-light">Stop Camera</button>
                              <button id="captureCam" class="btn btn-primary waves-effect waves-light" disabled>Take Selfie</button>
                            </div>

                            <div class="my-2 px-2 py-1" style="min-height: 40px;">
                              <p class="lead d-none" id="captureMsg">Tap <b>"start camera"</b> to retake or <b>"next"</b> to <strong>continue</strong></p>
                            </div>
                          </div>
                        </div>
                     </div>
                     <div id="step-4" class="tab-pane" role="tabpanel">
                       <!-- step 3 header -->
                       <div class="py-2 px-4 mb-4 border-bottom bg-light shadow">
                         <h4>Verification Result</h4>
                       </div>
                       <!-- Result Area -->
                       <div class="px-5">
                         <div class="row justify-content-center align-items-center">
                           <div class="col-md-9 col-lg-8 mb-4">
                             <div class="d-flex flex-column justify-content-center align-items-center p-4">
                                 <h3 id = 'result'></h3> <br> <br>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                  </div>
                </div>
                <!-- End Smart wizard area -->
              </div>
            </div>

          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Dash board Area 1  -->
        <!-- ============================================================== -->

      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer 1  -->
      <!-- ============================================================== -->
      <?php include('includes/footer.php') ?>
      <!-- ============================================================== -->
      <!-- End footer 1  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Back to top -->
      <!-- ============================================================== -->
      <a class="bt-top btn btn-circle btn-md btn-inverse" href="#top"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
<!--  <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>-->
  <!-- Bootstrap popper Core JavaScript -->
  <script src="assets/node_modules/popper/dist/popper.min.js"></script>
  <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
  <!-- This is for the animation -->
  <script src="assets/node_modules/aos/dist/aos.js"></script>
  <!--Custom JavaScript -->
  <script src="js/custom.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <script src="assets/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="assets/node_modules/jquery.touchSwipe.min.js"></script>
  <script src="assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.js"></script>
  <script src="assets/jquery-smartwizard/dist/js/jquery.smartWizard.min.js"></script>

  <script type="text/javascript">

      async function secondFunction(imgFile) {
        await startRecognize(imgFile) 
      };

      let faceMatcher = null

      //Reference image upload method
      async function uploadRefImage(e) {
          const imgFile = $('#refImgUploadInput').get(0).files[0]
          const img = await faceapi.bufferToImage(imgFile)
          // console.log(img);
          $('#refImg').get(0).src = img.src
          $('#refImg2').get(0).src = img.src
          $('#processing_modal').modal('show');
          updateReferenceImageResults();
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

          let imgElement = document.getElementById('refImg2');
          let inputElement = document.getElementById('refImgUploadInput');

          fetchText(imgElement, inputElement);
      }

      function fetchText(imgElement, inputElement) {
        
        let mat = cv.imread(imgElement);
        let copy_src = mat.clone();
    
        let dst = new cv.Mat();
        // You can try more different parameters
        cv.cvtColor(mat, mat, cv.COLOR_RGBA2GRAY, 0);
        // cv.adaptiveThreshold(mat, dst, 255, cv.ADAPTIVE_THRESH_MEAN_C, cv.THRESH_BINARY, 49, 5);
        cv.threshold(mat, dst, 0, 255, cv.THRESH_OTSU | cv.THRESH_BINARY_INV);
        let kp = parseInt(dst.size().width / 60) 
        let ksize = new cv.Size( kp , kp);

        let M = new cv.Mat();
        M = cv.getStructuringElement(cv.MORPH_CROSS, ksize);

        // let M = cv.Mat.ones(5, 5, cv.CV_8U);
        let anchor = new cv.Point(-1, -1);

        cv.dilate(dst, dst, M, anchor, 1, cv.BORDER_CONSTANT, cv.morphologyDefaultBorderValue());

        // ksize = new cv.Size(9, 9);
        // // You can try more different parameters
        // cv.GaussianBlur(dst, dst, ksize, 0, 0, cv.BORDER_DEFAULT);

        let contours = new cv.MatVector();
        let hierarchy = new cv.Mat();
        cv.findContours(dst, contours, hierarchy, cv.RETR_CCOMP, cv.CHAIN_APPROX_SIMPLE);

        const maxSpeed = {};

        for (let i = 0; i < contours.size(); ++i) {
          let cnt = contours.get(i);
          // You can try more different parameters
          let area = cv.contourArea(cnt, false);
          maxSpeed[i] = area
        } 
    

        var sortable = [];
        for (var vehicle in maxSpeed) {
            sortable.push([vehicle, maxSpeed[vehicle]]);
        }

        sortable.sort(function(a, b) {
            return b[1] - a[1];
        });


        let crop = new cv.Mat();
        let max_count = 0
        for (let i = 0; i < contours.size(); ++i) {

            let cnt = contours.get(parseInt(sortable[i][0]));
            // You can try more different parameters
            let rect = cv.boundingRect(cnt);
            let contoursColor = new cv.Scalar(0, 255, 255);
            let rectangleColor = new cv.Scalar(0, 0, 100);
            // cv.drawContours(copy_src, contours, 0, contoursColor, 1, 8, hierarchy, 100);
            let point1 = new cv.Point(rect.x, rect.y);
            let point2 = new cv.Point(rect.x + rect.width, rect.y + rect.height);
            cv.rectangle(copy_src, point1, point2, rectangleColor, 2, cv.LINE_AA, 0);
            crop = copy_src.roi(rect);

            cv.cvtColor(crop, crop, cv.COLOR_RGBA2GRAY, 0);
            cv.threshold(crop, crop, 0, 255, cv.THRESH_OTSU | cv.THRESH_BINARY_INV);

            cv.imshow('canvasOutputhiddent', crop);
            const imgFile = $('#canvasOutputhiddent').get(0)
            secondFunction(imgFile)

            if (max_count > 10 ){
              break
            }
            max_count ++
        }
        // cv.imshow('canvasOutput', copy_src);
        mat.delete(); copy_src.delete() ; crop.delete()
      }

      async function updateQueryImageResults() {
          if (!faceMatcher) {
              return
          }

          const inputImgEl = $('#imgPlaceholder').get(0)
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
              // console.log(label)
              if (label._distance > 0.5) {
                  var text = "Not Matched"
                  var color = 'red'
                  // console.log('if')
              }
              else{
                  var color = 'blue'
                  var text = "Matched"
                  // console.log('else')
              }
              document.getElementById("result").textContent = text;
              document.getElementById("result").style.color = color;
              const options = { text }
              const drawBox = new faceapi.draw.DrawBox(detection.box, text)
              drawBox.draw(canvas)
          })
      }

      async function run() {
          // load face detection, face landmark model and face recognition models
          await changeFaceDetector(selectedFaceDetector)
          await faceapi.loadFaceLandmarkModel('/')
          await faceapi.loadFaceRecognitionModel('/')
      }

    $(document).ready(function(){
      // SmartWizard initialize
      $('#smartwizard').smartWizard({
        theme: "arrows" // default, arrows, dots, progress
      });

        initFaceDetectionControls();
        run();
    });

    function onOpenCvReady() {
      document.getElementById('status').innerHTML = 'OpenCV.js is ready.';
    }

  </script>

  <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js" defer></script>
  <script type="text/javascript" src="js/webcam-capture.js" defer></script>
  <script async src="js/opencv.js" onload="onOpenCvReady();" type="text/javascript"></script>
  <script src="js/tesseract-ocr.js"></script>
</body>

</html>
