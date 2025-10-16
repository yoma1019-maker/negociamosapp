document.addEventListener("DOMContentLoaded", function () {

        

// Devuelve string con formato COP: "$ 34.173.500,00"
        function formatCurrency(value) {
            if (value === null || value === undefined || value === "") return "";
            const num = Number(value);
            if (isNaN(num)) return "";
            return num.toLocaleString("es-CO", {
                style: "currency",
                currency: "COP",
                //minimumFractionDigits: 2
            });
        }

// Convierte un string con formato o un número a Number limpio.
// Acepta: "34.173.500,00", "$ 34.173.500,00", "34173500.00", 34173500
        function parseCurrency(value) {
            if (value === null || value === undefined || value === "") return 0;
            if (typeof value === "number") return value;
            // eliminar todo lo que no sea dígito, coma o punto y convertir coma decimal a punto
            const cleaned = value.toString().replace(/[^0-9,.-]/g, "").replace(/\.(?=\d{3}(?:[^\d]|$))/g, "");
            // The above removes thousands-dots; then replace comma with dot for decimals
            const normalized = cleaned.replace(/,/g,     ".");
            const parsed = parseFloat(normalized);
            return isNaN(parsed) ? 0 : parsed;
        }

// Formatea todos los inputs con class="moneda" (útil después de asignar desde BD)
        function applyCurrencyFormatToAllMoneda() {
            document.querySelectorAll("input.moneda").forEach(input => {
                const numero = parseCurrency(input.value);
                input.value = numero ? formatCurrency(numero) : "";
            });
        }

        function setValorCampo(selector, valor) {
            const el = document.querySelector(selector);
            if (!el) return;
            if (el.classList.contains("moneda")) {
                // valor puede venir como número o string decimal limpio desde la BD
                el.value = valor !== undefined && valor !== null && valor !== "" ? formatCurrency(Number(valor)) : "";
            } else {
                el.value = valor ?? "";
            }
        }

// Función genérica para asignar valores
        function setVal(selector, value) {
            const el = document.querySelector(selector);
            if (el) el.value = value ?? "";
        }

        // ====== FIN Funciones de formato moneda ======

            // input boton buscar
            const btnBuscar = document.querySelector("#buscar");
            // Inputs relacionados con valor total y venta
            const valorTotalInput       = document.getElementById("valor_total");
            const descuentoInput        = document.getElementById("descuento");
            const valorVentaInput       = document.getElementById("valor_venta");
            // Inputs relacionados con pendiente inicial
            const cuotaInicialInput     = document.getElementById("cuota_inicial");
            const valorSeparacionInput  = document.getElementById("separacion");
            const pendienteInput        = document.getElementById("saldo_inicial");
            // Inputs relacionados con cuotas inicial
            const cuotasInput           = document.getElementById("numcuota_inicial");
            const porcenInput           = document.getElementById("porcen_inicial");
            const cuotaCampos = [
                document.getElementById("cuota1"),
                document.getElementById("cuota2"),
                document.getElementById("cuota3"),
                document.getElementById("cuota4"),
                document.getElementById("cuota5"),
                document.getElementById("cuota6"),
                document.getElementById("cuota7"),
                document.getElementById("cuota8"),
                document.getElementById("cuota9"),
                document.getElementById("cuota10"),
                document.getElementById("cuota11"),
                document.getElementById("cuota12")

            ];

            
            // Inputs relacionados con fecha de cuotas
            const fecha1Input = document.getElementById("fecha_cuota1");
            const fecha2Input = document.getElementById("fecha_cuota2");
            const fecha3Input = document.getElementById("fecha_cuota3");
            const fecha4Input = document.getElementById("fecha_cuota4");
            const fecha5Input = document.getElementById("fecha_cuota5");
            const fecha6Input = document.getElementById("fecha_cuota6");
            const fecha7Input = document.getElementById("fecha_cuota7");
            const fecha8Input = document.getElementById("fecha_cuota8");
            const fecha9Input = document.getElementById("fecha_cuota9");
            const fecha10Input = document.getElementById("fecha_cuota10");
            const fecha11Input = document.getElementById("fecha_cuota11");
            const fecha12Input = document.getElementById("fecha_cuota12");

            //const fechaPagoInput = document.getElementById("fecha_pago");
            // Inputs relacionado a calcular el valor restante
            const valorMenosCuotaInput = document.getElementById("valor_restante");
            // Inputs relacionado a calcular las cuotas del valor restante
            const cuotasRestanteInput  = document.getElementById("numcuota_restante");
            // Inputs relacionados con área y valor por m2
            const areamInput = document.getElementById("aream");
            const valorAreamInput = document.getElementById("valor_aream");

            // Inputs de cuotas restantes (1 hasta 48)
            const valorCuotasRestantesInputs = Array.from({ length: 48 }, (_, i) =>
            document.getElementById(`valor_cuotas_restante${i + 1}`)).filter(Boolean);

            // Inputs de fechas de cuotas restantes (1 a 48)
            const fechaCuotasRestantesInputs = Array.from({ length: 48 }, (_, i) =>
            document.getElementById(`fecha_pago${i + 1}`)
            );

            // Evento para actualizar fechas en cascada a partir de fecha_pago1
            const fechaPago1Input = document.getElementById("feccuota_restante");

            // inputs de cuotas extraordinarias
            const cuotasExtrasInputs = Array.from({ length: 6 }, (_, i) => ({
            valor: document.getElementById(`valor_extras${i + 1}`),
            fecha: document.getElementById(`fecha_extras${i + 1}`)
            }));

            const fechasModificadas = {};

// Actualiza fechas automáticas de cuotas restantes (respetando modificaciones manuales)
            function actualizarFechasAutomaticas() {
                    const fechaBaseStr = fechaCuotasRestantesInputs[0]?.value;
                    if (!fechaBaseStr) return;

                    const numCuotas = parseInt(cuotasRestanteInput?.value, 10) || 0;
                    if (numCuotas <= 0) return;

                    const [y, m, d] = fechaBaseStr.split("-").map(Number);
                    const fechaBase = new Date(y, m - 1, d, 12, 0, 0);

                    // empezamos en i = 1 (la 2ª cuota) y llegamos hasta numCuotas-1
                    for (let i = 1; i < numCuotas; i++) {
                        const input = fechaCuotasRestantesInputs[i];
                        if (!input) continue;
                        if (fechasModificadas[i]) continue; // no sobrescribir si fue modificada manualmente
                        const nuevaFecha = sumarMesesDiaFijo(fechaBase, i);
                        input.value = formatoInputDate(nuevaFecha);
                    }

                    // limpiar cualquier input por encima de numCuotas
                    for (let j = numCuotas; j < fechaCuotasRestantesInputs.length; j++) {
                        const inp = fechaCuotasRestantesInputs[j];
                        if (inp && !fechasModificadas[j]) inp.value = "";
                    }
            }

// Lógica de reparto entre agentes con bloqueo automático del 1er agente

            const agente1Select = document.getElementById("agente1_id");
            const agente2Select = document.getElementById("agente2_id");
            const agente3Select = document.getElementById("agente3_id");

            const porcentaje1Input = document.getElementById("porcentaje1");
            const porcentaje2Input = document.getElementById("porcentaje2");
            const porcentaje3Input = document.getElementById("porcentaje3");

            const valor1Input = document.getElementById("valorAgente1");
            const valor2Input = document.getElementById("valorAgente2");
            const valor3Input = document.getElementById("valorAgente3");

            const valorRestanteInput = document.getElementById("valor_restante");

            const inputInicial = document.getElementById("porcen_inicial");
            const inputRestante = document.getElementById("porcen_restante");


//actualizar cuotas segun la cantidad de agentes que realizan la 
            function normalizarPorcentaje(valor) {
                if (!valor) return 0;
                return parseFloat(valor.toString().replace(',', '.')) || 0;
            }

//codigo actualizar AGENTES

            let debounceTimer;

            function actualizarAgentes() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const valorRestante = parseCurrency(valorRestanteInput?.value) || 0;
                    if (valorRestante <= 0) {
                        valor1Input.value = valor2Input.value = valor3Input.value = "";
                        return;
                    }

                    const agente2Activo = agente2Select.value !== "";
                    const agente3Activo = agente3Select.value !== "";

                    let p1 = normalizarPorcentaje(porcentaje1Input.value);
                    let p2 = normalizarPorcentaje(porcentaje2Input.value);
                    let p3 = normalizarPorcentaje(porcentaje3Input.value);

                    // 🟩 Solo agente 1 → 100%
                    if (!agente2Activo && !agente3Activo) {
                        p1 = 100;
                        p2 = 0;
                        p3 = 0;
                        porcentaje1Input.readOnly = false;
                    }

                    // 🟦 Agente 2 activo → repartir entre 1 y 2
                    else if (agente2Activo && !agente3Activo) {
                        porcentaje1Input.readOnly = true;
                        if (p2 > 100) p2 = 100;
                        p1 = Math.max(0, 100 - p2);
                        p3 = 0;
                    }

                    // 🟨 Agente 2 y 3 activos → repartir entre los tres
                    else if (agente2Activo && agente3Activo) {
                        porcentaje1Input.readOnly = true;

                        if (p2 < 0) p2 = 0;
                        if (p3 < 0) p3 = 0;
                        if (p2 > 100) p2 = 100;
                        if (p3 > 100) p3 = 100;

                        const suma = p2 + p3;
                        p1 = (suma <= 100) ? (100 - suma) : 0;
                    }

                    // 🧮 Calcular valores en pesos
                    valor1Input.value = formatCurrency(valorRestante * (p1 / 100));
                    valor2Input.value = formatCurrency(valorRestante * (p2 / 100));
                    valor3Input.value = formatCurrency(valorRestante * (p3 / 100));

                    // Solo actualizar visualmente después del cálculo
                    porcentaje1Input.value = p1.toFixed(2);
                    porcentaje2Input.value = p2.toFixed(2);
                    porcentaje3Input.value = p3.toFixed(2);
                }, 400); // ⏱ Espera 400 ms después de dejar de tipear
            }

