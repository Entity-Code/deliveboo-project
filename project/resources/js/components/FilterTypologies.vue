<template>
    <div>
        <!-- search -->
        <fieldset>

            <legend style="margin-left: 100px;">Search Typologies!</legend>
               
            
           <div v-for="typ in data">

                <input type="checkbox" :id="typ.name" v-model="checkedNames" :value="typ.name" @change="filtraggio()">
                <label :for="typ.name">{{ typ.name }}</label>
            </div> 
              
        </fieldset>
        
        <div>
            {{checkedNames}}
        </div>

        <!-- results -->
        <main id="container-boxes">



            <ul >
                    <li v-if="user.filtered" v-for="user in users" >
                        <a :href="'/show/menu/' + user.id">
                            {{user.id}}] {{user.name}}
                        </a>
                         <ul v-for="user in user.typologies">
                             <li>{{user.name}}</li>
                         </ul>
                    </li>

                
            </ul>
            <!-- <div v-for="user in users">
                
                <span v-for="typology in user.typologies">

                    {{typology[0].name}}
                    

                </span>

            </div> -->


            
            
        </main>
       

    </div>
</template>


<script>

    export default {
        
        data() {
            return {
                data: [],
                users: [],
                checkedNames: [],
                indexUser: 0
            }
        },

        mounted: function () {

            this.getTyps();
            
        },
        
        methods: {
            getTyps: function () {
                //typs
                
                axios.get('http://localhost:8000/typs/filter')
                    .then(res => {

                        this.data = res.data.typs;
                        this.users = res.data.users;

                        console.log(this.data);
                        console.log(this.users);

                        //ciclo ogni oggetto e gli aggiungo la chiave filtered = true di default;
                        //che utilizzo in filtraggio()
                        for (let key in this.data) {
                            this.data[key].filtered = true;
                            //console.log(this.data[key]);
                        }

                        for (let key in this.users) {
                            this.users[key].filtered = true;
                            //console.log(this.data[key]);
                        }

                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            },

            filtraggio: function () {
                //console.log(this.users.typologies.name);
                // ciclo la lista tipologie
                
                this.users.forEach((user,i) => {
                    

                    user.typologies.forEach((typ) => {

                        var typ = typ.name;
                        var typLow = typ.toLowerCase();

                        
                        //console.log(typLow);
                        
                        if (this.checkedNames.includes(typLow) || this.checkedNames == '') {
                            user.filtered = true;
                        } else {
                            user.filtered = false;
                        }
                        
                        //console.log(this.arrTyp);
                    });
                    
                });
                
                /*
                this.users.forEach((user) => {
                    this.user.forEach((typ) => {
                        console.log(typ);
                    });
                });
                */





               /* 
               filtraggio: function () {
                
                // ciclo la lista tipologie
                this.data.forEach(typ => {
                    let name =  typ.name;
                    
                    if (this.checkedNames.includes(name) || this.checkedNames == '') {
                        typ.filtered = true;
                    } else {
                        typ.filtered = false;
                    }
                    
                    
                });
               
               */
               
                

            }

        }

        
    }


</script>
