const vm_header = new Vue({
    el: "#header",
    data: {
        menuOpen: false,
        local: ""
    },
    methods: {

    },
    computed: {

    },
    created() {
        this.local = document.getElementById('header').getAttribute('local');
    }
});