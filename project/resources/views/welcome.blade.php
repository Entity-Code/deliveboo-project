<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <script src="{{asset('/js/app.js')}}"></script>

        {{-- <script rel="stylesheet" href="{{asset('/js/app.js')}}"> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">
        
        {{-- HOME  --}}
        <link
          href="https://fonts.googleapis.com/css2?family=Monofett&display=swap"
          rel="stylesheet"
        />   
    </head>
    <body>
        
        {{-- header  --}}
             <header class="home">
                <div class="home__register">
                    <div class="home__register--box-anchor">
                        @if (Route::has('login'))                           
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth                        
                        @endif       
                    </div>   
                </div>
                
                <div class="home__container">

                    <div class="home__logo">

                      <div class="home__logo--text">DeliveBoo</div>
                      <div class="home__logo--subtext">
                        La missione di DeliveBoo è trasformare il modo in cui i clienti
                        mangiano. Un ingrediente chiave del nostro successo è offrire ai
                        nostri clienti la migliore selezione di ristoranti: che tu voglia
                        sushi per cena, un’insalata per pranzo, o una brioche per colazione,
                        ci pensiamo noi!
                      </div>

                      <a href="#order" class="home__logo--arrow">
                      <div class="round">                         
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>                                                 
                      </div>
                      Ordina ora
                    </a>

                    </div>              
                </div>           
              </header>

           
                
                <div id="app">
                    {{-- <filter-typologies></filter-typologies>   --}}
                    
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
                                          <label :for="typ.name">@{{ typ.name }}</label>
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
                                                  <h5>@{{user.name}}</h5>
                                                              
                                                  <div v-for="typology in user.typologies">
                                                      @{{typology.name}}
                                                  </div>
                                                  <div>@{{user.address}}</div>
                                              </a>
                                          </div>        
                                      </div>
                                  </div>
                              </div>      
                          </main>
                  
                  
                      
                      
      
                       </div>

                    </div>
                  
          </main>

            
        
    </body>
</html>
