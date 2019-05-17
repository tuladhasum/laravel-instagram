<template>
   <div>
      <button class="btn btn-primary ml-4 btn-sm" @click="followUser" v-text="buttonText"></button>
   </div>
</template>

<script>
   export default {
      mounted() {
         console.log('Component mounted...');
      },

      data: function () {
         return {
            status: this.follows
         }
      },

      props: [
         'userId',
         'follows',
         'likes'
      ],

      methods: {
         followUser() {
            axios.post('/follow/' + this.userId)
               .then(response => {
                  this.status = !this.status;
                  console.log(response.data);
               })
               .catch(errors => {
                  if (errors.response.status = 401) {
                     window.location = '/login';
                  }
               });
         }
      },

      computed: {
         buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
         }
      }
   }
</script>
