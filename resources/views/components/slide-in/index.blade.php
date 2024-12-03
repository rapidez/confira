<slide-in>
    <template slot-scope="{ isSwiping, top, _self }">
        <div ref="container">
            <input v-if="_self" v-model="_self.isOpen" id="slide-in" type="checkbox" class="hidden peer" />
            <div
                ref="target"
                class="!touch-none absolute top-1.5 inset-x-0 bg-ct-primary-100 z-30 rounded-b-xl px-5 pt-6 pb-12 overflow-y-auto scrollbar-hide opacity-0 -translate-y-full peer-checked:opacity-100 peer-checked:translate-y-0"
                :class="{ 'transition-all duration-500': !isSwiping }"
                :style="{ top }"
            >
                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
            <label for="slide-in" class="absolute z-20 inset-x-0 bottom-0 top-1.5 bg-ct-neutral/30 transition-all duration-500 opacity-0 pointer-events-none peer-checked:pointer-events-auto peer-checked:opacity-100"></label>
        </div>
    </template>
</slide-in>
