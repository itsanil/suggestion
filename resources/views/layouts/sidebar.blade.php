
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>
        <li>
            <a href="{{url('home')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Dashboards</span>
            </a>
        </li>
        @role('SuperAdmin')
        <li>
            <a href="{{url('application')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Application</span>
            </a>
        </li>
        <li>
            <a href="{{url('plant')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Plant</span>
            </a>
        </li>
        <li>
            <a href="{{url('department')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Department</span>
            </a>
        </li>
        <li>
            <a href="{{url('type')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Type</span>
            </a>
        </li>
        <li>
            <a href="{{url('users')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Users</span>
            </a>
        </li>
        <li>
            <a href="{{url('score')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Score</span>
            </a>
        </li>

        @else
        <li>
            <a href="{{url('suggestion')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Suggestion</span>
            </a>
        </li>
        @endrole
    </ul>
</div>