<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header"> Customers</div>
                    <div class="card-body">
                        <!-- this router-view is where the links to children components will appear -->
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'customers-main'
}
</script>











