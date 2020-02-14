<template>
    <div class="customer-new">
        <form @submit.prevent="add" >
        <div class="table">
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
            <tr class="text-right">
                <input type="submit" value="Create">
            </tr>

        </div>
        </form>
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
    methods: {
        add(){
            this.errors = null;
            const constraints = this.getConstraints();
            const errors = validate(this.$data.customer, constraints);
            if(errors){
                this.errors = errors;
            }
            //send the customer detail to backend api
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
                    presense: true,
                    numericallity: true,
                    length:{
                        minimum: 10,
                        message: 'Must be at least 10 digits long'
                    }
                },
                website:{
                    presence : true,
                    url : true,
                }
            }
        }
    }
}
</script>








