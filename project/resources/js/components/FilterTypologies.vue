<template>
    <div>
        <main id="order" class="main">
            <div class="main__container">             
                                               
                <div class="main__container--left">
                    <div class="main__container--left--top">
                        <h5>Tipologie:</h5>
                    </div>
                    <div class="main__container--left--checkbox">
                                
                        <div v-for="typ in data" class="main__container--left--checkbox--single">
                            <input 
                                type="checkbox" 
                                :id="typ.name" 
                                v-model="checkedNames" 
                                :value="typ.name" 
                                @change="filtraggio()"
                            >
                            <label :for="typ.name">{{ typ.name }}</label>
                        </div>    
                    </div>
                </div> 

                    
                <div class="main__container--right">
                    <div class="main__container--right--top">
                        <h5>Cerca un ristorante:</h5>
                    </div>
                        <div class="main__container--right--restourants">
                            <div class="main__container--right--restourants--box" v-if="user.filtered" v-for="user in users">
                                <a :href="'/show/menu/' + user.id">
                                    <img src="https://static-www.castedduonline.it/wp-content/2019/08/mcdonalds-653x367.png" alt="Logo">
                                    <h5>{{user.name}}</h5>
                                                
                                    <div v-for="typology in user.typologies">
                                        {{typology.name}}
                                    </div>
                                    <div>{{user.address}}</div>
                                </a>
                            </div>        
                        </div>
                </div>
            </div>      
        </main>
    
    
        
        
       
    </div>
</template>


<script>

    

    export default {

        data() {
            return {
                //typs in check
                data: [],

                //value input checkbox
                checkedNames: [],

                //ristoranti
                users: [] 
                
            }
        },
    
        mounted: function () {
            
            this.getData();
            console.log(this.totPrice);
        },
        
        

        methods: {
            getData: function () {
                
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
            },
            
            
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
            
            }


        }

        
    }

</script>
