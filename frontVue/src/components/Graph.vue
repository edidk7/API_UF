<template>
    <!-- Contenedor principal -->
    <div class="container">
        <div class="row">
            <!-- Título -->
            <div class="col-12 mb-5">
                <h3 class="text-center text-dark mt-2">
                    Laravel + Vue JS - Data UF
                </h3>
            </div>
            <!-- Primer gráfico -->
            <div class="col-12 col-md-12">
                <div id="chart"></div>
            </div>
            <!-- Segundo gráfico -->
            <div class="col-12 col-md-12">
                <div id="chart2"></div>
            </div>
        </div>
    </div>
</template>

<script>


import { useStore } from "vuex";
import { computed, onMounted, watch } from "vue";
import ApexCharts from "apexcharts"; // Importación de ApexCharts

export default {
    setup() {
        const store = useStore();

        // Cargar los datos al montar el componente
        onMounted(async () => {
            await store.dispatch("fetchUfData"); // Llama a la acción para obtener los datos de la UF al montar el componente
        });

        const ufData = computed(() => store.getters.getUfData); // Obtiene los datos de la UF utilizando un getter

        // Función para renderizar los gráficos
        const renderCharts = () => {
            if (ufData.value) {
                // Extraer fechas y valores de los datos
                const dates = ufData.value.map((entry) =>
                    new Date(entry.fecha).getTime()
                );
                const values = ufData.value.map((entry) =>
                    parseFloat(entry.valor)
                ); // Obtener los valores como números

                // Configurar el primer gráfico
                const options = {
                    series: [
                        {
                            name: "Valor UF",
                            data: values,
                        },
                    ],
                    chart: {
                        height: 350,
                        type: "line",
                        zoom: {
                            enabled: false,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "straight",
                    },
                    title: {
                        text: "UF Line charts",
                        align: "left",
                    },
                    grid: {
                        row: {
                            colors: ["#f3f3f3", "transparent"],
                            opacity: 0.5,
                        },
                    },
                    xaxis: {
                        type: "datetime",
                        categories: dates,
                        labels: {
                            formatter: function (val) {
                                const monthName = new Date(val).toLocaleString(
                                    "default",
                                    { month: "short" }
                                ); // Obtener el nombre corto del mes
                                return (
                                    monthName.charAt(0).toUpperCase() +
                                    monthName.slice(1)
                                ); // Convertir la primera letra a mayúscula
                            },
                        },
                    },
                };

                // Renderizar el primer gráfico
                const chart = new ApexCharts(
                    document.querySelector("#chart"),
                    options
                );
                chart.render();

                // Configurar el segundo gráfico
                const options2 = {
                    series: [
                        {
                            name: "Valor UF",
                            data: values, // Utiliza los mismos datos que el primer gráfico
                        },
                    ],
                    chart: {
                        type: "area",
                        stacked: false,
                        height: 350,
                        zoom: {
                            type: "x",
                            enabled: true,
                            autoScaleYaxis: true,
                        },
                        toolbar: {
                            autoSelected: "zoom",
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    markers: {
                        size: 0,
                    },
                    title: {
                        text: "UF Zoomable Timeseries",
                        align: "left",
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            inverseColors: false,
                            opacityFrom: 0.5,
                            opacityTo: 0,
                            stops: [0, 90, 100],
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function (val) {
                                return val.toFixed(0); // Elimina la división adicional
                            },
                        },
                        title: {
                            text: "UF",
                        },
                    },
                    xaxis: {
                        type: "datetime",
                        categories: dates, // Utiliza las mismas fechas que el primer gráfico
                    },
                    tooltip: {
                        shared: false,
                        y: {
                            formatter: function (val) {
                                return val.toFixed(0);
                            },
                        },
                        x: {
                            formatter: function (val) {
                                return new Date(val).toLocaleDateString(); // Formatear la fecha como desees
                            },
                        },
                    },
                };
                // Renderizar el segundo gráfico
                const chart2 = new ApexCharts(
                    document.querySelector("#chart2"),
                    options2
                );
                chart2.render();
            }
        };

        // Llamar a la función de renderizado cada vez que los datos cambien
        watch(ufData, () => {
            renderCharts();
        });

        return {
            ufData,
        };
    },
};
</script>
