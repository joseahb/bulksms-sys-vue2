<template>
<div>
        <section class="register-card is-secondary">
            <div class="container is-max-desktop">
                <div class="box">
                    <div class="title">Sign up</div>
                    <form @submit.prevent="register">
                        <b-
                            <b-field label="Name">
                                <b-input v-model="name" class></b-input>
                            </b-field>

                            <b-field label="Email">
                                <b-input type="email" v-model="email">
                                </b-input>
                            </b-field>

                            <b-field label="Password">
                                <b-input type="password" v-model="password">
                                </b-input>
                            </b-field>
                            <b-field label="Confirm Password">
                                <b-input type="password" v-model="password_confirmation">
                                </b-input>
                            </b-field>

                            <button type="submit" class="is-primary">
                                Sign Up
                            </button>
                        </form>
                </div>
            </div>


        </section>
</div>
</template>

<script>
// import axios from 'axios';
export default {
    name: "Register",
    data: function(){
        return {
            name : '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    methods: {
        register() {
            this.$store
                .dispatch('register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(() => {
                    this.$router.push( { name : 'login'});
                })
                .catch( err => { console.log(err)});
        }
    }
}
</script>

<style scoped>
.register-card{
    width: 50%;
    margin: 5rem auto;
}
</style>
