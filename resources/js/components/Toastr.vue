<template></template>
<script>
export default {
    props: ['session'],
    created () {
        // Success Message
        if(_.has(this.session, 'success')) {
            this.$toastr.s(this.session.success)
        }
        // Error Message
        if(_.has(this.session, 'error')) {
            console.log(this.$toastr);
            this.$toastr.e(this.session.error)
        }
    }
}
</script>