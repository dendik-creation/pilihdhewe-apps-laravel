<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Pilih Dhewe</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="./img/Pilih_Dhewe_Colorful.png" type="image/x-icon">
</head>

<body>
    <div id="app" class="position-relative" style="opacity: 0">
        <nav class="navbar" id="navbar">
            <div class="container d-flex">
                <div class="d-flex justify-content-center fs-4 fw-bold d-flex align-items-center" id="title">
                    <span id="event-name"></span>
                </div>
                <div class="d-flex fs-4 fw-bold justify-content-center" id="theme-change-select">
                    <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                            height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" onchange="window.location.reload()"
                                id="toggle-dark">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container position-relative" id="container-app">
            <div class="card mt-5" id="event-info">
                <div class="card-header">
                    <h4 class="card-title">Informasi Event</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start" id="description">
                        <div class="d-flex mb-3">
                            <i class="bi bi-activity me-2"></i>
                            <div class="fw-medium" id="status"></div>
                        </div>
                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                        <div class="d-flex mb-3">
                            <i class="bi bi-calendar2-event me-2"></i>
                            <div class="fw-medium d-flex">
                                <div id="start_date"></div>
                                <span class="mx-2">-</span>
                                <div id="end_date"></div>
                            </div>
                        </div>
                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                        <div class="d-flex mb-3">
                            <i class="bi bi-person-check me-2"></i>
                            <div class="fw-medium" id="partisipan"></div>
                        </div>
                    </div>
                    <div class="flex justify-content-start">
                        <div class="d-flex mb-3">
                            <i class="bi bi-blockquote-left me-2"></i>
                            <div class="fw-medium" id="desc"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5" id="candidateArea">
                <div class="card-header">
                    <h4 class="card-title">Kandidat</h4>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-2" id="candidateContainer">
                        {{-- Candidates --}}
                    </div>
                </div>
            </div>

            <div class="card mt-5" id="chartArea">
                <div class="card-header">
                    <h4 class="card-title">Statistik Charts</h4>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1" id="chartContainer">
                        <canvas id="barChart" height="600"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function detailCandidate(name, gambar, visi, misi) {
            const showMisi = misi.split('.').filter((item) => item.trim() !== "");
            Swal.fire({
                title: name,
                html: `
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <div class="candidate-img-container">
                            <img
                                src="${gambar}"
                                class="candidate-img border border-3"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col w-full justify-start items-start mb-3">
                        <h2 class="font-semibold text-2xl text-center w-full mb-1">Visi</h2>
                        <p class="" id="visi_details">${visi}</p>
                    </div>

                    <div class="flex flex-col w-full justify-start items-start">
                        <h2 class="font-semibold text-2xl text-center w-full mb-1">Misi</h2>
                        <ol class="text-start d-flex gap-3 flex-column" id="misi_details">
                            ${showMisi.map((item, i) => `<li>${i > 0 ? item.substring(1) : item}</li>`).join('')}
                        </ol>
                    </div>
                `,
            });
        }

        const barChart = (candidates, total_partisipan) => {
            const chart = $('#barChart');
            const theme = localStorage.getItem('theme');
            if (theme == 'theme-dark') {
                Chart.defaults.color = "#fff";
                Chart.defaults.borderColor = "rgba(255, 255, 255 , 0.2)";
            } else {
                Chart.defaults.color = "#1c1c1c";;
                Chart.defaults.borderColor = "rgba(0, 0, 0 , 0.2)";
            }
            Chart.defaults.font.family = 'Quicksand';

            new Chart(chart, {
                type: 'bar',
                data: {
                    labels: candidates.map((item) => item.user.name),
                    datasets: [{
                        label: 'Total Vote ',
                        data: candidates.map((item) => item.total_vote),
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                        ],
                        hoverOffset: 25,
                        borderRadius: 4,
                        borderWidth: 3,
                    }]
                },
                options: {
                    indexAxis: "x",
                    animation: true,
                    scales: {
                        y: {
                            max: total_partisipan,
                            ticks: {
                                beginAtZero: true,
                                stepSize: total_partisipan > 1000 ? 100 : total_partisipan > 500 ? 50 : total_partisipan > 200 ? 25 : 10,
                            },
                        },
                    },
                    maintainAspectRatio: true,
                    responsive: false,
                    animation: {
                        animateRotate: true,
                        animateScale: true,
                    },
                    layout: {
                        padding: {
                            bottom: 20,
                        },
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: "Hasil Terbaru",
                            font: {
                                size: 16,
                            },
                        },
                        subtitle: {
                            display: true,
                            text: "Total Voting yang di raih setiap kandidat",
                            padding: {
                                bottom: 30,
                            },
                        },
                        legend: {
                            display: false,
                        }
                    },
                }
            });
        }

        $(document).ready(() => {
            let url = window.location.pathname
            var pattern = /\/(\d+)$/;
            let matchUrl = url.match(pattern);
            getFirst();
            // setTimeout(() => {
            //     setInterval(() => {
            //         updateData();
            //     }, 5000);
            // }, 5000);

            function getFirst() {
                $('#app').animate({
                    opacity: 0
                }, 350)
                $('#app').animate({
                    opacity: 1
                }, 350)
                $.ajax({
                    url: '/api/events/' + matchUrl[1],
                    method: 'GET',
                    dataType: 'json',
                    success: ((response) => {
                        $('#title').html(`Pilih Dhewe | ${response.data.name}`)
                        $('#event-name').html(response.data.name)
                        $('#status').html(response.data.status)
                        $('#desc').html(response.data.description)
                        $('#start_date').html(response.data.start_date)
                        $('#end_date').html(response.data.end_date)
                        $('#partisipan').html(
                            `${response.data.partisipan.length} / ${response.data.total_partisipan} Berpartisipasi`
                        )
                        let sortBy = response.data.candidates.sort((a, b) => b.total_vote - a
                            .total_vote)
                        for (i = 0; i < sortBy.length; i++) {
                            showCandidate(i, sortBy[i], response.data.total_partisipan)
                        }
                        barChart(sortBy, response.data.total_partisipan);
                    }),
                    error: ((xhr, status, error) => {
                        $('#event-name').html('Pilih Dhewe')
                        $('#navbar').css({
                            'position': 'absolute',
                            'width': '100vw',
                            'z-index': '9'
                        });
                        $('#event-info').remove();
                        $('#candidateArea').remove();
                        let notFound = `
                        <div class="d-flex w-vw-max position-absolute h-vh-max justify-content-center align-items-center">
                            <div class="d-block">
                                <div class="row text-center">
                                    <div class="col">
                                        <i class="bi bi-calendar2-x fs-maximum-icon"></i>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <div class="fs-3 fw-medium">Event Tidak Ditemukan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        $('#container-app').removeClass('container');
                        $('#container-app').append(notFound);
                    })
                })
            }


            function showCandidate(i, response, total_partisipan) {
                const misiSplit = response.misi.split('\n').filter((item) => item.trim() !== "");
                let candidate = `
                <div class="card ${i == 0 ? "col-12" : "col"}" id="candidate-card">
                    <div class="shadow p-3 bg-body-tertiary rounded position-relative">
                        <div id="isRank" class="rounded d-flex justify-content-start align-middle" style="background-color : ${i == 0 ? "#d4af37" : i == 1 ? "#c0c0c0" : i == 2 ? "#cd7f32" : ""}; color : ${i < 3 ? "white" : ""}">
                            <i class="bi bi-trophy me-3"></i>
                            <span>${i + 1}</span>
                        </div>

                        <div id="details" onclick="detailCandidate('${response.user.name}', '${response.user.gambar}', '${response.visi}', '${misiSplit}')" class="rounded" style="background-color : ${i == 0 ? "#d4af37" : i == 1 ? "#c0c0c0" : i == 2 ? "#cd7f32" : ""}; color : ${i < 3 ? "white" : ""}">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        <div class="text-center d-flex justify-content-center">
                            <div class="candidate-img-container rounded">
                                <img src="${response.user.gambar}" id="candidate-img-${i+1}" class="candidate-img border border-3" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex justify-content-start">
                                    <i class="bi bi-people me-2"></i>
                                    <h5 class="card-title line-clamp-1" id="candidate-name-${i+1}">${response.user.name}</h5>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <div class="d-flex justify-content-start">
                                        <i class="bi bi-bookmark-check me-2"></i>
                                        <p class="card-text line-clamp-1" id="candidate-visi-${i+1}">${response.visi}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-3">
                                    <div class="d-flex justify-content-start">
                                        <i class="bi bi-blockquote-left me-2"></i>
                                        <p class="card-text line-clamp-1" id="candidate-misi-${i+1}">${response.misi}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center fs-5 flex-column">
                                    <div class="d-flex justify-content-start">
                                        <i class="bi bi-pin-angle me-3"></i>
                                        <p class="card-text line-clamp-1" id="candidate-voted-${i+1}">${response.total_vote} / ${total_partisipan} Memilih</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                $('#candidateContainer').append(candidate);
            }


            function updateData() {
                $.ajax({
                    url: '/api/events/' + matchUrl[1],
                    method: 'GET',
                    dataType: 'json',
                    success: ((response) => {
                        $('#title').html(`Pilih Dhewe | ${response.data.name}`)
                        $('#event-name').html(response.data.name)
                        $('#status').html(response.data.status)
                        $('#desc').html(response.data.description)
                        $('#start_date').html(response.data.start_date)
                        $('#end_date').html(response.data.end_date)
                        $('#partisipan').html(
                            `${response.data.partisipan.length} / ${response.data.total_partisipan} Berpartisipasi`
                        )
                        if (response.data.status == 'Active') {
                            let sortBy = response.data.candidates.sort((a, b) => b.total_vote - a
                                .total_vote)
                            for (i = 0; i < sortBy.length; i++) {
                                $(`#candidate-name-${i + 1}`).html(sortBy[i].user.name)
                                $(`#candidate-img-${i + 1}`).attr("src", sortBy[i].user.gambar)
                                $(`#candidate-visimisi-${i + 1}`).html(sortBy[i].visi_misi)
                                $(`#candidate-voted-${i + 1}`).html(
                                    `${sortBy[i].total_vote} / ${response.data.total_partisipan} Memilih`
                                )
                            }
                        }
                    }),
                    error: ((xhr, status, error) => {
                        alert('Event Tidak Ditemukan');
                    })
                })
            }
        })
    </script>
</body>

</html>
