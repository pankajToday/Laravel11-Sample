<template>
    <div>
        <canvas id="pie-chart"></canvas>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
import {eventBus} from "../../../models/events.js";

export default {
    name: "PieChart",
    props:['chartData'],
    data() {
        return {

        }
    },
    created(){
        eventBus.$on('pie_chart_update', () => {
            console.log('pie_chart_update')
        })
    },
    mounted() {
        const ctx = document.getElementById('pie-chart');
        new Chart(ctx, this.chartData);
    }
}
</script>

<style scoped>

</style>
