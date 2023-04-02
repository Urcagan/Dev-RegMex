<template>
<h3 class="title">Установка гидрокрекенга</h3>
<div class="container" >
    <div class="desktop ">
        <!-- <div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">111-H1-A/B</h5>
                        <p>Сырьевые насосы</p>
                        <div>count {{ allData }}</div>
                        <router-link class="btn btn-primary" :to="{name: this.namePage, params:{prefPath: '/api/H1a/table'}}">H1-A</router-link>
                        <router-link class="btn btn-primary m-2" :to="{name: 'MGK.H1B'}">H1-B</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->

        <!-- <div div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">111-ДК1 А/В</h5>
                    <p>Компрессора подпиточного газа</p>
                    <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">111-ЦК1</h5>
                <p>Компрессор циркулирующего газа</p>
                <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                </div>
            </div>
        </div>
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">113-ДК1</h5>
                <p>Компрессор сжатия остаточного газа</p>
                <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                </div>
            </div>
        </div>
    </div>   
</div> 

</template>

<script>
import { computed } from 'vue';
import { mapGetters } from "vuex";
import {mapActions} from "vuex";

export default {
    name: "Index",

    setup() {
        return {
            namePage: 'MGK.H1A'
        }
    },

    data(){
        return{

        }
    },

    computed: {
        // count(){
        //     return this.$store.state.count
        // }

        // count(){
        //     return this.$store.getters.allData
        // }

        
    },
    computed: mapGetters(["allData"]),

    methods:{
        ...mapActions([
            'loadPointData'
        ]),
    },

    mounted(){
        this.loadPointData()
    }
}
</script>

<style scoped>
    .desktop {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .title {
        text-align: center;
        margin: 20px;
        margin-bottom: 30px;
    }
    .child-item{
        margin: 30px;
    }
</style>
