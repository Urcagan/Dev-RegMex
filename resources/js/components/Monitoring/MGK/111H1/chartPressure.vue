<template>
    <div class="container">
        <!-- <MenuBar></MenuBar> -->
    </div>
    <div>
        <!-- <h2> Показатели давления </h2> -->
    </div>

    <div class="container">
        <Line
            id="my-chart-id"
            ref="chartRef"
            :chart-data="chartData"
            :chart-options="chartOptions"
            :chart-id="chartId"
            :dataset-id-key="datasetIdKey"
            :plugins="plugins"
            :css-classes="cssClasses"
            :styles="myStyles"
            :width="width"
            :height="height"
        />
        <!-- :styles="myStyles" -->

        <button class="zoomButton" @click="zoomButton(1.1)">Zoom In</button>
        <button class="zoomButton" @click="zoomButton(0.9)">Zoom Out</button>
        <button class="zoomButton" @click="resetZoomChart">Reset</button>
        <button class="zoomButton" @click="tooltipMode_Index">
            Mode Index
        </button>
        <button class="zoomButton" @click="tooltipMode_Nearest_X">
            Mode Nearest X
        </button>
    </div>
</template>

<script>
import MenuBar from '/resources/js/components/Monitoring/MGK/menuBar.vue'
import { Line } from 'vue-chartjs'
import zoomPlugin from 'chartjs-plugin-zoom'

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    PointElement,
    CategoryScale,
} from 'chart.js'

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    PointElement,
    CategoryScale,
    zoomPlugin,
)
ChartJS.defaults.elements.line.borderWidth = 1 // Задает глобальное значение толщины всех линий
ChartJS.defaults.elements.point.radius = 0 // Задает глобальное значение радиуса точки
ChartJS.defaults.elements.line.fill = false
ChartJS.defaults.interaction.intersect = false //сли это правда, режим всплывающей подсказки применяется только тогда, когда положение мыши пересекается с элементом. Если false, режим будет применяться всегда.
ChartJS.defaults.interaction.mode = 'nearest'
ChartJS.defaults.interaction.axis = 'x'
ChartJS.defaults.interaction.includeInvisible = true // если true, невидимые точки, находящиеся за пределами области диаграммы, также будут учитываться при оценке взаимодействий..
ChartJS.defaults.plugins.tooltip.position = 'nearest' // Режим позиционирования всплывающей подсказки.
ChartJS.defaults.plugins.tooltip.backgroundColor = 'rgba(155, 220, 244, 0.9)'
ChartJS.defaults.plugins.tooltip.titleColor = '#000' //Цвет текста заголовка.
ChartJS.defaults.plugins.tooltip.bodyColor = '#000' //Цвет основного текста.
ChartJS.defaults.plugins.tooltip.borderColor = '#000'
ChartJS.defaults.plugins.tooltip.borderWidth = 1
ChartJS.defaults.plugins.tooltip.caretSize = 10 // Размер стрелки подсказки в пикселях.
ChartJS.defaults.plugins.tooltip.caretPadding = 20 //Дополнительное расстояние для перемещения конца стрелки подсказки от точки подсказки..
ChartJS.defaults.font.size = 14

