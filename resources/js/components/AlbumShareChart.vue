<template>
    <div>
        <canvas id="chart" width="400" height="400"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';

    export default {

        props: [
            "chartData",
        ],

        mounted() {
            let ctx = document.getElementById( "chart" );

            let chart = new Chart(ctx, {
                type: "pie",
                data: this.chartData,
                options: {
                    cutoutPercentage: 50,
                }
            });
        },

    };
</script>
