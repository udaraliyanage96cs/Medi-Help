<ul class="navbar-nav">
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Home') active bg-gradient-primary @endif "
            href="/home"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Staff' || Request::is('*/staff/*')) active bg-gradient-primary @endif "
            href="/admin/staff"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">person_pin</i>
            </div>
            <span class="nav-link-text ms-1">Staff</span>
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Patient' || Request::is('*/patient/*')) active bg-gradient-primary @endif "
            href="/{{Auth()->user()->role}}/patient"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">accessible_forward</i>
            </div>
            <span class="nav-link-text ms-1">Patient</span>
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Ticket' || Request::is('*/ticket/*')) active bg-gradient-primary @endif "
            href="/{{Auth()->user()->role}}/ticket"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">confirmation_number</i>
            </div>
            <span class="nav-link-text ms-1">Ticket</span>
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Channels' || Request::is('*/channels/*')) active bg-gradient-primary @endif "
            href="/{{Auth()->user()->role}}/channels"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">medical_services</i>
            </div>
            <span class="nav-link-text ms-1">Channels</span>
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link text-white @if($page == 'Recipts' || Request::is('*/recipts/*')) active bg-gradient-primary @endif "
            href="/{{Auth()->user()->role}}/recipts"
        >
            <div
                class="
                    text-white text-center
                    me-2
                    d-flex
                    align-items-center
                    justify-content-center
                "
            >
                <i class="material-icons opacity-10">playlist_add_check</i>
            </div>
            <span class="nav-link-text ms-1">Recipts</span>
        </a>
    </li>
</ul>
