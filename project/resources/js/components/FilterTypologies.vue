<template>
    <div>
        <!-- search -->
        <fieldset>

            <legend style="margin-left: 100px;">Search Typologies!</legend>
                        
            <input list="typs-list" type="search" v-model="filter" @input="filtraggio()">
            <datalist id="typs-list" >
                <option v-for="typ in data">
                    {{typ.name}}
                </option>
            </datalist>
           
                        
        </fieldset>
        
        <!-- results -->
        <main id="container-boxes">
            <a href="" v-for="(typ, index) in data" v-if="typ.filtered">
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
        </main>
       

    </div>
</template>


<script>

    export default {
        
        data() {
            return {
                data: [],
                filter: ""
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
                this.data.forEach((typ, index) => {
                    let string = this.filter;
                    let name =  typ.name;

                    //converto in minuscolo
                    string = string.toLowerCase();
                    name = name.toLowerCase();

                    //se la stringa è contenuta nel nome inserito
                    if (name.includes(string)) {
                        typ.filtered = true;
                    } else { //altrimenti
                        typ.filtered = false;
                    }

                });

            }

        }

        
    }


</script>
