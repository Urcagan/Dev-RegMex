<template>
    <div class="menu">
        <!-- <router-link class="text" :to="{name: 'time'}">Перечень комплексов</router-link> -->
        <!-- <router-link class="text" :to="{name: 'Chart'}"> Line Chart D3.vue </router-link>
    <router-link class="text" :to="{name: 'D3Line'}"> D3Line.vue Альтернатива </router-link>
    <router-link class="text" :to="{name: 'D3MultiLine'}"> D3 Multi Line.vue Альтернатива </router-link>
    <router-link class="text" :to="{name: 'TestData'}"> Тестирование получения данных </router-link> -->
    </div>

    <div>
        <h1>Перечень комплексов</h1>
    </div>
    <div>
       <table >
        <thead>
            <tr>
                <th>Название комплекса</th>
                <th>Описание комплекса</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="complex in complexes" :key="complex.id">
                <td>{{ complex.Name }}</td>
                <td>{{ complex.Description }}</td>
            </tr>
        </tbody>
    </table> 
    </div>
    
</template>

<script>
// import MGKmenu from "../Monitoring/MGK/index.vue"

export default {
    name: 'Complex',
    components: {},

    data() {
        return {
            complexes: [],
        }
    },

    mounted() {
        this.GetComplexes()
    },

    methods: {
        GetComplexes() {
            axios
                .get('/api/complex')
                .then(res => {
                    this.complexes = res.data
                    console.log(res.data)
                })
                .catch(err => {
                    console.log(err)
                })
        },
    },
}
</script>

<style scoped>

table {
    width: 90%;
    border-collapse: collapse;
    text-align: center;
    margin: auto;
    margin-top: 20px;
}

table thead tr {
    color: #ffffff;
    font-weight: bold;
    background: #00bf80;
}

table thead tr td {
    border: 1px solid #01ab73;
}

table tbody tr td {
    border: 1px solid #080808;
}

table tbody tr:nth-child(2n) {
    background: #f4f4f4;
}
table tbody tr:hover {
    background: #ebffe8;
}


.headline {
    text-align: center;
    margin: 20px;
    margin-bottom: 30px;
}

.desktop {
    display: flex;
    justify-content: space-between;
    /* padding-top: 50px; */
    margin-top: 20px;
}

._cards {
    width: 30%;
    text-align: center;
    /* border: 1px solid red; */
}

._card {
    border: 1px solid darkblue;
    border-radius: 5px;
    background: white;
    height: 120px;
    /* width: 80%; */
}

._card-body {
    /* border: 1px solid red; */
    margin-top: 5px;
    height: 100%;

    /* position: relative; */
}

._card-body p {
    /* border: 1px solid red; */
    height: 3rem;
    overflow: hidden;
    margin: auto;
}

._card-title {
    /* border: 1px solid red; */
    margin: auto;
}

._card-btn {
    /* border: 1px solid red; */
    /* margin: auto; */
    /* абсолютное позиционирование */
    /* position: absolute; */
    /* прижимаем блок к нижней границе относительно блока с position: relative*/
    /* bottom: 30px; */
}
</style>
