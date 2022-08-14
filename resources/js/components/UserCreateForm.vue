<template>
    <form @submit.prevent="store">
        <section v-if="errors != null">
            <div class="alert alert-danger">
                <span>
                    <strong v-if="errors != null">Error {{ errors.code }} : </strong>
                </span>
                <span>
                    {{ errors.message }}
                </span>
                <ul v-if="errors.code == 400">
                    <li v-for="(errorList , iteration) in errors.errors">
                        <span v-for="(lists , iteration) in errorList">
                            {{ lists }}
                        </span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="form-row">
            <div class="form-group">
                <label for="name">Name:</label>
                <input v-model="user.name" placeholder="Name :" type="text" name="name" id="name" class="form-control mb-4 col">
            </div>
            <div class="form-group">
                <label for="email">E-mail :</label>
                <input v-model="user.email" placeholder="E-mail :" type="email" name="email" id="email" class="form-control mb-4 col">
            </div>
            <div class="form-group">
                <label for="email">Password :</label>
                <input v-model="user.password" placeholder="Password :" type="password" name="password" id="password" class="form-control mb-4 col">
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
        return{
            user:{},
            errors:null,
        }
    },
    methods:{
        store:function(){
            axios.post('/api/user',this.user)
            .then((response)=>{
                
            })
            .catch((error)=>{
                let collection = error.response.data;
                this.errors = collection;
            });
        }
    }
}
</script>
