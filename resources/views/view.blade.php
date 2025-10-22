<x-layouts.app :title="'pagina de inicio'" :titlepage="'Inicio'">

    <div class="py-12">
        <x-input placeholder="Your name" />
        <x-button label="Emerald" emerald />
        
        <!-- Componente Livewire del modal -->
        <livewire:modal />
    </div>

</x-layouts.app>