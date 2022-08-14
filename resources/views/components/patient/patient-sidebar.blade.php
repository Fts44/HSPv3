
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">

        <li class="nav-item">
            <a class="nav-link collapsed" href="" id="sidebar_message">
                <i class="bi bi-columns-gap"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('patient/message') }}" id="sidebar_message">
                <i class="bi bi-chat"></i>
                <span>Message</span>
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="" id="sidebar_dashboard">
                <i class="bi bi-calendar4-week"></i>
                <span>Appointment</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('PatientDocuments') }}" id="sidebar_dashboard">
                <i class="bi bi-filetype-doc"></i>
                <span>Documents</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="sidebar_user_information"  data-bs-target="#user-nav" data-bs-toggle="collapse" >
                <i class="bi bi-person"></i>
                <span>Profile</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('PatientProfile') }}">
                        <i class="bi bi-circle"></i><span>Personal Details</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('PatientEmergencyContact') }}">
                        <i class="bi bi-circle"></i><span>Emergency Contact</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('PatientMedicalHistory') }}">
                        <i class="bi bi-circle"></i><span>Medical History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('PatientFamilyDetails') }}">
                        <i class="bi bi-circle"></i><span>Family Details</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('PatientPassword') }}">
                        <i class="bi bi-circle"></i><span>Update Password</span>
                    </a>
                </li>
            </ul>
        </li>
    </li>

</ul>

</aside>