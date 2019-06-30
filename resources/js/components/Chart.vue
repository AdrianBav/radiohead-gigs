<template>
    <div>
        <canvas ref="chartCanvas" :width="width" :height="height"></canvas>
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

            width: {
                type: String,
                default: "200",
            },

            height: {
                type: String,
                default: "200",
            },
        },

        mounted() {
            let chart = new Chart(this.$refs.chartCanvas, {
                type: this.type,
                data: this.chartData,
                options: {
                    legend: false,
                    responsive: false,
                }
            });
        },

    };
</script>
