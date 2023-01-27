<template>
    <!-- <MenuBar></MenuBar> -->
    <div>
        <!-- <h2 align="center">Режимный лист сырьевого насоса МГК 111-Н1А</h2> -->

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
                   <td>{{item.LocalTime}}</td>
                   <td>{{Math.floor(item.PI7026A*100)/100}}</td>
                   <td>{{Math.floor(item.PI7028A*100)/100}}</td>
                   <td>{{Math.floor(item.PI7024A*100)/100}}</td>
                   <td>{{Math.floor(item.PDI7013A*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7000A*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7001A*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7002A*100)/100}}</td>
                   <td>{{Math.floor(item.ZVI7003A*100)/100}}</td>
                   <td>{{Math.floor(item.KVI7000A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7000A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7001A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7002A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7003A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7004A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7005A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7006A*100)/100}}</td>
                   <td>{{Math.floor(item.XVI7007A*100)/100}}</td>

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
                    <td>{{Math.floor(item.TI7006A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7007A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7008A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7009A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7010A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7011A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7012A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7013A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7014A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7015A*100)/100}}</td>
                    <td>{{Math.floor(item.TI7043A*100)/100}}</td>
                    <td>{{Math.floor(item.LI7008A*100)/100}}</td>
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

    data: function () {
        return {
            dataPoints: [],
        }
    },

    mounted() {
        this.loadData();
    },

    methods: {
        // получение данных
        loadData: function () {
            axios.get('/api/H1a/table')
                .then(res => {
                        this.dataPoints = res.data.data;

                    const KeyData = Object.keys(this.dataPoints[0])
                    }
                )
                .catch(function (error) {
                        console.log(error);
                    }
                )
        },

        // получение в массив всех имен точек
        keyData: function (){
            const KeyData = Object.keys(this.dataPoints[0])
            console.log( KeyData)
        },
    },

}


</script>

<style scoped>

</style>
