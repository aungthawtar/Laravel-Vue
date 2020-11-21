<template>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <router-link to="/admin/post" class="btn btn-primary mb-3">Back</router-link>
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
                          <div class="form-group">
                              <label for="category">Category</label>
                              <select name="category_id" id="category" class="form-control" v-model="post.category_id">
                                  <option value="">Select</option>
                                  <option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>
                              </select>
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
    name : "PostCreate",
    data(){
        return {
            categories : [],
            posts : [],
            post : {
                title : '',
                content : '',
                category_id : '',
            },
        }
    },
    methods : {
        view(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        store(){
            axios.post('/api/post',this.post).then(response => {
                console.log(response);
                this.post = {
                    title : '',
                    content : '',
                }
            });
        },
        edit(post){
            this.post = {
                title : post.title,
                content : post.content,
            }
        }
    },
    created(){
        this.view();
    }
};
</script>

<style>
</style>