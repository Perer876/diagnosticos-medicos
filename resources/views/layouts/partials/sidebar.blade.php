<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">
    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill" />
    <x-maz-sidebar-item name="Usuarios" :link="route('users.index')" icon="bi bi-people" />
    <x-maz-sidebar-item name="Sintomas" :link="route('sintomas.index')" icon="bi bi-clipboard2-heart" />
    <x-maz-sidebar-item name="Signos" :link="route('signos.index')" icon="bi bi-clipboard2-pulse" />
    <x-maz-sidebar-item name="Pacientes" :link="route('pacientes.index')" icon="bi bi-heart-pulse" />
    <x-maz-sidebar-item name="Especialidades" :link="route('especialidades.index')" icon="bi bi-file-earmark-medical" />
    <x-maz-sidebar-item name="Pruebas Laboratorio" :link="route('pruebas_laboratorio.index')" icon="bi bi-journal-medical" />
    <x-maz-sidebar-item name="Pruebas Post Mortem" :link="route('pruebas_post_mortem.index')" icon="bi bi-journal-medical" />
    
</x-maz-sidebar>
