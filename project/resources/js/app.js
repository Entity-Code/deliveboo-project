require('./bootstrap');
window.Vue = require('vue');
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);




//-------------------------------------------------
function init() {
    
    new Vue({
        el: '#app',
        data: {
            messages: ['ciao1','ciao2','ciao3','ciao4']
        },
        mounted: function () {
            console.log('hello');
        }
        
    });
}

document.addEventListener("DOMContentLoaded", init);