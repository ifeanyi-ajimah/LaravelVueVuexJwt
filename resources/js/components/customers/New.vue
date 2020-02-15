<template>
    <div class="customer-new">
        <form @submit.prevent="add" >
        <table class="table ">
            <tr>
                <th> Name</th>
                <td>
                    <input type="text" class="form-control" v-model="customer.name" placeholder="Customer Name" >
                </td>
            </tr>
            <tr>
                <th> Email</th>
                <td>
                    <input type="text" class="form-control" v-model="customer.email" placeholder="Customer Email" >
                </td>
            </tr>
            <tr>
                <th> phone</th>
                <td>
                    <input type="text" class="form-control" v-model="customer.phone" placeholder="Customer phone" >
                </td>
            </tr>
            <tr>
                <th> website</th>
                <td>
                    <input type="text" class="form-control" v-model="customer.website" placeholder="Customer website" >
                </td>
            </tr>

            <tr>
                <td>
                    <router-link to="/customers" class="btn btn-warning">Cancel </router-link>
                </td>
                <td>
                <input type="submit" value="Create" class="float-right btn btn-primary ">
                </td>
            </tr>

        </table>
        </form>
        <div class="errors subd" v-if="errors">
            <ul class="listerr">
                <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                    <strong> {{fieldName }}</strong> {{ fieldsError.join('\n') }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import validate from 'validate.js';

export default {
    name:'new',
    data(){
        return {
            customer: {
                name: '',
                email: '',
                phone: '',
                website:''
            },
            errors: '',
        }
    },
    computed:{
        currentUser(){
            return this.$store.getters.currentUser;
        }
    },

    methods: {
        add(){
            this.errors = null;
            const constraints = this.getConstraints();
            const errors = validate(this.$data.customer, constraints);
            if(errors){
                this.errors = errors;
                return; //return so as not to proceed to post data to api while there is error
            }
            //send the customer detail to backend api
            axios.post('/api/customers/store', this.$data.customer,{
                 headers:{
                    "Authorization" : `Bearer ${this.currentUser.token}`
                }
            })
            .then((response) => {
                this.$router.push('/customers');
            });

        },

        getConstraints(){
            return {
                name:{
                    presence: true,
                    length: {
                        minimum: 3,
                        message: 'Must be at least 3 characters long'
                    }
                },
                email:{
                    presence: true,
                    email: true,
                },
                phone:{
                    presence: true,
                    numericality: true,
                    length:{
                        minimum: 10,
                        message: 'Must be at least 10 digits long'
                    }
                },
                website:{
                    presence : true,
                    url : true,
                }
            };
        }
    }
}
</script>

<style scoped>
.subd{
    margin-top: 50px;
}
.listerr{
    /* color: red;

    margin: 0;
    padding: 0; */
    background: lightcoral;
    border-radius: 5px;
    padding: 21px 0 2px 5px;
    list-style-type: none;
    color: black;
}

</style>






