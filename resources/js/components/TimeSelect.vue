<template>
  <div id="select"> 
    <v-select
      :options="options"
      @select="optionSelest"
      :selected="selected"
    />
    <p>Selected options: {{selected}} </p>
  </div>

<div class="container" >
    <div>
            <!-- <div v-for="plant in plants" :key="plant.id" class="cards" >
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{plant.NamePlant}}</h5>
                        <p>{{plant.Description}}</p>
                        <router-link class="btn btn-primary" :to="{name: 'MGKmenu'}">Детально</router-link>
                    </div>
                </div>
            </div> -->
            <h3>Тестирование передачи параметров axios</h3>
            <div>
              C: <input type="date" v-model="start" placeholder="отредактируй меня">
                по <input type="date" v-model="dataTemp" >  
            </div>
            
            <ul>
                <li  v-for = "parametr in parametrs" :key="parametr.id">
                   <p> Data: {{parametr.LocalTime}}</p>
                </li>
            </ul>   

                   
    </div>   

     <div class="container my-5">
      <div class="text-center">
        <h1 class="display-4 text-center mb-3">Axios Crash Course</h1>
        <button class="btn btn-primary my-3" id="get">GET</button>
        <button class="btn btn-info" id="post">POST</button>
        <button class="btn btn-warning" id="update">PUT/PATCH</button>
        <button class="btn btn-danger" id="delete">DELETE</button>
        <button class="btn btn-secondary" id="sim">Sim Requests</button>
        <button class="btn btn-secondary" id="headers">
          Custom Headers
        </button>
        <button class="btn btn-secondary" id="transform">
          Transform
        </button>
        <button class="btn btn-secondary" id="error">
          Error Handling
        </button>
        <button class="btn btn-secondary" id="cancel">
          Cancel
        </button>
      </div>
      <hr />
      <div id="res"></div>
    </div>

</div> 

</template>

<script>

import axios from 'axios'
import vSelect from './v-select.vue'


export default {
    name: "Main",
    components: { vSelect, },

  data(){
    return {
      dataTemp: new Date().toISOString().substr(0, 10),
        filter_id: 2,
        reqParam:{
            id: 2
        },
        parametrs:[],
        pathURL: '/api/param?',
        bef: 'beforeDate=2023-01-27',
        // path: '',
        regimbefore: '',
        regimAfter: '',
        regimBetween: '',
        regim: 'before', //before , after , between
        getParam :{
          // beforeDate: '',
          // afterDate: '',
        },
        mass: {
              startDate: '2023-01-25',
              endDate: '2023-01-26',
          },
        
        start: '2023-07-13',

        //-------------------------------------
        //Опции для компонента select
        options: [
          {name: 'After', value: 1},
          {name: 'Before', value: 2},
          {name: 'Between', value: 3},
        ],
        selected: 'Select',
        //-------------------------------------
    }
  },

    mounted() {
      this.getParam = {
        startDate: this.start,
        endDate: this.dataTemp, //'2023-01-26',
        }
        console.log( this.getParam);
        
        
        // this.filter(this.filter_id);
        this.m_find(this.regim);

        this.getParam = {}
        //  console.log(this.getParam);


    },

  methods: {

          async m_find(x) {

            switch(x) {
            case 'before':  
              console.log('Regim: before');
            break;

            case 'after':  
              console.log('Regim: after');
            break;

            case 'between':  
              console.log('Regim: between');
            break;

            default:
              console.log('Regim: default');
            break;
            }

            const path = this.pathURL + this.bef
           console.log(path),
          //  axios.get('/api/param?',{params:{beforeDate:'2023-01-2'}})
            // axios.get(this.pathURL,{params:{beforeDate:'2023-01-2'}})
           await axios.get('/api/param?',{
              params: this.getParam,
              })

            // this.getParam = 
            // axios.get(path)
          
            // axios.get('/api/param?', this.reqParam)
                .then(res => {
                    this.parametrs = res.data
                    console.log(res.data);
                })
                .catch(err => {
                    //  console.log(err);
                })
        },

        filter(id) {

            const path = this.pathURL + this.bef
           console.log(path),
           // axios.get('/api/param?',{params:{beforeDate:'2023-01-2'}})
            // axios.get(this.pathURL,{params:{beforeDate:'2023-01-2'}})
            axios.get(path)
          

            // axios.get('/api/param?', this.reqParam)
                .then(res => {
                    this.parametrs = res.data
                    console.log(res.data);
                })
                .catch(err => {
                    //  console.log(err);
                })
                // console.log('выполнился filter')
        },

    // ----------------------------------------------
    // Функция для select
        optionSelest(option) {
          this.selected = option.name
        }
    // ----------------------------------------------
  },


  watch: {
      start: function(){
        this.getParam = {
        startDate: this.start,
        endDate: this.dataTemp, //'2023-01-26',
        }
        this.m_find('before')
      },

      dataTemp: function(){
        this.getParam = {
        startDate: this.start,
        endDate: this.dataTemp, //'2023-01-26',
        }
        this.m_find('before')
      }
  }
}

</script>

<style scoped>
.desktop {
    display: flex;
    justify-content: space-between;
    /* padding-top: 50px; */
    margin-top: 50px;
}

.cards {
    width: 30%;
    
}

/* ------------------------------------- */
/* Стиль для компонента Select */
#select {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* ------------------------------------- */
</style>
