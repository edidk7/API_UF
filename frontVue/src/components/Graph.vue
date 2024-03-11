//vite-project/src/components/Student.vue
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="text-center text-dark mt-2">Laravel 10 Vue JS Vite Data UF</h3>
            </div>
            <div class="col-12 col-md-6"></div>
            <div class="col-12 col-md-6"></div>            
        </div>
    </div>    
</template>
<script>

export default {
    name: 'Student',
    data () {
    return {
        result: {},
        student:{
            id: '',
            valor: '',
            fecha: ''
        }
    }
    },
    created() { 
        this.StudentLoad();
    },
    mounted() {
        console.log("Called OK!");
    },
    methods: {
        async StudentLoad() {
            try {
                const page = "http://127.0.0.1:8000/api/uf";
                const response = await fetch(page);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                console.log("data UF:", data);
                this.result = data;
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    }
    }
</script>