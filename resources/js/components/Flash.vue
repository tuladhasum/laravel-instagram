<template>
   <div class="alert alert-info alert-flash" role="alert" v-show="show">
      <strong>{{type}}! </strong> {{body}}
   </div>
</template>

<script>
   export default {
      data() {
         return {
            body: '',
            type: this.type,
            show: false
         }
      },
      props: ['message','type'],
      created() {
         if(this.message){
            this.flash(this.message);
         }

         window.events.$on('flash', message => {
            this.flash(message);
         });
      },
      methods: {
         flash(message){
            this.body = message;
            this.show = true;
            this.hide();
         },
         hide(){
            setTimeout(()=>{
               this.show = false;
            },4000);
         }
      },
      name: "Flash"
   }
</script>

<style scoped>
   .alert-flash {
      position: fixed;
      right: 25px;
      bottom: 25px;
   }
</style>
