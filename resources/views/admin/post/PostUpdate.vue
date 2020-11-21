<template>
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <router-link to="/admin/post" class="btn btn-primary mb-3">Back</router-link>
            <h1>{{$route.params.id}}</h1>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <form v-on:submit.prevent="store">
                          <div class="form-group">
                              <label for="title">Post Title</label>
                              <input type="text" class="form-control" v-model="post.title">
                          </div>
                          <div class="form-group">
                              <label for="content">Post content</label>
                              <textarea name="content" id="content" class="form-control" rows="10" v-model="post.content"></textarea>
                          </div>
                          <button class="btn btn-primary float-right" type="submit">Create</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name : "PostUpdate",
    data(){
        return {
            post : {}
        }
    },
    methods : {
        edit(){
            axios.get(`/api/post/${this.$route.params.id}`).then(response => {
                this.post = response.data;
            });
        },
        store(){
            axios.patch(`/api/post/${this.$route.params.id}`,this.post).then( response => {
                
            });
        }
    },
    created(){
        this.edit();
    }
}
</script>

<style>

</style>