 
      document.getElementById('startButton').addEventListener('click', async function() {
        const video = document.getElementById('video');

        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
            } catch (error) {
                console.error("Error accessing camera: ", error);
            }
        } else {
            alert("getUserMedia not supported on your browser!");
        }
    });

   

    