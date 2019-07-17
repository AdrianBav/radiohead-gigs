<template>
    <div>
        <canvas ref="chartCanvas"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';

    export default {

        props: {
            type: {
                type: String,
                default: "bar",
            },

            chartData: Object,

            maintainAspectRatio: {
                type: Boolean,
                default: false,
            },
        },

        beforeCreate() {
            this.percentageScales = {
                xAxes: [{
                    ticks: {
                        callback: function( label, index, labels ) {
                            return label + "%";
                        }
                    },
                }],
            };

            this.barTooltips = {
                callbacks: {
                    label: function( tooltipItem, data ) {
                        let label = data.datasets[tooltipItem.datasetIndex].label || "";

                        return tooltipItem.value + label;
                    },
                },
            };

            this.doughnutTooltips = {
                callbacks: {
                    label: function( tooltipItem, data ) {
                        let label = data.labels[tooltipItem.index];
                        let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                        return label + ": " + value + "%";
                    },
                },
            };
        },

        mounted() {
            let chart = new Chart( this.$refs.chartCanvas, {
                type: this.type,
                data: this.chartData,
                options: {
                    legend: false,
                    responsive: true,
                    aspectRatio: 1,
                    maintainAspectRatio: this.maintainAspectRatio,
                    scales: ( this.type == "horizontalBar" ) ? this.percentageScales : {},
                    tooltips: ( this.type == "horizontalBar" ) ? this.barTooltips : this.doughnutTooltips,
                },
            });
        },

    };
</script>
