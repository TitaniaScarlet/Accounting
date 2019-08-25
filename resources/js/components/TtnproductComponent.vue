<template>
  <div>
    <h5>Товары: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>
      <div class="row">
        <div class="col-sm-5">
          <label>Товар</label>
          <select class="form-control" v-model="product">
              <option v-for="product in products" v-bind:value= "product.id">{{product.product_name}}, {{product.manufacturer}}, {{product.quantity}}<span v-for="unit in units" v-if="unit.id == product.unit_id">{{unit.type}}</span></option>
         </select>
        </div>
        <div class="col-sm-3">
          <label>Цена</label>
          <select class="form-control" v-model="subdivision">
              <option v-for="subdivision in subdivisions" v-bind:value= "subdivision.id">{{subdivision.name}}</option>
         </select>
               </div>
        <div class="col-sm-2">
          <label>Количество</label>
          <input type="text" class="form-control" name = "quantity" v-model="quantity">
        </div>
        <div class="col-sm-2">
          <label>Еденица измерения</label>
          <select class="form-control" v-model="unit">
            <option v-for="unit in units" v-bind:value= "unit.id">{{unit.type}}</option>
          </select>
        </div>
        <div class="col-sm-2">
          <label>Цена</label>
          <input type="text" class="form-control" name = "price" v-model="price">
        </div>
        <div class="col-sm-3">
          <label>Сумма</label>
          <input type="text" class="form-control" name = "accountingsum" v-model="accountingsum">
        </div>
        <div class="col-sm-2">
          <label>Ставка НДС, %</label>
          <input type="text" class="form-control" name = "vatrate" v-model="vatrate">
        </div>
        <div class="col-sm-2">
          <label>Сумма НДС, р</label>
          <input type="text" class="form-control" name = "vatsum" v-model="vatsum">
        </div>
        <div class="col-sm-3">
          <label>Сумма с НДС, р</label>
          <input type="text" class="form-control" name = "sum" v-model="sum">
        </div>
      </div>
    </br>

  <br>
</div>
</template>

<script>
export default {
  props: ['ttn'],
  data: function() {
    return {
      products: [],
      units: [],
      subdivisions: [],
       product: '',
       subdivision: '',
      quantity: '',
      unit: '',
      price: '',
      accountingsum: '',
      vatrate: '',
      vatsum: '',
      sum: ''
    };
  },
  mounted() {
    this.json()
  },
  methods: {
    add: function() {
      axios({
        method: 'post',
        url: '/admin/ttnproduct',
        params: {ttn: this.ttn, product: this.product, subdivision: this.subdivision, quantity: this.quantity, unit: this.unit, price: this.price, accountingsum: this.accountingsum, vatrate: this.vatrate, vatsum: this.vatsum, sum: this.sum}
      }).then((response) => {
        console.log(response)
      });
    },

    json: function() {
      axios.get('/admin/ttnproduct/create').
      then((response) => {
        console.log(response)
        this.units = JSON.parse(response.data.units)
        this.products = JSON.parse(response.data.products)
        this.subdivisions = JSON.parse(response.data.subdivisions)
      });
    },
  }
}
</script>
