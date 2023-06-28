<template>

<!-- <div class="container" >
    <div class="desktop">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">МГК</h5>
                        <p>Гидрокрекинг</p>
                        <router-link class="btn btn-primary" :to="{name: 'MGKmenu'}">Детально</router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">УПВ</h5>
                    <p>Водородка</p>
                    <router-link class="btn btn-primary" :to="{name: 'UPVmenu'}">Детально</router-link>
                    </div>
                </div>
            </div>
    </div>   
</div> -->

<!-- Меню загружаемое из БД -->
<h1>component\monitoring\main.vue</h1>

<div class="main-header">   
        <div class="col-md-2" align="center"> 
            <router-link class="btn btn-success m-2"  :to="{name: 'index'}">Домашняя страница</router-link>
            
        </div>    
</div>

    <h3 class="headline">Мониторинг динамического оборудования КТУ ГПВГ </h3>


<div class="container" >
    <div class="desktop">
        <!-- <div class="row"> -->
            <div class="_cards"  v-for="item in MenuCount" :key="item.id">
                <div class="_card ">
                    <div class="_card-body">
                        <h5 class="_card-title">{{ item.NamePlant }}</h5>
                        <p>{{item.Description}}</p>
                        <router-link class="btn btn-primary" :to="{name: 'plant', 
                                                                    params:{ 
                                                                        refIdPlant: item.id,
                                                                        refDesc: item.Description
                                                                    }
                                                                }">Детально</router-link>
                    </div>
                    
                </div>
            </div>
    </div>   
</div> 



</template>

<script >
import MGKmenu from "../Monitoring/MGK/index.vue"

export default {
    name: "Main",
    components: { MGKmenu },

  data(){
    return {
        MenuCount: []
    }
  },

    mounted() {
        this.loadMenu();
    },

  methods: {

        loadMenu: function() {
        axios.get('/api/interface/plant')

            .then( (response) => {
                this.MenuCount = response.data;
                // console.log(this.MenuCount);
            })

            .catch(function(error){
                console.log(error);
            })
    },
        
  }
}

</script>

<style scoped>
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
     overflow:hidden;
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
