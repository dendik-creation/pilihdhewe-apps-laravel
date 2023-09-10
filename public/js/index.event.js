$(document).ready(() => {
    getEvents();

    function getEvents() {
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
            url: "/api/events/",
            method: "GET",
            dataType: "json",
            success: (response) => {
                if ($("#search-event").val() == "") {
                    $("#result-content").css("display", "none");
                    response.data.forEach((item) => {
                        let status;
                        item.status == "Inactive"
                            ? (status = "bg-warning text-black")
                            : item.status == "Active"
                            ? (status = "bg-primary")
                            : item.status == "Selesai"
                            ? (status = "bg-danger")
                            : "";
                        let event = `
                        <div class="">
                            <div class="card position-relative overflow-hidden" id="event-each">
                                <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                    <div class="event-status-absolute fs-6">${
                                        item.status == "Inactive"
                                            ? "Menunggu"
                                            : item.status == "Active"
                                            ? "Berlangsung"
                                            : "Berakhir"
                                    }</div>
                                </div>
                                <div class="card-header d-flex" id="event-title">
                                    <a href="/event/result/${
                                        item.id
                                    }" class="card-title">
                                        <h4 class="card-title text-decoration-none line-clamp-1">${
                                            item.name
                                        }</h4>
                                    </a>
                                    <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-start" id="description">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-activity me-2"></i>
                                            <div class="fw-medium" id="status">${
                                                item.status
                                            }</div>
                                        </div>
                                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-calendar2-event me-2"></i>
                                            <div class="fw-medium d-flex">
                                                <div id="start_date">${
                                                    item.start_date
                                                }</div>
                                                <span class="mx-2">-</span>
                                                <div id="end_date">${
                                                    item.end_date
                                                }</div>
                                            </div>
                                        </div>
                                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-people me-2"></i>
                                            <div class="fw-medium" id="partisipan">${
                                                item.candidates.length
                                            } Kandidat</div>
                                        </div>
                                    </div>
                                    <div class="flex justify-content-start me-5">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-blockquote-left me-2"></i>
                                            <div class="fw-medium" id="desc">
                                                <p class="line-clamp-1">${
                                                    item.description
                                                }</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                        $("#container-app").append(event);
                    });
                }
                $("#search-event").on("input", function () {
                    let value = $(this).val();
                    if (value.length > 0) {
                        $("#result-content").css("display", "flex");
                        let resultSearch = filterData(response.data, value);
                        resultDisplay(resultSearch);
                    } else {
                        $("#container-app").empty();
                        $("#result-content").css("display", "none");
                        response.data.forEach((item) => {
                            let status;
                            item.status == "Inactive"
                                ? (status = "bg-warning text-black")
                                : item.status == "Active"
                                ? (status = "bg-primary")
                                : item.status == "Selesai"
                                ? (status = "bg-danger")
                                : "";
                            let event = `
                        <div class="">
                            <div class="card position-relative overflow-hidden" id="event-each">
                                <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                    <div class="event-status-absolute fs-6">${
                                        item.status == "Inactive"
                                            ? "Menunggu"
                                            : item.status == "Active"
                                            ? "Berlangsung"
                                            : "Berakhir"
                                    }</div>
                                </div>
                                <div class="card-header d-flex" id="event-title">
                                    <a href="/event/result/${
                                        item.id
                                    }" class="card-title">
                                        <h4 class="card-title text-decoration-none line-clamp-1">${
                                            item.name
                                        }</h4>
                                    </a>
                                    <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-start" id="description">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-activity me-2"></i>
                                            <div class="fw-medium" id="status">${
                                                item.status
                                            }</div>
                                        </div>
                                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-calendar2-event me-2"></i>
                                            <div class="fw-medium d-flex">
                                                <div id="start_date">${
                                                    item.start_date
                                                }</div>
                                                <span class="mx-2">-</span>
                                                <div id="end_date">${
                                                    item.end_date
                                                }</div>
                                            </div>
                                        </div>
                                        <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-people me-2"></i>
                                            <div class="fw-medium" id="partisipan">${
                                                item.candidates.length
                                            } Kandidat</div>
                                        </div>
                                    </div>
                                    <div class="flex justify-content-start">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-blockquote-left me-2"></i>
                                            <div class="fw-medium" id="desc">
                                                <p class="line-clamp-1">${
                                                    item.description
                                                }</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                            $("#container-app").append(event);
                        });
                    }
                });
            },
        });
    }

    function filterData(response, value) {
        let filterData = $.grep(response, function (item) {
            return item.name.toLowerCase().indexOf(value.toLowerCase()) !== -1;
        });

        return filterData;
    }

    function resultDisplay(resultSearch) {
        $("#container-app").empty();
        if (resultSearch.length == 0) {
            $("#result-icon").removeClass("bi-list-nested");
            $("#result-icon").addClass("bi-emoji-frown");
            $("#result-search").html(`Event Tidak Ada`);
        } else {
            $("#result-icon").addClass("bi-list-nested");
            $("#result-icon").removeClass("bi-emoji-frown");
            $.each(resultSearch, function (index, item) {
                $("#result-search").html(`${resultSearch.length} Event`);
                let status;
                item.status == "Inactive"
                    ? (status = "bg-warning")
                    : item.status == "Active"
                    ? (status = "bg-primary")
                    : item.status == "Selesai"
                    ? (status = "bg-danger")
                    : "";
                let event = `
                    <div class="">
                        <div class="card position-relative overflow-hidden" id="event-each">
                            <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                    <div class="event-status-absolute fs-6">${
                                        item.status == "Inactive"
                                            ? "Menunggu"
                                            : item.status == "Active"
                                            ? "Berlangsung"
                                            : "Berakhir"
                                    }</div>
                                </div>
                            <div class="card-header d-flex" id="event-title">
                                <a href="/event/result/${
                                    item.id
                                }" class="card-title">
                                    <h4 class="card-title text-decoration-none line-clamp-1">${
                                        item.name
                                    }</h4>
                                </a>
                                <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                            </div>
                            <div class="card-body ">
                                <div class="d-flex justify-content-start" id="description">
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-activity me-2"></i>
                                        <div class="fw-medium" id="status">${
                                            item.status
                                        }</div>
                                    </div>
                                    <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-calendar2-event me-2"></i>
                                        <div class="fw-medium d-flex">
                                            <div id="start_date">${
                                                item.start_date
                                            }</div>
                                            <span class="mx-2">-</span>
                                            <div id="end_date">${
                                                item.end_date
                                            }</div>
                                        </div>
                                    </div>
                                    <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-people me-2"></i>
                                        <div class="fw-medium" id="partisipan">${
                                            item.candidates.length
                                        } Kandidat</div>
                                    </div>
                                </div>
                                <div class="flex justify-content-start">
                                    <div class="d-flex mb-3">
                                        <i class="bi bi-blockquote-left me-2"></i>
                                        <div class="fw-medium" id="desc">
                                            <p class="line-clamp-1">${
                                                item.description
                                            }</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                $("#container-app").append(event);
            });
        }
    }
});
