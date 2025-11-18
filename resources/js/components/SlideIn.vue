<script>
    import { usePointerSwipe } from '@vueuse/core'

    export default {
        props: {
            direction: {
                type: String,
                default: 'up'
            },
            threshold : {
                type: Number,
                default: 0.5,
            }
        },

        render() {
            return this.$slots && this.$slots.default ? this.$slots.default(this) : null
        },

        data() {
            return {
                target: null,
                left: '0',
                top: '0',
                isSwiping: false,
                distanceX: 0,
                distanceY: 0,
                isOpen: false,
            }
        },

        mounted() {
            const root = this.$el && this.$el.nextElementSibling ? this.$el.nextElementSibling : null
            if (root) {
                this.target = root.querySelector('[data-slide-target]')
            }
            const { distanceX, distanceY, isSwiping } = usePointerSwipe(this.target, {
                onSwipe: this.onSwipe,
                onSwipeEnd: this.onSwipeEnd
            })

            this.distanceX = distanceX
            this.distanceY = distanceY
            this.isSwiping = isSwiping
        },

        methods: {
            onSwipe() {
                if (this.targetHeight) {
                    if (this.distanceY > 0) {
                        let distance = Math.abs(this.distanceY)
                        if(this.direction === 'up') {
                            distance = distance * -1
                        }
                        this.top = `${distance}px`
                    } else {
                        this.top = ''
                    }
                }
            },

            onSwipeEnd() {
                this.top = ''
                if (this.distanceY > 0 && this.targetHeight && Math.abs(this.distanceY) / this.targetHeight >= this.threshold) {
                    this.isOpen = false
                } else {
                    this.isOpen = true
                }
            }
        },

        computed: {
            targetHeight() {
                return this.target.offsetHeight
            }
        },
    }
</script>
