(function () {

  var width = 320; // We will scale the photo width to this
  var height = 0; // This will be computed based on the input stream

  var streaming = false;


  // faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
  // faceapi.nets.ssdMobilenetv1.loadFromUri('./models')

  var video = null;
  var canvas = null;
  var photo = null;
  var photo1 = document.getElementById('photo');
  var username = document.getElementById('uname');
 
  var startbutton = document.getElementById('startbutton');
  var regbtn = null;
  var login_btn = document.getElementById('login_btn');
  var login_form = document.getElementById('login_form');
  email1 = document.getElementById('Email');
  password1 = document.getElementById('password-field');
 

  function startup() {
      video = document.getElementById('video');
      regbtn = document.getElementById('register_btn');
      canvas = document.getElementById('canvas');
      
      Promise.all([
        faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
        faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
      ]);
      
      // regbtn.disabled = true;
      photo1.style.display ='none';

      navigator.mediaDevices.getUserMedia({
          video: true,
          audio: false
      })
          .then(function (stream) {
              video.srcObject = stream;
              video.play();
          })
          .catch(function (err) {
              console.log("An error occurred: " + err);
          });

      video.addEventListener('canplay', function (ev) {
          if (!streaming) {
              height = video.videoHeight / (video.videoWidth / width);

              if (isNaN(height)) {
                  height = width / (4 / 3);
              }

              video.setAttribute('width', width);
              video.setAttribute('height', height);
              canvas.setAttribute('width', width);
              canvas.setAttribute('height', height);
              streaming = true;
          }
      }, false);

      startbutton.addEventListener('click', function (ev) {
          // regbtn.disabled = false;
          takepicture();
          // const imageUpload = document.getElementById('imageUpload')
          // Promise.all([
           
          // ]).then(start)
          start();
          async function start() {

            const container = document.createElement('div')
            container.style.position = 'relative'
            // document.body.append(container)
            const labeledFaceDescriptors = await loadLabeledImages()
            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
            console.log(faceMatcher);
            let image
            let canvas
            // document.body.append('Loaded')

            // photo1.addEventListener('change', async () => {
              
              if (image) image.remove()
              if (canvas) canvas.remove()
              image = photo1
              
              container.append(image);
              canvas =await faceapi.createCanvasFromMedia(image)
              container.append(canvas)
              const displaySize = { width: image.width, height: image.height }
              faceapi.matchDimensions(canvas, displaySize)
              const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors()

              const resizedDetections = faceapi.resizeResults(detections, displaySize)
              const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
              
              if(results[0]){
                if(results[0]._label && results[0]._distance > 0.20 )
              {
                  username.setAttribute('value', results[0]._label);
                  email1.setAttribute('value', results[0]._label);
                  password1.setAttribute('value', results[0]._label);
                  login_btn.click(function(){
                    Messenger.button().addLoader({id : '#login_btn'});
                    login_form.submit();
                });
              }
              }else{
                window.alert("شما ثبت نام نیستید");
              }
              
              
              // results.forEach((result, i) => {
              //   const box = resizedDetections[i].detection.box
              //   const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
              //   drawBox.draw(canvas)
              // })

            // })

          }
        
           function loadLabeledImages() {
            
            // let labels =['khaled','khosro','test','akbari'] ;
            let result;
            $.ajax({  
              url: 'http://localhost:8000/labels/',  
              type: 'GET',  
              dataType: 'json',
              async: false,  
              success: function(data, textStatus, xhr) {  
                result = data;
                // data.map(async d => {
                  
                //       labels.push(`${d.name}`);
                // });

              },  
              error: function(xhr, textStatus, errorThrown) {  
                  console.log('error');  
              }  
          });
          // const propertyValues = Object.values(labels);
          // var result = Object.entries(labels);
          // let  myarr  = Array.from(labels);
          // for (let i = 0; i <= result.length; i++) {
          //   console.log(result[i].name);
            
          // }
          //   console.log(label);  
            
        
         
          
        
        




            return Promise.all(
              
              result.map(async label => {
                const descriptions = []
              //  console.log(label.name);
                  
                  for (let i = 1; i <= 1; i++) {
                    
                  const img = await faceapi.fetchImage(`storage/${label.name}/${i}.jpg`)
                  const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                  descriptions.push(detections.descriptor)               
                  

                  }

                return new faceapi.LabeledFaceDescriptors(label.name, descriptions)

              })
            )
          }

          ev.preventDefault();
      }, false);

      clearphoto();
  }


  function clearphoto() {
      var context = canvas.getContext('2d');
      context.fillStyle = "#AAA";
      context.fillRect(0, 0, canvas.width, canvas.height);

      var data = canvas.toDataURL('image/png');
      // photo.setAttribute('src', data);
      photo1.setAttribute('src', data);
  }

  function takepicture() {
      // const videoME = document.getElementById("videoMe");
      const loading = document.getElementById("loading");
      loading.style.display = "none"
      var context = canvas.getContext('2d');
      if (width && height) {
          canvas.width = width;
          canvas.height = height;
          context.drawImage(video, 0, 0, width, height);

          var data = canvas.toDataURL('image/png');
          
          photo1.setAttribute('src', data);
          video.style.display = 'none';
          loading.style.display = "block"
          startbutton.style.display = 'none';
          photo1.style.display ='block';
          
         
          // console.log(photo1);
      } else {
          clearphoto();
      }
  }







  window.addEventListener('load', startup, false);
})();



