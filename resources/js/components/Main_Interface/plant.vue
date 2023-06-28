<template>
    <h3>Путь к файлу: component\Menu\plant.vue</h3>

<div class="main-header">   
        <div class="col-md-2" align="center"> 
            <router-link class="btn btn-success m-2"  :to="{name: 'MainPage'}">Главная</router-link>
            
        </div>    
</div>

<h3 class="title">{{ this.refDesc }}</h3>
<!--
<div class="container" >
    <div class="desktop ">
        
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">111-H1-A/B</h5>
                        <p>Сырьевые насосы</p>
                        <router-link class="btn btn-primary" :to="{name: this.namePage, params:{prefPath: '/api/H1a/table'}}">H1-A</router-link>
                        <router-link class="btn btn-primary m-2" :to="{name: 'MGK.H1B'}">H1-B</router-link>
                    </div>
                </div>
            </div>
       
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">111-ДК1 А/В</h5>
                    <p>Компрессора подпиточного газа</p>
                    <router-link class="btn btn-primary" :to="{name: 'MainPage'}">ДК-1А</router-link>
                    <router-link class="btn btn-primary m-2" :to="{name: 'MainPage'}">ДК-1А</router-link>
                    </div>
                </div>
            </div>
       
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
-->
<!--
<div>
     <tr v-for="item in GETdataPump">{{ item.PI7026B }}</tr> 
</div>
-->

<div class="container" >
    <div class="desktop">
        <!-- <div class="row"> -->
            <div class="_cards"  v-for="item in MenuCount" :key="item.id">
                <div class="_card ">
                    <div class="_card-body">
                        <h5 class="_card-title">{{ item.NameUnit }}</h5>
                        <p>{{item.Description}} </p>
                        
                        <router-link class="btn btn-primary" :to="{name: item.routWEB , 
                                                                    params:{
                                                                        prefPath: item.routAPI, 
                                                                        prefName: item.Description
                                                                    }
                                                                }">Детально</router-link>


                        <!-- <router-link class="btn btn-primary" :to="{name: item.routWEB , params:{prefPath: 'H1a'}}">Детально</router-link> -->
                        <!-- <router-link class="btn btn-primary" :to="{name: item.route , params:{prefPath: '/api/H1a/table'}}">Детально</router-link> -->
                        <!-- <router-link class="btn btn-primary" :to="'/' + item.route">Детально</router-link> -->
                    </div>          
                </div>
            </div>
    </div>   
</div> 

</template>

<script>
import { computed } from 'vue';
import { mapActions, mapGetters } from "vuex"; // импорт экшенов и гетеров из vuex 

export default {
    name: "Plant",

    // props:true,
    props: {
        refIdPlant:{
         type: String,
         default: 0,
        },
        refDesc:{
            type: String,
            default: 'Description',
        }
    },

    setup() {
        return {
            namePage: 'MGK'
        }
    },

    data(){
        return{
            MenuCount: []
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
    computed: {
    },

    methods:{
        loadMenu: function() {
        axios.get('/api/interface/unitGroup/' + this.refIdPlant)

            .then( (response) => {
                this.MenuCount = response.data;
                // console.log(this.MenuCount);
            })

            .catch(function(error){
                console.log(error);
            })
    },
    },

    mounted(){
         this.loadMenu();
    }
}
</script>

<style scoped>


/**--------------- */

    .title {
        text-align: center;
        margin: 20px;
        margin-bottom: 30px;
    }
    .child-item{
        margin: 30px;
    }



    .desktop {
    display: flex;
    flex-wrap: wrap;
    
    justify-content: center;/*space-between;*/
    /* padding-top: 50px; */
    margin-top: 20px;
}

._cards {
    display: flex;
    width: 50%;
    height: 200px;
    text-align: center; 
    /* margin: 20px; */
    /* border: 1px solid red; */
    align-items: center;
    justify-content: center;/*space-between;*/
}

._card {
    border: 1px solid darkblue;
    border-radius: 5px;
    background: white;
    height: 150px;
    /* margin: 20px;  */
    width: 300px;
     
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
     overflow:hidden;
     margin: auto;
}

._card-title {
    /* border: 1px solid red; */
    margin: auto;
}
</style>
