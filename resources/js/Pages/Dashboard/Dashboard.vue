<template>
    <Head title="Dashboard" />

    <layout>
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3>Dashboard</h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">

                    <div class="dropdown me-2 d-inline-block position-relative">
                        <a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar align-middle mt-n1"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg> Today
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>

                    <button class="btn btn-primary shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="filter" class="lucide lucide-filter align-middle"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    </button>
                    <button class="btn btn-primary shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="refresh-cw" class="lucide lucide-refresh-cw align-middle"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path><path d="M21 3v5h-5"></path><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path><path d="M8 16H3v5"></path></svg>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card illustration flex-fill">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="illustration-text p-3 m-1">
                                        <h4 class="illustration-text">Welcome Back, Chris!</h4>
                                        <p class="mb-0">AppStack Dashboard</p>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end text-end">
                                    <img src="/assets/dashboard/img/customer-support.png" alt="Customer Support" class="img-fluid illustration-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">$ 24.300</h3>
                                    <p class="mb-2">Total Earnings</p>
                                    <div class="mb-0">
                                        <span class="badge badge-subtle-success me-2"> +5.35% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="dollar-sign" class="lucide lucide-dollar-sign align-middle text-success"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">43</h3>
                                    <p class="mb-2">Pending Orders</p>
                                    <div class="mb-0">
                                        <span class="badge badge-subtle-danger me-2"> -4.25% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="shopping-bag" class="lucide lucide-shopping-bag align-middle text-danger"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">$ 18.700</h3>
                                    <p class="mb-2">Total Revenue</p>
                                    <div class="mb-0">
                                        <span class="badge badge-subtle-success me-2"> +8.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="dollar-sign" class="lucide lucide-dollar-sign align-middle text-info"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Sales / Revenue</h5>
                        </div>
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="chartjs-dashboard-bar" width="922" height="437" style="display: block; height: 350px; width: 738px;" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <span class="badge bg-info float-end">Today</span>
                            <h5 class="card-title mb-0">Daily feed</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="/assets/dashboard/img/avatar-5.jpg" width="36" height="36" class="rounded-circle me-2" alt="Ashley Briggs">
                                <div class="flex-grow-1">
                                    <small class="float-end">5m ago</small>
                                    <strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong><br>
                                    <small class="text-muted">Today 7:51 pm</small><br>

                                </div>
                            </div>

                            <hr>
                            <div class="d-flex align-items-start">
                                <img src="/assets/dashboard/img/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Chris Wood">
                                <div class="flex-grow-1">
                                    <small class="float-end">30m ago</small>
                                    <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br>
                                    <small class="text-muted">Today 7:21 pm</small>

                                    <div class="border text-sm text-muted p-2 mt-1">
                                        Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing...
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex align-items-start">
                                <img src="/assets/dashboard/img/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Stacie Hall">
                                <div class="flex-grow-1">
                                    <small class="float-end">1h ago</small>
                                    <strong>Stacie Hall</strong> posted a new blog<br>

                                    <small class="text-muted">Today 6:35 pm</small>
                                </div>
                            </div>

                            <hr>
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary">Load more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Calendar</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="calendar-dashboard"><div class="tempus-dominus-widget inline light show"><div class="date-container td-collapse show" style=""><div class="calendar-header"><div class="previous" data-action="previous" title="Previous Month"><i class="fa-solid fa-chevron-left"></i></div><div class="picker-switch" data-action="changeCalendarView" date-container-days="October 24" title="Select Month">October 24</div><div class="next" data-action="next" title="Next Month"><i class="fa-solid fa-chevron-right"></i></div></div><div class="date-container-decades" style="display: none;"><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div><div data-action="selectDecade"></div></div><div class="date-container-years" style="display: none;"><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div><div data-action="selectYear"></div></div><div class="date-container-months" style="display: none;"><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div><div data-action="selectMonth"></div></div><div class="date-container-days" style="display: grid;"><div class="dow no-highlight">Sun</div><div class="dow no-highlight">Mon</div><div class="dow no-highlight">Tue</div><div class="dow no-highlight">Wed</div><div class="dow no-highlight">Thu</div><div class="dow no-highlight">Fri</div><div class="dow no-highlight">Sat</div><div data-action="selectDay" class="day old weekend" data-value="2024-08-29" data-day="29">29</div><div data-action="selectDay" class="day old" data-value="2024-08-30" data-day="30">30</div><div data-action="selectDay" class="day" data-value="2024-09-01" data-day="1">1</div><div data-action="selectDay" class="day" data-value="2024-09-02" data-day="2">2</div><div data-action="selectDay" class="day" data-value="2024-09-03" data-day="3">3</div><div data-action="selectDay" class="day" data-value="2024-09-04" data-day="4">4</div><div data-action="selectDay" class="day weekend" data-value="2024-09-05" data-day="5">5</div><div data-action="selectDay" class="day weekend" data-value="2024-09-06" data-day="6">6</div><div data-action="selectDay" class="day" data-value="2024-09-07" data-day="7">7</div><div data-action="selectDay" class="day" data-value="2024-09-08" data-day="8">8</div><div data-action="selectDay" class="day" data-value="2024-09-09" data-day="9">9</div><div data-action="selectDay" class="day" data-value="2024-09-10" data-day="10">10</div><div data-action="selectDay" class="day" data-value="2024-09-11" data-day="11">11</div><div data-action="selectDay" class="day weekend" data-value="2024-09-12" data-day="12">12</div><div data-action="selectDay" class="day weekend" data-value="2024-09-13" data-day="13">13</div><div data-action="selectDay" class="day" data-value="2024-09-14" data-day="14">14</div><div data-action="selectDay" class="day" data-value="2024-09-15" data-day="15">15</div><div data-action="selectDay" class="day active today" data-value="2024-09-16" data-day="16">16</div><div data-action="selectDay" class="day" data-value="2024-09-17" data-day="17">17</div><div data-action="selectDay" class="day" data-value="2024-09-18" data-day="18">18</div><div data-action="selectDay" class="day weekend" data-value="2024-09-19" data-day="19">19</div><div data-action="selectDay" class="day weekend" data-value="2024-09-20" data-day="20">20</div><div data-action="selectDay" class="day" data-value="2024-09-21" data-day="21">21</div><div data-action="selectDay" class="day" data-value="2024-09-22" data-day="22">22</div><div data-action="selectDay" class="day" data-value="2024-09-23" data-day="23">23</div><div data-action="selectDay" class="day" data-value="2024-09-24" data-day="24">24</div><div data-action="selectDay" class="day" data-value="2024-09-25" data-day="25">25</div><div data-action="selectDay" class="day weekend" data-value="2024-09-26" data-day="26">26</div><div data-action="selectDay" class="day weekend" data-value="2024-09-27" data-day="27">27</div><div data-action="selectDay" class="day" data-value="2024-09-28" data-day="28">28</div><div data-action="selectDay" class="day" data-value="2024-09-29" data-day="29">29</div><div data-action="selectDay" class="day" data-value="2024-09-30" data-day="30">30</div><div data-action="selectDay" class="day" data-value="2024-09-31" data-day="31">31</div><div data-action="selectDay" class="day new" data-value="2024-10-01" data-day="1">1</div><div data-action="selectDay" class="day new weekend" data-value="2024-10-02" data-day="2">2</div><div data-action="selectDay" class="day new weekend" data-value="2024-10-03" data-day="3">3</div><div data-action="selectDay" class="day new" data-value="2024-10-04" data-day="4">4</div><div data-action="selectDay" class="day new" data-value="2024-10-05" data-day="5">5</div><div data-action="selectDay" class="day new" data-value="2024-10-06" data-day="6">6</div><div data-action="selectDay" class="day new" data-value="2024-10-07" data-day="7">7</div><div data-action="selectDay" class="day new" data-value="2024-10-08" data-day="8">8</div><div data-action="selectDay" class="day new weekend" data-value="2024-10-09" data-day="9">9</div></div></div><div class="toolbar"></div><div class="arrow" data-popper-arrow=""></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 d-none d-xl-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Weekly sales</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="chartjs-dashboard-pie" width="421" height="187" style="display: block; height: 150px; width: 337px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th class="text-end">Revenue</th>
                                        <th class="text-end">Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><i class="fas fa-square-full text-primary"></i> Direct</td>
                                        <td class="text-end">$ 2602</td>
                                        <td class="text-end text-success">+43%</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-square-full text-warning"></i> Affiliate</td>
                                        <td class="text-end">$ 1253</td>
                                        <td class="text-end text-success">+13%</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-square-full text-danger"></i> E-mail</td>
                                        <td class="text-end">$ 541</td>
                                        <td class="text-end text-success">+24%</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-square-full text-dark"></i> Other</td>
                                        <td class="text-end">$ 1465</td>
                                        <td class="text-end text-success">+11%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Appointments</h5>
                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                <li class="timeline-item">
                                    <strong>Chat with Carl and Ashley</strong>
                                    <span class="float-end text-muted text-sm">30m ago</span>
                                    <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>The big launch</strong>
                                    <span class="float-end text-muted text-sm">2h ago</span>
                                    <p>Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum
                                        nunc...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Coffee break</strong>
                                    <span class="float-end text-muted text-sm">3h ago</span>
                                    <p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada...</p>
                                </li>
                                <li class="timeline-item">
                                    <strong>Chat with team</strong>
                                    <span class="float-end text-muted text-sm">30m ago</span>
                                    <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum...</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card flex-fill">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown position-relative">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="more-horizontal" class="lucide lucide-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Latest Projects</h5>
                </div>
                <table class="table table-borderless my-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xxl-table-cell">Company</th>
                        <th class="d-none d-xl-table-cell">Author</th>
                        <th>Status</th>
                        <th class="d-none d-xl-table-cell text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-body-tertiary rounded-2">
                                        <img class="p-2" src="/assets/dashboard/img/brand-1.svg">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <strong>Project Apollo</strong>
                                    <div class="text-muted">
                                        Web, UI/UX Design
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xxl-table-cell">
                            <strong>Gantos</strong>
                            <div class="text-muted">
                                Real Estate
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">
                            <strong>Carl Jenkins</strong>
                            <div class="text-muted">
                                HTML, JS, React
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100">
                                <span class="me-2 mb-1 text-muted">65%</span>
                                <div class="progress progress-sm w-100">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell text-end">
                            <a href="#" class="btn btn-light">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-body-tertiary rounded-2">
                                        <img class="p-2" src="/assets/dashboard/img/brand-2.svg">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <strong>Project Bongo</strong>
                                    <div class="text-muted">
                                        Web
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xxl-table-cell">
                            <strong>Adray Transportation</strong>
                            <div class="text-muted">
                                Transportation
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">
                            <strong>Bertha Martin</strong>
                            <div class="text-muted">
                                HTML, JS, Vue
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100">
                                <span class="me-2 mb-1 text-muted">33%</span>
                                <div class="progress progress-sm w-100">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 33%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell text-end">
                            <a href="#" class="btn btn-light">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-body-tertiary rounded-2">
                                        <img class="p-2" src="/assets/dashboard/img/brand-3.svg">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <strong>Project Canary</strong>
                                    <div class="text-muted">
                                        Web, UI/UX Design
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xxl-table-cell">
                            <strong>Evans</strong>
                            <div class="text-muted">
                                Insurance
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">
                            <strong>Stacie Hall</strong>
                            <div class="text-muted">
                                HTML, JS, Laravel
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100">
                                <span class="me-2 mb-1 text-muted">50%</span>
                                <div class="progress progress-sm w-100">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell text-end">
                            <a href="#" class="btn btn-light">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-body-tertiary rounded-2">
                                        <img class="p-2" src="/assets/dashboard/img/brand-4.svg">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <strong>Project Edison</strong>
                                    <div class="text-muted">
                                        UI/UX Design
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xxl-table-cell">
                            <strong>Monsource Investment Group</strong>
                            <div class="text-muted">
                                Finance
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">
                            <strong>Carl Jenkins</strong>
                            <div class="text-muted">
                                HTML, JS, React
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100">
                                <span class="me-2 mb-1 text-muted">80%</span>
                                <div class="progress progress-sm w-100">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell text-end">
                            <a href="#" class="btn btn-light">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-body-tertiary rounded-2">
                                        <img class="p-2" src="/assets/dashboard/img/brand-5.svg">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <strong>Project Indigo</strong>
                                    <div class="text-muted">
                                        Web, UI/UX Design
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xxl-table-cell">
                            <strong>Edwards</strong>
                            <div class="text-muted">
                                Retail
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell">
                            <strong>Ashley Briggs</strong>
                            <div class="text-muted">
                                HTML, JS, Vue
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100">
                                <span class="me-2 mb-1 text-muted">78%</span>
                                <div class="progress progress-sm w-100">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 78%;"></div>
                                </div>
                            </div>
                        </td>
                        <td class="d-none d-xl-table-cell text-end">
                            <a href="#" class="btn btn-light">View</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </layout>
</template>



<script setup>
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';

    import { Head } from '@inertiajs/inertia-vue3';
    import { eventBus } from "@/../events.js";
    import layout from "@/DashboardLayout/Layout2.vue";
    import DashboardCssComponent from "@/DashboardLayout/DashboardCss.vue";

    import { onMounted, nextTick } from 'vue';



    onMounted(async () => {
        try {
            // Ensure DOM is updated
            await nextTick();


            // Initialize DataTables
            const dataTableElement = document.getElementById("datatables-dashboard-projects");
            if (dataTableElement) {
                $("#datatables-dashboard-projects").DataTable({
                    destroy: true,
                    pageLength: 6,
                    lengthChange: false,
                    bFilter: false,
                    autoWidth: false
                });
            }

        } catch (error) {
            console.error("Error during initialization:", error);
            toast.error("Failed to load charts or scripts.");
        }
    });
</script>


<style scoped>

</style>
