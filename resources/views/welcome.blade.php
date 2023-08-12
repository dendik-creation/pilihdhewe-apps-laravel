<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Dhewe</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/img/link-45deg.svg" type="image/x-icon">
    <style>
        .animate-icon::before{
            animation : loop 20s linear infinite;
        }
        @keyframes loop{
            0%{
                transform : rotateZ(0deg);
            }
            100%{
                transform : rotateZ(360deg);
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
                        <i class="bi bi-link-45deg fs-maximum-icon animate-icon" id="sigma-icon"></i>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <div class="fs-1 font-semibold">Pilih Dhewe</div>
                        <div class="fs-5 font-medium mb-5">Voting & Polling Web Application</div>
                        <a href="{{ url('/events') }}" class="btn btn-outline-primary border border-2 border-primary text-dark fs-6 font-medium">View Events</a>
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
    </script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
