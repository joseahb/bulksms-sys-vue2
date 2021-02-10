<template>
<div>
        <section class="login-card">
            <form @submit.prevent="login">
                <b-field label="Email" horizontal>
                    <b-field>
                        <b-input
                            v-model="form.email"
                            icon="email"
                            type="email"
                            placeholder="E-mail"
                            name="email"
                            required
                        />
                    </b-field>
                </b-field>
                <hr />
                <b-field label="Password" horizontal>
                    <b-field>
                        <b-input
                            v-model="form.password"
                            icon="lock"
                            type="password"
                            placeholder="E-mail"
                            name="password"
                            required
                        />
                    </b-field>
                </b-field>
                <hr />
                <b-field horizontal>
                    <b-field grouped>
                        <div class="control">
                            <b-button native-type="submit" type="is-primary"
                            >Submit</b-button>
                        </div>
                    </b-field>
                </b-field>
            </form>
        </section>
</div>
</template>

<script>
// import axios from 'axios'
export default {
    name: "Login",
    data() {
        return {
            form: {
                email: '',
                password:'',
            }
        }
    },
    methods: {
        login(){
            this.$store
                .dispatch('login', {
                    email: this.form.email,
                    password: this.form.password
                })
                .then((response) => {
                    if (this.response.status)
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
