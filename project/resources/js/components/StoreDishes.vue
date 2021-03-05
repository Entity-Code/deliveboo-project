<template>
    <div>
    
        <h1>Restaurant menu</h1>

        <ul>
            <li><strong>category1</strong></li>
            <li>
                name: piatto2 <br>
                price: 13 €
            </li>
            <li>
                name: piatto2 <br>
                price: 15 €
            </li>
        </ul>

        <ul>
            <li><strong>category2</strong></li>
            <li>
                name: piatto1 <br>
                price: 11 €
            </li>
            <li>
                name: piatto2 <br>
                price: 16 €
            </li>
        </ul>

    </div>
</template>


<script>

    export default {
        
        data() {
            return {
                
                data: []
            }
        },

        mounted: function () {

            this.getData();
        },
        
        methods: {
            getData: function () {
                
                axios.get('')
                    .then(res => {
                        
                        this.data = res.data;
                        console.log(this.data);
                     

                    }).catch((err) => {
                        
                        console.log(err);
                    });

            }

        }

        
    }


</script>
