<template>
<div id="sticky">
  <div id="app">
    <div class="flex">
      <div class="mode-toggle" @click="modeToggle" :class="darkDark">
        <div class="toggle">
          <div id="dark-mode" type="checkbox"></div>
        </div>
      </div>

      <div class="heading" style="padding-top:2vh">
        <h1><a href="https://qmour.com" style="text-decoration:none;" class="darkDark" >Qmour</a></h1>
      </div>

      <!-- <div class="header-settings">
        <ejs-dropdownbutton
          :items="items"
          iconCss="e-icons e-menu"
          cssClass="e-caret-hide"
          id="e-menu"
        ></ejs-dropdownbutton>
      </div> -->
    </div>
    <div id="nav">
      <carousel :nav="false" :dots="false"  >
      <router-link to="/Indian">
        <button class="btn btn-primary mb-2 navlink">Indian &#x1F1EE;&#x1F1F3; </button>
      </router-link>
      <router-link to="/dank-memes">
        <button class="btn btn-primary mb-2 navlink">Dark &#128420</button>
      </router-link>
      <router-link to="/funny-memes">
        <button class="btn btn-primary mb-2 navlink">Funny Memes &#128514;</button>
      </router-link> 
      <router-link to="/science-memes">
        <button class="btn btn-primary mb-2 navlink">Science ⚕️ </button>
      </router-link> 
       <!-- <router-link to="/trending">
        <button class="btn btn-primary mb-2 navlink">Trending</button>
      </router-link>
      <router-link to="/dank-memes">
        <button class="btn btn-primary mb-2 navlink">Dank Memes</button>
      </router-link>
      <router-link to="/funny-memes">
        <button class="btn btn-primary mb-2 navlink">Funny Memes</button>
      </router-link>     -->
      </carousel>
    </div>
    <router-view />
  </div>
  
  </div>
</template>

<script>
import Indian from "./components/Indian.vue";
import carousel from 'vue-owl-carousel'

export default {
  components: {
    Indian,
    carousel
  },

  data() {
    return {
      darkMode: false,
      items: [
        {
          text: "Upload",
        },
      ],
    };
  },
  methods: {
    dark() {
      document.querySelector("#app").classList.add("dark-mode");
      this.$emit("dark");
    },

    light() {
      document.querySelector("#app").classList.remove("dark-mode");
      this.darkMode = false;
      this.$emit("light");
    },

    modeToggle() {
      this.$store.dispatch("toggle_mode");
      if (
        this.darkMode ||
        document.querySelector("#app").classList.contains("dark-mode")
      ) {
        this.light();
      } else {
        this.dark();
      }
    },
  },

  computed: {
    darkDark() {
      return this.darkMode && "darkmode-toggled";
    },
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
#sticky{
    position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}
#nav {
  padding: 10px 30px;
  
}
#nav a {
  font-weight: bold;
  color: #fff;
}
#nav button {
  background-color: #b6b6b6 !important;
  border: 0px;
  border-radius: 9px;
  font-family: "Red Hat Display";
  font-style: normal;
  font-weight: bold;
}
#nav a.router-link-exact-active button {
  border: 0px;
  background-color: #6271ff !important;
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
h1 {
 font: 900 40px/1 'Red Hat Display', Arial, sans-serif; 
 
 
 text-align: center; 
 /* letter-spacing: -3px;  */
 
}
.e-btn,
.e-btn:hover,
.e-btn:focus {
    outline: 0;
  box-shadow: none !important;
  background: transparent;
}

#nav button {
  background-color: #b6b6b6;
}
.heading {
  width: 80%;
  position: relative;
  display: inline-block;
}
.header-settings {
  display: inline-block;
  cursor: pointer;
}
.navlink {
  margin-right: 8px;
}
@media (min-width: 492px) {
  #nav button {
    margin-right: 25px;
  }
}
@media (max-width: 359px) {
  .navlink {
    font-size: 10px !important;
    margin-right: 5px;
  }
  #nav {
    margin-left: 10px;
  }
}
@media (max-width: 768px) {
  #nav {
    padding: 10px 0px;
  }
  .navlink {
    font-size: 12px;
    padding: 5px 10px;
  }
}
@media (max-width: 318px) {
  #nav button {
    margin: auto;
    display: block;
  }
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
  //margin: auto .5rem .5rem auto;
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

// DEMO STYLES
@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro");

html {
  font-size: 16px;
}

html,
#app,
#app {
  width: 100%;
  height: 100%;
}

#app {

  font-family: "Source Sans Pro";
}

.flex {
  display: flex;
  padding-top:10px ;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}
</style>