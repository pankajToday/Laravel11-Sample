<template>
    <dashboard-css-component ></dashboard-css-component>


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Profile</h1>

        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="/assets/dashboard/img/avatars/avatar-4.jpg" alt="Stacie Hall" class="img-fluid rounded-circle mb-2" width="128" height="128">
                        <h5 class="card-title mb-0">Stacie Hall</h5>
                        <div class="text-muted mb-2">Lead Developer</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="message-square" class="lucide lucide-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Message</a>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <h5 class="h6 card-title">Skills</h5>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">HTML</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">JavaScript</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">Sass</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">Angular</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">Vue</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">React</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">Redux</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">UI</a>
                        <a href="#" class="badge badge-subtle-primary me-1 my-1">UX</a>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="home" class="lucide lucide-home lucide-sm me-1"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Lives in <a href="#">San Francisco, SA</a></li>

                            <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="briefcase" class="lucide lucide-briefcase lucide-sm me-1"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path><rect width="20" height="14" x="2" y="6" rx="2"></rect></svg> Works at <a href="#">GitHub</a></li>
                            <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="map-pin" class="lucide lucide-map-pin lucide-sm me-1"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg> From <a href="#">Boston</a></li>
                        </ul>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <h5 class="h6 card-title">Elsewhere</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span class="fas fa-globe fa-fw me-1"></span> <a href="#">staciehall.co</a></li>
                            <li class="mb-1"><span class="fab fa-twitter fa-fw me-1"></span> <a href="#">Twitter</a></li>
                            <li class="mb-1"><span class="fab fa-facebook fa-fw me-1"></span> <a href="#">Facebook</a></li>
                            <li class="mb-1"><span class="fab fa-instagram fa-fw me-1"></span> <a href="#">Instagram</a></li>
                            <li class="mb-1"><span class="fab fa-linkedin fa-fw me-1"></span> <a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
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
                        <h5 class="card-title mb-0">Activities</h5>
                    </div>
                    <div class="card-body h-100">

                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle me-2" alt="Ashley Briggs">
                            <div class="flex-grow-1">
                                <small class="float-end">5m ago</small>
                                <strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong><br>
                                <small class="text-muted">Today 7:51 pm</small><br>

                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Chris Wood">
                            <div class="flex-grow-1">
                                <small class="float-end">30m ago</small>
                                <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br>
                                <small class="text-muted">Today 7:21 pm</small>

                                <div class="border text-sm text-muted p-2 mt-1">
                                    Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                    pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
                                </div>

                                <a href="#" class="btn btn-sm btn-danger mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="heart" class="lucide lucide-heart lucide-sm"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg> Like</a>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Stacie Hall">
                            <div class="flex-grow-1">
                                <small class="float-end">1h ago</small>
                                <strong>Stacie Hall</strong> posted a new blog<br>

                                <small class="text-muted">Today 6:35 pm</small>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="Carl Jenkins">
                            <div class="flex-grow-1">
                                <small class="float-end">3h ago</small>
                                <strong>Carl Jenkins</strong> posted two photos on <strong>Stacie Hall</strong>'s timeline<br>
                                <small class="text-muted">Today 5:12 pm</small>

                                <div class="row g-0 mt-1">
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <img src="/assets/dashboard/img/photos/unsplash-1.jpg" class="img-fluid pe-2" alt="Unsplash">
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <img src="/assets/dashboard/img/photos/unsplash-2.jpg" class="img-fluid pe-2" alt="Unsplash">
                                    </div>
                                </div>

                                <a href="#" class="btn btn-sm btn-danger mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="heart" class="lucide lucide-heart lucide-sm"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg> Like</a>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="Carl Jenkins">
                            <div class="flex-grow-1">
                                <small class="float-end">1d ago</small>
                                <strong>Carl Jenkins</strong> started following <strong>Stacie Hall</strong><br>
                                <small class="text-muted">Yesterday 3:12 pm</small>

                                <div class="d-flex align-items-start mt-1">
                                    <a class="pe-3" href="#">
                                        <img src="/assets/dashboard/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Stacie Hall">
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="border text-sm text-muted p-2 mt-1">
                                            Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Stacie Hall">
                            <div class="flex-grow-1">
                                <small class="float-end">1d ago</small>
                                <strong>Stacie Hall</strong> posted a new blog<br>
                                <small class="text-muted">Yesterday 2:43 pm</small>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img src="/assets/dashboard/img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Chris Wood">
                            <div class="flex-grow-1">
                                <small class="float-end">1d ago</small>
                                <strong>Chris Wood</strong> started following <strong>Stacie Hall</strong><br>
                                <small class="text-muted">Yesterdag 1:51 pm</small>
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

    </div>
</template>

<script>
    import  DashboardCssComponent from "@/DashboardLayout/DashboardCss.vue";


    export default {
        name: "Profile1.vue",
        components:{DashboardCssComponent},
    }
</script>

<style scoped>

</style>a