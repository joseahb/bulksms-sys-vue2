<template>
<div>
        <section class="login-card">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="login" >
                        <div class="form-group is-small" :class="{ 'form-group--error': $v.email.$error }">
                            <b-field label="Email">
                                <b-input type="email" v-model="email">
                                </b-input>
                            </b-field>
                        </div>
                        <div class="error" v-if="!$v.email.required">Email is required</div>
                        <div class="form-group is-small" :class="{ 'form-group--error': $v.password.$error }" >
                            <b-field label="Password">
                                <b-input type="password" v-model="password">
                                </b-input>
                            </b-field>
                        </div>
                        <div class="error" v-if="!$v.password.required">Password is required </div>

                        <b-input class="is-primary" type="submit" value="Login"></b-input>

                    </form>

                </div>
                <div class="card-footer">
                    <div>
                        <router-link class="is-link" to="register" @click="submit">Sign up</router-link>
                    </div>
                </div>
            </div>
        </section>
</div>
</template>

<script>
// import axios from 'axios'
import { required, minLength, email } from 'vuelidate/lib/validators'
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password:'',
        }
    },
    validations:{
        email: {
            required,
            minLength: minLength(4)
        },
        password: {
            required,
            email
        }
    },
    methods: {
        submit(){
            this.$v.$touch();
            if(this.$v.$error) {
                this.$v.$reset();
            }
            else{
                this.login();
            }
        },
        login(){
            this.$store
                .dispatch('login', {
                    email: this.email,
                    password: this.password
                })
                .then(() => {
                    this.$router.push({ name: 'dashboard' })
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>

<style scoped>
 .login-card{
     width: 30%;
     margin: 10rem auto;
 }
</style>
