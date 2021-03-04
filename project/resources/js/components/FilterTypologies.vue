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
        
        <!-- results -->
        <main id="container-boxes">
            <a href="#" v-for="typ in data" v-if="typ.filtered">
                <div class="box" >

                    <!-- name -->
                    <h3 class="info name-typ">
                        {{typ.name}}
                    </h3>
                    <!-- titolo originale -->
                    <div class="info img-typ">
                        <img :src="typ.img_typs">
                    </div>

                    
                    
                    

                </div>
            </a>
            
            <div v-for="user in users">          
                
                
                {{user.typologies[user.typologies.length -1].name}}    

            </div>


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

                    }).catch((err) => {
                        
                        console.log(err);
                    });
                
            },

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

            }

        }

        
    }


</script>
