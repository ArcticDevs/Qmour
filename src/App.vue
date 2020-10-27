<template>
  <div id="app">
    <Header />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
export default {
  components: {
    Header,
  },

  data() {
    return {};
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

@import "../node_modules/@syncfusion/ej2-base/styles/material.css";
@import "../node_modules/@syncfusion/ej2-buttons/styles/material.css";
@import "../node_modules/@syncfusion/ej2-popups/styles/material.css";
@import "../node_modules/@syncfusion/ej2-splitbuttons/styles/material.css";
.e-menu::before {
  content: "\e984";
}
</style>


<style lang="scss" scoped>
$dark: #171717;
$mode-toggle-bg: #5f5d5d;

// _base.scss
#app {
  background-color: #fff;
  color: $dark;
  transition: background-color 0.2s ease, color 0.2s ease;
}

// _dark-mode.scss
#app {
  &.dark-mode {
    background-color: lighten($dark, 5%);

    .flex {
      color: #fff;
    }
  }
}
</style>