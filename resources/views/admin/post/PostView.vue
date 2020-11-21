<template>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="float-right">
                <router-link to="/admin/post/create" class="btn btn-primary mb-3">Create</router-link>
                <button class="btn btn-secondary mb-3">Draft</button>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4" v-for="post in posts" :key="post.id">
              <div class="card">
                  <div class="card-header">
                      <h3>{{post.title}}</h3>
                  </div>
                  <div class="card-body">
                      <h5>{{post.content}}</h5>
                      <div class="text-right">
                        <label for="">Category : </label>
                        <a href=""><span>{{post.category.name}}</span></a>
                      </div>
                      <hr>
                      <div class="float-right mt-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" v-on:click="edit(post)">Edit Two</button>
                        <router-link :to="'/admin/post/' + post.id + '/edit'" class="btn btn-primary" >Edit</router-link>
                        <!-- <router-link :to="`/admin/post/${post.id}`" class="btn btn-info">Edit</router-link> -->
                        <button class="btn btn-danger" v-on:click="destroy(post.id)">Delete</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="post.title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" v-model="post.content"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
  </div>
</template>

<script>
export default {
    name : "PostView",
    data(){
        return {
            posts : [],
            post : {
                title : '',
                content : '',
            }
        }
    },
    methods : {
        view(){
            axios.get('/api/post').then(response => {
                this.posts = response.data;
            });
        },
        edit(post){
            this.post = {
                title : post.title,
                content : post.content,
            }
        },
        destroy(id){
            axios.delete(`/api/post/${id}`).then(response => {
            this.view();
            });
        }
    },
    created(){
        this.view();
    },
};
</script>

<style>
</style>