// 🎯 Escuchar cambios (solo al terminar de escribir)
            [
                agente1Select, agente2Select, agente3Select,
                porcentaje1Input, porcentaje2Input, porcentaje3Input,
                valorRestanteInput
            ].forEach(el => {
                if (!el) return;
                el.addEventListener("inputformulario", actualizarAgentes);
                el.addEventListener("change", actualizarAgentes);
            });

            // 🚀 Ejecutar una vez al cargar
            actualizarAgentes();

// Validación visual antes de enviar el formulario

            // 🚀 Ejecutar una vez al cargar
actualizarAgentes();


// 💡 Validación visual antes de enviar el formulario
        const formulario = document.querySelector("form"); // cambia si tu form tiene un ID, ej: #formularioVentas

        formulario.addEventListener("submit", function (e) {
            const agente1 = agente1Select.value.trim();

            // 🔹 eliminar mensajes previos
            const errorPrevio = agente1Select.parentElement.querySelector(".error-msg");
            if (errorPrevio) errorPrevio.remove();
            agente1Select.classList.remove("error-input");

            // 🔹 validación
            if (agente1 === "") {
                e.preventDefault(); // detener envío

                // agregar clase visual
                agente1Select.classList.add("error-input");

                // crear mensaje visual
                const mensaje = document.createElement("div");
                mensaje.className = "error-msg";
                mensaje.textContent = "Debes seleccionar al menos un agente principal.";

                // insertar debajo del select
                agente1Select.parentElement.appendChild(mensaje);

                // opcional: enfocar el campo
                agente1Select.focus();
                return false;
            }
        });


