<template>
    <div>

        <ul>
            <li v-for="typ in data">
                {{ typ.name }}
            </li>
        </ul>

    </div>
</template>


<script>

    export default {
        
        data() {
            return {
                data: [],
            }
        },
        mounted: function () {

            this.getTyps();
        },
        methods: {
            getTyps: function () {
                
                axios.get('http://localhost:8000/typs/filter')
                    .then(res => {

                        this.data = res.data.typs;
                        console.log(this.data);

                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            }

        }
    }


</script>
