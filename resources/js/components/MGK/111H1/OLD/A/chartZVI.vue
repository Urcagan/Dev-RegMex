<template>
    <div class="container">
        <!-- <MenuBar></MenuBar> -->
    </div>
    <div>
        <!-- <h2> Показатели вибрации </h2> -->
    </div>

    <div class="container">
        <Line :chart-data="chartData"
              :chart-options="chartOptions"
              :chart-id="chartId"
              :dataset-id-key="datasetIdKey"
              :plugins="plugins"
              :css-classes="cssClasses"
              :styles="styles"
              :width="width"
              :height="height"
        />
    </div>
</template>

<script>

import MenuBar from "/resources/js/components/MGK/menuBar.vue"
import {Line} from 'vue-chartjs'

import {Chart as ChartJS, Title, Tooltip, Legend, LineElement, LinearScale, PointElement, CategoryScale} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, LineElement, LinearScale, PointElement, CategoryScale)
ChartJS.defaults.elements.line.borderWidth = 1 // Задает глобальное значение толщины всех линий
ChartJS.defaults.elements.point.radius = 0  // Задает глобальное значение радиуса точки
ChartJS.defaults.elements.line.fill = false;

export default {
    name: "chartZVI",
    components: {Line, MenuBar},

    props: {
        chartId: {
            type: String,
            default: 'line-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 150
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => {}
        },
        plugins: {
            type: Object,
            default: () => {}
        },

        apiPath: {
            type:String
        }
    },

    data(){
      return{
          // chartData: null,
          Color:  [ '#C0334D', '#3baf14', '#F3D4A0', '#F1931B',
              '#8F715B', '#BE9063', '#A4978E', '#1D65A6',
              '#00743F', '#F3E96B', '#F05837', '#6A8A82',
              '#563838', '#DE8CF0', '#BED905', '#16235A',

              '#C0334D', '#D6618F', '#F3D4A0', '#F1931B',
              '#8F715B', '#BE9063', '#A4978E', '#1D65A6',
              '#00743F', '#F3E96B', '#F05837', '#6A8A82',
              '#563838', '#DE8CF0', '#BED905', '#16235A',
          ],
          pointData: [],
          localTime: [],
          BigData: [],

          FullPath: "",
      }
    },

    async mounted(){

        this.FullPath ="/api/" + this.apiPath + "/zvi";
        console.log(this.FullPath);

        this.loadPointData(this.FullPath);
    },

    methods:{
        // Методы для вывода графика
        loadPointData: function (Path) {

            axios.get(Path)
            // axios.get('/api/H1a/zvi')

                .then((response) => {
                    this.pointData = response.data;
                    // Получаем ссылку на нулевой элемент массива. Будем его использовать для получения ключей масива
                    // Получаем массив имен параметров с индексацией, который можно перебрать циклом
                    const KeyData = Object.keys(this.pointData[0])
                    KeyData.shift() //Удаляет первый элемент массива

                    this.localTime = response.data.map(item => { return item.LocalTime.toString() });
                    for (let i = 0; i <= KeyData.length - 1; i++ ){
                        this.BigData.push({
                            label: KeyData[i],
                            backgroundColor: this.Color[i],
                            borderColor:this.Color[i],
                            data: response.data.map(item => { return item[KeyData[i]] }),
                        });
                    };
                    // console.log(this.BigData)
                    for (let i = 0 ; i <= KeyData.length - 1 ; i++) {
                        this.chartData.datasets.push(this.BigData[i])
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => (this.loaded = true))
        },
    },

    computed:{
        chartData() {
            return {
                labels: this.localTime,
                datasets: [],
            }
            /* mutable chart data */
        },

        chartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: true,

                plugins: {
                    title: {
                        display: true,
                        text: 'Вибрация',
                        font: {
                            size: 24,
                        },
                    },
                    legend: {
                        position: 'top',
                        maxHeight: 100,
                        // maxWidth: 340,
                        fullSize: false,
                        align: 'start',
                        labels: {
                            color: 'rgb(0,0,0)'
                        },
                    },

                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true, // назначили оси Y начинать отсчет с нуля
                            min: 10,
                            max: 50,
                        }
                    },
                },
            }/* mutable chart options */
        },
    },


}
</script>

<style scoped>

</style>
