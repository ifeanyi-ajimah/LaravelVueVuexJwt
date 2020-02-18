<template>
    <div class="container">
        <input type="search" class=" form-control" @keyup="searchCustomers" placeholder="Search" v-model="search" >
        <div class="btn-wrapper">
            <router-link to="customers/new" class="btn btn-primary btn-sm">
                New
            </router-link>
        </div>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <template v-if="!customers.length">
                    <tr>
                        <td colspan="4" class="text-center"> No customers available </td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="customer in paginationData" :key="customer.id" >
                        <td>{{ customer.name | to-uppercase }}</td>
                        <td>{{ customer.email }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>
                            <router-link :to="`/customers/${customer.id}`"> View </router-link>
                        </td>
                    </tr>
                </template>

            </tbody>
        </table>

        <jw-pagination :items="customers" @changePage="onChangePage"></jw-pagination>

    </div>
</template>


<script>


export default {
    name: 'list',


    data(){
        return{
            paginationData: [],
            search:'',

        }
    },

    mounted(){
        this.$store.dispatch('getCustomers');


        Fire.$on('searching', () => {
            let query = this.search;
            axios.get('api/findCustomer?q=' + query ,{
                 headers:{
                    "Authorization" : `Bearer ${this.currentUser.token}`
                }
            })
            .then((data) =>{
                console.log(data.data.customers)
                this.paginationData = data.data.customers
            })
            .catch(()=>{

            })
        });

    },

    computed:{
        customers(){
            return this.$store.getters.customers
        },

         currentUser() {
            return this.$store.getters.currentUser;
        },
    },
    methods:{
         onChangePage(paginationData) {
            this.paginationData = paginationData;
        },

        // searchCustomers: _.debounce(() =>{
        //     Fire.$emit('searching');
        // },2000)

        searchCustomers(){
            setTimeout(()=>{
                console.log("searching");
               Fire.$emit('searching');
            }, 2000);

        },

    },

     filters:{
        'to-uppercase':function(value){
            return value.toUpperCase();
        }
       },

}
</script>

<style scoped>

.btn-wrapper{
    text-align: right;
    margin-bottom: 20px;
}

</style>











