<div class="pagetitle mb-3">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb" style="--bs-breadcrumb-divider: '|';">
            <li class="breadcrumb-item {{ ($activeTitle=='Personal') ? 'active' : '' }}"><a href="{{ route('PatientProfile') }}">Personal</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='Emergency') ? 'active' : '' }}"><a href="{{ route('PatientEmergencyContact') }}">Emergency</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='MedicalHistory') ? 'active' : '' }}"><a href="{{ route('PatientMedicalHistory') }}">MedicalHistory</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='Family') ? 'active' : '' }}"><a href="{{ route('PatientFamilyDetails') }}">Family</a></li>
            <li class="breadcrumb-item {{ ($activeTitle=='AssessmentDiagnosis') ? 'active' : '' }}"><a href="{{ route('PatientAssessmentDiagnosis') }}">AssessmentDiagnosis</a></li>
        </ol>
    </nav>
</div>