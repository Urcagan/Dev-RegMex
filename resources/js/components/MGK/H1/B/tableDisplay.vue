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
                    <th v-for="item in TagPoint">{{ item }}</th>
                </tr>
                </thead>
                <tbody align="center">
                    <tr v-for="item in dataPoints">
                        <!-- <td v-for="(value,key) in item">{{value}}</td> -->
                        <!-- <td v-for="(value,key) in item">{{Math.round(value*100)/100}}</td> -->
                        <td v-for="(value,key) in item">{{ key != 'LocalTime' ? Math.floor(value*100)/100 : value.substr(0,16) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

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
                <tr>
                    <th>PI7026</th>
                    <th>PI7028</th>
                    <th>PI7024</th>
                    <th>PDI7013</th>
                    <th>ZVI7000</th>
                    <th>ZVI7001</th>
                    <th>ZVI7002</th>
                    <th>ZVI7003</th>
                    <th>KVI7000</th>
                    <th>XVI7000</th>
                    <th>XVI7001</th>
                    <th>XVI7002</th>
                    <th>XVI7003</th>
                    <th>XVI7004</th>
                    <th>XVI7005</th>
                    <th>XVI7006</th>
                    <th>XVI7007</th>
                </tr>
                </thead>
                <tbody align="center">
               <tr v-for="item in dataPoints">
                   <td>{{(item.LocalTime).substr(0,16)}}</td>
                   <td>{{Math.floor(item.PI7026B*100)/100}}</td>
                   <td>{{Math.floor(item.PI7028B*100)/100}}</td>
                   <td>{{Math.floor(item.PI7024B*100)/100}}</td>
                   <td>{{Math.floor(item.PDI7013B*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7000B*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7001B*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7002B*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7003B*100)/100}}</td>
                   <td>{{Math.floor(item.KVI7000B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7000B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7001B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7002B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7003B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7004B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7005B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7006B*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7007B*100)/100}}</td>

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
                    <th>TI7006</th>
                    <th>TI7007</th>
                    <th>TI7008</th>
                    <th>TI7009</th>
                    <th>TI7010</th>
                    <th>TI7011</th>
                    <th>TI7012</th>
                    <th>TI7013</th>
                    <th>TI7014</th>
                    <th>TI7015</th>
                    <th>TI7043</th>
                    <th>LI7008</th>
                </tr>
                </thead>
                <tbody align="center">
                <tr v-for="item in dataPoints">
                    <td>{{item.LocalTime}}</td>
                    <td>{{Math.floor(item.TI7006B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7007B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7008B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7009B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7010B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7011B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7012B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7013B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7014B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7015B*100)/100}}</td>
                    <td>{{Math.floor(item.TI7043B*100)/100}}</td>
                    <td>{{Math.floor(item.LI7008B*100)/100}}</td>
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
            dataPoints: [],
            TagPoint: [],
            xPoint: [],
            // Tag: "LocalTime",
        }
    },

    mounted() {
        this.loadData();
    },

    methods: {
        // получение данных
        loadData: function () {
            axios.get('/api/H1b/table')
                .then(res => {
                        this.dataPoints = res.data.data;
                        // this.dataPoints = res.data;

                    // const KeyData = Object.keys(this.dataPoints[0])
                    const KeyTag = Object.keys(this.dataPoints[0]);
                    // KeyTag.splice(0,1);
                    this.TagPoint = KeyTag.splice(1,17);

                        this.MapData(this.dataPoints);
                        console.log(this.dataPoints);
                    }
                )
                .catch(function (error) {
                        console.log(error);
                    }
                )
        },

        MapData: function (x) {
            const Y_var = x.map((item, index ) => { 
                    //   item.map(enum) => {console.log(enum)});
                
                    // console.log(item);
                return item ;
                });
            console.log(Y_var[0]);
            // console.log(this.TagPoint.slice(0,2))
        },
    },
}

</script>

<style scoped>

</style>
