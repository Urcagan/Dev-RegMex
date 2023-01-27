<template>

    <div class="container">
        <input type="datetime-local" />
    </div>
        <MenuBar></MenuBar>
    <div class="container">
        <h2>Bar Chart</h2>
    </div>
    <div class="container">
        <Bar :chart-data="chartData" :height="100" :options="{responsive: true, maintainAspectRatio: true}"/>

    </div>
    <DK_A></DK_A>
</template>

<script>
// DataPage.vue
import {Bar} from 'vue-chartjs'
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'

import DK_A from "../home/DK_A.vue";
import MenuBar from "/resources/js/components/MGK/menuBar.vue"

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'BarChart',
    components: {Bar, DK_A, MenuBar},
    data() {
        return {
            chartData: {
                labels: ['January', 'February', 'March'],
                datasets: [
                    {
                        label: 'Data One',
                        backgroundColor: '#000000',
                        data: [40, 20, 12]
                    }
                ]
            }
        }
    }
}
</script>
