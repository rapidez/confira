<slide-in>
    <template slot-scope="{ isSwiping, top, _self }">
        <div ref="container">
            <input v-if="_self" v-model="_self.isOpen" id="slide-in" type="checkbox" class="hidden peer prevent-scroll" />
            <div
                ref="target"
                class="!touch-none absolute top-1.5 inset-x-0 bg-white z-30 rounded-b-xl opacity-0 -translate-y-full peer-checked:opacity-100 peer-checked:translate-y-0"
                :class="{ 'transition-all duration-500': !isSwiping }"
                :style="{ top }"
            >
                <div class="px-5 pt-6 pb-12 overflow-y-auto scrollbar-hide bg-primary/10">
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
            <label for="slide-in" class="fixed z-20 inset-x-0 bottom-0 top-1.5 bg-backdrop transition-all duration-500 opacity-0 pointer-events-none peer-checked:pointer-events-auto peer-checked:opacity-100"></label>
        </div>
    </template>
</slide-in>
