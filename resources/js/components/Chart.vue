<template>
    <div>
        <canvas ref="chartCanvas" width="400" height="400"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';

    export default {

        props: [
            "type", // add default
            "chartData",
        ],

        mounted() {
            let chart = new Chart(this.$refs.chartCanvas, {
                type: this.type,
                data: this.chartData,
                options: {
                    responsive: false,
                }
            });
        },

    };
</script>
