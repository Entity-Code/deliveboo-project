<template>
    <div>
        

        <div>{{totCart}} in cart</div>
        <button @click="navigateTo('dishes')">View Menu</button>
        <button @click="navigateTo('cart')">View Cart</button>

        <hr style="background: white;">



        <!-- dishes -->
        <div v-if="page === 'dishes'">    
        <h1>Restaurant menu</h1>

            <div v-for="(category, i) in categories">
                <div v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id" :key="dish.name">
                    <p>
                        dish name: {{dish.name}} <br>
                        dish price: {{dish.price/100}}€ <br>
                        dish category: {{category.name}}
                    </p>
                    <button @click="addItemToCart(dish)">Add to cart</button>     
                </div>
            </div>
        </div>

        <!-- cart -->
        <div v-if="page === 'cart'">    
        
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
                <hr style="background: white;">
                <h2>Total price: {{totPrice/100}} €</h2>

                <button @click="sendTotPrice()">Vai al checkout</button>
            </div>
        </div>

        

        <hr style="background: white;">


    </div>
</template>


<script>

    export default {
        
        data() {
            return {

                categories: [],
                dishes: [],
                
                page: "dishes",
                cart: [],
                
                //quantità totale
                totCart: 0,
                //prezzo totale
                totPrice: 0
                
            }
        },

        mounted: function () {

            this.getData();
            
        },
        props: {
            id: Number,
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

                        for (const key in this.dishes) {
                            this.dishes[key].quantity = 1;
                        }
                        

                    console.log(this.cart);
                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            },
            navigateTo: function (page) {
    
                this.page = page;
            },
            addItemToCart: function (dish) {

                if (this.cart.includes(dish)) {
                    dish.quantity++;
                } else {                  
                    this.cart.push(dish);
                }
                
                //quantità totale
                this.totCart++;  
                //prezzo totale
                this.totPrice += dish.price;
                
            },
            removeItemFromCart: function(dish) {

                if (dish.quantity === 1) {       
                    this.cart.splice(dish,1);
                } else {
                        
                    dish.quantity--;
                }
                this.totCart-- ; 

                this.totPrice -= dish.price;
                 
            },

            sendTotPrice: function () {
                
                return this.totPrice;
                
            },   
            
        }

        
    }


</script>
