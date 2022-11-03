<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Usuarios" :link="route('users.index')" icon="bi bi-people"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Sintomas" :link="route('sintomas.index')" icon="bi bi-clipboard2-pulse"></x-maz-sidebar-item>

</x-maz-sidebar>
