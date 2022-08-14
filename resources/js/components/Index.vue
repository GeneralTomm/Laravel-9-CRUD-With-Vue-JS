<template>
    <section class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-2">
                <router-link to="/" class="btn btn-sm btn-primary">User Tables</router-link>
            </div>
            <div class="col-md-3">
                <router-link to="/create" class="btn btn-sm btn-success">Add new User</router-link>
            </div>
        </div>
    </section>
    <section class="container">
        <router-view></router-view>
    </section>
</template>
<script>
export default{

}
</script>
