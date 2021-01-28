<template>
<div>
        <section class="login-card">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="login">
                        <b-field label="Email">
                            <b-input type="email" v-model="email">
                            </b-input>
                        </b-field>
                        <b-field label="Password">
                            <b-input type="password" v-model="password">
                            </b-input>
                        </b-field>

                        <b-input class="is-primary" type="submit">Login</b-input>

                    </form>

                </div>
            </div>
            <p>{{ info }}</p>
        </section>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password:'',
            info: ""
        }
    },
    methods: {
        login(){
            axios
                .post('/api/login', {
                    'email' : this.email,
                    'password' : this.password
                })
                .then(response => {
                console.log(response);
            });

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
