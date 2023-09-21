<template>
    <div>
        <a
            class="text-blueGray-500 block"
            href="#"
            v-on:click="toggleDropdown($event)"
            ref="btnDropdownRef"
        >
            <div class="items-center flex">
        <span
            class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
        >
          <img
              :src="this.user.profile_photo_url"
              :alt="this.user.name"
              class="w-full rounded-full align-middle border-none shadow-lg"
          />
        </span>
            </div>
        </a>
        <div
            ref="popoverDropdownRef"
            class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
            v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow
      }"
            style="min-width: 12rem"
        >
            <a
                href="#"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >
                Action
            </a>
            <a
                href="#"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >
                Another action
            </a>
            <a
                href="#"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >
                Something else here
            </a>
            <div class="h-0 my-2 border border-solid border-blueGray-100"/>
            <a
                href="#"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
            >
                Seperated link
            </a>
        </div>
    </div>
</template>
<script>
import {createPopper} from "@popperjs/core";

export default {
    data() {
        return {
            dropdownPopoverShow: false,
            user: this.$page.props.auth.user,
        };
    },
    methods: {
        toggleDropdown: function (event) {
            event.preventDefault();
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "bottom-end"
                });
            }
        }
    }
};
</script>
