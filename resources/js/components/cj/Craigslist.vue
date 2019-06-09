<template>
   <section>
      <h1>Craigslist - Search</h1>

      <form @submit.prevent="addTerm">
         <fieldset class="form-group">
            <label for="term">Search for</label>
            <input v-model="term" autocomplete="disabled" type="search" id="term" placeholder="Enter a search term" class="form-control">
         </fieldset>
         <button type="submit" class="btn btn-danger">Search</button>
      </form>

      <div v-if="term">
         Searching for <strong>{{term}}</strong>
      </div>
      <div v-if="terms">

         <ul class="nav nav-tabs">
            <li @click="setActiveTerm(term)" v-for="term in terms" class="nav-item">
               <a :class="{active: activeTerm==term}"
                  href="#" class="nav-link ">{{term}}</a>
            </li>
         </ul>
         <section class="row">
            <div v-for="result in activeResults" class="card col-4">
               <div class="card-body">
                  <h5 class="card-title">{{result.color}}</h5>
                  <div class="card-text">{{result.name}}</div>
               </div>
            </div>
         </section>
      </div>
   </section>
</template>

<script>
   const API_URL = 'http://instagram.test/api/crud/';
   export default {
      // name: "craigslist",
      data() {
         return {
            term: '',
            terms: ['moog', 'synth', 'keyboard'],
            activeTerm: null,
            activeResults: []
         }
      },
      methods: {
         addTerm() {
            console.log("hello 56");
            if (this.term !== '') {
               this.terms.push(this.term);
            }
            this.term = '';
         },
         setActiveTerm(term){
            this.activeTerm = term;
            const url = `${API_URL}?${term}`;
            fetch(url)
               .then(response => response.json())
               .then(json => {
                  console.log(json);
                  this.activeResults = json;
               });
         }
      }
   }
</script>

<style scoped>

</style>
