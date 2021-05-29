<template>
    <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <span class="fs-4">Pulses Challenge</span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item" v-for="(item, i) in items" :key="i">
                <a :href="item.url" class="nav-link" :class="{active: item.active}">
                    {{ item.text }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>


export default {
    props: ['menu'],

    data () {
        return {
            items: this.menu
        }
    },

    mounted () {
        // Ativando menu de acordo com a URL.
        const path = window.location.pathname;
        const item = this.items.find((item) => path.includes(item.url));
        item.active = true;
    }
}
</script>
