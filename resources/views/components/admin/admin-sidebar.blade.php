<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link collapsed" href="" id="sidebar_message">
                    <i class="bi bi-columns-gap"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="" id="sidebar_message">
                    <i class="bi bi-filetype-doc"></i>
                    <span>Patient Uploads</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" id="sidebar_dashboard" data-bs-target="#user-nav" data-bs-toggle="collapse" >
                    <i class="bi bi-people"></i>
                    <span>Accounts</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('AdminUserPatient') }}">
                            <i class="bi bi-circle"></i><span>Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('AdminUserPersonnel') }}">
                            <i class="bi bi-circle"></i><span>Personnel</span>
                        </a>
                    </li>      
                </ul>
            </li>
            
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="sidebar_dashboard" data-bs-target="#inventory-nav" data-bs-toggle="collapse" >
                <i class="bi bi-boxes"></i>
                <span>Inventory</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inventory-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Medicine</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('AdminInventoryEquipment') }}">
                        <i class="bi bi-circle"></i><span>Equipment</span>
                    </a>
                </li>      
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="sidebar_dashboard" data-bs-target="#configuration-nav" data-bs-toggle="collapse" >
                <i class="bi bi-gear"></i>
                <span>Configuration</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="configuration-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Inventory Medicine</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('AdminConfigurationEquipmentName') }}">
                        <i class="bi bi-circle"></i><span>Inventory Equipment</span>
                    </a>
                </li>      
            </ul>
        </li>
    </ul>

</aside>