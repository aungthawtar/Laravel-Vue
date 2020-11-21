<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary float-right mb-3" v-on:click="create">Create</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="category in categories" :key="category.id">
              <td>{{category.id}}</td>
              <td>{{category.name}}</td>
              <td>
                <button class="btn btn-primary" v-on:click="edit(category)">Edit</button>
                <button class="btn btn-danger" v-on:click="destroy(category.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <form v-on:submit.prevent="isEditMode ? update() : store()">
              <div class="form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="category.name"
                />
              </div>
              <button class="btn btn-primary" type="submit">{{isEditMode ? "Update" : "Save"}}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoryView",
  data() {
    return {
      isEditMode : false,
      categories: [],
      category: {
        name: "",
      },
    };
  },
  methods : {
    view(){
      axios.get('/api/category').then(response => {
        this.categories = response.data;
      });
    },
    create(){
      this.isEditMode = false;
      this.category = {
        name : '',
      }
    },
    store(){
      axios.post('/api/category',this.category).then(response => {
        this.view();
        this.category = {
          name : '',
        }
      });
    },
    edit(category){
      this.isEditMode = true;
      this.category.id = category.id;
      this.category.name = category.name;
    },
    update() {
      axios.patch(`/api/category/${this.category.id}`,this.category).then(response => {
        this.view();
        this.category = {
          name : '',
        }
      });
    },
    destroy(id){
      axios.delete(`/api/category/${id}`).then(response => {
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