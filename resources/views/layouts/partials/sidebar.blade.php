<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-house-heart"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Usuarios" :link="route('users.index')" icon="bi bi-people"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Pacientes" :link="'/'" icon="bi bi-heart-pulse"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Especialidades" :link="'/'" icon="bi bi-file-medical"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Medicos" :link="'/'" icon="bi bi-person-workspace"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Citas" :link="'/'" icon="bi bi-calendar-heart"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Tratamientos" :link="'/'" icon="bi bi-capsule"></x-maz-sidebar-item>
</x-maz-sidebar>
