<div class="pagetitle mb-1">
    <h1>Config Inventory Equipment</h1>
    <nav>
        <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
            <li class="breadcrumb-item {{ ($activeTitle=='item') ? 'active' : '' }}"><a href="{{ route('AdminConfigurationEquipmentItem') }}">Item</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='name') ? 'active' : '' }}"><a href="{{ route('AdminConfigurationEquipmentName') }}">Name</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='brand') ? 'active' : '' }}"><a href="{{ route('AdminConfigurationEquipmentBrand') }}">Brand</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='type') ? 'active' : '' }}"><a href="{{ route('AdminConfigurationEquipmentType') }}">Type</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='place') ? 'active' : '' }}"><a href="{{ route('AdminConfigurationEquipmentPlace') }}">Place</a></li>
        </ol>
    </nav>
</div>