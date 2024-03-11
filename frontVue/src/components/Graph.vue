<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h3 class="text-center text-dark mt-2">Laravel + Vue JS - Data UF</h3>
            </div>
            <div class="col-12 col-md-12">
                <div id="chart"></div>
            </div>
            <div class="col-12 col-md-12">
                <div id="chart2"></div>
            </div>              
        </div>
    </div>    
</template>
<script>

import ApexCharts from 'apexcharts';

export default {
    name: 'Student',
    data () {
        return {
            result: [],
            categories: [],
            values: []
        }
    },
    components: {
        apexchart: ApexCharts,
    },
    created() { 
        this.StudentLoad();
    },
    mounted() {
        console.log("Called OK!");
    },
    methods: {
        async StudentLoad() {
            try {
                const page = "http://127.0.0.1:8000/api/uf";
                const response = await fetch(page);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                console.log("data UF:", data);
                this.result = data;

                // Transformar los datos para el primer gráfico
                // this.categories = this.result.map(entry => {
                //     // Formatear la fecha
                //     const date = new Date(entry.fecha);
                //     const day = date.getDate().toString().padStart(2, '0');
                //     const month = (date.getMonth() + 1).toString().padStart(2, '0');
                //     const year = date.getFullYear().toString();
                //     return `${month}`;
                // }); 

                this.dates = this.result.map(entry => new Date(entry.fecha).getTime()); 

                this.values = this.result.map(entry => parseFloat(entry.valor)); // Obtener los valores como números

                // Configurar el primer gráfico
                const options = {
                    series: [{
                        name: 'Valor UF',
                        data: this.values
                    }],                    
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: 'UF Line charts',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: this.dates,
                        labels: {
                            formatter: function(val) {
                                const monthName = new Date(val).toLocaleString('default', { month: 'short' }); // Obtener el nombre corto del mes
                                return monthName.charAt(0).toUpperCase() + monthName.slice(1); // Convertir la primera letra a mayúscula
                            }
                        }
                    }
                };

                // Renderizar el primer gráfico
                const chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();

                // Transformar los datos para el segundo gráfico
                // Transformar los datos para el segundo gráfico
                this.dates = this.result.map(entry => new Date(entry.fecha).getTime()); 
                this.values2 = this.result.map(entry => parseFloat(entry.valor)); // Obtener los valores como números
                // Configurar el segundo gráfico
                const options2 = {
                    series: [{
                        name: 'Valor UF',
                        data: this.values2
                    }],
                    chart: {
                        type: 'area',
                        stacked: false,
                        height: 350,
                        zoom: {
                            type: 'x',
                            enabled: true,
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    markers: {
                        size: 0,
                    },
                    title: {
                        text: 'UF Zoomable Timeseries',
                        align: 'left'
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            inverseColors: false,
                            opacityFrom: 0.5,
                            opacityTo: 0,
                            stops: [0, 90, 100]
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function (val) {
                                return val.toFixed(0); // Elimina la división adicional
                            },
                        },
                        title: {
                            text: 'UF'
                        },
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: this.dates // Aquí usamos this.dates como categorías para el eje x
                    },
                    tooltip: {
                        shared: false,
                        y: {
                            formatter: function (val) {
                                return val.toFixed(0);
                            }
                        },
                        x: {
                            formatter: function (val) {
                                return new Date(val).toLocaleDateString(); // Formatear la fecha como desees
                            }
                        }
                    }
                };
                // Renderizar el segundo gráfico
                const chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
                chart2.render();
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    }
}
</script>