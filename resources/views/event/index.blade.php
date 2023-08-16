<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Pilih Dhewe | Events</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        #event-title .hover-event {
            transition: all ease 0.2s;
        }

        #event-title:hover .hover-event::before {
            transform: translateX(10px);
            transition: all ease 0.2s;
        }
    </style>
</head>

<body>
    <div id="app" class="position-relative" style="opacity: 0">
        <nav class="navbar">
            <div class="container d-flex">
                <div class="d-flex justify-content-center fs-4 fw-bold d-flex align-items-center" id="title">
                    <span id="event-name">Events</span>
                </div>
                <div class="d-flex fs-4 fw-bold justify-content-center align-items-center" id="theme-change-select">
                    <div class="theme-toggle d-flex gap-2  align-items-center">
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
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
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


        <div class="mx-2 mx-md-0">
            <div class="container d-block mb-5">
                <div class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control" placeholder="Cari Event" id="search-event">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
                <div class="container my-4 justify-content-start" id="result-content">
                    <i class="bi bi-list-nested me-3" id="result-icon"></i>
                    <div class="fw-semibold" id="result-search"></div>
                </div>
            </div>
            <div class="container" id="container-events-all">
                <div class="position-relative row row-cols-1 row-cols-md-2" id="container-app">
                    {{-- Events  --}}
                </div>
            </div>
        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            getEvents();

            function getEvents() {
                $('#app').animate({
                    opacity: 0
                }, 350)
                $('#app').animate({
                    opacity: 1
                }, 350)
                $.ajax({
                    url: '/api/events/',
                    method: 'GET',
                    dataType: 'json',
                    success: ((response) => {
                        if ($('#search-event').val() == '') {
                            $('#result-content').css('display', 'none');
                            response.data.forEach((item) => {
                                let status;
                                item.status == 'Inactive' ? status =
                                    'bg-warning text-black' : item.status == 'Active' ?
                                    status = 'bg-primary' : item.status == 'Selesai' ?
                                    status = 'bg-danger' : '';
                                let event =
                                    `
                                <div class="">
                                    <div class="card position-relative overflow-hidden" id="event-each">
                                        <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                            <div class="event-status-absolute fs-6">${item.status == 'Inactive' ? 'Menunggu' : item.status == 'Active' ? 'Berlangsung' : 'Berakhir'}</div>
                                        </div>
                                        <div class="card-header d-flex" id="event-title">
                                            <a href="/event/result/${item.id}" class="card-title">
                                                <h4 class="card-title text-decoration-none line-clamp-1">${item.name}</h4>
                                            </a>
                                            <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                                        </div>
                                        <div class="card-body ">
                                            <div class="d-flex justify-content-start" id="description">
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-activity me-2"></i>
                                                    <div class="fw-medium" id="status">${item.status}</div>
                                                </div>
                                                <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-calendar2-event me-2"></i>
                                                    <div class="fw-medium d-flex">
                                                        <div id="start_date">${item.start_date}</div>
                                                        <span class="mx-2">-</span>
                                                        <div id="end_date">${item.end_date}</div>
                                                    </div>
                                                </div>
                                                <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-people me-2"></i>
                                                    <div class="fw-medium" id="partisipan">${item.candidates.length} Kandidat</div>
                                                </div>
                                            </div>
                                            <div class="flex justify-content-start me-5">
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-blockquote-left me-2"></i>
                                                    <div class="fw-medium" id="desc">
                                                        <p class="line-clamp-1">${item.description}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                                $('#container-app').append(event)
                            })
                        }
                        $('#search-event').on('input', function() {
                            let value = $(this).val();
                            if (value.length > 0) {
                                $('#result-content').css('display', 'flex');
                                let resultSearch = filterData(response.data, value);
                                resultDisplay(resultSearch);
                            } else {
                                $('#container-app').empty();
                                $('#result-content').css('display', 'none');
                                response.data.forEach((item) => {
                                    let status;
                                    item.status == 'Inactive' ? status =
                                        'bg-warning text-black' : item.status ==
                                        'Active' ? status = 'bg-primary' : item
                                        .status == 'Selesai' ? status =
                                        'bg-danger' : '';
                                    let event =
                                        `
                                <div class="">
                                    <div class="card position-relative overflow-hidden" id="event-each">
                                        <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                            <div class="event-status-absolute fs-6">${item.status == 'Inactive' ? 'Menunggu' : item.status == 'Active' ? 'Berlangsung' : 'Berakhir'}</div>
                                        </div>
                                        <div class="card-header d-flex" id="event-title">
                                            <a href="/event/result/${item.id}" class="card-title">
                                                <h4 class="card-title text-decoration-none line-clamp-1">${item.name}</h4>
                                            </a>
                                            <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                                        </div>
                                        <div class="card-body ">
                                            <div class="d-flex justify-content-start" id="description">
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-activity me-2"></i>
                                                    <div class="fw-medium" id="status">${item.status}</div>
                                                </div>
                                                <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-calendar2-event me-2"></i>
                                                    <div class="fw-medium d-flex">
                                                        <div id="start_date">${item.start_date}</div>
                                                        <span class="mx-2">-</span>
                                                        <div id="end_date">${item.end_date}</div>
                                                    </div>
                                                </div>
                                                <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-people me-2"></i>
                                                    <div class="fw-medium" id="partisipan">${item.candidates.length} Kandidat</div>
                                                </div>
                                            </div>
                                            <div class="flex justify-content-start">
                                                <div class="d-flex mb-3">
                                                    <i class="bi bi-blockquote-left me-2"></i>
                                                    <div class="fw-medium" id="desc">
                                                        <p class="line-clamp-1">${item.description}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                                    $('#container-app').append(event)
                                })
                            }
                        })

                    })
                })
            }

            function filterData(response, value) {
                let filterData = $.grep(response, function(item) {
                    return item.name.toLowerCase().indexOf(value.toLowerCase()) !== -1;
                });

                return filterData;
            }

            function resultDisplay(resultSearch) {
                $('#container-app').empty();
                if (resultSearch.length == 0) {
                    $('#result-icon').removeClass('bi-list-nested');
                    $('#result-icon').addClass('bi-emoji-frown');
                    $('#result-search').html(`Event Tidak Ada`)
                } else {
                    $('#result-icon').addClass('bi-list-nested');
                    $('#result-icon').removeClass('bi-emoji-frown');
                    $.each(resultSearch, function(index, item) {

                        $('#result-search').html(`${resultSearch.length} Event`)
                        let status;
                        item.status == 'Inactive' ? status = 'bg-warning' : item.status == 'Active' ?
                            status = 'bg-primary' : item.status == 'Selesai' ? status = 'bg-danger' : '';
                        let event =
                            `
                            <div class="">
                                <div class="card position-relative overflow-hidden" id="event-each">
                                    <div class="position-absolute bottom-0 py-1 w-md-0 w-100 end-0 d-flex justify-content-center align-items-center ${status}">
                                            <div class="event-status-absolute fs-6">${item.status == 'Inactive' ? 'Menunggu' : item.status == 'Active' ? 'Berlangsung' : 'Berakhir'}</div>
                                        </div>
                                    <div class="card-header d-flex" id="event-title">
                                        <a href="/event/result/${item.id}" class="card-title">
                                            <h4 class="card-title text-decoration-none line-clamp-1">${item.name}</h4>
                                        </a>
                                        <i class="bi bi-arrow-right-short ms-2 hover-event"></i>
                                    </div>
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-start" id="description">
                                            <div class="d-flex mb-3">
                                                <i class="bi bi-activity me-2"></i>
                                                <div class="fw-medium" id="status">${item.status}</div>
                                            </div>
                                            <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                            <div class="d-flex mb-3">
                                                <i class="bi bi-calendar2-event me-2"></i>
                                                <div class="fw-medium d-flex">
                                                    <div id="start_date">${item.start_date}</div>
                                                    <span class="mx-2">-</span>
                                                    <div id="end_date">${item.end_date}</div>
                                                </div>
                                            </div>
                                            <span class="fw-medium mx-3" id="spacer-desc">|</span>
                                            <div class="d-flex mb-3">
                                                <i class="bi bi-people me-2"></i>
                                                <div class="fw-medium" id="partisipan">${item.candidates.length} Kandidat</div>
                                            </div>
                                        </div>
                                        <div class="flex justify-content-start">
                                            <div class="d-flex mb-3">
                                                <i class="bi bi-blockquote-left me-2"></i>
                                                <div class="fw-medium" id="desc">
                                                    <p class="line-clamp-1">${item.description}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        $('#container-app').append(event)
                    })
                }
            }

        })
    </script>
</body>

</html>
