<template>
    <div>
        

        
            


        

        <div>{{totCart}} in cart</div>
        <button @click="navigateTo('dishes')">View Menu</button>
        <button @click="navigateTo('cart')">View Cart</button>

        <hr style="background: white;">

        <!-- cart -->
        <!-- <div v-if="page === 'cart'">    
        
            <h1>Your cart</h1>
            <div class="cart">
                <div v-for="(dish, i) in cart" :key="dish.name">
                    dish name: {{dish.name}} <br>
                    dish price: {{dish.price/100}}€
                    <br>
                    <button @click="removeItemFromCart(dish)">Remove item</button>
                    <div class="quantity">
                        {{dish.quantity}}
                    </div>
                </div>
            </div>
        </div> -->


        <!-- <div v-if="page === 'dishes'">
            <h1>Restaurant menu</h1>

            <div v-for="(dish,i) in dishes" v-if="dish.user_id == id" :key="dish.name">
                <div v-for="category in categories" v-if="dish.category_id == category.id">
                    <p>

                        category name: {{category.name}} <br>
                        <p v-for="element in category.dishes" v-if="element.user_id == id">
                            dish name:{{element.name}} <br> 
                            dish price: {{element.price/100}}€
                        <button @click="addItemToCart(dish)">Add to cart</button>
                        </p>
                    </p>           
                </div>
            </div>
        </div> -->

        <!-- dishes -->
        <!-- <div v-if="page === 'dishes'">    
        <h1>Restaurant menu</h1>

            <div v-for="(category, i) in categories">
                <div v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id" :key="dish.name">
                    <p>
                        category name: {{category.name}} <br>

                        dish name: {{dish.name}} <br>
                        dish price: {{dish.price/100}}€
                    </p>
                    <button @click="addItemToCart(dish)">Add to cart</button>     
                </div>
            </div>
        </div> -->
        

        <div v-for="category in categories">
            
            <div v-for="dish in category.dishes" v-if="dish.user_id == id && category.id == dish.category_id">
                ({{category.id}})
                category: name{{category.name}} <br>
                dish name: {{dish.name}}
            </div>
            <!-- {{category.dishes}} -->
        </div>



        <hr style="background: white;">


    </div>
</template>


<script>

    export default {
        
        data() {
            return {
                
                data: [],

                categories: [],
                dishes: [],
                
                page: "dishes",
                cart: [],
                
                totCart: 0

            }
        },

        mounted: function () {

            this.getData();
        },
        props: {
            id: Number
        },
        methods: {

            getData: function () {
                
                axios.get('http://localhost:8000/index/menu/' + this.id)
                    .then(res => {
                       /*
                        //categories
                        this.categories = res.data.categories;
                        console.log(this.categories);
                        
                        //dishes
                        this.dishes = res.data.dishes;
                        console.log(this.dishes);
                       */
                    
                        //categories-dishes
                        this.data = res.data.categories;
                        //console.log(this.data);

                        this.data.forEach(category => {

                            console.log(category.id);

                            category.dishes.forEach(dish => {
                                
                                if (dish.user_id == this.id && dish.category_id == category.id) {
                                    this.dishes.push(dish);
                                    this.categories.push(category);
                                }
                                

                            });

                        });


                        console.log(this.dishes);
                        console.log(this.categories)
                        //console.log(this.categories);

                        /*
                        for (const key in this.categories) {
                            
                            this.categories[key].quantity = 1;
                        }
                        */

                    console.log(this.cart);
                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            },
            addItemToCart: function (dish) {

                if (this.cart.includes(dish)) {
                    dish.quantity++;
                } else {                  
                    this.cart.push(dish);
                }

                this.totCart++ ; 
                console.log(dish);
            },
            removeItemFromCart: function(dish) {

                if (dish.quantity === 1) {       
                    //this.cart.splice(this.cart.indexOf(dish));
                    this.cart.splice(dish,1);
                } else {
                        
                    dish.quantity--;
                }


                this.totCart-- ; 
                 
            },
            navigateTo: function (page) {

                this.page = page;
            }



        }

        
    }


</script>
