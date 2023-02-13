<template>
    <router-view />
</template>

<script>
export default {
    name: 'App',
    mounted() {
        if (!window.Laravel.user) {
            this.$router.push({
                name: 'login',
            });
        }
    },
};
</script>

<style lang="scss" scoped>
// Fonts
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500&display=swap');

// Variables
// Body
$body-bg: #f8fafc;
$black: #191B1D;
$blue: #307bc6;
$gray: #D9D9D9;
$purple: #6A5EFF;

// Typography
$font-family-sora: 'Sora', sans-serif;
$font-family-karla: 'Karla', sans-serif;
$font-size-base: 0.9rem;
$line-height-base: 1.6;


// Components
$sizes: 12;

@mixin margin-classes {
    @for $i from 1 through $sizes {
        $margin: $i * 0.25rem;
        /* margin #{$margin} */
        .m#{$i} {
            margin: $margin;
        }
        .ml#{$i} {
            margin-left: $margin;
        }
        .mr#{$i} {
            margin-right: $margin;
        }
        .mt#{$i} {
            margin-top: $margin;
        }
        .mb#{$i} {
            margin-bottom: $margin;
        }
        .mx#{$i} {
            margin-left: $margin;
            margin-right: $margin;
        }
        .my#{$i} {
            margin-top: $margin;
            margin-bottom: $margin;
        }
    }
}

@include margin-classes;

@mixin padding-classes {
    @for $i from 1 through $sizes {
        $padding: $i * 0.25rem;
        /* padding #{$padding} */
        .p#{$i} {
            padding: $padding;
        }
        .pl#{$i} {
            padding-left: $padding;
        }
        .pr#{$i} {
            padding-right: $padding;
        }
        .pt#{$i} {
            padding-top: $padding;
        }
        .pb#{$i} {
            padding-bottom: $padding;
        }
        .px#{$i} {
            padding-left: $padding;
            padding-right: $padding;
        }
        .py#{$i} {
            padding-top: $padding;
            padding-bottom: $padding;
        }
    }
}

@include padding-classes;


* {
    margin: 0;
    padding: 0;
}

a {
    color: $black;
    cursor: pointer;
    text-decoration: none;
}

h1 {
    font-size: 64px;
}

h2 {
    font-size: 48px;
}

h4 {
    font-size: 32px;
}

h4 {
    font-size: 24px;
}

h5 {
    font-size: 20px;
}

h6 {
    font-size: 16px;
}

.span {
    border: 0;
    background: transparent;
    font: 14px 'Karla', sans-serif;
    font-weight: 300;
    color: $purple;

    &:hover {
        cursor: pointer;
        color: $blue;
    }
}

.controls-item {
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 15px;
    padding: 15px;
    cursor: pointer;
    background-color: #FFFFFF;
    border: 1px $gray solid;

    span {
        font-family: 'Sora', sans-serif;
        font-size: 16px;
        font-weight: 400;
    }

    &.stroke > svg > path {
        stroke: $black;
    }

    &.fill > svg > path {
        fill: $black;
    }
}

.img {
    image-rendering: unset;
    min-width: 64px;
    height: 64px;
    border-radius: 100px;
    background: linear-gradient(137.36deg, #CA6363 -2.8%, #1D4EFF 139.54%);
}

.fl {
    float: left;
}

.fr {
    float: right;
}

.cb {
    &:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        height: 0;
    }
}

.text-ellipsis {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.text-ellipsis--2 {
    text-overflow: ellipsis;
    overflow: hidden;
    display: -webkit-box !important;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    white-space: normal;
}

body {
    section {
        &.main-content {
            position: relative;
            width: 100%;
            padding: 92px 0;

            .wrapper {
                max-width: 832px;
                margin: 0 auto;

                .main-header {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    max-width: 832px;
                    width: 100%;

                    .main-titles {
                        h4 {
                            font-family: 'Sora', sans-serif;
                            font-weight: 600;
                        }
                    }
                }
            }
        }

        &.aside-content {
            min-width: 577px;
            padding-top: 92px;
            border-left: 1px solid $gray;

            .wrapper {
                padding: 0 64px;

                h5, h4 {
                    font-family: 'Sora', sans-serif;
                }

                .aside-header {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    border-bottom: 1px solid $gray;
                    padding-bottom: 31px;

                    .aside-titles {
                        h5, h4 {
                            font-weight: 600;
                        }

                        h5:hover {
                            cursor: pointer;
                            color: $purple;
                        }

                        .title {
                            display: flex;
                            flex-direction: row;

                            .aside-title__information {
                                margin-bottom: 32px;
                            }
                        }
                    }

                    .aside-controls {

                    }
                }
            }
        }
    }
}


</style>
