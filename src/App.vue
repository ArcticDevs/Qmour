<template>
  <div id="app">
    <!-- <go-top :has-outline="false" visibleoffset="10"></go-top>
    <div class="flex">
      <div class="mode-toggle" @click="modeToggle" :class="darkDark">
        <div class="toggle">
          <div id="dark-mode" type="checkbox"></div>
        </div>
      </div>

      <div class="heading" style="padding-top: 2vh">
        <h1>Qmour</h1>
      </div>
    </div>
    <div id="nav">
      <carousel :nav="false" :dots="false" :margin="-80">
        <router-link to="/Indian">
          <button class="btn btn-primary mb-2 navlink">
            Indian &#x1F1EE;&#x1F1F3;
          </button>
        </router-link>
        <router-link to="/dark-memes">
          <button class="btn btn-primary mb-2 navlink">Dark &#128420;</button>
        </router-link>
        <router-link to="/funny-memes">
          <button class="btn btn-primary mb-2 navlink">Funny &#128514;</button>
        </router-link>
        <router-link to="/science-memes">
          <button class="btn btn-primary mb-2 navlink">Science ⚕️</button>
        </router-link>
      </carousel>
    </div>
    <router-view /> -->
    <!-- <div id="sticky-header"> -->
      <Header />
      <!-- </div> -->

  </div>
</template>

<script>
import Header from './components/Header.vue'
import carousel from "vue-owl-carousel";
import GoTop from "@inotom/vue-go-top";
export default {
  components: {
    carousel,
    GoTop,
    Header
  },

  data() {
    return {
      // darkMode: false,
      items: [
        {
          text: "Upload",
        },
      ],
    };
  },
 
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap");
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

<style scoped>
#sticky-header{
    /* position: -webkit-sticky; */
    width:100%;
      /* background-color:#fff; */
  position: fixed;

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

// _mode-toggle.scss
.mode-toggle {
  position: relative;
  padding: 0;
  width: 44px;
  height: 24px;
  min-width: 36px;
  min-height: 20px;
  background-color: $mode-toggle-bg;
  border: 0;
  border-radius: 24px;
  outline: 0;
  overflow: hidden;
  cursor: pointer;
  z-index: 2;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-touch-callout: none;
  appearance: none;
  transition: background-color 0.5s ease;

  .toggle {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 3px solid transparent;
    box-shadow: inset 0 0 0 2px #a5abba;
    overflow: hidden;
    transition: transform 0.5s ease;

    #dark-mode {
      position: relative;
      width: 100%;
      height: 100%;
      overflow: hidden;
      border-radius: 50%;

      &:before {
        content: "";
        position: relative;
        width: 100%;
        height: 100%;
        left: 50%;
        float: left;
        background-color: #a5abba;
        transition: border-radius 0.5s ease, width 0.5s ease, height 0.5s ease,
          left 0.5s ease, transform 0.5s ease;
      }
    }
  }
}

#app.dark-mode {
  .mode-toggle {
    background-color: lighten($mode-toggle-bg, 5%);

    .toggle {
      transform: translateX(19px);

      #dark-mode {
        &:before {
          border-radius: 50%;
          width: 150%;
          height: 85%;
          left: 40%;
          transform: translate(-10%, -40%), rotate(-35deg);
        }
      }
    }
  }
}

.flex {
  display: flex;
  padding-top: 10px;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}
</style>