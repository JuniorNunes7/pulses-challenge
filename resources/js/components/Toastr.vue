<template></template>
<script>
export default {
    props: ['session'],
    mounted () {
        // Success Message
        if(_.has(this.session, 'success')) {
            this.$toast.success(this.session.success)
        }
        // Error Message
        if(_.has(this.session, 'error')) {
            this.$toast.error(this.session.error)
        }
    }
}
</script>