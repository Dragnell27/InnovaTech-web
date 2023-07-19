const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
console.log(departamento);
document.getElementById("perfilPais").addEventListener("change", (e) => {
    fetch(departamento, {
        method : 'POST',
        body: JSON.stringify({"texto" : e.target.value}),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
        }

    }).then(response => {
        return response.json();
    }).then(data => {
        var opciones = '<option value="">-- Seleccionar --</option>';
        for (let i in data.datos) {
            opciones += `<option value="${data.datos[i].id}">${data.datos[i].departamento}</option>`;
        }
        document.getElementById("perfilDepartamento").innerHTML = opciones;
        document.getElementById("perfilMunicipio").innerHTML = '<option value="">-- Seleccionar --</option>';
    }).catch(error => console.error(error));
});

document.getElementById("perfilDepartamento").addEventListener("change", (e) => {
    fetch(municipios, {
        method : 'POST',
        body: JSON.stringify({"texto" : e.target.value}),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
        }

    }).then(response => {
        return response.json();
    }).then(data => {
        var opciones = '<option value="">-- Seleccionar --</option>';
        for (let i in data.muni) {
            opciones += `<option value="${data.muni[i].id}">${data.muni[i].municipio}</option>`;
        }
        document.getElementById("perfilMunicipio").innerHTML = opciones;
    }).catch(error => console.error(error));
});