document.addEventListener("DOMContentLoaded", function () {
    const btnBuscar = document.getElementById("btn_buscar_cliente");
    const resultadoDiv = document.getElementById("resultados_clientes");

    btnBuscar.addEventListener("click", async () => {
        const id = document.getElementById("filtro_id").value.trim();
        const nombre = document.getElementById("filtro_nombre").value.trim();
        const email = document.getElementById("filtro_email").value.trim();
        const celular = document.getElementById("filtro_celular").value.trim();

        resultadoDiv.innerHTML = "Buscando...";

        try {
            const resp = await fetch("/dashboard/buscarCliente", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id=${encodeURIComponent(id)}&nombre=${encodeURIComponent(nombre)}&email=${encodeURIComponent(email)}&celular=${encodeURIComponent(celular)}`
            });

            const data = await resp.json();

            if (data.error) {
                resultadoDiv.innerHTML = `<p style="color:red;">${data.error}</p>`;
                return;
            }

            if (data.length === 0) {
                resultadoDiv.innerHTML = "<p>No se encontraron clientes.</p>";
                return;
            }

            // Mostrar lista de resultados
            resultadoDiv.innerHTML = "";
            data.forEach(cliente => {
                const div = document.createElement("div");
                div.classList.add("cliente-item");
                div.style.cursor = "pointer";
                div.style.border = "1px solid #ccc";
                div.style.padding = "5px";
                div.style.margin = "3px 0";
                div.textContent = `${cliente.id} | ${cliente.nombre} | ${cliente.email} | ${cliente.celular}`;
                
                div.addEventListener("click", () => {
                    // Llenar formulario principal
                    document.getElementById("id").value = cliente.id; // <--- aquí guardamos el ID
                    document.getElementById("nombre").value = cliente.nombre;
                    document.getElementById("nacimiento").value = cliente.nacimiento || "";
                    document.getElementById("c_nacimiento").value = cliente.c_nacimiento || "";
                    document.getElementById("civil").value = cliente.civil || "";
                    document.getElementById("cedula").value = cliente.cedula || "";
                    document.getElementById("expedicion").value = cliente.expedicion || "";
                    document.getElementById("lugarexp").value = cliente.lugarexp || "";
                    document.getElementById("celular").value = cliente.celular || "";
                    document.getElementById("email").value = cliente.email || "";
                    document.getElementById("ciudad").value = cliente.ciudad || "";
                    document.getElementById("direccion").value = cliente.direccion || "";
                    document.getElementById("nacionalidad").value = cliente.nacionalidad || "";
                    
                    resultadoDiv.innerHTML = ""; // limpiar lista de resultados
                });

                resultadoDiv.appendChild(div);
            });
        } catch (e) {
            console.error(e);
            resultadoDiv.innerHTML = `<p style="color:red;">Error al buscar clientes.</p>`;
        }
    });
});

