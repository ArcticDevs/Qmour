<template>
  <div>
    {{details.display_ur}}
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  props: {
    details: Array
  },
  name: 'Y',
  data () {
    return {}
  },
  computed: {
    ...mapState([
      'Y'
    ])
  }
}
</script>
<style>
.trending-posts{
  width:350px;
  height:100px;
  display:inline-block;
}
</style>