// Actualiza fechas automáticas de cuotas restantes (respetando modificaciones manuales)
            function actualizarFechasAutomaticas() {
                        const fechaBaseStr = fechaCuotasRestantesInputs[0]?.value;
                    if (!fechaBaseStr) return;

                    const numCuotas = parseInt(cuotasRestanteInput?.value, 10) || 0;
                    if (numCuotas <= 0) return;

                    const [y, m, d] = fechaBaseStr.split("-").map(Number);
                    const fechaBase = new Date(y, m - 1, d, 12, 0, 0);

                    // empezamos en i = 1 (la 2ª cuota) y llegamos hasta numCuotas-1
                    for (let i = 1; i < numCuotas; i++) {
                        const input = fechaCuotasRestantesInputs[i];
                        if (!input) continue;
                        if (fechasModificadas[i]) continue; // no sobrescribir si fue modificada manualmente
                        const nuevaFecha = sumarMesesDiaFijo(fechaBase, i);
                        input.value = formatoInputDate(nuevaFecha);
                    }

                    // limpiar cualquier input por encima de numCuotas
                    for (let j = numCuotas; j < fechaCuotasRestantesInputs.length; j++) {
                        const inp = fechaCuotasRestantesInputs[j];
                        if (inp && !fechasModificadas[j]) inp.value = "";
                    }

                    }

// Evento principal de cambio en fecha_pago1
        
        if (fechaPago1Input) {
            fechaPago1Input.addEventListener("change", () => {
                for (let i = 0; i < fechaCuotasRestantesInputs.length; i++) {
                    if (!fechasModificadas[i]) fechasModificadas[i] = false;
                }
                if (!fechaCuotasRestantesInputs[0]?.value) {
                    fechaCuotasRestantesInputs[0].value = fechaPago1Input.value;
                }
                // ✅ Solo actualiza fechas, no toca valores
                actualizarFechasAutomaticasSinRecalculo();
            });
        }

// Listener especial para la primera cuota restante (base en cascada)
        if (fechaCuotasRestantesInputs[0]) {
            fechaCuotasRestantesInputs[0].addEventListener("change", () => {
                // ⚠️ Esta se trata como BASE, no como modificada manual
                fechasModificadas[0] = false;
                 actualizarFechasAutomaticasSinRecalculo();
            });
        }

//Listeners para el resto de cuotas restantes (2, 3, 4, …)
        fechaCuotasRestantesInputs.forEach((input, i) => {
            if (!input) return;
            if (i === 0) return; // ya cubierto arriba
            input.addEventListener("change", () => {    
                // ⚠️ Estas sí se consideran manuales
                fechasModificadas[i] = true;
            });
        });


 // --- Funciones de cálculo encadenadas ---
        function actualizarValorVenta() {
            const valorTotal = parseCurrency(valorTotalInput?.value);
            const descuento  = parseCurrency(descuentoInput?.value);
            const valorVenta = valorTotal - descuento;

            // Mostrar formateado
            if (valorVentaInput) valorVentaInput.value = formatCurrency(valorVenta);

            // Calcular valor por m2 (valor_aream)
            const area = parseCurrency(areamInput?.value) || 0;
            if (valorAreamInput) {
                if (area > 0) {
                    const vM2 = valorVenta / area;
                    valorAreamInput.value = formatCurrency(vM2);
                } else {
                    valorAreamInput.value = "";
                }
            }

            // continuar encadenado
            actualizarCuotaInicial();
        }

// actualizar cuota inicial
        function actualizarCuotaInicial() {
            const valorVenta = parseCurrency(valorVentaInput?.value);
            const porcen     = parseFloat(porcenInput?.value) || 0;
            const cuotaInicial = valorVenta * (porcen / 100);

            if (cuotaInicialInput) cuotaInicialInput.value = formatCurrency(cuotaInicial);

            // encadenar
            actualizarPendienteInicial();
            actualizarValorMenosCuota();
        }

// actualizar valor restante (valor venta - cuota inicial)
        function actualizarValorMenosCuota() {
            const valorVenta = parseCurrency(valorVentaInput?.value);
            const cuotaInicial = parseCurrency(cuotaInicialInput?.value);
            const valorMenos = valorVenta - cuotaInicial;

            if (valorMenosCuotaInput) valorMenosCuotaInput.value = formatCurrency(valorMenos);

            // encadenar
            actualizarValorCuotasRestante();
        }

