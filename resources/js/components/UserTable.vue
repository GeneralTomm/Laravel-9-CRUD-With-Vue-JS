<template>
    <section>    
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>User</td>
                        <td>E-mail</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <router-link :to="'/edit/'+user.id" class="btn btn-sm btn-warning col w-100">Edit
                            </router-link>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger col w-100" @click="deleteUser(user.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>
<script>
export default{
    data(){
        return {
            users:{}
        }
    },
    created(){ 
        this.fetchUser();
    },
    methods:{
        fetchUser:function(){
            axios.get('/api/user').then((response)=>{
                this.users = response.data.data;
            });
        },
        deleteUser:function(user){
            axios.delete('/api/user/'+user).then((response)=>{
                let i = this.users.map(data=>data.id).indexOf(user);
                this.users.splice(i,1);
            });
        }
    }
}
</script>