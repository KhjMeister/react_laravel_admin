(function () {

    var width = 320; // We will scale the photo width to this
    var height = 0; // This will be computed based on the input stream

    var streaming = false;
    

    var video = null;
    var canvas = null;
    var photo = null;
    var photo1 = null;
    var startbutton = null;
    var regbtn = null;
    var camera = document.getElementById('camer');;
   

    

    function startup() {
        video = document.getElementById('video');
        regbtn = document.getElementById('register_btn');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('files1');
        photo1 = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');
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
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);

            var data = canvas.toDataURL('image/png');
            // photo.setAttribute('value', data);
            photo1.setAttribute('src', data);
            video.style.display = 'none';
            startbutton.style.display = 'none';
            camera.style.display = 'none';
            photo1.style.display ='block';

            
            const file = document.getElementById("files1");
            file.setAttribute('value', data)
            console.log(file);
        } else {
            clearphoto();
        }
    }

    window.addEventListener('load', startup, false);
})();

// let test = [];

// test.push("pic")
// if (test.length > 0 ){

// }