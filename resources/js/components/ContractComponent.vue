<template>
  <div class="container">
    <h5>Договор: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>

      <div class="row">
        <div class="col-sm-4">
          <label>Дата</label>
          <input type="date" class="form-control" name="date" placeholder="Дата" v-model="date">
        </div>
        <div class="col-sm-4">
          <label>Номер договора</label>
          <input type="text" class="form-control" name = "contract" placeholder="Номер договора" v-model="contract">
        </div>
      </div>
    </br>

  <br>
</div>
</template>

<script>
export default {
  props: ['supplier'],
  data: function() {
    return {
      date: '',
      contract: '',
    };
  },
  methods: {
    add: function() {
      axios({
        method: 'post',
        url: '/admin/contract',
        params: {date: this.date, contract: this.contract, supplier: this.supplier}
      }).then((response) => {
        console.log(response)
      });
    },
  }
}
</script>
