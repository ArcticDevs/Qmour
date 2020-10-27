<template>
  <div id="header">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <go-top id="goto-top" :has-outline="false" visibleoffset="10"></go-top>

    <div class="flex">

      <div class="mode-toggle" @click="modeToggle" :class="darkDark">
        <div class="toggle">
          <div id="dark-mode" type="checkbox"></div>
        </div>
      </div>

      <div>
        <h1>Qmour</h1>
      </div>

      <div>
        <dropdown-menu class="custom-style zoom" direction="right" :withDropdownCloser="true">
          <button slot="trigger"><i class="fas fa-cog"></i></button>
          <ul slot="body">
            <li>
              <router-link to="/privacy-policy" dropdown-closer>Privacy Policy</router-link>
            </li>
          </ul>
        </dropdown-menu>
      </div>

    </div>


      <!-- ------------NAVBAR------------ -->
    <div id="nav">
      <carousel class="carousel" :nav="false" :dots="false" :margin="-80">
        <router-link to="/indian-memes">
          <button class="btn mb-2 shadow-none navlink" @click="indianmeme">
            Indian &#x1F1EE;&#x1F1F3;
          </button>
        </router-link>
        <router-link to="/dark-memes">
          <button class="btn mb-2 shadow-none navlink" @click="darkmeme">
            Dark &#128420;
          </button>
        </router-link>
        <router-link to="/funny-memes">
          <button class="btn mb-2 shadow-none navlink" @click="funnymeme">
            Funny &#128514;
          </button>
        </router-link>
        <router-link to="/science-memes">
          <button class="btn mb-2 shadow-none navlink" @click="sciencememe">
            Science ⚕️
          </button>
        </router-link>

        <router-link to="/sarcasm">
          <button class="btn mb-2 shadow-none navlink" @click="sarcasm">
            Sarcasm 🙃
          </button>
        </router-link>

        <router-link to="/hindi">
          <button class="btn mb-2 shadow-none navlink" @click="hindi">
            Hindi ♨️
          </button>
        </router-link>

        <router-link to="/coding">
          <button class="btn mb-2 shadow-none navlink" @click="coding">
            Coding 💻
          </button>
        </router-link>

        <router-link to="/quotes">
          <button class="btn mb-2 shadow-none navlink" @click="quotes">
            Quotes ✌️
          </button>
        </router-link>

        <router-link to="/fact">
          <button class="btn mb-2 shadow-none navlink" @click="fact">
            Fact 👍🏻
          </button>
        </router-link>
      </carousel>
    </div>
    <router-view />
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import GoTop from "@inotom/vue-go-top";
import DropdownMenu from "v-dropdown-menu";
import "v-dropdown-menu/dist/v-dropdown-menu.css";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
export default {
  components: {
    carousel,
    GoTop,
    DropdownMenu,
    FontAwesomeIcon,
  },
  data() {
    return {
      darkMode: false,
      transition:String,
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
    indianmeme() {
      this.$gtag.pageview({
        page_path: "/Indian-Meme",
      });
      this.$gtag.event("indian-meme-click", {
        event_category: "indian-meme",
        event_label: "indian-click",

        value: 1,
      });
    },
    darkmeme() {
      this.$gtag.pageview({
        page_path: "/Dark-Meme",
      });
      this.$gtag.event("darkmeme-click", {
        event_category: "darkmeme",
        event_label: "darkmeme-click",

        value: 1,
      });
    },
    sciencememe() {
      this.$gtag.pageview({
        page_path: "/Science-Meme",
      });
      this.$gtag.event("sciencememe-click", {
        event_category: "sciencememe",

        event_label: "sciencememe-click",
        value: 1,
      });
    },
    funnymeme() {
      this.$gtag.pageview({ page_path: "/Funny-Meme" });
      this.$gtag.event("funnymeme-click", {
        event_category: "funnymeme",
        event_label: "funnymeme-click",

        value: 1,
      });
    },

    sarcasm() {
      this.$gtag.pageview({ page_path: "/sarcasm" });
      this.$gtag.event("Sarcasm-click", {
        event_category: "Sarcasm",
        event_label: "Sarcasm-click",
        value: 1,
      });
    },

    hindi() {
      this.$gtag.pageview({ page_path: "/hindi" });
      this.$gtag.event("hindi-click", {
        event_category: "hindi",
        event_label: "hindi-click",
        value: 1,
      });
    },
    coding() {
      this.$gtag.pageview({ page_path: "/coding" });
      this.$gtag.event("coding-click", {
        event_category: "coding",
        event_label: "coding-click",
        value: 1,
      });
    },
    quotes() {
      this.$gtag.pageview({ page_path: "/quotes" });
      this.$gtag.event("quotes-click", {
        event_category: "quotes",
        event_label: "quotes-click",
        value: 1,
      });
    },
    fact() {
      this.$gtag.pageview({ page_path: "/fact" });
      this.$gtag.event("fact-click", {
        event_category: "fact",
        event_label: "fact-click",
        value: 1,
      });
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
#nav {
  padding: 10px 30px;
}
#nav .carousel a {
  font-weight: bold;
  /* color: #000 !important; */
}
#nav .carousel button {
  background-color: #83dec4 !important;
  border-radius: 9px;
  font-family: "Red Hat Display";
  font-style: normal;
  font-weight: 700;
  color: #000 !important;
}
#nav .carousel a.router-link-exact-active button {
  background-color: #00b589 !important;
}
</style>

<style scoped>
#goto-top {
  background-color: #83dec4 !important;
}
.dark {
  color: white;
  background: rgba(45, 45, 45, 0.94);
}
h1 {
  font: 900 40px/1 "Red Hat Display", Arial, sans-serif;
}

.btn,
.btn:focus {
  outline: none !important;
  box-shadow: 1px 5px 7px -3px !important;
  background-color: #00b589 !important;
}
.e-btn,
.e-btn:hover,
.e-btn:focus {
  outline: 0;
  box-shadow: none !important;
  background: transparent;
}
.heading {
  width: 80%;
  position: relative;
  display: inline-block;
}

.heading h1 {
  position: absolute;
  left: 50%;
  right: 50%;
  transform: translate(-50%, -50%);
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
  padding-top: 20px;
  padding-right: 20px;
  padding-left: 20px;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  height: 100%;
}

@media (min-width: 800px) {
  .flex {
    padding-right: 50px;
    padding-left: 50px;
  }
}

// *********************SETTINGS DROPDOWN***************** //
.v-dropdown-menu {
  $this: &;
  &.custom-style & {
    &__container {
      #{$this} {
        &__body {
          ul {
            margin: 0;
            padding: 0;
            li {
              list-style: none;
              a {
                display: flex;
                justify-content: center;
                padding: 0.5rem;
                color: #666;
                font-size: 16px;
                text-decoration: none;
                &:hover {
                  background-color: #f2f2f2;
                }
              }
            }
          }
        }
      }
    }
  }
   &.custom-style {
    // Custom Transition - Zoom Effect
    .zoom-enter-active {
      transition: all 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
    }
    .zoom-enter,
    .zoom-leave-to {
      transform: translateY(50px) scale(0.5);
      transform-origin: center top;
      opacity: 0;
    }
    &#{$this}--mode-hover {
      .zoom-enter,
      .zoom-leave-to {
        transition-delay: 0.4s;
      }
    }
  }
}
</style>