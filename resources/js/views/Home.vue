<template>
    <div>
       <section class="section is-large is-light">
           <div class="container is-align-content-center">
               <div class="columns">
                   <div class="column">
                       <button class="is-primary">
                           <router-link to="/login">Login</router-link>
                       </button>
                       <button class="is-primary">
                           <router-link to="/register">Sign up</router-link>
                       </button>
                   </div>
               </div>
           </div>
       </section>
    </div>
</template>

<script>
export default {
name: "Home"
}
</script>

<style scoped>

</style>
