<template>
    <MenuBar></MenuBar>
    <!-- <MenuBar/> -->

    <div>
        <h2 align="center">Режимный лист сырьевого насоса МГК 111-Н1В</h2>

        <div class="container-fluid">
            <table id="tableDisplay" class="table table-primary table-striped table-hover  table-bordered table-sm" cellspacing="0" width="100%">
                <thead class="table-dark align-middle" align="center">
                <tr>
                    <th rowspan="3">Часы</th>
                    <th colspan="3">Давление МПа</th>
                    <th rowspan="2">Перепад давл</th>
                    <th colspan="4">Осевые смещения</th>
                    <th rowspan="2">Частота врвщения</th>
                    <th colspan="8">Вибрация, мкм</th>
                </tr>
                <tr>
                    <th colspan="2">Уплотнит. жидкости</th>
                    <th>Рабочего масла</th>
                    <th colspan="2">Турбина</th>
                    <th colspan="2">Насос</th>
                    <th colspan="4">Турбина</th>
                    <th colspan="4">Насос</th>
                </tr>
                <tr >
                    <th v-for="item in TagTableOne">{{ item }}</th>
                </tr>
                </thead>
                <tbody align="center">
                    <tr v-for="item in dataTableOne">
                        <td v-for="value in item">{{value }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container-fluid">
            <table id="tableDisplay" class="table table-primary table-striped table-hover  table-bordered table-sm" cellspacing="0" width="100%">
                <thead class="table-dark align-middle" align="center">
                <tr>
                    <th rowspan="3">Часы</th>
                    <th colspan="11">Температура</th>
                    <th rowspan="2">Уровень 111-Е21</th>
                </tr>
                <tr>
                    <th colspan="4">Турбина</th>
                    <th colspan="6">Насос</th>
                    <th>Масла</th>
                </tr>
                <tr>
                    <th v-for="item in TagTableTwo">{{item}}</th>
                    
                </tr>
                </thead>
                <tbody align="center">
               <tr v-for="item in dataTableTwo">
                   <!-- <td>{{(item.LocalTime).substr(0,16)}}</td> -->
                   <td v-for="value in item">{{ value }}</td>
               </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import MenuBar from "/resources/js/components/MGK/menuBar.vue"
// import MenuBar from "./components/MGK/menuBar.vue"
import axios from "axios";

export default {
    name: "tableDisplay",

    components:{MenuBar},

    data: function () {
        return {
            dataPoints: [], //* Переменныя данных из БД
            TagPoint: [], //* Переменная хранения заголовкков для таблицы
            xPoint: [],
            // Tag: "LocalTime",
            dataLoad:[],
            dataTableOne:[],     //* Данные для таблицы 1
            dataTableTwo: [],    //* Данные для таблицы 2
            TagTableOne: [],     //* 
            TagTableTwo: [],
        }
    },

    mounted() {
        this.loadData();
        this.loadDataTableOne();
    },

    methods: {
        // получение данных
        loadData: function () {
            axios.get('/api/H1b/table')
                .then(res => {
                        this.dataPoints = res.data.data;
                        // this.dataPoints = res.data;
                                                        // console.log(this.dataPoints);
                    // const KeyData = Object.keys(this.dataPoints[0])
                        //* Формирование массива заголовков позиций для таблицы
                    const KeyTag = Object.keys(this.dataPoints[0]);
                    // KeyTag.splice(0,1);
                    this.TagPoint = KeyTag.splice(1,17);
                        this.MapData(this.dataPoints);
                        // console.log(Array.from(this.dataPoints));
                    }
                )
                .catch(function (error) {
                        console.log(error);
                    }
                )
        },

        MapData: function (x) {

            let map_count =0;
            const Y_var =[];
            let temp =[];
                x.map((item, index ) => {
                    
                    // console.log((item));
                    
                    for(let key in item){
                        // console.log( key + ': ' + item[key] );
                        // console.log( item );
                        
                    };
                    // const temp_element = item.map((element, key) => {
                        // item.forEach((value, key) => {
                        //     console.log( key+': '+value);
                        // });
                        // return key;
                    // } );
                    // console.log(temp);
                // return temp ;
                });
            // console.log(Y_var);
            // console.log(this.TagPoint.slice(0,2))
        },

         //* получение данных для первой таблицы
        loadDataTableOne: function () {
            axios.get('/api/H1b/tableOne')
                .then(res => {
                        this.dataLoad = res.data.data;
                        //* Полученный массив содерит значения для двух таблиц
                        //* Разбиваем его на два разных массива
                        this.dataLoad.forEach((item, index) => {
                                item.forEach((arr, ind) => {
                                    if (!ind){
                                        this.dataTableOne[index]=arr;
                                    } else{
                                        this.dataTableTwo[index]=arr;
                                    }
                                });
                        });
                        //* Формирование массива заголовков позиций для таблицы
                        this.TagTableOne = Object.keys(this.dataTableOne[0]);
                        this.TagTableOne.shift(); //* Удаляем первый элемент массива содержащий "LocalTime"
                        
                        this.TagTableTwo = Object.keys(this.dataTableTwo[0]);
                        this.TagTableTwo.shift();
                    }
                )
                .catch(function (error) {
                        console.log(error);
                    }
                )
        },
    },
}

</script>

<style scoped>

</style>
