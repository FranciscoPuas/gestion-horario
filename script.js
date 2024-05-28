document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('formCrearUsuario').addEventListener('submit', crearUsuario);
    document.getElementById('formCrearActividad').addEventListener('submit', crearActividad);
    document.getElementById('formAsignarActividad').addEventListener('submit', asignarActividad);
    document.getElementById('formCrearRecordatorio').addEventListener('submit', crearRecordatorio);
    cargarUsuariosYActividades();
    cargarHorarios();
});

const crearUsuario = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('crear_usuario.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
    event.target.reset();
    cargarUsuariosYActividades();
};

const crearActividad = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('crear_actividad.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
    event.target.reset();
    cargarUsuariosYActividades();
};

const asignarActividad = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('asignar_actividad.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
    event.target.reset();
    cargarHorarios();
};

const crearRecordatorio = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('crear_recordatorio.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
    event.target.reset();
    cargarHorarios();
};

const cargarUsuariosYActividades = async () => {
    const response = await fetch('obtener_usuarios_y_actividades.php');
    const data = await response.json();

    const selectUsuario = document.getElementById('selectUsuario');
    const selectActividad = document.getElementById('selectActividad');

    selectUsuario.innerHTML = '<option value="">Seleccione Usuario</option>';
    selectActividad.innerHTML = '<option value="">Seleccione Actividad</option>';

    data.usuarios.forEach(usuario => {
        const option = document.createElement('option');
        option.value = usuario.id;
        option.textContent = usuario.nombre;
        selectUsuario.appendChild(option);
    });

    data.actividades.forEach(actividad => {
        const option = document.createElement('option');
        option.value = actividad.id;
        option.textContent = actividad.nombre;
        selectActividad.appendChild(option);
    });
};

const cargarHorarios = async () => {
    const response = await fetch('ver_horarios.php');
    const result = await response.text();
    document.getElementById('horarios').innerHTML = result;
};
