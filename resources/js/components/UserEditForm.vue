<template>
    <form @submit.prevent="update">
        <section v-if="errors != null">
            <div class="alert alert-danger">
                <span>
                    <strong v-if="errors != null">Error {{ errors.code }} : </strong>
                </span>
                <span>
                    {{ errors.message }}
                </span>
                <ul v-if="errors.code == 400">
                    <li v-for="(errorList, iteration) in errors.errors">
                        <span v-for="(lists, iteration) in errorList">
                            {{ lists }}
                        </span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="form-row">
            <div class="form-group">
                <label for="name">Name:</label>
                <input v-model="users.name" placeholder="Name :" type="text" name="name" id="name"
                    class="form-control mb-4 col">
            </div>
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input v-model="users.email" placeholder="E-mail :" type="email" name="email" id="email"
                    class="form-control mb-4 col">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </section>
    </form>
</template>
<script>
export default {
    data(){
        return {
            errors:null,
            users:{},
        }
    },
    created(){
        this.fetch();
    },
    methods:{
        fetch:function(){
            axios.get('/api/user/'+ this.$route.params.id)
            .then((response)=>{
                this.users = response.data.data;
            });
        },
        update:function(){
            axios.put('/api/user/'+this.$route.params.id,this.users)
            .then((response)=>{
                let result = response.data;
                if(response.data.code == 200){
                    this.$router.push({ name: 'user-table' });
                }
            })
            .catch((error)=>{
                let items = error.response.data;
                this.errors = items;
            });
        }
    }
}
</script>