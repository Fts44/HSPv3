<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('AdminDashboard') }}" id="sidebar_dashboard">
                    <i class="bi bi-columns-gap"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" id="sidebar_transaciton" data-bs-target="#transaction-nav" data-bs-toggle="collapse" >
                    <i class="bi bi-clock"></i>
                    <span>Transaction</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="transaction-nav" class="nav-content collapse" data-bs-parent="#transaction-nav">
                    <li>
                        <a href="{{ route('AdminTransactionToday') }}">
                            <i class="bi bi-circle"></i><span>Today</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>View All</span>
                        </a>
                    </li> 
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Attendance Codes</span>
                        </a>
                    </li>      
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" id="sidebar_accounts" data-bs-target="#accounts-nav" data-bs-toggle="collapse" >
                    <i class="bi bi-people"></i>
                    <span>Accounts</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accounts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
            <a class="nav-link collapsed" href="#" id="sidebar_inventory" data-bs-target="#inventory-nav" data-bs-toggle="collapse" >
                <i class="bi bi-boxes"></i>
                <span>Inventory</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inventory-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                
                <li>
                    <a href="{{ route('AdminInventoryEquipmentAll') }}">
                        <i class="bi bi-circle"></i><span>Equipment</span>
                    </a>
                </li>      
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Medicine</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="sidebar_reports" data-bs-target="#reports-nav" data-bs-toggle="collapse" >
                <i class="bi bi-files-alt"></i>
                <span>Reports</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('AdminReportEquipment') }}">
                        <i class="bi bi-circle"></i><span>Inventory Equipment</span>
                    </a>
                </li>  
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Inventory Medicine</span>
                    </a>
                </li>     
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="sidebar_configuration" data-bs-target="#configuration-nav" data-bs-toggle="collapse" >
                <i class="bi bi-gear"></i>
                <span>Configuration</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="configuration-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('AdminConfigurationEquipmentItem') }}">
                        <i class="bi bi-circle"></i><span>Inventory Equipment</span>
                    </a>
                </li>  
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Inventory Medicine</span>
                    </a>
                </li>     
            </ul>
        </li>
    </ul>

</aside>