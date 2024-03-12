import {createStore} from 'vuex';

export default createStore({
    state: {
        ufData: null // Inicializamos ufData como null
    },
    mutations: {
        // Mutación para actualizar ufData con los datos recuperados
        setUfData(state, payload) {
            state.ufData = payload;
        }
    },
    actions: {
        // Acción para obtener los datos de uf de la API
        async fetchUfData({commit}) {
            try {
                const page = "http://127.0.0.1:8000/api/uf"; // Endpoint Get UF
                const response = await fetch(page); // Hacer una solicitud GET a la API
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json(); // Convertir la respuesta a formato JSON
                console.log("data store", data)
                commit('setUfData', data); // Llamar a la mutación para almacenar los datos en el estado
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    },
    getters: {
        getUfData(state) {
            return state.ufData;
        }
    }
});