// INFORMACION PORCENTAJE RESTANTES

        function porcentajeRestante() {
            const porcen_inicial = parseCurrency(inputInicial?.value);
            const porcen_restante = 100 - porcen_inicial;

            if (inputRestante) inputRestante.value = porcen_restante.toFixed(2); // no formateamos con $ porque es un porcentaje

            // encadenar si lo necesitas
            actualizarValorCuotasRestante();
        }


        function actualizarValorCuotasRestante() {
            const valorMenos = parseCurrency(valorMenosCuotaInput?.value);
            const num = parseInt(cuotasRestanteInput?.value) || 0;

                // Limpiar todos los campos antes de asignar
                valorCuotasRestantesInputs.forEach(f => { if (f) f.value = ""; });

                if (num > 0 && valorMenos > 0) {
                    const valorCuota = valorMenos / num;

                valorCuotasRestantesInputs.forEach((f, i) => {
                         if (!f) return;
                         if (i < num) {
                             f.value = formatCurrency(valorCuota);
                        } else {
                                    f.value = "";
                         }
                            });
                        }

    }


// actualizar valor de la cuota inicial
        function actualizarPendienteInicial() {
            const cuotaInicial    = parseCurrency(cuotaInicialInput?.value);
            const valorSeparacion = parseCurrency(valorSeparacionInput?.value);
            const pendiente = cuotaInicial - valorSeparacion;

            if (pendienteInput) pendienteInput.value = formatCurrency(pendiente);

            // encadenar
            actualizarCuotas();         // llena cuota1..cuota4 según cuotas_inicial
            actualizarFechasCuotas();   // actualiza fechas según fecha1 y número de cuotas
        }


// actualizar numero de cuotas y valor de cada cuota
        function actualizarCuotas() {
            const pendiente = parseCurrency(pendienteInput?.value);
            const numCuotas = parseInt(cuotasInput?.value) || 0;

            if (numCuotas <= 0) {
                cuotaCampos.forEach(c => { if (c) c.value = ""; });
                return;
            }

            const valorCuota = pendiente / numCuotas;
            cuotaCampos.forEach((campo, i) => {
                if (!campo) return;
                if (i < numCuotas) campo.value = formatCurrency(valorCuota);
                else campo.value = "";
            });
        }

// Suma meses manteniendo el mismo día
        function sumarMesesDiaFijo(fecha, meses) {
            const dia = fecha.getDate();
            const mes = fecha.getMonth() + meses;
            const anio = fecha.getFullYear() + Math.floor(mes / 12);
            const mesFinal = mes % 12;

            // Último día del mes si el día original no existe
            const ultimoDiaMes = new Date(anio, mesFinal + 1, 0).getDate();
            const diaFinal = Math.min(dia, ultimoDiaMes);
            return new Date(anio, mesFinal, diaFinal);
        }

// mantiene formato de fecha YYYY-MM-DD
        function formatoInputDate(fecha) {
            const y = fecha.getUTCFullYear();
            const m = String(fecha.getUTCMonth() + 1).padStart(2, "0");
            const d = String(fecha.getUTCDate()).padStart(2, "0");
            return `${y}-${m}-${d}`;
        }

// Modificación de actualizarFechasCuotas para que respete edición manual
        function actualizarFechasCuotas() {
            const fecha1 = fecha1Input?.value;
            const numCuotas = parseInt(cuotasInput?.value) || 0;

            if (!fecha1 || numCuotas <= 0) {
                [fecha2Input, fecha3Input, fecha4Input, fecha5Input, fecha6Input, 
                fecha7Input, fecha8Input, fecha9Input, fecha10Input, fecha11Input, fecha12Input]
                .forEach(f => { if(f) f.value = ""; });
                 return;
                }

            const [year, month, day] = fecha1.split('-').map(Number);
            const fechaBase = new Date(year, month - 1, day);

                if (fecha2Input) fecha2Input.value = numCuotas >= 2 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 1)) : "";
                if (fecha3Input) fecha3Input.value = numCuotas >= 3 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 2)) : "";
                if (fecha4Input) fecha4Input.value = numCuotas >= 4 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 3)) : "";
                if (fecha5Input) fecha5Input.value = numCuotas >= 5 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 4)) : "";
                if (fecha6Input) fecha6Input.value = numCuotas >= 6 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 5)) : "";
                if (fecha7Input) fecha7Input.value = numCuotas >= 7 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 6)) : "";
                if (fecha8Input) fecha8Input.value = numCuotas >= 8 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 7)) : "";
                if (fecha9Input) fecha9Input.value = numCuotas >= 9 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 8)) : "";
                if (fecha10Input) fecha10Input.value = numCuotas >= 10 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 9)) : "";
                if (fecha11Input) fecha11Input.value = numCuotas >= 11 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 10)) : "";
                if (fecha12Input) fecha12Input.value = numCuotas >= 12 ? formatoInputDate(sumarMesesDiaFijo(fechaBase, 11)) : "";

                // Actualiza la primera fecha de cuotas restantes si aún no tiene valor
                if (fechaCuotasRestantesInputs[0] && !fechaCuotasRestantesInputs[0].value) {
                    const ultimaFecha = obtenerUltimaFechaCuotasInicial();
                    if (ultimaFecha) fechaCuotasRestantesInputs[0].value = formatoInputDate(sumarMesesDiaFijo(ultimaFecha, 1));
                }

                // Actualizar resto en cascada respetando manuales
                //actualizarFechasAutomaticasSinRecalculo();
                actualizarFechasAutomaticas();
        }

