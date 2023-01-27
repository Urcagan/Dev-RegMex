<template>

    <div class="container">
        <Menu></Menu>
    </div>

    <div class="container">

        <div class="app__config">
            <div class="app__input">
                <label>
                    Search
                    <input type="text" v-model="search" @input="onSearch">
                    <span v-if="loading">loading...</span>
                </label>
            </div>
            <div class="app__select">
                <label>
                    PerPage
                    <select v-model="perPage" @change="onChangePerPage" >
                        <option v-for="perPage of perPages" :value="perPage" >{{perPage}} </option>
                    </select>
                </label>
            </div>
        </div>


        <div :class="{'d-flex justify-content-center mt-5': !loaded}">
            <div :class="{'spinner-border text-primary': !loaded} " role="status"></div>
            <!-- ! Значек процесса загрузки -->
        </div>
        <Line v-if="loaded" :chart-data="chartData"
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

import Menu from "/resources/js/components/MGK/menuBar.vue"
// import 'chart.js/auto'; // используется при леннивом спосоде
import {Line} from 'vue-chartjs'

import { Chart as ChartJS, Title, Tooltip, Legend, LineElement,LinearScale, PointElement,CategoryScale } from 'chart.js'
//  Title, Tooltip, Legend, LineElement,LinearScale, PointElement,CategoryScale, Plugin

ChartJS.register(Title,Tooltip,Legend,LineElement,LinearScale,PointElement,CategoryScale)
// Title,Tooltip,Legend,LineElement,LinearScale,PointElement,CategoryScale

ChartJS.defaults.elements.line.borderWidth = 1 // Задает глобальное значение толщины всех линий
ChartJS.defaults.elements.point.radius = 1  // Задает глобальное значение радиуса точки
ChartJS.defaults.elements.line.fill = false;
//ChartJS.defaults.backgroundColor = 'rgb(211,27,27)' // заливка линии по умолчанию если нету св-ва backgroundColor:


export default {
    name: 'LineChart',
    components: {Line, Menu},
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
        }
    },
    data() {
        return {
            // Данные для строки модификации
            search: 'chart',
            perPage: 10,
            perPages: [5,10,15,20],
            loading: false,

            // Данные для графика
            loaded: false,   // ! Признак загрузки данных //
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
            dataPoint: [],
            localTime: [],
            BigData: [],
        }
    },

    async mounted() {
        this.loaded = false

        this.loadPointData();
    },

    methods: {

        //Методы для строки выбор опций графика
        async onChangePerPage() {
            if (!this.search) return
            this.loading = true
            // alert( "Привет" );
            // this.chartData.datasets.length = 0
            await this.loadPointTop()
            //await this.fetchRepos()
            this.loading = false
        },

        // Методы для вывода графика
        loadPointData: function () {

            axios.get('/api/dk_a_data')
                .then((response) => {
                    this.pointData = response.data.data;
                    // console.log(this.pointData[0])

                        //  Проверяем наличие в массиве элемента с ключем LocalTime и удаляем элемент если он есть
                    // if ("LocalTime" in this.pointData[0]) {
                    //     delete this.pointData[0]["LocalTime"]
                    // }
                    // Получаем ссылку на нулевой элемент массива. Будем его использовать для получения ключей масива
                    // Получаем массив имен параметров с индексацией, который можно перебрать циклом
                    const KeyData = Object.keys(this.pointData[0])
                    KeyData.shift() //Удаляет первый элемент массива
                    // console.log(KeyData)

                    // console.log(Object.keys(this.labelsData).length) // количество элементов в массиве
                    // console.log(Object.keys(this.labelsData)) //Получаем ключи ассоциативного массива

                    this.localTime = response.data.data.map(item => { return item.LocalTime.toString() });
                    // console.log(this.localTime)

                    // this.PI7026A = response.data.data.map(item => { return item.PI7026A });

                      for (let i = 0; i <= KeyData.length - 1; i++ ){
                          this.BigData.push({
                              label: KeyData[i],
                              backgroundColor: this.Color[i],
                              borderColor:this.Color[i],
                              data: response.data.data.map(item => { return item[KeyData[i]] }),
                          });
                      };
                    // console.log(this.BigData)
                    // this.labelsData = this.pointData.map(n => n.LocalTime);

                    for (let i = 0 ; i <= KeyData.length - 1 ; i++) {
                        this.chartData.datasets.push(this.BigData[i])
                    }

                     // this.chartData.datasets.push( {
                     //     label: 'PDI7013A',
                     //     backgroundColor: '#63faff',
                     //     borderColor:'#63faff',
                     //     data: this.PDI7013A,
                     // });

                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => (this.loaded = true))
        },

        loadPointTop: function () {

            axios.get('/api/dk_a_top')
                .then((response) => {
                    this.pointData = response.data.data;

                    const KeyData = Object.keys(this.pointData[0])
                    KeyData.shift()

                    this.localTime = response.data.data.map(item => { return item.LocalTime.toString() });

                    for (let i = 0; i <= KeyData.length - 1; i++ ){
                        this.BigData.push({
                            label: KeyData[i],
                            backgroundColor: this.Color[i],
                            borderColor:this.Color[i],
                            data: response.data.data.map(item => { return item[KeyData[i]] }),
                        });
                    };

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

    computed: {
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
                        text: 'МГК 111-Н1А',
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
                // options: {
                //     legend: {display: false},
                //     scales: {
                //         yAxes: [{
                //             ticks: {
                //                 beginAtZero: true,
                //                 min: 0,
                //                 max: 600,
                //                 stepSize: 50
                //             }
                //         }]
                //     }
                // }
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
    }
}
</script>
