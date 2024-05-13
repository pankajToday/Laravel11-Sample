<template>
    <div>
        <canvas :id="id"></canvas>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
import {eventBus} from "../../../models/events.js";

export default {
    name: "LineChart",
    props:['chartData','id'],
    data(){
        return {
            lineChart :'',
        }
    },
    mounted() {
        const ctx = document.getElementById(this.id);
      this.lineChart =  new Chart(ctx, this.chartData);
    },
    created(){
        eventBus.$on('line_chart_update', () => {
            console.log('pie_chart_update' ,this.chartData )
        })
    },
}
</script>

<style scoped>

</style>
