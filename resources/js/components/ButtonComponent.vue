<template>
    <button
        :class="buttonClasses"
        @click="handleClick"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'primary', // Primary button by default
        },
    },
    computed: {
        buttonClasses() {
            return {
                'px-4 py-2 rounded-md transition transform hover:scale-105 focus:outline-none': true,
                'bg-[#FF2D20] text-white hover:bg-[#e3261b]': this.type === 'primary',
                'bg-gray-300 text-black hover:bg-gray-400': this.type === 'secondary',
            };
        },
    },
    methods: {
        handleClick() {
            // Custom click logic can be added here
            alert('Button clicked!');
        }
    }
};
</script>

<style scoped>
button {
    transition: all 0.3s ease;
}
</style>
