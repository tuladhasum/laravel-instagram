<template>
   <div>
      <button class="btn btn-link" @click="likePost" v-text="buttonText"></button>
      <i class="fas fa-thumbs-up"></i>
   </div>
</template>

<script>
   export default {
      mounted() {
         console.log('Component mounted.');
         console.log(this.likes);
      },

      data: function () {
         return {
            status: this.likes
         }
      },

      props: [
         'postId',
         'likes'
      ],

      methods: {
         likePost() {
            axios.post('/p/' + this.postId + '/like')
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
            return (this.status) ? 'Like' : 'Unlike';
         }
      }
   }
</script>
