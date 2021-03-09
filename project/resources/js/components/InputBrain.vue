<template>
<div>

    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount">

    {{username}}

</div>
</template>



<script>

     

    export default {
        
        props: ['username']

        
    }

</script>