export default {
    // state () {
    //     return{
    //         count: 101
    //     }
    // },

    actions: {
       async loadPointData({ commit }) {
            try{
                const data = await axios.get('/api/H1b/pressure');
                commit("SET_DATA", data.data);
            } 
            catch (error) {
                alert(error);
                console.log(error);
            }
        },

        async loadData ({commit}) {
            axios.get('/api/H1b/pressure')

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
            state.dataPump = data;
        },

        SET_POINT: (state, data) => {
            state.dataPoint = data;
        }
    },

    state: {
        count: 101,
        dataPump: [],
        dataPoint: [],
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