<template>
  <div class="container">
    <h5>Состав: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>
    <div class="row">
      <div class="col-sm-6">
        <label>Категория</label>
      </div>
      <div class="col-sm-3">
        <label>Количество</label>
      </div>
      <div class="col-sm-3">
        <label>Еденица измерения</label>
      </div>
    </div>
    <div>
      <div class="row">
        <div class="col-sm-6">
          <select class="form-control" v-model="category">
            <option  v-for="category in categories" v-bind:value= "category.id" >
              {{category.title}}
              <!-- <tree-component :children="categories"></tree-component> -->
            </option>
          </select>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" name = "quantity" v-model="quantity">
        </div>
        <div class="col-sm-3">
          <select class="form-control" v-model="unit">
            <option v-for="unit in units" v-bind:value= "unit.id">{{unit.type}}</option>
          </select>
        </div>
      </div>
    </br>
  </div>
  <br>
</div>
</template>

<script>
export default {
  props: ['menu'],
  data: function() {
    return {
      categories: [],
      units: [],
      category: '',
      quantity: '',
      unit: ''
    };
  },
  mounted() {
    this.json()
  },
  methods: {
    add: function() {
      axios({
        method: 'post',
        url: '/admin/ingredient',
        params: {menu: this.menu, category: this.category, quantity: this.quantity, unit: this.unit}
      }).then((response) => {
        console.log(response)
      });
    },
    json: function() {
      axios.get('/admin/ingredient/create').
      then((response) => {
        console.log(response)
        this.units = JSON.parse(response.data.units)
        this.categories = JSON.parse(response.data.categories)
      });
    },
  }
}
</script>
