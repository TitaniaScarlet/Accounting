<template>
  <div>
      <div class="row">
        <div class="col-sm-3">
          <label>Номер ТТН</label>
          <select class="form-control" v-model="number">
            <option v-for="ttn in ttns" v-bind:value= "ttn.id">{{ttn.number}}</option>
          </select>
          </div>
        <div class="col-sm-3">
          <label>Дата</label>
          <p v-for="ttn in ttns" v-if = "ttn.id == number">{{ttn.date}}</p>
        </div>
        <div class="col-sm-6">
          <label>Поставщик</label>
<p v-for="ttn in ttns" v-if = "ttn.id == number">
  <span v-for = "supplier in suppliers" v-if = "supplier.id == ttn.id">{{supplier.title}}</span>
  </p>
        </div>
      </div>
</div>
</template>

<script>
export default {
  // props: ['ttns'],
  data: function() {
    return {
      ttns: [],
      suppliers: [],
      // products: [],
      // units: [],
      // subdivisions: [],
      // categories: [],
      number: '',
      // product: '',
      // unit: '',
      // subdivision: []
    };
  },
  mounted() {
this.json()
},
watch: {
  number: function(newNumber, oldNumber) {
    console.log(newNumber)
    axios({
      method: 'post',
      url: '/admin/json/ttn',
      params: {ttn: newNumber}
    }).then((response) => {
      console.log(response)
    });
  // this.$emit('ttn', '/admin/transference', newNumber);
},
},
  methods: {
    json: function() {
  axios.get('/admin/json').
  then((response) => {
    console.log(response)
    this.ttns = JSON.parse(response.data.ttns)
    this.suppliers = JSON.parse(response.data.suppliers)
    // this.products = JSON.parse(response.data.products)
    // this.units = JSON.parse(response.data.units)
    // this.subdivisions = JSON.parse(response.data.subdivisions)

  });
},
}
}
</script>
