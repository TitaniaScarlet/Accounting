<template>
  <div>
    <div class="row">
      <div class="col-sm-3">
        <label>Номер ТТН</label>
        <select type="text" class="custom-select" v-model="number">
          <option v-for="ttn in sortedTtns" v-bind:value= "ttn" >{{ttn.number}}</option>
        </select>
      </div>
      <div class="col-sm-3">
        <label>Дата</label>
        <p v-for="ttn in ttns" v-if = "ttn.id == number.id"  v-model="date">{{ttn.date}}</p>
      </div>
      <div class="col-sm-6">
        <label>Поставщик</label>
        <p v-for="ttn in ttns" v-if = "ttn.id == number.id">
          <span v-for = "supplier in suppliers" v-if = "supplier.id == ttn.supplier_id">{{supplier.title}}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data: function() {
    return {
      sortKey: 'date',
      reverse: true,
      ttns: [],
      suppliers: [],
      number: [],
      date: '',
      search: ''
    };
  },
  mounted() {
    this.json()
  },
  computed: {
    sortedTtns() {
      const k = this.sortKey;
      return this.ttns.sort((a, b) => (a[k] < b[k] ? -1 : a[k] > b[k] ? 1 : 0) * [1, -1][+this.reverse]);
    },
    // filteredTtns() {
    //       const s = this.search.toLowerCase();
    //       return this.sortedTtns.filter(n => Object.values(n).some(m => m.toString().toLowerCase().includes(s)));
    //     }
  },
  watch: {
    number: function(newNumber, oldNumber) {
      console.log(newNumber)
      axios({
        method: 'post',
        url: '/admin/json/ttn',
        params: {ttn: newNumber.id, date: newNumber.date}
      }).then((response) => {
        console.log(response)
      });
    },
  },
  methods: {
    json: function() {
      axios.get('/admin/json').
      then((response) => {
        console.log(response)
        this.ttns = JSON.parse(response.data.ttns)
        this.suppliers = JSON.parse(response.data.suppliers)
      });
    },
  }
}
</script>
