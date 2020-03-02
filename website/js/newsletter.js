const vm_newsletter = new Vue({
    el: '#newsletter',
    data: {
        email: "",
        status: 0
    },
    methods: {
        sendEmail() {
            if (this.status == 0) {
                this.status = 1;
            }
        }
    }
});