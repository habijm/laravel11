<x-layout>
    <x-slot:title>{{ $title }} </x-slot:title>
    <h1>Halaman Camera</h1>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h1 class="text-xl font-bold mb-4 text-center">FOTO DENGAN GAYA</h1>
            <video id="video" class="w-full bg-black rounded" autoplay></video>
            <canvas id="canvas" class="hidden"></canvas>
            <div class="flex gap-1">
                <div class="flex-auto">
                    <button id="startButton"
                        class="mt-4 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded w-full">
                        <i class="fa-solid fa-camera"></i><span class="ml-2">Open Camera</span>
                    </button>
                </div>
                <div class="flex-auto">
                    <button id="captureButton"
                        class="mt-4 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded w-full">
                        <i class="fa-solid fa-camera-retro"></i> <span class="ml-2">Ambil Gambar</span>
                    </button>
                </div>
            </div>

            <form id="photoForm" method="POST" action="{{ route('photos.store') }}">
                @csrf
                <input type="hidden" name="photo" id="photoInput">
                <button type="submit"
                    class="mt-4 bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded w-full">
                    Save Photo
                </button>
            </form>

            <div class="mt-4">
                <img id="capturedImage" class="w-full rounded" src="" alt="Hasil Gambar" />
            </div>
        </div>
    </div>
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <script>
        document.getElementById('startButton').addEventListener('click', async function() {
            const video = document.getElementById('video');

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({
                        video: true
                    });
                    video.srcObject = stream;
                } catch (error) {
                    console.error("Error accessing camera: ", error);
                }
            } else {
                alert("getUserMedia not supported on your browser!");
            }
        });

        document.getElementById('captureButton').addEventListener('click', function() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('photoInput').value = dataURL;
            document.getElementById('capturedImage').src = dataURL;
        });

        const swal = $('.swal').data('swal');

        if (swal) {
            Swal.fire({
                position: 'center',
                icon: "success",
                title: '<b>SUKSES</b>',
                color: '#41B06E',
                text: swal,
                showConfirmButton: false,
                timer: 2500,
                customClass: {
                    icon: 'no-border',
                }
            });
        }
    </script>
</x-layout>
