<template>
    <div class="login row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Login </div>
                <div class="card-body">
                    <form @submit.prevent="authenticate">

                         <div class="form-group " v-if="authError">
                            <p class="error">
                                {{ authError }}
                            </p>
                        </div>

                        <div class="form-group ">
                            <label for="email"> Email </label> <br>
                            <input type="email" v-model="form.email" placeholder="email address">
                        </div>

                        <div class="form-group ">
                            <label for="password"> Password </label> <br>
                            <input type="password" v-model="form.password" placeholder=" Password">
                        </div>

                        <div class="form-group ">
                            <input type="submit" value="login">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {login} from '../../helpers/auth';
export default {
    name : "login",
    data(){
        return {
            form:{
                email:'',
                password: '',
            }
        }
    },
    methods:{
        authenticate(){
            this.$store.dispatch('login');

             login(this.$data.form)
            .then((response) => {
                this.$store.commit("loginSuccess", response);
                this.$router.push({path: '/dashboard'});
            })
            .catch((error) => {
                this.$store.commit("loginFailed", {error});
            })
        }
    },
    computed:{
        authError(){
            return this.$store.getters.authError;
        }
    }


}
</script>


<style scoped >
.error{
    text-align: center;
    color: white;
    background-color: red;
}
</style>
