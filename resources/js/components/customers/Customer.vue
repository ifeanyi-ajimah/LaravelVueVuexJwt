<template>
    <div class="customer-view" v-if="customer">
        <div class="user-img">
            <img src="https://www.scottsdaleazestateplanning.com/wp-content/uploads/2018/01/user.png" alt="">
        </div>
        <div class="user-info">
            <table class="table">
                <tr>
                    <th> ID</th>
                    <td> {{ customer.id}}</td>
                </tr>
                 <tr>
                    <th> NAME</th>
                    <td> {{ customer.name}}</td>
                </tr>
                <tr>
                    <th> EMAIL</th>
                    <td> {{ customer.email}}</td>
                </tr>
                <tr>
                    <th> PHONE</th>
                    <td> {{ customer.phone}}</td>
                </tr>
                 <tr>
                    <th> WEBSITE</th>
                    <td> {{ customer.website}}</td>
                </tr>
            </table>

            <router-link to="/customers"> Back to all Customers </router-link>
        </div>

    </div>
</template>

<script>
export default {
    name: 'view',

    data(){
        return {
            customer: null
        }
    },

    created(){  //we used customer_id because that is what was used in the router.js file
        axios.get(`/api/customers/${this.$route.params.customer_id}`,
            {
                headers:{
                "Authorization" : `Bearer ${this.currentUser.token}`
            }
            }).then((response) => {
                this.customer = response.data.customer
            })
    },

    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        }
    }


}
</script>

<style scoped>
.customer-view{
        display: flex;
        align-items: center;
}
.user-img{
    flex: 1;
}
.user-img img{
    max-width: 160px;
}
.user-info{
    flex: 3;
    overflow-x: scroll;
}

</style>


