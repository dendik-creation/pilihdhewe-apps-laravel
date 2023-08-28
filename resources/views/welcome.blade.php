<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Dhewe</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="./img/Pilih_Dhewe_Colorful.png" type="image/x-icon">
    <style>
        .animate-icon{
            animation : loop 2s ease-in-out infinite;
        }
        @keyframes loop{
            0%{
                transform : translateY(0px);
            }
            50%{
                transform : translateY(-10px);
            }
            100%{
                transform : translateY(0px);
            }
        }
        .animate-icon {
            transition : all ease 0.3s;
        }
        .animate-icon:hover{
            transition : all ease 0.3s;
            filter : drop-shadow(0 0 8px rgba(255,255,255,0.6));
        }
    </style>
</head>
<body style="background : #151521; overflow:hidden" class="text-dark">
    <div class="position-relative" id="content">
        <div class="d-flex w-vw-max h-vh-max position-absolute justify-content-center align-items-center">
            <div class="d-block">
                <div class="row text-center">
                    <div class="col">
                        <img src="./img/pilihdhewe-icons.png" class="w-50 animate-icon" alt="">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <div class="fs-1 font-semibold">Pilih Dhewe</div>
                        <div class="fs-5 font-medium mb-5">Voting & Polling Web Application</div>
                    </div>
                </div>
                <div class="row text-center gap-3">
                    <div class="col-12">
                        <a href="{{ url('/events') }}" class="btn btn-outline-primary border border-2 border-primary text-dark fs-6 font-medium w-50">Go to Events</a>
                    </div>
                    <div class="col-12">
                        <button onclick="downloadApp()" class="btn btn-outline-warning border border-2 border-warning fs-6 font-medium w-50">Donwload App</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('content').style.opacity = '0';
        window.onload = () => {
            let opacities = 0;
            var interval = setInterval(() => {
                opacities = opacities + 0.1;
                if(opacities >= 0.9){
                    clearInterval(interval);
                }
                document.getElementById('content').style.opacity = opacities;
            }, 50);
        }
        function downloadApp(){
            var link = document.createElement("a");
            link.href = "https://pilihdhewe.my.id/apps/PilihDhewe.apk";
            link.download = "PilihDhewe.apk";
            link.click();
            link.remove();
        }
    </script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
