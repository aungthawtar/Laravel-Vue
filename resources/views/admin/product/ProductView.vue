<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary float-right mb-3" v-on:click="create()">Create</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Price</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{product.id}}</td>
              <td>{{product.title}}</td>
              <td>{{product.price}}</td>
              <td>{{product.description}}</td>
              <td>
                <button class="btn btn-primary btn-sm" v-on:click="edit(product)">Edit</button>
                <button class="btn btn-danger btn-sm" v-on:click="destroy(product.id)">Delete</button>
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
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" v-model="product.title">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" v-model="product.price">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="6" v-model="product.description"></textarea>
              </div>
              <button class="btn btn-primary float-right" type="submit">{{isEditMode ? 'Update' : 'Save'}}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name : "ProductView",
  data() {
    return {
      isEditMode : false,
      products : [],
      product : {
        id : '',
        title :'',
        price : '',
        description : '',
      }
    }
  },
  methods : {
    view(){
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        loader : 'Dots',
      });  
      axios.get('/api/product').then(response => {
        this.products = response.data;
        loader.hide();
      });
    },
    create(){
      this.isEditMode = false;
      this.product = {
          title : "",
          price : '',
          description : '',
        }
    },
    store(){
      axios.post('/api/product',this.product).then(response => {
        this.view();
        this.product = {
          title : "",
          price : '',
          description : '',
        }
      });
    },
    edit(product){
      this.isEditMode = true;
      this.product = {
        id : product.id,
        title : product.title,
        price : product.price,
        description : product.description,
      }
    },
    update(){
      axios.patch(`/api/product/${this.product.id}`,this.product).then(response => {
        this.view();
        this.product = {
          title : "",
          price : '',
          description : '',
        };
        Swal.fire(
          'Good job!',
          'Your Update is Success!',
          'success'
        )
      });
    },
    destroy(id){
      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
        axios.delete(`/api/product/${id}`).then(response => {
        this.view();
      });
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          );
        }
      })
    }
  },
  created(){
    this.view();
  }
}
</script>

<style>

</style>