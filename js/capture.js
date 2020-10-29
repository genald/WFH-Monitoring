const canvas      = document.createElement("canvas");
const screenVideo = document.getElementById("screenVideo");
const cameraVideo = document.getElementById("cameraVideo");

async function startScreenCapture() {
    try {
        screenVideo.srcObject = await navigator.mediaDevices.getDisplayMedia({
            video: {
                cursor: "always"
            },
            audio: false
        });
    } catch(err) {
        console.error("Error: " + err);
    }
}

async function startCameraCapture() {
    try {
        cameraVideo.srcObject = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false
        });
    } catch(err) {
        console.error("Error: " + err);
    }
}

function stopScreenCapture() {
    let tracks = screenVideo.srcObject.getTracks();

    tracks.forEach(track => track.stop());
    screenVideo.srcObject = null;
}

async function sendImage(from, imageURI, server_URL) {
    const formData = new FormData();
    formData.append('employee_id', employee_id);
    formData.append(`${from}-capture`, imageURI);

    fetch(server_URL, {
        method: 'POST',
        mode: 'no-cors',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        // console.log('Success:', result);
    })
    .catch(error => {
        // console.error('Error:', error);
    });
}

function capture(from, videoElem, server_URL) {
    canvas.width  = videoElem.videoWidth;
    canvas.height = videoElem.videoHeight;

    canvas.getContext('2d').drawImage(videoElem, 0, 0, canvas.width, canvas.height);

    let dataUrl = canvas.toDataURL('image/png');
    sendImage(from, dataUrl, server_URL);
}

window.addEventListener('load', (event) => {
    startCameraCapture();
    startScreenCapture();

    setInterval(() => {
        if (screen_random) {
            let random = Math.floor(Math.random() * 2);
            if (random) {
                capture('screen', screenVideo, screen_URL);
            }
        }
        else capture('screen', screenVideo, screen_URL);
    }, screen_interval)
    
    setInterval(() => {
        if (camera_random) {
            let random = Math.floor(Math.random() * 2);
            if (random) {
                capture('camera', cameraVideo, camera_URL);
            }
        }
        else capture('screen', screenVideo, screen_URL);
    }, camera_interval)
});
