const { forEach } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('filter-typologies', require('./components/FilterTypologies.vue').default);


//-------------------------------------------------
function init() {
    
    const app = new Vue({
        el: '#app',

        data() {
            return {
            //FILTER
                //typs in check
                data: [],

                //value input checkbox
                checkedNames: [],

                //ristoranti
                users: [],
//------------------------------------------------
            //CART
                categories: [],
                dishes: [],
                
                page: "dishes",
                cart: [],
                
                id: 0,
                //quantità totale
                totCart: 0,
                //prezzo totale
                totPrice: 0,
//-------------------------------------------------
                //CHECKOUT
                visible: "visible",
                hidden: "hidden",
            }
        },

        mounted: function () {
            this.getUrl();
            this.getData();
        },
        
        methods: {

            getData: function () {
                
                //filter
                axios.get('http://localhost:8000/typs/filter')
                    .then(res => {

                        //typs per le checkbox (search)
                        this.data = res.data.typs;
                        //console.log(this.data);


                        //restaurants
                        this.users = res.data.users;
                        console.log(this.users);

                        //ciclo ogni oggetto e gli aggiungo la chiave filtered = true di default;
                        //che utilizzo in filtraggio()
                        for (let key in this.users) {
                            this.users[key].filtered = true;
                            //console.log(this.data[key]);
                        }

                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
                //cart
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
            //filter methods
            filtraggio: function () {
                
                //console.log(this.checkedNames);
                // ciclo user in users
                this.users.forEach(user => {

                    //count
                    var n = 0;
                    user.typologies.forEach(typ => {

                        var typName = typ.name;

                        if (this.checkedNames.includes(typName)){

                            n = n + 1; 
                        }

                    });

                    if (n == this.checkedNames.length || this.checkedNames == '') {

                        user.filtered = true;                        
                    } else {

                        user.filtered = false;
                    }         
                    
                });
            
            },
            getUrl: function () {

                var currentUrl = window.location.pathname;
                var idUrl = currentUrl.replace('/show/menu/', '');

                this.id = idUrl;

            },




            //cart methods
            navigateTo: function (page) {
    
                this.page = page;
            },
            addItemToCart: function (dish) {

                if (this.cart.includes(dish)) {
                    dish.quantity++;
                } else {                  
                    this.cart.push(dish);
                    console.log(this.cart);
                }
                
                //quantità totale
                this.totCart++;  
                //prezzo totale
                this.totPrice += dish.price;

                console.log(dish)
                
            },
            removeItemFromCart: function(dish) {

                
                if (dish.quantity == 1 && this.cart.length == 1) {
                    this.cart.splice(dish, 1);
                
                } else if (dish.quantity == 1 && this.cart.length > 1) {
                    this.cart.splice(dish.quantity, 1);
                    
                } else {
                    
                    dish.quantity--;
                }

                this.totCart-- ; 
                this.totPrice -= dish.price;
                 
            },

            checkoutVisibility: function () {
                
                this.isHidden = !this.isHidden;

                console.log(this.isHidden);
                
            }
            
        }


    });

}


document.addEventListener("DOMContentLoaded", init);