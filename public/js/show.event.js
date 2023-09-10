function detailCandidate(name, gambar, visi, misi) {
    const showMisi = misi.split(".").filter((item) => item.trim() !== "");
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
                <ol class="text-start d-flex gap-2 flex-column" id="misi_details">
                    ${showMisi
                        .map(
                            (item, i) =>
                                `<li>${i > 0 ? item.substring(1) : item}</li>`
                        )
                        .join("")}
                </ol>
            </div>
        `,
    });
}

function embedCandidateVideo(video_url, candidate_name) {
    Swal.fire({
        title: "Video " + candidate_name,
        showConfirmButton: false,
        showCloseButton: true,
        customClass: "swal-embed-video",
        allowOutsideClick: false,
        html: `
        <div class="d-flex justify-content-center align-items-center mt-2">
            <iframe src="${video_url}" class="w-100 h-100 rounded iframe-embed-video" frameborder="0"></iframe>
        </div>
        `,
    });
}

const barChart = (candidates, total_partisipan) => {
    const chart = $("#barChart");
    const theme = localStorage.getItem("theme");
    if (theme == "theme-dark") {
        Chart.defaults.color = "#fff";
        Chart.defaults.borderColor = "rgba(255, 255, 255 , 0.2)";
    } else {
        Chart.defaults.color = "#1c1c1c";
        Chart.defaults.borderColor = "rgba(0, 0, 0 , 0.2)";
    }
    Chart.defaults.font.family = "Quicksand";

    new Chart(chart, {
        type: "doughnut",
        data: {
            labels: candidates.map((item) => item.user.name),
            datasets: [
                {
                    label: "Total Vote ",
                    data: candidates.map((item) => item.total_vote),
                    backgroundColor: [
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(201, 203, 207, 0.2)",
                        "rgba(255, 205, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                    ],
                    borderColor: [
                        "rgb(255, 205, 86)",
                        "rgb(153, 102, 255)",
                        "rgb(255, 99, 132)",
                        "rgb(201, 203, 207)",
                        "rgb(255, 159, 64)",
                        "rgb(75, 192, 192)",
                        "rgb(54, 162, 235)",
                    ],
                    hoverOffset: 15,
                    borderRadius: 4,
                    // borderWidth: 3,
                },
            ],
        },
        options: {
            animation: true,

            /* bar chart type */

            // indexAxis: "x",
            // scales: {
            //     y: {
            //         max: total_partisipan,
            //         ticks: {
            //             beginAtZero: true,
            //             stepSize:
            //                 total_partisipan > 1000
            //                     ? 100
            //                     : total_partisipan > 500
            //                     ? 50
            //                     : total_partisipan > 200
            //                     ? 25
            //                     : 10,
            //         },
            //     },
            // },

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
                    text: "Hasil Voting",
                    font: {
                        size: 16,
                    },
                },
                subtitle: {
                    display: true,
                    text: "Total voting yang diraih setiap kandidat",
                    padding: {
                        bottom: 15,
                    },
                },
                // legend: {
                //     display: false,
                // }
            },
        },
    });
};

$(document).ready(() => {
    let url = window.location.pathname;
    var pattern = /\/(\d+)$/;
    let matchUrl = url.match(pattern);
    getFirst();

    // setTimeout(() => {
    //     setInterval(() => {
    //         updateData();
    //     }, 5000);
    // }, 5000);

    function getFirst() {
        $("#app").animate(
            {
                opacity: 0,
            },
            350
        );
        $("#app").animate(
            {
                opacity: 1,
            },
            350
        );
        $.ajax({
            url: "/api/events/" + matchUrl[1],
            method: "GET",
            dataType: "json",
            success: (response) => {
                $("#title").html(`Pilih Dhewe | ${response.data.name}`);
                $("#event-name").html(response.data.name);
                $("#status").html(response.data.status);
                $("#desc").html(response.data.description);
                $("#start_date").html(response.data.start_date);
                $("#end_date").html(response.data.end_date);
                $("#partisipan").html(
                    `${response.data.partisipan.length} / ${response.data.total_partisipan} Berpartisipasi`
                );
                let sortBy = response.data.candidates.sort(
                    (a, b) => b.total_vote - a.total_vote
                );
                for (i = 0; i < sortBy.length; i++) {
                    showCandidate(i, sortBy[i], response.data.total_partisipan);
                }
                barChart(sortBy, response.data.total_partisipan);
            },
            error: (xhr, status, error) => {
                $("#event-name").html("Pilih Dhewe");
                $("#navbar").css({
                    position: "absolute",
                    width: "100vw",
                    "z-index": "9",
                });
                $("#event-info").remove();
                $("#candidateArea").remove();
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
                $("#container-app").removeClass("container");
                $("#container-app").append(notFound);
            },
        });
    }

    function showCandidate(i, response, total_partisipan) {
        const misiSplit = response.misi
            .split("\n")
            .filter((item) => item.trim() !== "");
        let candidate = `
        <div class="card ${i == 0 ? "col-12" : "col"}" id="candidate-card">
            <div class="shadow p-3 bg-body-tertiary rounded position-relative">
                <div id="isRank" class="rounded d-flex justify-content-start align-middle" style="background-color : ${
                    i == 0
                        ? "#d4af37"
                        : i == 1
                        ? "#c0c0c0"
                        : i == 2
                        ? "#cd7f32"
                        : ""
                }; color : ${i < 3 ? "white" : ""}">
                    <i class="bi bi-trophy me-3"></i>
                    <span>${i + 1}</span>
                </div>

                <div id="details" onclick="detailCandidate('${
                    response.user.name
                }', '${response.user.gambar}', '${
            response.visi
        }', '${misiSplit}')" class="rounded" style="background-color : ${
            i == 0 ? "#d4af37" : i == 1 ? "#c0c0c0" : i == 2 ? "#cd7f32" : ""
        }; color : ${i < 3 ? "white" : ""}">
                    <i class="bi bi-info-circle"></i>
                </div>
                <div class="text-center d-flex justify-content-center">
                    <div class="candidate-img-container rounded">
                        <img src="${response.user.gambar}" id="candidate-img-${
            i + 1
        }" class="candidate-img border border-3" />
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <i class="bi bi-people me-2"></i>
                            <h5 class="card-title line-clamp-1" id="candidate-name-${
                                i + 1
                            }">${response.user.name}</h5>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <div class="d-flex justify-content-start">
                                <i class="bi bi-bookmark-check me-2"></i>
                                <p class="card-text line-clamp-1" id="candidate-visi-${
                                    i + 1
                                }">${response.visi}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mb-1">
                            <div class="d-flex justify-content-start">
                                <i class="bi bi-blockquote-left me-2"></i>
                                <p class="card-text line-clamp-1" id="candidate-misi-${
                                    i + 1
                                }">${response.misi}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mb-3">
                            <div class="d-flex justify-content-start">
                                <i class="bi bi-camera-video me-2"></i>
                                <p onclick="embedCandidateVideo('${
                                    response.video
                                }', '${
            response.user.name
        }')" class="card-text line-clamp-1 video-btn" id="candidate-video-${
            i + 1
        }">Tonton Video</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center flex-column">
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="bi bi-pin-angle me-3"></i>
                                <p class="card-text line-clamp-1" id="candidate-voted-${
                                    i + 1
                                }">
                                    <span class="fs-2">${
                                        response.total_vote
                                    }</span> / <span>${total_partisipan} Memilih<span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        $("#candidateContainer").append(candidate);
    }

    function updateData() {
        $.ajax({
            url: "/api/events/" + matchUrl[1],
            method: "GET",
            dataType: "json",
            success: (response) => {
                $("#title").html(`Pilih Dhewe | ${response.data.name}`);
                $("#event-name").html(response.data.name);
                $("#status").html(response.data.status);
                $("#desc").html(response.data.description);
                $("#start_date").html(response.data.start_date);
                $("#end_date").html(response.data.end_date);
                $("#partisipan").html(
                    `${response.data.partisipan.length} / ${response.data.total_partisipan} Berpartisipasi`
                );
                if (response.data.status == "Active") {
                    let sortBy = response.data.candidates.sort(
                        (a, b) => b.total_vote - a.total_vote
                    );
                    for (i = 0; i < sortBy.length; i++) {
                        $(`#candidate-name-${i + 1}`).html(sortBy[i].user.name);
                        $(`#candidate-img-${i + 1}`).attr(
                            "src",
                            sortBy[i].user.gambar
                        );
                        $(`#candidate-visi-${i + 1}`).html(sortBy[i].visi);
                        $(`#candidate-misi-${i + 1}`).html(sortBy[i].misi);
                        $(`#candidate-video-${i + 1}`).attr(
                            "src",
                            sortBy[i].video
                        );
                        $(`#candidate-voted-${i + 1}`).html(
                            `<span class="fs-2">${sortBy[i].total_vote}</span> / <span>${response.data.total_partisipan} Memilih<span>`
                        );
                    }
                }
            },
            error: (xhr, status, error) => {
                alert("Event Tidak Ditemukan");
            },
        });
    }
});
