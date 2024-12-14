<template>
    <nav class="navbar navbar-expand navbar-bg">
        <a  @click="sideBarToggleFn"  class="cursor-pointer sidebar-toggle">
             <i class="hamburger align-self-center"></i>
        </a>

        <form class="d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search projects…"
                    aria-label="Search"
                />
                <button class="btn" type="button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        data-lucide="search"
                        class="lucide lucide-search align-middle"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
            </div>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item px-2 dropdown d-none d-sm-inline-block">
                <a
                    class="nav-link dropdown-toggle"
                    href="https://appstack.bootlab.io/forms-layouts#"
                    id="servicesDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Mega menu
                </a>
                <div
                    class="dropdown-menu dropdown-menu-start dropdown-mega"
                    aria-labelledby="servicesDropdown"
                    bis_skin_checked="1"
                >
                    <div
                        class="d-md-flex align-items-start justify-content-start"
                    >
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">UI Elements</div>
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Alerts</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Buttons</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Cards</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Carousel</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >General</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Grid</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Modals</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Tabs</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Typography</a
                            >
                        </div>
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">Forms</div>
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Layouts</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Basic Inputs</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Input Groups</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Advanced Inputs</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Editors</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Validation</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Wizard</a
                            >
                        </div>
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">Tables</div>
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Basic Tables</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Responsive Table</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Table with Buttons</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Column Search</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Muulti Selection</a
                            >
                            <a
                                class="dropdown-item"
                                href="https://appstack.bootlab.io/forms-layouts#"
                                >Ajax Sourced Data</a
                            >
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a
                        class="nav-icon dropdown-toggle"
                        href="https://appstack.bootlab.io/forms-layouts#"
                        id="messagesDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <div class="position-relative">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="message-circle"
                                class="lucide lucide-message-circle align-middle text-body"
                            >
                                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                            </svg>
                            <span class="indicator">4</span>
                        </div>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                        aria-labelledby="messagesDropdown"
                    >
                        <div class="dropdown-menu-header">
                            <div class="position-relative">4 New Messages</div>
                        </div>
                        <div class="list-group">
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img
                                            src="/assets/dashboard/img/avatar-5.jpg"
                                            class="img-fluid rounded-circle"
                                            alt="Ashley Briggs"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div>Ashley Briggs</div>
                                        <div class="text-muted small mt-1">
                                            Nam pretium turpis et arcu. Duis
                                            arcu tortor.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            15m ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img
                                            src="/assets/dashboard/img/avatar-2.jpg"
                                            class="img-fluid rounded-circle"
                                            alt="Carl Jenkins"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div>Carl Jenkins</div>
                                        <div class="text-muted small mt-1">
                                            Curabitur ligula sapien euismod
                                            vitae.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            2h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img
                                            src="/assets/dashboard/img/avatar-4.jpg"
                                            class="img-fluid rounded-circle"
                                            alt="Stacie Hall"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div>Stacie Hall</div>
                                        <div class="text-muted small mt-1">
                                            Pellentesque auctor neque nec urna.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            4h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img
                                            src="/assets/dashboard/img/avatar-3.jpg"
                                            class="img-fluid rounded-circle"
                                            alt="Bertha Martin"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div>Bertha Martin</div>
                                        <div class="text-muted small mt-1">
                                            Aenean tellus metus, bibendum sed,
                                            posuere ac, mattis non.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            5h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="text-muted"
                                >Show all messages</a
                            >
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-icon dropdown-toggle"
                        href="https://appstack.bootlab.io/forms-layouts#"
                        id="alertsDropdown"
                        data-bs-toggle="dropdown"
                    >
                        <div class="position-relative">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="bell-off"
                                class="lucide lucide-bell-off align-middle text-body"
                            >
                                <path
                                    d="M8.7 3A6 6 0 0 1 18 8a21.3 21.3 0 0 0 .6 5"
                                ></path>
                                <path
                                    d="M17 17H3s3-2 3-9a4.67 4.67 0 0 1 .3-1.7"
                                ></path>
                                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                <path d="m2 2 20 20"></path>
                            </svg>
                        </div>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                        aria-labelledby="alertsDropdown"
                    >
                        <div class="dropdown-menu-header">
                            4 New Notifications
                        </div>
                        <div class="list-group">
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            data-lucide="alert-circle"
                                            class="lucide lucide-alert-circle text-danger"
                                        >
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="10"
                                            ></circle>
                                            <line
                                                x1="12"
                                                x2="12"
                                                y1="8"
                                                y2="12"
                                            ></line>
                                            <line
                                                x1="12"
                                                x2="12.01"
                                                y1="16"
                                                y2="16"
                                            ></line>
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <div>Update completed</div>
                                        <div class="text-muted small mt-1">
                                            Restart server 12 to complete the
                                            update.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            2h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            data-lucide="bell"
                                            class="lucide lucide-bell text-warning"
                                        >
                                            <path
                                                d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"
                                            ></path>
                                            <path
                                                d="M10.3 21a1.94 1.94 0 0 0 3.4 0"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <div>Lorem ipsum</div>
                                        <div class="text-muted small mt-1">
                                            Aliquam ex eros, imperdiet vulputate
                                            hendrerit et.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            6h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            data-lucide="home"
                                            class="lucide lucide-home text-primary"
                                        >
                                            <path
                                                d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"
                                            ></path>
                                            <polyline
                                                points="9 22 9 12 15 12 15 22"
                                            ></polyline>
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <div>Login from 192.186.1.1</div>
                                        <div class="text-muted small mt-1">
                                            8h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="list-group-item"
                            >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            data-lucide="user-plus"
                                            class="lucide lucide-user-plus text-success"
                                        >
                                            <path
                                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                            ></path>
                                            <circle
                                                cx="9"
                                                cy="7"
                                                r="4"
                                            ></circle>
                                            <line
                                                x1="19"
                                                x2="19"
                                                y1="8"
                                                y2="14"
                                            ></line>
                                            <line
                                                x1="22"
                                                x2="16"
                                                y1="11"
                                                y2="11"
                                            ></line>
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <div>New connection</div>
                                        <div class="text-muted small mt-1">
                                            Anna accepted your request.
                                        </div>
                                        <div class="text-muted small mt-1">
                                            12h ago
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a
                                href="https://appstack.bootlab.io/forms-layouts#"
                                class="text-muted"
                                >Show all notifications</a
                            >
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-theme-toggle dropdown">
                    <a
                        class="nav-icon js-theme-toggle"
                        href="https://appstack.bootlab.io/forms-layouts#"
                    >
                        <div class="position-relative">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="sun"
                                class="lucide lucide-sun align-middle text-body nav-theme-toggle-light"
                            >
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="moon"
                                class="lucide lucide-moon align-middle text-body nav-theme-toggle-dark"
                            >
                                <path
                                    d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"
                                ></path>
                            </svg>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-flag dropdown-toggle"
                        href="https://appstack.bootlab.io/forms-layouts#"
                        id="languageDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img src="/assets/dashboard/img/us.png" alt="English" />
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="languageDropdown"
                        bis_skin_checked="1"
                    >
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                        >
                            <img
                                src="/assets/dashboard/img/us.png"
                                alt="English"
                                width="20"
                                class="align-middle me-1"
                            />
                            <span class="align-middle">English</span>
                        </a>
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                        >
                            <img
                                src="/assets/dashboard/img/es.png"
                                alt="Spanish"
                                width="20"
                                class="align-middle me-1"
                            />
                            <span class="align-middle">Spanish</span>
                        </a>
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                        >
                            <img
                                src="/assets/dashboard/img/de.png"
                                alt="German"
                                width="20"
                                class="align-middle me-1"
                            />
                            <span class="align-middle">German</span>
                        </a>
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                        >
                            <img
                                src="/assets/dashboard/img/nl.png"
                                alt="Dutch"
                                width="20"
                                class="align-middle me-1"
                            />
                            <span class="align-middle">Dutch</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-icon dropdown-toggle d-inline-block d-sm-none"
                        href="https://appstack.bootlab.io/forms-layouts#"
                        data-bs-toggle="dropdown"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            data-lucide="settings"
                            class="lucide lucide-settings align-middle"
                        >
                            <path
                                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"
                            ></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>

                    <a
                        class="nav-link dropdown-toggle d-none d-sm-inline-block"
                        href="https://appstack.bootlab.io/forms-layouts#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="/assets/dashboard/img/avatar.jpg"
                            class="img-fluid rounded-circle me-1 mt-n2 mb-n2"
                            alt="Chris Wood"
                            width="40"
                            height="40"
                        />
                        <span>Chris Wood</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/pages-profile"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="user"
                                class="lucide lucide-user align-middle me-1"
                            >
                                <path
                                    d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"
                                ></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Profile</a
                        >
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                data-lucide="pie-chart"
                                class="lucide lucide-pie-chart align-middle me-1"
                            >
                                <path
                                    d="M21.21 15.89A10 10 0 1 1 8 2.83"
                                ></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                            Analytics</a
                        >
                        <div class="dropdown-divider"></div>
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/pages-settings"
                            >Settings &amp; Privacy</a
                        >
                        <a
                            class="dropdown-item"
                            href="https://appstack.bootlab.io/forms-layouts#"
                            >Help</a
                        >
                        <a @click='logout' class="dropdown-item">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script setup>
    import { ref } from 'vue'
    import { eventBus } from "@/../events.js";
    const isCollapsed = ref(false);

    function sideBarToggleFn(){
        isCollapsed.value = !isCollapsed.value;
        eventBus.$emit('sideBar',isCollapsed.value)
    }

</script>
