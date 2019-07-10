<template>

  <option>- {{child.title}}</option>

</select>
</template>

<script>
export default {
props: {
child: []
},
data: function() {
  return {
delimiter: '-'
  };
},
// watch: {
//   category: function(newChildId, oldChildId) {
//     console.log(newChildId)
//   this.$emit('category', newChildId);
// }
// },
}
</script>
