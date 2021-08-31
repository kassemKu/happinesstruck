<template>
    <div class="ht-web-layout">
        <header>header</header>
        <main>
            <slot />
        </main>
        <footer>footer</footer>
    </div>
</template>

<script>
export default {
    name: 'WebLayout',
}
</script>