// Obtiene la última fecha definida en las cuotas iniciales
         function obtenerUltimaFechaCuotasInicial() {
                        const inputs = [fecha1Input, fecha2Input, fecha3Input, fecha4Input, fecha5Input, fecha6Input, fecha7Input, fecha8Input, fecha9Input, fecha10Input];
                        const fechas = inputs
                            .filter(f => f && f.value)
                            .map(f => {
                                const [y, m, d] = f.value.split('-').map(Number);
                                // crear fecha en local para evitar shifts por timezone
                                return new Date(y, m - 1, d);
                                // si quieres más robustez contra timezone, usar:
                                // return new Date(y, m - 1, d, 12, 0, 0);
                            });

                        return fechas.length ? fechas[fechas.length - 1] : null;
            }


// Actualizar cuotas restantes considerando extraordinarias y fechas modificadas
        function actualizarCuotasRestantes() {
                        const valorMenos = parseCurrency(valorMenosCuotaInput?.value);
                        const num = parseInt(cuotasRestanteInput?.value) || 0;

                        // limpiar valores (pero no tocamos fechas modificadas manualmente)
                        valorCuotasRestantesInputs.forEach(f => { if (f) f.value = ""; });

                        if (num <= 0 || valorMenos <= 0) return;

                        const fechaBaseStr = fechaCuotasRestantesInputs[0]?.value;
                        if (!fechaBaseStr) return;

                        const [y, m, d] = fechaBaseStr.split("-").map(Number);
                        const fechaBase = new Date(y, m - 1, d, 12, 0, 0);

                        // Calcula valor ordinario
                        let valorOrdinario = valorMenos / num;

                        // Aplica extraordinarias
                                const cuotasExtra = cuotasExtrasInputs
                                    .map(c => {
                                        const fecha = c.fecha?.value;
                                        const valor = parseCurrency(c.valor?.value);
                                        if (fecha && valor > 0) return { fecha: formatoInputDate(new Date(fecha)), valor };
                                        return null;
                                    })
                                    .filter(Boolean);

                                for (let i = 0; i < num; i++) {
                                    const valorInput = valorCuotasRestantesInputs[i];
                                    const fechaInput = fechaCuotasRestantesInputs[i];

                                    const fechaPago = formatoInputDate(sumarMesesDiaFijo(fechaBase, i));
                                    const extra = cuotasExtra.find(c => c.fecha === fechaPago);

                                    if (extra) {
                                        if (valorInput) valorInput.value = formatCurrency(extra.valor);
                                    } else {
                                        if (valorInput) valorInput.value = formatCurrency(valorOrdinario);
                                    }

                                    // Solo actualizar fecha si NO fue modificada manualmente
                                    if (fechaInput && !fechasModificadas[i]) {
                                        fechaInput.value = extra ? extra.fecha : fechaPago;
                                    }
                                }
                    }

//EXTRAORDINARIAS
        function aplicarCuotasExtraordinarias() {
                        const valorTotalRestante = parseCurrency(valorMenosCuotaInput?.value);
                        if (!valorTotalRestante || valorTotalRestante <= 0) return;

                        const numCuotas = parseInt(cuotasRestanteInput?.value) || 0;
                        if (numCuotas <= 0) return;

                        // 1. Recolectar extraordinarias válidas
                        const cuotasExtra = cuotasExtrasInputs
                            .map(c => {
                                const fecha = c.fecha?.value;
                                const valor = parseCurrency(c.valor?.value);
                                if (fecha && valor > 0) {
                                    return { fecha: new Date(fecha), valor };
                                }
                                return null;
                            })
                            .filter(Boolean)
                            .sort((a, b) => a.fecha - b.fecha);

                        // 2. Verificar suma
                            const sumaExtras = cuotasExtra.reduce((acc, c) => acc + c.valor, 0);
                            if (sumaExtras > valorTotalRestante) {
                                alert("⚠️ La suma de cuotas extraordinarias no puede superar el valor restante");
                                return;
                            }

                        // 3. Calcular saldo para ordinarias
                        const saldoOrdinarias = valorTotalRestante - sumaExtras;
                        const totalOrdinarias = numCuotas - cuotasExtra.length;
                        const valorCuotaOrdinaria = totalOrdinarias > 0 ? saldoOrdinarias / totalOrdinarias : 0;

                        // 4. Fecha base = fecha_pago1
                        let fechaBaseStr = fechaCuotasRestantesInputs[0]?.value;

                        if (!fechaBaseStr) return;
                        const [y, m, d] = fechaBaseStr.split("-").map(Number);
                        let fechaBase = new Date(y, m - 1, d, 12, 0, 0);

                        // 5. Generar plan de pagos
                        for (let i = 0; i < numCuotas; i++) {
                            const fechaPago = sumarMesesDiaFijo(fechaBase, i);
                            const extra = cuotasExtra.find(c => formatoInputDate(c.fecha) === formatoInputDate(fechaPago));

                            if (extra) {
                                // asigna extraordinaria
                                if (valorCuotasRestantesInputs[i]) valorCuotasRestantesInputs[i].value = formatCurrency(extra.valor);
                                if (fechaCuotasRestantesInputs[i]) fechaCuotasRestantesInputs[i].value = formatoInputDate(extra.fecha);
                            } else {
                                // asigna ordinaria
                                if (valorCuotasRestantesInputs[i]) valorCuotasRestantesInputs[i].value = formatCurrency(valorCuotaOrdinaria);
                                if (fechaCuotasRestantesInputs[i]) fechaCuotasRestantesInputs[i].value = formatoInputDate(fechaPago);
                            }
                        }
                    }

