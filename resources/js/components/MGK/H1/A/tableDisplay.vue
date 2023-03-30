<template>
    <!-- <MenuBar></MenuBar> -->
    <div>
        <!-- <h2 align="center">Режимный лист сырьевого насоса МГК 111-Н1А</h2> -->
    <h2>{{apiPath}}</h2>
        <div class="container-fluid">
            <table id="tableDisplay" class="table table-primary table-striped table-hover  table-bordered table-sm" cellspacing="0" width="100%">
                <thead class="table-dark align-middle" align="center">
                <tr>
                    <th rowspan="3">Часы</th>
                    <th colspan="3">Давление МПа</th>
                    <th rowspan="2">Перепад давл</th>
                    <th colspan="4">Осевые смещения</th>
                    <th rowspan="2">Частота вращения</th>
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
                <tr>
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
            <table class="table table-primary table-striped table-hover  table-bordered table-sm " cellspacing="0" width="100%">
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
                        <td v-for="value in item">{{ value }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import MenuBar from "/resources/js/components/MGK/menuBar.vue"
import axios from "axios";

export default {
    name: "tableDisplay",

    components: { MenuBar },

    props:[
        'apiPath' //*Преременная хранения API маршрута для выводимых данных
    ],

    data: function () {
        return {
            dataLoad:[],        //* Переменныя данных из БД
            dataTableOne:[],     //* Данные для таблицы 1
            dataTableTwo: [],    //* Данные для таблицы 2
            TagTableOne: [],     //* Переменная хранения заголовкков для таблицы 1
            TagTableTwo: [],    //* Переменная хранения заголовкков для таблицы 2
            // apiPath: '/api/H1a/table', //*Преременная хранения API маршрута для выводимых данных
        }
    },

    mounted() {
        this.loadDataTable(this.apiPath);
    },

    methods: {
         //* получение данных для первой таблицы
        loadDataTable: function (Path) {
            // axios.get('/api/H1a/table')
            axios.get(Path)
            // axios.get(this.apiPath)
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
