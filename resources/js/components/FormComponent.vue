<template>
  <div class="container">
    <h5>Состав: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>
      <div class="row">
        <div class="col-sm-6">
          <label>Категория</label>
          <select class="form-control" v-model="category">
            <optgroup v-for="category in categories" v-bind:value= "category.id" :label="category.title">
             <option v-bind:value= "category.id">{{category.title}}</option>
              <option v-for="child in children" v-if="child.parent_id == category.id" v-bind:value= "child.id">- {{child.title}}</option>
                        </optgroup>
         </select>
        </div>
        <div class="col-sm-3">
          <label>Количество</label>
          <input type="text" class="form-control" name = "quantity" v-model="quantity">
        </div>
        <div class="col-sm-3">
          <label>Еденица измерения</label>
          <select class="form-control" v-model="unit">
            <option v-for="unit in units" v-bind:value= "unit.id">{{unit.type}}</option>
          </select>
        </div>
      </div>
    </br>

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
       children: [],
       category: '',
      quantity: '',
      unit: '',
      delimiter: ''
    };
  },
  mounted() {
    this.json()
  },
  methods: {
    add: function() {
      console.log(this.category)
      console.log(this.quantity)
      console.log(this.unit)
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
        this.children = JSON.parse(response.data.children)
      });
    },
  }
}
</script>