// Lógica de acordeón para Clientes adicionales
   
        document.querySelectorAll(".acordeon-titulo").forEach(boton => {
            boton.addEventListener("click", (event) => {
                event.preventDefault(); // 🚫 evita que navegue a otra página

                const contenido = boton.nextElementSibling;
                contenido.classList.toggle("activo");

                // Rotar la flecha
                if (contenido.classList.contains("activo")) {
                    boton.innerHTML = "▼ " + boton.textContent.replace("▼", "").replace("➤", "");
                } else {
                    boton.innerHTML = "➤ " + boton.textContent.replace("▼", "").replace("➤", "");
                }
            });
        });

   
 // formato + recalculo en blur (cuando el usuario sale del input)
        document.querySelectorAll("input.moneda").forEach(input => {
                        // ❌ Evitar aplicar formato automático a cuotas restantes
                        if (input.id && input.id.startsWith("valor_cuotas_restante")) return;

                        input.addEventListener("blur", () => {
                            input.value = formatCurrency(parseCurrency(input.value));
                            actualizarValorVenta();
                        });

                        input.addEventListener("input", () => {
                            actualizarValorVenta();
                        });
                    });


        

// listeners para campos no-moneda

        if (porcenInput) porcenInput.addEventListener("input", actualizarCuotaInicial);
        if (valorSeparacionInput) valorSeparacionInput.addEventListener("input", actualizarPendienteInicial);
        
        if (cuotasInput) cuotasInput.addEventListener("input", () => {
            actualizarCuotas();
            actualizarFechasCuotas();
        });
        
        if (fecha1Input) fecha1Input.addEventListener("change", actualizarFechasCuotas);

        if (cuotasRestanteInput) cuotasRestanteInput.addEventListener("input", actualizarCuotasRestantes);
        if (valorMenosCuotaInput) valorMenosCuotaInput.addEventListener("input", actualizarCuotasRestantes);

        cuotasExtrasInputs.forEach(c => {
            if (c.fecha) c.fecha.addEventListener("change", aplicarCuotasExtraordinarias);
            if (c.valor) c.valor.addEventListener("input", aplicarCuotasExtraordinarias);
        });
        

        if (cuotasRestanteInput) {
                        cuotasRestanteInput.addEventListener("input", () => {
                            // 🔹 1. Limpiar colores visuales
                            valorCuotasRestantesInputs.forEach(inp => {
                                inp.classList.remove("cuota-modificada");
                            });

                            // 🔹 2. Limpiar registros internos de cuotas personalizadas
                            cuotasModificadas = {};
                            cuotasBloqueadas.clear();

                            // 🔹 3. Recalcular con el nuevo número de cuotas
                            actualizarValorCuotasRestante();
                            actualizarFechasAutomaticas(); 
                        });
            }


        if (inputInicial) {
            inputInicial.addEventListener("input", porcentajeRestante);
            inputInicial.addEventListener("change", porcentajeRestante);
        }

        // Listener de cambio manual en cuotas restantes
            fechaCuotasRestantesInputs.forEach((input, i) => {
                    if (!input) return;

                    input.addEventListener("change", () => {
                         // Marcar fecha como manualmente modificada
                    fechasModificadas[i] = true;

                            // 🔒 Evitar que se recalculen los valores de las cuotas
                            // Solo actualiza las fechas automáticas si es necesario
                            // pero sin tocar valores
                        actualizarFechasAutomaticasSinRecalculo();
                    });
                });

                    
// Nueva función: actualiza fechas en cascada sin tocar valores
         function actualizarFechasAutomaticasSinRecalculo() {
                            const fechaBaseStr = fechaCuotasRestantesInputs[0]?.value;
                            if (!fechaBaseStr) return;

                            const [y, m, d] = fechaBaseStr.split("-").map(Number);
                            const fechaBase = new Date(y, m - 1, d, 12, 0, 0);

                            for (let i = 1; i < fechaCuotasRestantesInputs.length; i++) {
                                const input = fechaCuotasRestantesInputs[i];
                                if (!input) continue;

                                if (fechasModificadas[i]) continue; // respetar las manuales

                                const nuevaFecha = new Date(fechaBase);
                                nuevaFecha.setMonth(fechaBase.getMonth() + i);
                                input.value = formatoInputDate(nuevaFecha);
                            }
            }

