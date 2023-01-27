<template>
    <h2> Data 111 DK A</h2>
    <div :class="{'spinner-border': loading}" role="status">
<!--        <span class="sr-only">Load ...</span>-->
    </div>
    <div class="list-group col-1">
<!--        <a class="list-group-item" v-for="point in pointData">-->
<!--            {{Math.floor(point.PI7026A*100)/100}}-->
<!--        </a>-->
    </div>

    <div >
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Data</th>
                <th scope="col">PI7026A</th>
                <th scope="col">PI7028A</th>
                <th scope="col">PDI7013A</th>
                <th scope="col">ZVI7000A</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="point in pointData">
                <td>{{point.LocalTime}}</td>
                <td>{{Math.floor(point.PI7026A*100)/100}}</td>
                <td>{{Math.floor(point.PI7028A*100)/100}}</td>
                <td>{{Math.floor(point.PDI7013A*100)/100}}</td>
                <td>{{Math.floor(point.ZVI7000A*100)/100}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "DK_A",

    data: function () {
        return {
            loading: true,
            pointData: [],
        }
    },

    mounted() {
        this.loadPointData();
    },

    methods: {
        loadPointData: function () {
            axios.get('/api/dk_a_data')
                .then((response) => {
                    this.pointData = response.data.data;
                    this.loading = false;

                    // console.log(response.data.data)
                })
                .catch(function (error){
                    console.log(error);
                })
        }
    },
}
</script>

<style scoped>

</style>
