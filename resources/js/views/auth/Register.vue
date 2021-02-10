<template>
<div>
        <section class="register-card is-secondary">
            <form @submit.prevent="register">
                <b-field label="Name" horizontal>
                    <b-field>
                        <b-input
                            v-model="form.name"
                            icon="account"
                            placeholder="Name"
                            name="name"
                            required
                        />
                    </b-field>

                </b-field>
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
                            placeholder="secret"
                            name="password"
                            required
                        />
                    </b-field>
                </b-field>
                <hr/>
                <b-field label="Confirm Password" horizontal>
                    <b-field>
                        <b-input
                            v-model="form.password_confirmation"
                            icon="lock"
                            type="password"
                            placeholder="secret"
                            name="password_confirmation"
                            required
                        />
                    </b-field>
                </b-field>
                <b-field horizontal>
                    <b-field grouped>
                        <div class="control">
                            <b-button native-type="submit" type="is-primary"
                            >Submit</b-button
                            >
                        </div>
                    </b-field>
                </b-field>
            </form>
        </section>
</div>
</template>

<script>
// import axios from 'axios';
export default {
    name: "Register",
    data: function(){
        return {
            form: {
                name : '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        }
    },
    methods: {
        register() {
            axios
                .post('register', {
                    name: this.form.name,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation
                })
                .then((response) => {
                    if(this.response.status === 201){
                        this.router.push({ name : 'login' });
                        alert(this.response.message);
                    }
                    else {
                        alert(this.response.message);
                    }
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
