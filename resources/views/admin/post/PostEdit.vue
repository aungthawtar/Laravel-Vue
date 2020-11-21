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
                          <button class="btn btn-primary float-right" type="submit">Update</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'PostEdit',
    data() {
        return {
            post: {
            }
        }
    },
    created() {
        this.id = this.$route.params.id;
        this.edit();
    },
    methods: {
        edit() {
            axios.get('/api/post/' + this.id)
            .then(res => {
                this.post = res.data;
            })
        },
        store() {
            axios.patch(`/api/post/${this.$route.params.id}`,this.post).then(response => {
                console.log(response);
            });
        }
    }

}
</script>

<style>

</style>