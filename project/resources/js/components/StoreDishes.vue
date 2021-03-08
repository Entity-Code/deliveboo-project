<template>
    <div>
        
        <h1>Restaurant menu</h1>

        <!-- dishes -->
        <div >
            
            <div v-for="category in categories">
                <div v-for="dish in dishes" v-if="dish.user_id == id && category.id == dish.category_id">
                    <p>
                        category name: {{category.name}} <br>
                        dish name: {{dish.name}} <br>
                        dish price: {{dish.price/100}}€
                    </p>
                    <button>Add to cart</button>
                </div>
            </div>

        </div>
        

        <hr style="background: white;">

        <!-- esempio -->
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
                
                categories: [],
                dishes: []

            }
        },

        mounted: function () {

            this.getData();
        },
        props: {
            //nome proprietà: tipo di dato
            id: Number
        },
        methods: {

            getData: function () {
                
                axios.get('http://localhost:8000/index/menu/' + this.id)
                    .then(res => {
                        
                        //categories
                        this.categories = res.data.categories;
                        console.log(this.categories);
                        
                        //dishes
                        this.dishes = res.data.dishes;
                        console.log(this.dishes);

                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            }



        }

        
    }


</script>