//listener para el boton enviar

        if (btnBuscar) {
            btnBuscar.addEventListener("click", async function () {
                const proyecto = document.querySelector("#proyecto").value;
                const lote     = document.querySelector("#lote").value;

                if (!proyecto || !lote) {
                    alert("Por favor selecciona un proyecto y un lote");
                    return;
                }

                try {
                    const resp = await fetch("/dashboard/buscarProyecto", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `proyecto=${encodeURIComponent(proyecto)}&lote=${encodeURIComponent(lote)}`
                    });

                    const data = await resp.json();
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Asignar valores desde BD
                    // NOTA: valores numéricos provenientes de la BD se pasan directamente a formatCurrency
                    setValorCampo("#aream", data.aream);
                    setVal("#etapa", data.etapa);
                    setValorCampo("#valor_total", data.valor_total);
                    // porcentaje no es moneda
                    setValorCampo("#porcen_inicial", data.porcen_inicial);
                    // cuota inicial si existe en BD
                    setValorCampo("#estado", data.estado);
                    setValorCampo("#separacion", data.separacion);
                    setValorCampo("#saldo_inicial", data.saldo_inicial);
                    setValorCampo("#valor_venta", data.valor_venta);
                    setValorCampo("#valor_aream", data.valor_aream);
                    setValorCampo("#valor_restante", data.valor_restante);
                    setValorCampo("#valor_cuotas_restante", data.valor_cuotas_restante);

                    // cuotas numéricas (no formateo para el campo número de cuotas)
                    //setValorCampo("#cuotas_inicial", data.cuotas);
                    setValorCampo("#numcuota_restante", data.cuotas);

                    // cuota1..4 si vienen en BD
                    setValorCampo("#cuota1", data.cuota1);
                    setValorCampo("#cuota2", data.cuota2);
                    setValorCampo("#cuota3", data.cuota3);
                    setValorCampo("#cuota4", data.cuota4);

                    // Fechas se dejan vacías para que el cliente seleccione
                    if (fecha1Input) fecha1Input.value = "";
                    if (fecha2Input) fecha2Input.value = "";
                    if (fecha3Input) fecha3Input.value = "";
                    if (fecha4Input) fecha4Input.value = "";
                    if (fecha5Input) fecha5Input.value = "";
                    if (fecha6Input) fecha6Input.value = "";
                    if (fecha7Input) fecha7Input.value = "";
                    if (fecha8Input) fecha8Input.value = "";
                    if (fecha9Input) fecha9Input.value = "";
                    if (fecha10Input) fecha10Input.value = "";
                    if (fecha11Input) fecha11Input.value = "";
                    if (fecha12Input) fecha12Input.value = "";

                    // Limpiar fechas iniciales para que el usuario seleccione
                    [fecha1Input, fecha2Input, fecha3Input, fecha4Input, fechaCuotasRestantesInputs].forEach(f => { if(f) f.value = ""; });
                    
                    // === Ajuste inteligente de cuotas restantes (solo afecta campos "valor_cuotas_restante") ===

                    applyCurrencyFormatToAllMoneda(); 
                    porcentajeRestante();
                    actualizarValorVenta();
                    
                } catch (e) {
                    console.error(e);
                    alert("Hubo un problema al buscar la información.");
                }

            });
        }


// ====== Evento Submit (Enviar formulario) ======
       const formVentas = document.getElementById("formularioVentas");
        if (formVentas) {
            formVentas.addEventListener("submit", async function(e) {
                e.preventDefault(); // 🚫 evita que la página se recargue

                // Crear un FormData con todos los inputs del formulario
                const formData = new FormData(formVentas);
                try {
                    const resp = await fetch("/informacion_ventas", {
                        method: "POST",
                        body: formData
                    });
                    const data = await resp.json();
                    // <- lo ves en la consola del navegador
                    if (data.error) {
                        alert("Error al guardar: " + data.error);
                        return;
                    }

                    alert("✅ Información guardada correctamente");
                    // Opcional: redirigir o limpiar el formulario
                    // window.location.href = "/dashboard/informacion_ventas";
                } catch (err) {
                    console.error(err);
                    alert("Hubo un problema al enviar el formulario.");
                }
            });
        }

        // 🚀 Ejecutar automáticamente al cargar
        setTimeout(aplicarCuotasExtraordinarias, 300);

        // Inicialización
        applyCurrencyFormatToAllMoneda();
        actualizarValorVenta();

// REPARTO AUTOMÁTICO DE CUOTAS RESTANTES EDITABLES (CON BLOQUEO Y REPARTO EQUITATIVO)

            let cuotasBloqueadas = new Set();
            let cuotasModificadas = {}; // <== guarda las cuotas personalizadas por el usuario

                        valorCuotasRestantesInputs.forEach((input, index) => {
                            if (!input) return;

                            // Permitir escribir solo números y separadores
                            input.addEventListener("input", (e) => {
                                e.target.value = e.target.value.replace(/[^0-9.,]/g, "");
                            });

                            // Al salir del campo (usuario termina de editar)
                            input.addEventListener("blur", (e) => {
                                const valorRestante = parseCurrency(valorMenosCuotaInput.value);
                                const numCuotas = parseInt(cuotasRestanteInput.value) || 0;
                                if (!valorRestante || !numCuotas) return;

                                const nuevoValor = parseCurrency(e.target.value);

                                // Si el valor es válido, marcamos esta cuota como modificada
                                if (!isNaN(nuevoValor) && nuevoValor > 0) {
                                    cuotasBloqueadas.add(index);
                                    cuotasModificadas[index] = nuevoValor;
                                    e.target.classList.add("cuota-modificada");
                                } else {
                                    cuotasBloqueadas.delete(index);
                                    delete cuotasModificadas[index];
                                    e.target.classList.remove("cuota-modificada");
                                }

                                // Ejecutar el recálculo global
                                recalcularCuotasRestantes();
                            });
                });

