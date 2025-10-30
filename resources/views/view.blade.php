<x-layouts.app :title="'titulo'">

<!-- Botón para abrir el modal -->
<button class="btn btn-create" onclick="mi_modal_de_formulario.showModal()">Crear Item</button>

<!-- El modal -->
<dialog id="mi_modal_de_formulario" class="modal">
  <div class="modal-box">
    <!-- Botón para cerrar (X) -->
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    
    <h3 class="font-bold text-lg">Crear Nuevo Item</h3>
    
    <!-- Tu formulario -->
    <form id="miFormulario" class="form-control mt-4">
      <label class="label">
        <span class="label-text">Nombre del Item</span>
      </label>
      <input type="text" placeholder="Escribe aquí..." class="input input-bordered w-full input-info" required />
      
      <div class="modal-action">
        <button type="submit" class="btn btn-danger">Crear</button>
        <button type="button" class="btn btn-warning" onclick="mi_modal_de_formulario.close()">Cancelar</button>
      </div>
    </form>
  </div>
  
  <!-- Fondo del modal: Cierra al hacer clic fuera -->
  <form method="dialog" class="modal-backdrop">
    <button>cerrar</button>
  </form>
</dialog>

<script>
  // Manejar el envío del formulario
  document.getElementById('miFormulario').addEventListener('submit', function(evento) {
    evento.preventDefault(); // Evita el envío real para demostración
    
    // ... aquí tu lógica para crear el item (ej: enviar datos con Fetch API) ...
    
    // Cerrar el modal después de "crear"
    mi_modal_de_formulario.close();
  });
</script>

<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
    <table class="table table-baground">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr>
        <th>1</th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Blue</td>
        <td><div class="badge badge-status-active"><b>Active</b></div></td>
                <td>
          <button class="btn button-view">Ver</button>
          <button class="btn button-edit">Editar</button>
        </td>
      </tr>
      <!-- row 2 -->
      <tr>
        <th>2</th>
        <td>Hart Hagerty</td>
        <td>Desktop Support Technician</td>
        <td>Purple</td>
        <td><div class="badge badge-status-active"><b>Active</b></div></td>
                <td>
          <button class="btn button-view">Ver</button>
          <button class="btn button-edit">Editar</button>
        </td>
      </tr>
      <!-- row 3 -->
      <tr>
        <th>3</th>
        <td>Brice Swyre</td>
        <td>Tax Accountant</td>
        <td>Red</td>
        <td><div class="badge badge-status-inactive"><b>Inactivo</b></div></td>
        <td>
          <button class="btn button-view">Ver</button>
          <button class="btn button-edit">Editar</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</x-layouts.app>