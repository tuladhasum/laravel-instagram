<template>
   <div>
      Hello from Sandbox {{status}}<br>
      Username: {{this.username}}
      <br>
      <button @click="toggleVisibility">Toggle</button>
      <input v-model="username"/>
      <span v-if="visibility">Based on parameter</span>


      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
         Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  ...
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      name: "SandboxExample",

      methods: {
         toggleVisibility() {
            this.visibility = !this.visibility;
         },
      },

      data: function () {
         return {
            status: "This is status",
            visibility: true,
            username: ''
         }
      }
   }
</script>

<style scoped>

</style>
