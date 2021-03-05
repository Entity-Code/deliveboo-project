<template>
    <div>
        <!-- search -->
        <fieldset>

            <legend style="margin-left: 100px;">Search Typologies!</legend>
            
            <!-- checkboxes -->
           <div v-for="typ in data">
                <input 
                    type="checkbox" 
                    :id="typ.name" 
                    v-model="checkedNames" 
                    :value="typ.name" 
                    @change="filtraggio()"
                >
                <label :for="typ.name">{{ typ.name }}</label>
            </div> 
              
        </fieldset>
        
        <div>
            {{checkedNames}}
        </div>

        <!-- results container--> 
        <main id="container-boxes">

            <!-- results  -->
            <ul>
                <li v-if="user.filtered" v-for="user in users">

                    <a :href="'/show/menu/' + user.id">
                        {{user.id}}] {{user.name}}
                    </a>
                    
                    <ul v-for="user in user.typologies">
                        <li>{{user.name}}</li>
                    </ul>

                </li>  
            </ul>
                      
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
                users: [],

            }
        },

        mounted: function () {

            this.getData();
        },
        
        methods: {
            getData: function () {
                
                axios.get('http://localhost:8000/typs/filter')
                    .then(res => {

                        //typs per le checkbox (search)
                        this.data = res.data.typs;
                        console.log(this.data);

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

                // ciclo user in users
                this.users.forEach(user => {
                    
                    // ciclo typology in user.typologies
                    for (let i = 0; i < user.typologies.length; i++) {
                        
                        //singola typ
                        var element = user.typologies[i];
                    
                        //input value
                        var typName = element.name;

                        //console.log(typName);

                        if (this.checkedNames.includes(typName) || this.checkedNames == '') {
                            
                            user.filtered = true;
                            break;
                        } else {
                            
                            user.filtered = false;
                        }
                    }
                    
                });

                    
            }


        }

        
    }


</script>