//RECALCULAR CUOTAS RESTANTES
            function recalcularCuotasRestantes() {
                        const valorRestante = parseCurrency(valorMenosCuotaInput.value);
                        const numCuotas = parseInt(cuotasRestanteInput.value, 10) || 0;
                        if (!valorRestante || numCuotas <= 0) return;

                        

                        // Convertir NodeList/array a array y quedarnos solo con las primeras numCuotas entradas
                        const inputsArr = Array.from(valorCuotasRestantesInputs).slice(0, numCuotas);

                        // Normalizar set de bloqueadas a números
                        const bloqueadasSet = new Set(Array.from(cuotasBloqueadas).map(n => Number(n)));

                        // Construir conjunto de índices "manuales" (modificadas o bloqueadas)
                        const manualIndices = new Set(
                            Object.keys(cuotasModificadas).map(k => Number(k)).concat(Array.from(bloqueadasSet))
                        );

                        // 1) Sumar las cuotas manuales (en centavos para evitar errores de float)
                        let sumaModificadasCents = 0;
                        manualIndices.forEach(idx => {
                            if (idx >= 0 && idx < inputsArr.length) {
                            const val = cuotasModificadas[idx] !== undefined
                                ? Number(cuotasModificadas[idx])
                                : parseCurrency(inputsArr[idx].value) || 0;
                            sumaModificadasCents += Math.round(val * 100);
                            }
                        });

                        // 2) Calcular las cuotas libres (índices dentro del rango y no manuales)
                        const freeIndices = inputsArr.map((_, i) => i).filter(i => !manualIndices.has(i));
                        const restantes = freeIndices.length;

                        const totalRestanteCents = Math.round(valorRestante * 100);
                        const disponibleCents = totalRestanteCents - sumaModificadasCents;

                        // Si no quedan libres, solo dejamos las manuales como están
                        if (restantes <= 0) {
                            inputsArr.forEach((inp, i) => {
                            if (!inp) return;
                            if (manualIndices.has(i)) {
                                const v = cuotasModificadas[i] !== undefined ? Number(cuotasModificadas[i]) : parseCurrency(inp.value) || 0;
                                inp.value = formatCurrency(v);
                                inp.classList.add("cuota-modificada");
                            } else {
                                inp.value = formatCurrency(0);
                                inp.classList.remove("cuota-modificada");
                            }
                            });
                            return;
                        }

                        // 3) Repartir disponible entre las libres en centavos y distribuir el resto (remainder)
                        const baseCents = Math.floor(disponibleCents / restantes);
                        let remainder = disponibleCents - baseCents * restantes;

                        // 4) Asignar valores actualizados
                        inputsArr.forEach((inp, i) => {
                            if (!inp) return;

                            if (manualIndices.has(i)) {
                            // Mantener valor manual (preferir cuotasModificadas si existe)
                            const v = cuotasModificadas[i] !== undefined ? Number(cuotasModificadas[i]) : parseCurrency(inp.value) || 0;
                            inp.value = formatCurrency(v);
                            inp.classList.add("cuota-modificada");
                            } else {
                            // Asignar base + posible 1 centavo extra hasta agotar remainder
                            let cents = baseCents;
                            if (remainder > 0) { cents += 1; remainder -= 1; }
                            inp.value = formatCurrency(cents / 100);
                            inp.classList.remove("cuota-modificada");
                            }
                        });
            }

//BOTON GENERAR PDF

    const btnGenerarPDF = document.getElementById('btnGenerarPDF');
        if (btnGenerarPDF) {
            btnGenerarPDF.addEventListener('click', function() {
                // Capturar todos los campos del formulario
                const form = document.getElementById("formularioVentas");
                const formData = new FormData(form);

                    // Enviar al backend sin recargar
                    fetch("/proyeccion", {
                    method: "POST",
                    body: formData
                    })
                                
                        .then(res => res.json())
                        .then(data => {
                            if (data.ok) {
                                alert("✅ Venta guardada correctamente.");

                                // Mostrar botón Generar PDF
                                const pdfBtn = document.getElementById("btnPDF");
                                if (pdfBtn) {
                                    pdfBtn.style.display = "inline-block";
                                    pdfBtn.setAttribute("href", `/proyeccion/generarPDF?id=${data.id}`);
                                }
                            } else {
                                alert("⚠️ Ocurrió un error al guardar la venta.");
                            }
                        });
            });
                        
        }

// === Inicializa funcionalidad de campos de archivo ===
        function inicializarCargueArchivos() {
            const grupos = document.querySelectorAll(".upload-group");

                if (!grupos.length) return; // si no hay campos, no hace nada

                grupos.forEach(grupo => {
                    const input = grupo.querySelector('input[type="file"]');
                    const fileName = grupo.querySelector(".file-name");

                    if (!input || !fileName) return;

                    input.addEventListener("change", () => {
                    if (input.files && input.files.length > 0) {
                        fileName.textContent = `Archivo adjuntado: ${input.files[0].name}`;
                    } else {
                        fileName.textContent = "Ningún archivo seleccionado";
                    }
                    });
                });
        }

                // Llamar la función (dentro del DOMContentLoaded existente)
                inicializarCargueArchivos();

        if (formulario) {
    formulario.addEventListener("submit", function (e) {
        // Selecciona todos los inputs con formato de moneda
        const camposMoneda = formulario.querySelectorAll("input.moneda");

        camposMoneda.forEach(input => {
            const valorLimpio = parseCurrency(input.value);
            input.value = valorLimpio || 0; // guarda como número limpio
        });

        // Opcional: también limpiar porcentajes o decimales si los tienes con coma
        const camposPorcentaje = formulario.querySelectorAll("input[type='number'], input.porcentaje");
        camposPorcentaje.forEach(input => {
            if (input.value.includes(",")) {
                input.value = input.value.replace(",", ".");
            }
        });
    });
}
        
    });

            // =========================
        // Función para manejar la paginación entre páginas del formulario
        // =========================
        function mostrarPagina(numero) {
            document.querySelectorAll(".pagina").forEach(p => p.classList.remove("active"));
            const pagina = document.getElementById("pagina" + numero);
            if (pagina) {
                pagina.classList.add("active");
            }
        }

