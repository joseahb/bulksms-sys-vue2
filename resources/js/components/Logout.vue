<template>
    <div>
        <button :click="logout">
            Logout
        </button>
    </div>
</template>

<script>
export default {
name: "Logout"
    ,
    methods: {
        logout(){
            this.$store.dispatch('logout')
            .then(() => {
              this.$router.push('/login')
            })
        }
    }

}
</script>

<style scoped>

</style>
