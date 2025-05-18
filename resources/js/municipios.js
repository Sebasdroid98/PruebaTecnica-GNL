document.addEventListener('DOMContentLoaded', function () {
    const departamentoSelect = document.getElementById('departamento');
    const municipioSelect = document.getElementById('municipio');

    departamentoSelect.addEventListener('change', function () {
        const departamentoId = this.value;

        axios.get(`/municipios/${departamentoId}`)
            .then(response => {
                municipioSelect.innerHTML = '<option value="" disabled selected>Seleccione</option>';
                response.data.forEach(municipio => {
                    municipioSelect.innerHTML += `<option value="${municipio.id}">${municipio.nombre}</option>`;
                });
            })
            .catch(error => {
                console.error('Error al cargar los municipios:', error);
            });
    });
});
