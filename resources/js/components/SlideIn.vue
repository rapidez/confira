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
            return this.$scopedSlots.default(this)
        },

        data() {
            return {
                target: null,
                left: '0',
                top: '',
                isSwiping: false,
                distanceX: 0,
                distanceY: 0,
                isOpen: false,
            }
        },

        mounted() {
            const refs = this.$scopedSlots.default()[0].context.$refs
            this.target = refs.target // Add a reference to the target element

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
