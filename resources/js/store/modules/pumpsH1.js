export default {
    // state () {
    //     return{
    //         count: 101
    //     }
    // },

    actions: {
       async loadPointData({ commit }) {
            try{
                const data = await axios.get('/api/H1b/data');
                commit("SET_DATA", data);
            } 
            catch (error) {
                alert(error);
                console.log(error);
            }
        },

        async loadData ({commit}) {
            await axios.get('/api/H1b/data')

                .then((response) => {
                    commit('SET_POINT', response);
                    return response;
                })
                .catch((error) => {
                    console.log(error);
                    return error;
                })
        },
    },

    mutations: {
        SET_DATA: (state, data) => {
            state.dataPump = data.data;
            state.dataTable = data;
        },

        SET_POINT: (state, data) => {
            state.dataPoint = data;
        }
    },

    state: {
        count: 101,
        dataPump: [],
        dataPoint: [],

        dataTable: [], // данные для отображения в таблице
        dataPI: [], // данные давления для отображения на тренде 
        dataTI: [], // данные температуры для отображения на тренде
        dataXVI: [],    // данные осевого смещения для отображения на тренде
        dataZVI: [],    // данные вибрации для отображения на тренде
    },

    
    getters: {
        allData(state) {
            return state.count;
        },

        GETdataPump(state){
            return state.dataPump;
        },

        GETdataPoint(state){
            return state.dataPoint;
        }
    },
}