export default {
    name: 'ChartPressure',

    components: { Line, MenuBar },

    props: {
        chartId: {
            type: String,
            default: 'line-chart',
        },
        datasetIdKey: {
            type: String,
            default: 'label',
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 150,
        },
        cssClasses: {
            default: '',
            type: String,
        },
        styles: {
            type: Object,
            default: () => {},
        },
        plugins: {
            type: Object,
            default: () => {},
        },
        // eslint-disable-next-line vue/require-default-prop
        apiPath: {
            type: String,
        },
    },

    data() {
        return {
            // chartData: null,
            Color: [
                '#C0334D',
                '#3baf14',
                '#F3D4A0',
                '#F1931B',
                '#8F715B',
                '#BE9063',
                '#A4978E',
                '#1D65A6',
                '#00743F',
                '#F3E96B',
                '#F05837',
                '#6A8A82',
                '#563838',
                '#DE8CF0',
                '#BED905',
                '#16235A',

                '#C0334D',
                '#D6618F',
                '#F3D4A0',
                '#F1931B',
                '#8F715B',
                '#BE9063',
                '#A4978E',
                '#1D65A6',
                '#00743F',
                '#F3E96B',
                '#F05837',
                '#6A8A82',
                '#563838',
                '#DE8CF0',
                '#BED905',
                '#16235A',
            ],
            pointData: [],
            localTime: [],

            FullPath: '',

            plugins: [
                {
                    id: 'hoverLine',
                    afterDatasetDraw(chart, args, plugins) {
                        const {
                            ctx,
                            tooltip,
                            chartArea: {
                                top,
                                bottom,
                                left,
                                right,
                                width,
                                heigth,
                            },
                            scales: { x, y },
                        } = chart
                        if (tooltip.dataPoints) {
                            // console.log(tooltip.dataPoints[0].dataIndex)
                            const xCoor = x.getPixelForValue(
                                tooltip.dataPoints[0].dataIndex,
                            )
                            const yCoor = tooltip.dataPoints[0].parsed.y
                            console.log(xCoor)
                            // console.log(yCoor)
                            ctx.save()
                            ctx.beginPath()
                            ctx.lineWidth = 1
                            ctx.strokeStyle = '#000'
                            ctx.setLineDash([6, 6])
                            ctx.moveTo(xCoor, top)
                            ctx.lineTo(xCoor, bottom)
                            ctx.closePath()
                            ctx.stroke()
                            ctx.setLineDash([])
                        }
                    },
                },
            ],
        }
    },

    computed: {
        chartData() {
            return {
                labels: this.localTime,
                datasets: [],
            }
            /* mutable chart data */
        },

        myStyles() {
            return {
                height: '500px',
            }
        },

        chartOptions() {
            return {
                responsive: true,
                maintainAspectRatio: true,

                plugins: {
                    title: {
                        display: true,
                        text: 'Давление',
                        font: {
                            size: 24,
                        },
                    },

                    legend: {
                        position: 'top',
                        maxHeight: 50,
                        // maxWidth: 340,
                        fullSize: false,
                        align: 'start',
                        labels: {
                            color: 'rgb(0,0,0)',
                        },
                    },
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true,
                            },
                            mode: 'xy',
                        },
                        pan: {
                            enabled: true,
                        },
                    },
                    tooltip: {
                        // position: 'nearest',
                    },
                },

                scales: {
                    x: {
                        grid: {
                            tickColor: 'black',
                        },
                    },
                    y: {
                        beginAtZero: false, // назначили оси Y начинать отсчет с нуля
                        // min: 0,
                        // max: 2,
                        grid: {
                            tickColor: 'black',
                        },
                        // backgroundColor: 'rgb(200,200,200)',
                    },
                },
                // interaction: {
                //     intersect: false,
                //     mode: 'index',
                //  },
            } /* mutable chart options */
        },
    },

    async mounted() {
        this.FullPath = '/api/' + this.apiPath + '/pressure'
        // console.log(this.FullPath);

        this.loadPointData(this.FullPath)
    },

    methods: {
        // Методы для вывода графика
        loadPointData: function (Path) {
            axios
                .get(Path)
                // axios.get('/api/H1a/pressure')

                .then(response => {
                    this.pointData = response.data
                    // Получаем ссылку на нулевой элемент массива. Будем его использовать для получения ключей масива
                    // Получаем массив имен параметров с индексацией, который можно перебрать циклом
                    const KeyData = Object.keys(this.pointData[0])
                    KeyData.shift() //Удаляет первый элемент массива

                    this.localTime = response.data.map(item => {
                        return item.LocalTime.toString()
                    })
                    for (let i = 0; i <= KeyData.length - 1; i++) {
                        this.chartData.datasets.push({
                            label: KeyData[i],
                            backgroundColor: this.Color[i],
                            borderColor: this.Color[i],
                            data: response.data.map(item => {
                                return item[KeyData[i]]
                            }),
                            pointStyle: 'circle',
                            // pointRadius: 1,
                            pointHoverRadius: 5,
                            // stepped: true,
                            tension: 0.4,
                        })
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
                .finally(() => (this.loaded = true))
        },
        //  Сброс зуммирования
        resetZoomChart: function () {
            // console.log(this.$refs.chartRef.chart)
            this.$refs.chartRef.chart.resetZoom()
        },
        zoomButton: function (value) {
            // console.log(this.$refs.chartRef.chart)
            this.$refs.chartRef.chart.zoom(value)
        },
        tooltipMode_Index: function () {
            ;(this.$refs.chartRef.chart.options.interaction.intersect = false),
                (this.$refs.chartRef.chart.options.interaction.axis = 'xy')
            this.$refs.chartRef.chart.options.interaction.mode = 'index'
            this.$refs.chartRef.chart.update()
        },
        tooltipMode_Nearest_X: function () {
            ;(this.$refs.chartRef.chart.options.interaction.intersect = false),
                (this.$refs.chartRef.chart.options.interaction.includeInvisible = true),
                (this.$refs.chartRef.chart.options.interaction.axis = 'x')
            this.$refs.chartRef.chart.options.interaction.mode = 'nearest'
            this.$refs.chartRef.chart.update()
        },
    },
}
</script>

<style scoped>
.zoomButton {
    color: #d2d5db;
    background: #6c7589;
    border-radius: 5px;
    min-width: 100px;
    padding-left: 15px;
    padding-right: 15px;
    margin: 10px 20px;
}
</style>
