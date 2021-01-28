<template>
<div>
        <section class="register-card">
            <div class="card">
                <div class="card-header">
                    <h3 class="is-4">
                        Sign Up
                    </h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="register">
                        <b-field label="Name">
                            <b-input v-model="name"></b-input>
                        </b-field>

                        <b-field label="Email"
                                 type="is-danger"
                                 message="This email is invalid">
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

                        <button type="submit" class="is-primary is-light">
                            Sign Up
                        </button>
                    </form>

                </div>
                <div class="card-footer">
                </div>
            </div>

        </section>
</div>
</template>

<script>
import axios from 'axios';
export default {
    name: "Register",
    data: function(){
        return {
            name : '',
            email: '',
            password: '',
            password_confirmation: '',
            info : ""
        }
    },
    methods: {
        register() {
            axios
                .post('api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                .then(response => {
                    console.log(response);
                });
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
